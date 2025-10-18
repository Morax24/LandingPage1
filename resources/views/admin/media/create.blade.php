<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Media - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
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
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            background: rgba(0,0,0,0.2);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .sidebar-header p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.8);
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
            border-left-color: #fff;
            color: #fff;
        }

        .menu-item.active {
            background: rgba(255,255,255,0.2);
            border-left-color: #fff;
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
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.1);
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
            background: rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            border: 2px solid rgba(255,255,255,0.5);
        }

        .user-info h4 {
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }

        .user-info p {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.7);
        }

        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: #fff;
            padding: 0.7rem 1.8rem;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-logout:hover {
            background: rgba(255,255,255,0.3);
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

        .btn-secondary {
            background: #95a5a6;
            color: #fff;
        }

        .btn-primary {
            background: #667eea;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .upload-form {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

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

        .file-upload-area {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .file-upload-area:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .file-upload-area.dragover {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .file-upload-icon {
            font-size: 3rem;
            color: #999;
            margin-bottom: 1rem;
        }

        .file-upload-text {
            color: #666;
            margin-bottom: 0.5rem;
        }

        #fileInput {
            display: none;
        }

        .file-preview {
            margin-top: 1rem;
            display: none;
        }

        .file-preview.active {
            display: block;
        }

        .preview-container {
            max-width: 100%;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 1rem;
        }

        .preview-container img,
        .preview-container video {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .file-info {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-top: 1rem;
        }

        .file-info p {
            margin: 0.3rem 0;
            font-size: 0.9rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #eee;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar-header h2,
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

            .container {
                padding: 0;
            }

            .form-actions {
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
                <h2>🏢 Admin Panel</h2>
                <p>Malaya Land Management</p>
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
                    <h1>📤 Upload Media</h1>
                    <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">← Kembali</a>
                </div>

                <!-- Alert -->
                @if(session('error'))
                <div class="alert alert-danger">
                    ✗ {{ session('error') }}
                </div>
                @endif

                <!-- Upload Form -->
                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                    @csrf

                    <!-- Type Selection -->
                    <div class="form-group">
                        <label for="type">Tipe Media *</label>
                        <select name="type" id="type" required onchange="updateFileInfo()">
                            <option value="">-- Pilih Tipe --</option>
                            <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                        @error('type')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                        <small class="form-help" id="typeHelp"></small>
                    </div>

                    <!-- File Upload -->
                    <div class="form-group">
                        <label>File *</label>
                        <div class="file-upload-area" id="fileUploadArea" onclick="document.getElementById('fileInput').click()">
                            <div class="file-upload-icon">📁</div>
                            <div class="file-upload-text">Klik atau drag & drop file ke sini</div>
                            <small class="form-help" id="fileHelp">Pilih tipe media terlebih dahulu</small>
                        </div>
                        <input type="file" name="file" id="fileInput" accept="" onchange="handleFileSelect(event)">
                        @error('file')
                            <span class="error-text">{{ $message }}</span>
                        @enderror

                        <!-- File Preview -->
                        <div class="file-preview" id="filePreview">
                            <div class="preview-container" id="previewContainer"></div>
                            <div class="file-info" id="fileInfo"></div>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Judul *</label>
                        <input type="text" name="title" id="title" required value="{{ old('title') }}" placeholder="Masukkan judul media">
                        @error('title')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" placeholder="Deskripsi media (opsional)">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Section -->
                    <div class="form-group">
                        <label for="section">Section *</label>
                        <select name="section" id="section" required>
                            <option value="">-- Pilih Section --</option>
                            <option value="features" {{ old('section') == 'features' ? 'selected' : '' }}>Features</option>
                            <option value="aktivitas" {{ old('section') == 'aktivitas' ? 'selected' : '' }}>Aktivitas & Tutorial</option>
                            <option value="other" {{ old('section') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('section')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                        <small class="form-help">Pilih di section mana media ini akan ditampilkan</small>
                    </div>

                    <!-- Order -->
                    <div class="form-group">
                        <label for="order">Urutan (Order)</label>
                        <input type="number" name="order" id="order" min="0" value="{{ old('order', 0) }}" placeholder="0">
                        <small class="form-help">Angka lebih kecil akan muncul lebih dulu</small>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Upload Media</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        let selectedFile = null;

        // Update file input accept based on type
        function updateFileInfo() {
            const type = document.getElementById('type').value;
            const fileInput = document.getElementById('fileInput');
            const typeHelp = document.getElementById('typeHelp');
            const fileHelp = document.getElementById('fileHelp');

            if (type === 'image') {
                fileInput.accept = 'image/jpeg,image/png,image/jpg,image/webp';
                typeHelp.textContent = 'Format: JPEG, PNG, JPG, WEBP | Max: 5MB';
                fileHelp.textContent = 'Klik atau drag & drop gambar ke sini (Max 5MB)';
            } else if (type === 'video') {
                fileInput.accept = 'video/mp4,video/webm,video/ogg';
                typeHelp.textContent = 'Format: MP4, WEBM, OGG | Max: 50MB';
                fileHelp.textContent = 'Klik atau drag & drop video ke sini (Max 50MB)';
            } else {
                fileInput.accept = '';
                typeHelp.textContent = '';
                fileHelp.textContent = 'Pilih tipe media terlebih dahulu';
            }
        }

        // Handle file selection
        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (!file) return;

            selectedFile = file;

            // Show preview
            const previewDiv = document.getElementById('filePreview');
            const previewContainer = document.getElementById('previewContainer');
            const fileInfo = document.getElementById('fileInfo');

            previewDiv.classList.add('active');

            // Display file info
            fileInfo.innerHTML = `
                <p><strong>Nama File:</strong> ${file.name}</p>
                <p><strong>Ukuran:</strong> ${formatFileSize(file.size)}</p>
                <p><strong>Tipe:</strong> ${file.type}</p>
            `;

            // Display preview
            const reader = new FileReader();
            reader.onload = function(e) {
                const type = document.getElementById('type').value;

                if (type === 'image') {
                    previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                } else if (type === 'video') {
                    previewContainer.innerHTML = `
                        <video controls>
                            <source src="${e.target.result}" type="${file.type}">
                        </video>
                    `;
                }
            };
            reader.readAsDataURL(file);

            // Auto-fill title from filename
            if (!document.getElementById('title').value) {
                const filename = file.name.replace(/\.[^/.]+$/, ""); // Remove extension
                document.getElementById('title').value = filename;
            }
        }

        // Format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }

        // Drag and drop handlers
        const uploadArea = document.getElementById('fileUploadArea');

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                document.getElementById('fileInput').files = files;
                handleFileSelect({ target: { files: files } });
            }
        });
    </script>
</body>
</html>
