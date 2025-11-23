<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            z-index: 1000;
            transition: transform 0.3s ease;
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

        .user-avatar-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
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
            width: calc(100% - 280px);
            transition: margin-left 0.3s ease;
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
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header h1 {
            font-size: 1.8rem;
            color: #333;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
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
            text-align: center;
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

        .btn-info {
            background: #3498db;
            color: #fff;
        }

        .btn-info:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border-radius: 8px;
        }

        /* Stats dengan Icon */
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
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: block;
        }

        .stat-card h3 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            color: #5FB574;
            font-weight: 700;
        }

        .stat-card p {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Warna untuk status cards */
        .stat-card.size {
            background: linear-gradient(135deg, #E8F5E8, #C8E6C9);
            border-left: 4px solid #4CAF50;
        }

        .stat-card.size h3 {
            color: #2E7D32;
        }

        .stat-card.contacts {
            background: linear-gradient(135deg, #E3F2FD, #BBDEFB);
            border-left: 4px solid #2196F3;
        }

        .stat-card.contacts h3 {
            color: #1565C0;
        }

        .stat-card.pending {
            background: linear-gradient(135deg, #FFF8E1, #FFECB3);
            border-left: 4px solid #FFC107;
        }

        .stat-card.pending h3 {
            color: #FF8F00;
        }

        .stat-card.approved {
            background: linear-gradient(135deg, #E8F5E8, #C8E6C9);
            border-left: 4px solid #4CAF50;
        }

        .stat-card.approved h3 {
            color: #2E7D32;
        }

        .stat-card.rejected {
            background: linear-gradient(135deg, #FFEBEE, #FFCDD2);
            border-left: 4px solid #F44336;
        }

        .stat-card.rejected h3 {
            color: #C62828;
        }

        .stat-card.media {
            background: linear-gradient(135deg, #F3E5F5, #E1BEE7);
            border-left: 4px solid #9C27B0;
        }

        .stat-card.media h3 {
            color: #7B1FA2;
        }

        .stat-card.active {
            background: linear-gradient(135deg, #E8F5E8, #C8E6C9);
            border-left: 4px solid #4CAF50;
        }

        .stat-card.active h3 {
            color: #2E7D32;
        }

        .stat-card.inactive {
            background: linear-gradient(135deg, #FFF3E0, #FFE0B2);
            border-left: 4px solid #FF9800;
        }

        .stat-card.inactive h3 {
            color: #EF6C00;
        }

        /* Link stat card */
        .stat-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .stat-link:hover {
            text-decoration: none;
            color: inherit;
        }

        /* Dashboard Content */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .chart-container, .activity-container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            position: relative;
        }

        .chart-wrapper {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .activity-list {
            margin-top: 1rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: #F7FCF9;
            transform: translateX(5px);
        }

        .activity-icon {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
        }

        .activity-thumbnail {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #5FB574;
            transition: all 0.3s ease;
        }

        .activity-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            font-weight: bold;
        }

        .activity-content {
            flex: 1;
            min-width: 0;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 0.3rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .activity-time {
            font-size: 0.85rem;
            color: #666;
        }

        /* Recent Items */
        .recent-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .recent-container {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .recent-list {
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .recent-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .recent-item:hover {
            background: #F7FCF9;
            border-color: #5FB574;
            transform: translateX(5px);
        }

        .recent-icon {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
        }

        .media-thumbnail {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid #E8F4F8;
            transition: all 0.3s ease;
        }

        .media-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, #E8F4F8, #5FB574);
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .video-thumbnail {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .video-icon {
            font-size: 1.5rem;
            color: white;
            z-index: 2;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.2);
            z-index: 1;
        }

        .recent-content {
            flex: 1;
            min-width: 0;
        }

        .recent-title {
            font-weight: 600;
            margin-bottom: 0.3rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .recent-meta {
            font-size: 0.85rem;
            color: #666;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Badge untuk tipe media */
        .media-type-badge {
            background: #5FB574;
            color: white;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
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

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: #5FB574;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.7rem;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        /* Dark overlay for mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        .overlay.active {
            display: block;
        }

        /* Image fallback handling */
        .image-fallback {
            display: none;
        }

        /* Hover effects untuk gambar */
        .activity-item:hover .activity-thumbnail {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .recent-item:hover .media-thumbnail {
            transform: scale(1.08);
            box-shadow: 0 6px 16px rgba(95, 181, 116, 0.4);
        }

        /* Animation untuk gambar loading */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .media-thumbnail,
        .activity-thumbnail {
            animation: fadeIn 0.5s ease;
        }

        /* Video thumbnail untuk activity */
        .activity-item .video-thumbnail {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db, #2980b9);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border: 2px solid #3498db;
        }

        .activity-item .video-icon {
            font-size: 1.2rem;
            color: white;
            z-index: 2;
        }

        .activity-item .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            z-index: 1;
            border-radius: 50%;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .recent-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
            }
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            .mobile-menu-toggle {
                display: block;
            }
            .page-header {
                padding: 1rem;
                margin-top: 3rem;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .stat-card {
                padding: 1.5rem 1rem;
            }
            .stat-card h3 {
                font-size: 2rem;
            }
            .stat-icon {
                font-size: 2rem;
            }
            .chart-container, .activity-container, .recent-container {
                padding: 1.5rem;
            }
            .chart-wrapper {
                height: 250px;
            }
            .header-actions {
                justify-content: center;
            }
            .page-header {
                flex-direction: column;
                text-align: center;
            }

            .activity-thumbnail,
            .activity-avatar {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .media-thumbnail,
            .media-placeholder,
            .video-thumbnail {
                width: 50px;
                height: 50px;
            }

            .video-icon {
                font-size: 1.2rem;
            }

            .activity-item,
            .recent-item {
                padding: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .main-content {
                padding: 0.5rem;
            }
            .chart-container, .activity-container, .recent-container {
                padding: 1rem;
            }
            .btn {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
            .chart-wrapper {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle">☰</button>
    <div class="overlay" id="overlay"></div>

    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2><span class="logo-square"></span> <span>WALUYA LAND</span></h2>
                <p>Admin Panel</p>
            </div>

            <nav class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="menu-item active">
                    <span class="menu-icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="menu-item">
                    <span class="menu-icon">📧</span>
                    <span>Kelola Pesan</span>
                </a>
                <a href="{{ route('admin.media.index') }}" class="menu-item">
                    <span class="menu-icon">🖼️</span>
                    <span>Media Library</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="user-profile">
                    @if(isset(Auth::user()->avatar) && Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="user-avatar-img"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="user-avatar image-fallback">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                    @else
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                    @endif
                    <div class="user-info">
                        <h4>{{ Auth::user()->name ?? 'Admin' }}</h4>
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
                <h1>📊 Dashboard</h1>
                <span>Halo, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong></span>
                <div class="header-actions">
                    <span class="btn btn-secondary">Last updated: {{ now()->format('d M Y, H:i') }}</span>
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

            <!-- Stats dengan Icon yang Bagus -->
            <div class="stats-grid">
                <!-- Baris 1 -->
                <div class="stat-card size">
                    <span class="stat-icon">💾</span>
                    <h3>{{ number_format(($stats['total_media_size'] ?? 0) / 1024 / 1024, 2) }} MB</h3>
                    <p>Total Size Media</p>
                </div>

                <div class="stat-card contacts">
                    <span class="stat-icon">📨</span>
                    <h3>{{ $stats['total_contacts'] ?? 0 }}</h3>
                    <p>Total Pesan</p>
                </div>

                <div class="stat-card pending">
                    <span class="stat-icon">⏳</span>
                    <h3>{{ $stats['pending_contacts'] ?? 0 }}</h3>
                    <p>Pesan Pending</p>
                </div>

                <div class="stat-card approved">
                    <span class="stat-icon">✅</span>
                    <h3>{{ $stats['approved_contacts'] ?? 0 }}</h3>
                    <p>Pesan Disetujui</p>
                </div>

                <!-- Baris 2 -->
                <a href="{{ route('admin.contacts.index', ['status' => 'rejected']) }}" class="stat-link">
                    <div class="stat-card rejected">
                        <span class="stat-icon">❌</span>
                        <h3>{{ $stats['rejected_contacts'] ?? 0 }}</h3>
                        <p>Pesan Ditolak</p>
                    </div>
                </a>

                <div class="stat-card media">
                    <span class="stat-icon">🖼️</span>
                    <h3>{{ $stats['total_media'] ?? 0 }}</h3>
                    <p>Total Media</p>
                </div>

                <div class="stat-card active">
                    <span class="stat-icon">🟢</span>
                    <h3>{{ $stats['active_media'] ?? 0 }}</h3>
                    <p>Media Aktif</p>
                </div>

                <a href="{{ route('admin.media.index', ['status' => 'inactive']) }}" class="stat-link">
                    <div class="stat-card inactive">
                        <span class="stat-icon">🔴</span>
                        <h3>{{ $stats['inactive_media'] ?? 0 }}</h3>
                        <p>Media Nonaktif</p>
                    </div>
                </a>
            </div>

            <!-- Dashboard Content -->
            <div class="dashboard-grid">
                <!-- Chart/Graph Section -->
                <div class="chart-container">
                    <h2 style="margin-bottom: 1.5rem; color: #333;">📈 Statistik Aktivitas</h2>
                    <div class="chart-wrapper">
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="activity-container">
                    <h2 style="margin-bottom: 1.5rem; color: #333;">🔄 Aktivitas Terbaru</h2>
                    <div class="activity-list">
                        @forelse($recentActivities ?? [] as $activity)
                            <div class="activity-item">
                                <div class="activity-icon">
                                    @if($activity['type'] == 'contact')
                                        <div class="activity-avatar" style="background: #5FB574;">📧</div>
                                    @elseif($activity['type'] == 'media' && isset($activity['media']))
                                        @if($activity['media']->isImage())
                                            <!-- Tampilkan thumbnail gambar asli -->
                                            <img src="{{ $activity['media']->url }}"
                                                 alt="Thumbnail"
                                                 class="activity-thumbnail"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            <div class="activity-avatar image-fallback" style="background: #F9D56E;">🖼️</div>
                                        @elseif($activity['media']->isVideo())
                                            <!-- Tampilkan thumbnail video -->
                                            <div class="video-thumbnail" style="width: 50px; height: 50px; border-radius: 50%;">
                                                <div class="video-icon">🎥</div>
                                                <div class="video-overlay"></div>
                                            </div>
                                        @else
                                            <div class="activity-avatar" style="background: #3498db;">📁</div>
                                        @endif
                                    @elseif($activity['type'] == 'reply')
                                        <div class="activity-avatar" style="background: #9b59b6;">💬</div>
                                    @else
                                        <div class="activity-avatar" style="background: #95a5a6;">📊</div>
                                    @endif
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">{{ $activity['title'] ?? 'Aktivitas' }}</div>
                                    <div class="activity-time">
                                        {{ $activity['time'] ?? '-' }}
                                        @if(isset($activity['media']))
                                            • {{ $activity['media']->section ?? 'other' }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="activity-item">
                                <div class="activity-content">
                                    <div class="activity-title">Belum ada aktivitas</div>
                                    <div class="activity-time">-</div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Recent Items -->
            <div class="recent-grid">
                <!-- Recent Messages -->
                <div class="recent-container">
                    <h2 style="margin-bottom: 1.5rem; color: #333;">📩 Pesan Terbaru</h2>
                    <div class="recent-list">
                        @forelse($recentContacts ?? [] as $contact)
                            <div class="recent-item">
                                <div class="recent-icon">
                                    <div class="activity-avatar" style="background: #5FB574;">
                                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="recent-content">
                                    <div class="recent-title">{{ $contact->name ?? 'Pengguna' }}</div>
                                    <div class="recent-meta">
                                        {{ $contact->email ?? '-' }} •
                                        {{ $contact->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="recent-item">
                                <div class="recent-content">
                                    <div class="recent-title">Belum ada pesan</div>
                                    <div class="recent-meta">-</div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Media -->
                <div class="recent-container">
                    <h2 style="margin-bottom: 1.5rem; color: #333;">🖼️ Media Terbaru</h2>
                    <div class="recent-list">
                        @forelse($recentMedia ?? [] as $media)
                            <div class="recent-item">
                                <div class="recent-icon">
                                    @if($media->isImage())
                                        <img src="{{ $media->url }}"
                                             alt="{{ $media->title }}"
                                             class="media-thumbnail"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="media-placeholder image-fallback">
                                            🖼️
                                        </div>
                                    @else
                                        <div class="video-thumbnail">
                                            <div class="video-icon">🎥</div>
                                            <div class="video-overlay"></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="recent-content">
                                    <div class="recent-title">{{ Str::limit($media->title ?? 'Media', 30) }}</div>
                                    <div class="recent-meta">
                                        <span class="media-type-badge">{{ $media->type }}</span> •
                                        {{ $media->section ?? '-' }} •
                                        {{ $media->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="recent-item">
                                <div class="recent-content">
                                    <div class="recent-title">Belum ada media</div>
                                    <div class="recent-meta">-</div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile menu functionality
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleMobileMenu() {
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('active');
        }

        mobileMenuToggle.addEventListener('click', toggleMobileMenu);
        overlay.addEventListener('click', toggleMobileMenu);

        // Chart.js Implementation
        const ctx = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
                    {
                        label: 'Pesan Masuk',
                        data: [12, 19, 15, 25, 22, 30, 28, 35, 32, 40, 38, 45],
                        borderColor: '#5FB574',
                        backgroundColor: 'rgba(95, 181, 116, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Media Upload',
                        data: [5, 8, 10, 12, 15, 18, 20, 22, 25, 28, 30, 35],
                        borderColor: '#3498db',
                        backgroundColor: 'rgba(52, 152, 219, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Pesan Pending',
                        data: [3, 5, 4, 6, 8, 10, 9, 12, 11, 15, 14, 18],
                        borderColor: '#F9D56E',
                        backgroundColor: 'rgba(249, 213, 110, 0.1)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: { size: 12 },
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: { size: 14 },
                        bodyFont: { size: 13 },
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: { size: 12 }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: { size: 11 }
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeInOutQuart'
                }
            }
        });

        // Enhanced image handling dengan loading state
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('img');

            images.forEach(img => {
                // Tambah loading state
                img.style.opacity = '0';
                img.style.transition = 'opacity 0.3s ease';

                img.addEventListener('load', function() {
                    this.style.opacity = '1';
                });

                img.addEventListener('error', function() {
                    this.style.display = 'none';
                    const fallback = this.nextElementSibling;
                    if (fallback && (fallback.classList.contains('image-fallback') ||
                                    fallback.classList.contains('media-placeholder') ||
                                    fallback.classList.contains('activity-avatar'))) {
                        fallback.style.display = 'flex';
                        fallback.style.opacity = '1';
                    }
                });
            });

            // Preload images untuk smooth experience
            function preloadImages() {
                const imageUrls = [];
                document.querySelectorAll('img').forEach(img => {
                    if (img.src) imageUrls.push(img.src);
                });

                imageUrls.forEach(url => {
                    const img = new Image();
                    img.src = url;
                });
            }

            preloadImages();
        });

        // Auto-refresh every 5 minutes
        setTimeout(() => {
            window.location.reload();
        }, 300000);

        // Handle window resize
        window.addEventListener('resize', function() {
            activityChart.resize();
        });
    </script>
</body>
</html>
