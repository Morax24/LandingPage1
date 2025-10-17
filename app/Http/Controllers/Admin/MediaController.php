<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display media library
     */
    public function index(Request $request)
    {
        $query = Media::with('uploader')->ordered();

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

        // Stats
        $stats = [
            'total' => Media::count(),
            'images' => Media::images()->count(),
            'videos' => Media::videos()->count(),
            'total_size' => Media::sum('file_size'),
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

            // Generate unique filename
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            // Store file
            $path = $file->storeAs('media/' . $request->type . 's', $filename, 'public');

            // Create media record
            $media = Media::create([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'file_path' => $path,
                'file_name' => $filename,
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
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
            'section' => 'required|in:features,aktivitas,other',
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
     * Bulk delete
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:media,id'
        ]);

        $media = Media::whereIn('id', $request->ids)->get();

        foreach ($media as $item) {
            if (Storage::disk('public')->exists($item->file_path)) {
                Storage::disk('public')->delete($item->file_path);
            }
            $item->delete();
        }

        return redirect()
            ->back()
            ->with('success', count($request->ids) . ' media berhasil dihapus.');
    }

    /**
     * Toggle active status
     */
    public function toggleActive($id)
    {
        $media = Media::findOrFail($id);
        $media->update(['is_active' => !$media->is_active]);

        return redirect()
            ->back()
            ->with('success', 'Status media berhasil diubah!');
    }
}
