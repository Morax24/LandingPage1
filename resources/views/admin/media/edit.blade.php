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
            background: #E8F4F8;
            color: #333;
        }

        /* Layout */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #5FB574;
            color: #fff;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            background: rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-square {
            width: 30px;
            height: 30px;
            background: #fff;
            display: inline-block;
            vertical-align: middle;
        }

        .sidebar-header p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.9);
            margin-left: 38px;
        }

        .sidebar-menu {
            padding: 1.5rem 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            font-size: 1rem;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.15);
            border-left-color: #F9D56E;
            color: #fff;
        }

        .menu-item.active {
            background: rgba(255,255,255,0.2);
            border-left-color: #F9D56E;
            color: #fff;
            font-weight: 600;
        }

        .menu-icon {
            font-size: 1.5rem;
            width: 30px;
            text-align: center;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 1.5rem;
            background: rgba(0,0,0,0.1);
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #F9D56E;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            color: #5FB574;
            border: 2px solid rgba(255,255,255,0.5);
        }

        .user-info h4 {
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }

        .user-info p {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.8);
        }

        .btn-logout {
            background: #FF8A5B;
            color: #fff;
            padding: 0.7rem 1.8rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255,138,91,0.4);
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .admin-header {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
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
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-secondary {
            background: #95a5a6;
            color: #fff;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #5FB574;
            color: #fff;
        }

        .btn-primary:hover {
            background: #4FA564;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(95,181,116,0.4);
        }

        .btn-danger {
            background: #FF8A5B;
            color: #fff;
        }

        .btn-danger:hover {
            background: #E67A4B;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255,138,91,0.4);
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .alert-success {
            background: #E8F5EC;
            color: #4FA564;
            border: 2px solid #5FB574;
        }

        .edit-form {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
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
            padding: 0.8rem 1rem;
            border: 2px solid #E8F4F8;
            border-radius: 10px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #5FB574;
            background: #F7FCF9;
        }

        .form-help {
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.3rem;
            display: block;
        }

        .error-text {
            color: #FF8A5B;
            font-size: 0.85rem;
            display: block;
            margin-top: 0.3rem;
            font-weight: 500;
        }

        .media-preview {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            text-align: center;
            margin-bottom: 2rem;
        }

        .media-preview img,
        .media-preview video {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 2px solid #E8F4F8;
        }

        .media-info {
            background: #F7FCF9;
            padding: 1.2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            border: 2px solid #E8F4F8;
        }

        .media-info p {
            margin: 0.5rem 0;
            font-size: 0.9rem;
            color: #555;
        }

        .media-info strong {
            color: #5FB574;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #5FB574;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #E8F4F8;
        }

        .form-actions .left {
            display: flex;
            gap: 1rem;
        }

        .delete-form {
            margin-top: 1rem;
        }

        .delete-form button {
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar-header h2 span:not(.logo-square),
            .sidebar-header p,
            .menu-item span,
            .user-info,
            .sidebar-footer form {
                display: none;
            }

            .menu-item {
                justify-content: center;
                padding: 1.2rem;
            }

            .main-content {
                margin-left: 80px;
            }

            .container { padding: 0; }

            .admin-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .left {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><span class="logo-square"></span> <span>WALUYA LAND</span></h2>
                <p>Admin Panel</p>
            </div>

            <nav class="sidebar-menu">
                <a href="{{ route('admin.contacts.index') }}" class="menu-item">
                    <span class="menu-icon">📧</span>
                    <span>Kelola Pesan</span>
                </a>
                <a href="{{ route('admin.media.index') }}" class="menu-item active">
                    <span class="menu-icon">🖼️</span>
                    <span>Media Library</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">AM</div>
                    <div class="user-info">
                        <h4>Admin Malaya</h4>
                        <p>Administrator</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
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
                        <select name="section" id="section" required onchange="updateSectionInfo()">
                            <option value="">-- Pilih Section --</option>
                            <option value="hero" {{ old('section', $media->section) == 'hero' ? 'selected' : '' }}>Hero (Board Game Image)</option>
                            <option value="story" {{ old('section', $media->section) == 'story' ? 'selected' : '' }}>Story (Background Box)</option>
                            <option value="features" {{ old('section', $media->section) == 'features' ? 'selected' : '' }}>Features (4 slots)</option>
                            <option value="whylearn" {{ old('section', $media->section) == 'whylearn' ? 'selected' : '' }}>WhyLearn (2 slots)</option>
                            <option value="aktivitas" {{ old('section', $media->section) == 'aktivitas' ? 'selected' : '' }}>Aktivitas & Tutorial (6 slots)</option>
                        </select>
                        @error('section')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                        <small class="form-help" id="sectionHelp">Pilih di section mana media ini akan ditampilkan</small>
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
                            <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                        </div>
                    </div>
                </form>

                <!-- Form Delete (dipisah dari form update) -->
                <form action="{{ route('admin.media.destroy', $media->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Yakin ingin menghapus media ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑️ Hapus Media</button>
                </form>
            </div>
        </main>
    </div>

    <script>
        function updateSectionInfo() {
            const section = document.getElementById('section').value;
            const sectionHelp = document.getElementById('sectionHelp');

            const descriptions = {
                'hero': '🎯 Hero section - gambar board game utama. Hanya 1 media aktif yang ditampilkan.',
                'story': '📖 Story section - gambar box di samping cerita. Hanya 1 media aktif yang ditampilkan.',
                'features': '⭐ Features section. Maksimal 4 slot yang ditampilkan.',
                'whylearn': '💡 WhyLearn section. Maksimal 2 slot yang ditampilkan.',
                'aktivitas': '🎮 Aktivitas & Tutorial section. Maksimal 6 slot yang ditampilkan.',
                'other': '📁 Media lain yang tidak ditampilkan di landing page.'
            };

            if (section && descriptions[section]) {
                sectionHelp.textContent = descriptions[section];
                sectionHelp.style.color = '#5FB574';
                sectionHelp.style.fontWeight = '500';
            } else {
                sectionHelp.textContent = 'Pilih di section mana media ini akan ditampilkan';
                sectionHelp.style.color = '#666';
                sectionHelp.style.fontWeight = 'normal';
            }
        }

        // Auto-call saat halaman load
        document.addEventListener('DOMContentLoaded', function() {
            updateSectionInfo();
        });
    </script>
</body>
</html>
