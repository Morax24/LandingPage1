<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
        'section',
        'order',
        'is_active',
        'uploaded_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'file_size' => 'integer',
        'order' => 'integer',
    ];

    // TAMBAHKAN METHOD INI - Available sections termasuk products
    public static function getSections()
    {
        return [
            'hero' => 'Hero Section',
            'story' => 'Story Section',
            'features' => 'Features Section',
            'whylearn' => 'Why Learn Section',
            'aktivitas' => 'Aktivitas Section',
            'products' => 'Products Section', // TAMBAHKAN INI
            'other' => 'Other'
        ];
    }

    // Relasi ke User
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    // Get full URL - FIXED VERSION
    public function getUrlAttribute()
    {
        // Jika file_path sudah berupa URL lengkap
        if (strpos($this->file_path, 'http') === 0) {
            return $this->file_path;
        }

        // Jika file_path adalah path relatif dengan "media/" prefix
        if (strpos($this->file_path, 'media/') === 0) {
            // Coba akses melalui storage public
            if (Storage::disk('public')->exists($this->file_path)) {
                return Storage::disk('public')->url($this->file_path);
            }

            // Fallback: direct URL ke public path
            return asset($this->file_path);
        }

        // Default: gunakan storage URL
        return Storage::url($this->file_path);
    }

    // Get media URL dengan fallback yang lebih baik
    public function getMediaUrl()
    {
        return $this->url;
    }

    // Get file size in human readable format
    public function getFileSizeFormattedAttribute()
    {
        $bytes = $this->file_size;
        if ($bytes == 0) return '0 B';

        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;

        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    // Check if image
    public function isImage()
    {
        return $this->type === 'image';
    }

    // Check if video
    public function isVideo()
    {
        return $this->type === 'video';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    public function scopeForSection($query, $section)
    {
        return $query->where('section', $section);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    // Delete file when model is deleted
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($media) {
            // Hapus file dari storage jika path tidak berupa URL eksternal
            if (strpos($media->file_path, 'http') !== 0 && Storage::exists($media->file_path)) {
                Storage::delete($media->file_path);
            }
        });
    }
}
