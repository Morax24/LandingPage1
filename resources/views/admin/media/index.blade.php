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

        /* Header */
        .page-header {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h1 {
            font-size: 1.8rem;
            color: #333;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
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

        .btn-primary {
            background: #5FB574;
            color: #fff;
        }

        .btn-primary:hover {
            background: #4FA564;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(95,181,116,0.4);
        }

        .btn-success {
            background: #5FB574;
            color: #fff;
        }

        .btn-success:hover {
            background: #4FA564;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #FF8A5B;
            color: #fff;
        }

        .btn-danger:hover {
            background: #E67A4B;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: #F9D56E;
            color: #333;
        }

        .btn-warning:hover {
            background: #E9C55E;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #95a5a6;
            color: #fff;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border-radius: 8px;
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
            padding: 2rem 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            text-align: center;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        .stat-card h3 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: #5FB574;
            font-weight: 700;
        }

        .stat-card p {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Filters */
        .filters {
            background: #fff;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
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
            padding: 0.7rem 1rem;
            border: 2px solid #E8F4F8;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .filters select:focus,
        .filters input:focus {
            outline: none;
            border-color: #5FB574;
            background: #F7FCF9;
        }

        .filters input[type="text"] {
            flex: 1;
            min-width: 250px;
        }

        /* Alert */
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

        .alert-danger {
            background: #FFE8E1;
            color: #D96F4A;
            border: 2px solid #FF8A5B;
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
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: all 0.3s;
            position: relative;
        }

        .media-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
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
            accent-color: #5FB574;
        }

        .media-preview {
            width: 100%;
            height: 200px;
            background: #F7FCF9;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 2px solid #E8F4F8;
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
            color: #5FB574;
        }

        .media-info {
            padding: 1.2rem;
        }

        .media-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #333;
        }

        .media-meta {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .media-badge {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .badge-image {
            background: #E8F4F8;
            color: #5FB574;
        }

        .badge-video {
            background: #FFE8E1;
            color: #FF8A5B;
        }

        .badge-active {
            background: #E8F5EC;
            color: #4FA564;
        }

        .badge-inactive {
            background: #FFE8E1;
            color: #D96F4A;
        }

        .media-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        /* Bulk Actions */
        .bulk-actions {
            background: #fff;
            padding: 1rem 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            margin-bottom: 1rem;
            display: none;
        }

        .bulk-actions.active {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .bulk-actions span {
            font-weight: 600;
            color: #5FB574;
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
            padding: 0.7rem 1.2rem;
            border: 2px solid #E8F4F8;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: all 0.3s;
        }

        .pagination a:hover {
            background: #5FB574;
            color: #fff;
            border-color: #5FB574;
            transform: translateY(-2px);
        }

        .pagination .active {
            background: #5FB574;
            color: #fff;
            border-color: #5FB574;
        }

        /* Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem;
            color: #999;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .empty-state a {
            color: #5FB574;
            font-weight: 600;
            text-decoration: none;
        }

        .empty-state a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .media-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 1rem;
            }

            .filters form {
                flex-direction: column;
            }

            .filters input[type="text"],
            .filters select {
                width: 100%;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
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
            <!-- Header -->
            <div class="page-header">
                <h1>📁 Media Library</h1>
                <div class="header-actions">
                    <a href="{{ route('admin.media.create') }}" class="btn btn-primary">+ Upload Media</a>
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
                        <option value="hero" {{ old('section') == 'hero' ? 'selected' : '' }}>Hero (Board Game Image)</option>
                        <option value="story" {{ old('section') == 'story' ? 'selected' : '' }}>Story (Background Box)</option>
                        <option value="features" {{ old('section') == 'features' ? 'selected' : '' }}>Features (4 slots)</option>
                        <option value="aktivitas" {{ old('section') == 'aktivitas' ? 'selected' : '' }}>Aktivitas & Tutorial (6 slots)</option>
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
                            <img src="{{ $item->file_path }}" alt="{{ $item->title }}">
                        @elseif($item->isVideo())
                            <video controls>
                                <source src="{{ $item->file_path }}" type="{{ $item->mime_type }}">
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
                                <button type="submit" class="btn btn-{{ $item->is_active ? 'secondary' : 'success' }} btn-sm">
                                    {{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    Belum ada media. <a href="{{ route('admin.media.create') }}">Upload sekarang</a>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="pagination">
                {{ $media->links() }}
            </div>
        </main>
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
