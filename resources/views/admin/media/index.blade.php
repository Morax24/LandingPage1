<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Library - Admin</title>
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

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header */
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

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
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

        .btn-primary {
            background: #667eea;
            color: #fff;
        }

        .btn-success {
            background: #27ae60;
            color: #fff;
        }

        .btn-danger {
            background: #e74c3c;
            color: #fff;
        }

        .btn-warning {
            background: #f39c12;
            color: #fff;
        }

        .btn-secondary {
            background: #95a5a6;
            color: #fff;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-card h3 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #667eea;
        }

        .stat-card p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Filters */
        .filters {
            background: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .filters form {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .filters select,
        .filters input {
            padding: 0.6rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.95rem;
        }

        .filters input[type="text"] {
            flex: 1;
            min-width: 250px;
        }

        /* Alert */
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

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Media Grid */
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .media-item {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            position: relative;
        }

        .media-item:hover {
            transform: translateY(-5px);
        }

        .media-checkbox {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
        }

        .media-checkbox input {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .media-preview {
            width: 100%;
            height: 200px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .media-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .media-preview video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .media-preview .icon {
            font-size: 3rem;
            color: #999;
        }

        .media-info {
            padding: 1rem;
        }

        .media-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .media-meta {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .media-badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-right: 0.5rem;
        }

        .badge-image {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-video {
            background: #fce4ec;
            color: #c2185b;
        }

        .badge-active {
            background: #d4edda;
            color: #155724;
        }

        .badge-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .media-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        /* Bulk Actions */
        .bulk-actions {
            background: #fff;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 1rem;
            display: none;
        }

        .bulk-actions.active {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            padding: 2rem 0;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
        }

        .pagination .active {
            background: #667eea;
            color: #fff;
            border-color: #667eea;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .media-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 1rem;
            }

            .filters form {
                flex-direction: column;
            }

            .filters input[type="text"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="admin-header">
            <h1>📁 Media Library</h1>
            <div class="header-actions">
                <a href="{{ route('admin.media.create') }}" class="btn btn-primary">+ Upload Media</a>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">← Kembali</a>
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
        <div class="alert alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            ✗ {{ session('error') }}
        </div>
        @endif

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>{{ $stats['total'] }}</h3>
                <p>Total Media</p>
            </div>
            <div class="stat-card">
                <h3>{{ $stats['images'] }}</h3>
                <p>Images</p>
            </div>
            <div class="stat-card">
                <h3>{{ $stats['videos'] }}</h3>
                <p>Videos</p>
            </div>
            <div class="stat-card">
                <h3>{{ number_format($stats['total_size'] / 1024 / 1024, 2) }} MB</h3>
                <p>Total Size</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="filters">
            <form method="GET" action="{{ route('admin.media.index') }}">
                <select name="type">
                    <option value="all" {{ request('type') == 'all' ? 'selected' : '' }}>Semua Type</option>
                    <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Video</option>
                </select>

                <select name="section">
                    <option value="all" {{ request('section') == 'all' ? 'selected' : '' }}>Semua Section</option>
                    <option value="features" {{ request('section') == 'features' ? 'selected' : '' }}>Features</option>
                    <option value="aktivitas" {{ request('section') == 'aktivitas' ? 'selected' : '' }}>Aktivitas</option>
                    <option value="other" {{ request('section') == 'other' ? 'selected' : '' }}>Other</option>
                </select>

                <input type="text" name="search" placeholder="Cari media..." value="{{ request('search') }}">

                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.media.index') }}" class="btn btn-secondary">Reset</a>
            </form>
        </div>

        <!-- Bulk Actions -->
        <div class="bulk-actions" id="bulkActions">
            <span id="selectedCount">0 dipilih</span>
            <button class="btn btn-danger btn-sm" onclick="bulkDelete()">Hapus Terpilih</button>
        </div>

        <!-- Media Grid -->
        <div class="media-grid">
            @forelse($media as $item)
            <div class="media-item">
                <div class="media-checkbox">
                    <input type="checkbox" class="media-check" value="{{ $item->id }}">
                </div>

                <div class="media-preview">
                    @if($item->isImage())
                        <img src="{{ $item->url }}" alt="{{ $item->title }}">
                    @elseif($item->isVideo())
                        <video controls>
                            <source src="{{ $item->url }}" type="{{ $item->mime_type }}">
                        </video>
                    @endif
                </div>

                <div class="media-info">
                    <div class="media-title" title="{{ $item->title }}">{{ $item->title }}</div>

                    <div class="media-meta">
                        <span class="media-badge badge-{{ $item->type }}">{{ strtoupper($item->type) }}</span>
                        <span class="media-badge badge-{{ $item->is_active ? 'active' : 'inactive' }}">
                            {{ $item->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <div class="media-meta">
                        Section: <strong>{{ ucfirst($item->section) }}</strong><br>
                        Size: {{ $item->file_size_formatted }}<br>
                        Uploaded: {{ $item->created_at->diffForHumans() }}
                    </div>

                    <div class="media-actions">
                        <a href="{{ route('admin.media.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus media ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>

                        <form action="{{ route('admin.media.toggle-active', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">
                                {{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #999;">
                Belum ada media. <a href="{{ route('admin.media.create') }}">Upload sekarang</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $media->links() }}
        </div>
    </div>

    <script>
        // Checkbox handling
        document.querySelectorAll('.media-check').forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActions);
        });

        function updateBulkActions() {
            const checked = document.querySelectorAll('.media-check:checked');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');

            if (checked.length > 0) {
                bulkActions.classList.add('active');
                selectedCount.textContent = checked.length + ' dipilih';
            } else {
                bulkActions.classList.remove('active');
            }
        }

        function bulkDelete() {
            const checked = Array.from(document.querySelectorAll('.media-check:checked'));
            const ids = checked.map(cb => cb.value);

            if (ids.length === 0) {
                alert('Pilih minimal satu media');
                return;
            }

            if (!confirm(`Yakin ingin menghapus ${ids.length} media?`)) {
                return;
            }

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("admin.media.bulk-delete") }}';

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            ids.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'ids[]';
                input.value = id;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
