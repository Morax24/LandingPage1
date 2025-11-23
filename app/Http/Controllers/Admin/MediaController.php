<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Repository\UploadRepository;

class MediaController extends Controller
{
    protected $upload;

    public function __construct()
    {
        $this->upload = new UploadRepository();
    }

    /**
     * Display media library
     */
    public function index(Request $request)
    {
        $query = Media::with('uploader')->ordered();

        // Filter by status - TAMBAHKAN FILTER INI
        if ($request->has('status') && $request->status != 'all') {
            if ($request->status == 'active') {
                $query->where('is_active', true);
            } elseif ($request->status == 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Filter by type
        if ($request->has('type') && $request->type != 'all') {
            $query->where('type', $request->type);
        }

        // Filter by section
        if ($request->has('section') && $request->section != 'all') {
            $query->where('section', $request->section);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $media = $query->paginate(12);

        // Stats - PERBAIKI STATISTIK DENGAN DATA AKTIF/NONAKTIF
        $stats = [
            'total' => Media::count(),
            'images' => Media::images()->count(),
            'videos' => Media::videos()->count(),
            'total_size' => Media::sum('file_size'),
            'active' => Media::where('is_active', true)->count(),
            'inactive' => Media::where('is_active', false)->count(),
        ];

        return view('admin.media.index', compact('media', 'stats'));
    }

    /**
     * Show upload form
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store uploaded media
     */
    public function store(StoreMediaRequest $request)
    {
        try {
            $file = $request->file('file');
            $mimeType = $file->getMimeType();
            $fileSize = $file->getSize();

            // Store file using UploadRepository
            $path = $this->upload->save($file);
            $filename = Str::after($path, 'media/');

            // Create media record
            $media = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'file_path' => $path,
                'file_name' => $filename,
                'mime_type' => $mimeType,
                'file_size' => $fileSize,
                'section' => $request->section,
                'order' => $request->order ?? 0,
                'uploaded_by' => Auth::id(),
            ]);

            return redirect()
                ->route('admin.media.index')
                ->with('success', 'Media berhasil diupload!');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal upload media: ' . $e->getMessage());
        }
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('admin.media.edit', compact('media'));
    }

    /**
     * Update media info
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'section' => 'required|in:features,aktivitas,hero,story,other,whylearn',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $media = Media::findOrFail($id);

        $media->update([
            'title' => $request->title,
            'description' => $request->description,
            'section' => $request->section,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media berhasil diupdate!');
    }

    /**
     * Delete media
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Delete file from storage
        if (Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media berhasil dihapus!');
    }

    /**
     * Bulk delete media
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:media,id'
        ]);

        $mediaItems = Media::whereIn('id', $request->ids)->get();
        $deletedCount = 0;

        foreach ($mediaItems as $media) {
            // Delete file from storage
            if (Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }

            $media->delete();
            $deletedCount++;
        }

        return redirect()
            ->route('admin.media.index')
            ->with('success', $deletedCount . ' media berhasil dihapus');
    }

    /**
     * Bulk toggle active status
     */
    public function bulkToggleActive(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:media,id',
            'is_active' => 'required|boolean'
        ]);

        $updatedCount = Media::whereIn('id', $request->ids)
            ->update(['is_active' => $request->is_active]);

        $status = $request->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()
            ->route('admin.media.index')
            ->with('success', $updatedCount . ' media berhasil ' . $status);
    }

    /**
     * Bulk activate media
     */
    public function bulkActivate(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:media,id'
        ]);

        Media::whereIn('id', $request->ids)->update(['is_active' => true]);

        return redirect()
            ->route('admin.media.index')
            ->with('success', count($request->ids) . ' media berhasil diaktifkan');
    }

    /**
     * Bulk deactivate media
     */
    public function bulkDeactivate(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:media,id'
        ]);

        Media::whereIn('id', $request->ids)->update(['is_active' => false]);

        return redirect()
            ->route('admin.media.index')
            ->with('success', count($request->ids) . ' media berhasil dinonaktifkan');
    }

    /**
     * Toggle active status
     */
    public function toggleActive($id)
    {
        $media = Media::findOrFail($id);
        $media->update(['is_active' => !$media->is_active]);

        $status = $media->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return redirect()
            ->back()
            ->with('success', 'Media berhasil ' . $status);
    }
}
