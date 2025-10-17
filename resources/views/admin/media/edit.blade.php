<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Media - Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .admin-header {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-header h1 {
            font-size: 1.8rem;
            color: #333;
        }

        .btn {
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-secondary { background: #95a5a6; color: #fff; }
        .btn-primary { background: #667eea; color: #fff; }
        .btn-danger { background: #e74c3c; color: #fff; }

        .btn:hover { opacity: 0.9; }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .edit-form {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-group { margin-bottom: 1.5rem; }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: inherit;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-help {
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.3rem;
        }

        .error-text {
            color: #e74c3c;
            font-size: 0.85rem;
            display: block;
            margin-top: 0.3rem;
        }

        .media-preview {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 2rem;
        }

        .media-preview img,
        .media-preview video {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .media-info {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 2rem;
        }

        .media-info p {
            margin: 0.5rem 0;
            font-size: 0.9rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #eee;
        }

        .form-actions .left {
            display: flex;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .container { padding: 1rem; }
            .form-actions { flex-direction: column; }
            .form-actions .left { flex-direction: column; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="admin-header">
            <h1>✏️ Edit Media</h1>
            <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>

        <!-- Alert -->
        @if(session('success'))
        <div class="alert alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif

        <!-- Media Preview -->
        <div class="media-preview">
            @if($media->isImage())
                <img src="{{ $media->url }}" alt="{{ $media->title }}">
            @elseif($media->isVideo())
                <video controls>
                    <source src="{{ $media->url }}" type="{{ $media->mime_type }}">
                </video>
            @endif
        </div>

        <!-- Media Info -->
        <div class="media-info">
            <p><strong>Tipe:</strong> {{ strtoupper($media->type) }}</p>
            <p><strong>Nama File:</strong> {{ $media->file_name }}</p>
            <p><strong>Ukuran:</strong> {{ $media->file_size_formatted }}</p>
            <p><strong>Diupload:</strong> {{ $media->created_at->format('d M Y H:i') }}</p>
            <p><strong>Diupload oleh:</strong> {{ $media->uploader->name ?? 'Unknown' }}</p>
        </div>

        <!-- Form Update -->
        <form action="{{ route('admin.media.update', $media->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Judul *</label>
                <input type="text" name="title" id="title" required value="{{ old('title', $media->title) }}">
                @error('title')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description">{{ old('description', $media->description) }}</textarea>
                @error('description')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Section -->
            <div class="form-group">
                <label for="section">Section *</label>
                <select name="section" id="section" required>
                    <option value="features" {{ old('section', $media->section) == 'features' ? 'selected' : '' }}>Features</option>
                    <option value="aktivitas" {{ old('section', $media->section) == 'aktivitas' ? 'selected' : '' }}>Aktivitas & Tutorial</option>
                    <option value="other" {{ old('section', $media->section) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('section')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Order -->
            <div class="form-group">
                <label for="order">Urutan (Order)</label>
                <input type="number" name="order" id="order" min="0" value="{{ old('order', $media->order) }}">
                <small class="form-help">Angka lebih kecil akan muncul lebih dulu</small>
            </div>

            <!-- Active Status -->
            <div class="form-group">
                <label class="checkbox-group">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $media->is_active) ? 'checked' : '' }}>
                    <span>Aktifkan media ini</span>
                </label>
                <small class="form-help">Media yang tidak aktif tidak akan ditampilkan di landing page</small>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <div class="left">
                    <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>

        <!-- Form Delete (dipisah dari form update) -->
        <form action="{{ route('admin.media.destroy', $media->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus media ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="margin-top: 1rem;">Hapus Media</button>
        </form>
    </div>
</body>
</html>
