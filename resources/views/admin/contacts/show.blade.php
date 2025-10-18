<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesan - {{ $contact->name }}</title>
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

        /* Header */
        .header {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.5rem;
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
        }

        .btn-back {
            background: #95a5a6;
            color: #fff;
        }

        .btn-primary {
            background: #3498db;
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

        .btn:hover {
            opacity: 0.9;
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

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        /* Main Content */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .card h2 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .info-row {
            margin-bottom: 1.5rem;
        }

        .info-row label {
            display: block;
            font-weight: 600;
            color: #555;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .info-row .value {
            padding: 0.8rem;
            background: #f8f9fa;
            border-radius: 5px;
            font-size: 0.95rem;
        }

        .message-box {
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 5px;
            line-height: 1.8;
            min-height: 150px;
            white-space: pre-wrap;
        }

        .badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-block;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-approved {
            background: #d4edda;
            color: #155724;
        }

        .badge-rejected {
            background: #f8d7da;
            color: #721c24;
        }

        /* Action Card */
        .action-card {
            position: sticky;
            top: 2rem;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .action-buttons form {
            width: 100%;
        }

        .action-buttons button,
        .action-buttons .btn {
            width: 100%;
            justify-content: center;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Notes Section */
        .notes-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
        }

        .notes-section textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: inherit;
            min-height: 100px;
            resize: vertical;
            margin-bottom: 1rem;
        }

        .notes-section textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        /* Meta Info */
        .meta-info {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            font-size: 0.85rem;
            color: #666;
            line-height: 1.8;
        }

        .meta-info strong {
            color: #333;
        }

        /* Modal Reject */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
        }

        .modal-content h3 {
            margin-bottom: 1rem;
        }

        .modal-content textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: inherit;
            min-height: 100px;
            resize: vertical;
            margin-bottom: 1rem;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .action-card {
                position: static;
            }
        }

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
                <a href="{{ route('admin.contacts.index') }}" class="menu-item active">
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
            <div class="header">
                <h1>📧 Detail Pesan Contact</h1>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-back">← Kembali</a>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
            @endif

            @if(session('info'))
            <div class="alert alert-info">
                ℹ {{ session('info') }}
            </div>
            @endif

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Main Content -->
                <div>
                    <div class="card">
                        <h2>Informasi Pengirim</h2>

                        <div class="info-row">
                            <label>Nama Lengkap</label>
                            <div class="value">{{ $contact->name }}</div>
                        </div>

                        <div class="info-row">
                            <label>Email</label>
                            <div class="value">
                                <a href="mailto:{{ $contact->email }}" style="color: #3498db; text-decoration: none;">
                                    {{ $contact->email }}
                                </a>
                            </div>
                        </div>

                        <div class="info-row">
                            <label>Instansi / Sekolah</label>
                            <div class="value">{{ $contact->institution ?? '-' }}</div>
                        </div>

                        <div class="info-row">
                            <label>Status</label>
                            <div>
                                <span class="badge badge-{{ $contact->status }}">
                                    {{ $contact->status_text }}
                                </span>
                            </div>
                        </div>

                        <div class="info-row">
                            <label>Pesan</label>
                            <div class="message-box">{{ $contact->message }}</div>
                        </div>

                        @if($contact->approved_by)
                        <div class="meta-info">
                            <strong>Ditinjau oleh:</strong> {{ $contact->approver->name ?? 'Admin' }}<br>
                            <strong>Waktu:</strong> {{ $contact->approved_at->format('d/m/Y H:i') }}
                        </div>
                        @endif
                    </div>

                    <!-- Admin Notes -->
                    <div class="card notes-section">
                        <h2>Catatan Admin</h2>
                        <form action="{{ route('admin.contacts.notes', $contact->id) }}" method="POST">
                            @csrf
                            <textarea name="admin_notes" placeholder="Tambahkan catatan internal...">{{ $contact->admin_notes }}</textarea>
                            <button type="submit" class="btn btn-primary">💾 Simpan Catatan</button>
                        </form>
                    </div>
                </div>

                <!-- Action Sidebar -->
                <div>
                    <div class="card action-card">
                        <h2>Aksi</h2>

                        <div class="action-buttons">
                            @if($contact->isPending())
                            <!-- Approve Button -->
                            <form action="{{ route('admin.contacts.approve', $contact->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success" onclick="return confirm('Yakin ingin menyetujui pesan ini?')">
                                    ✓ Setujui Pesan
                                </button>
                            </form>

                            <!-- Reject Button -->
                            <button type="button" class="btn btn-warning" onclick="openRejectModal()">
                                ✕ Tolak Pesan
                            </button>
                            @else
                            <div style="padding: 1rem; background: #f8f9fa; border-radius: 5px; text-align: center; color: #666;">
                                Pesan sudah ditinjau
                            </div>
                            @endif

                            <!-- Delete Button -->
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                    🗑️ Hapus Pesan
                                </button>
                            </form>
                        </div>

                        <!-- Meta Information -->
                        <div style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #f0f0f0;">
                            <h3 style="font-size: 1rem; margin-bottom: 1rem;">Informasi Tambahan</h3>
                            <div style="font-size: 0.85rem; color: #666; line-height: 1.8;">
                                <strong>Diterima:</strong><br>
                                {{ $contact->created_at->format('d F Y, H:i') }}<br>
                                ({{ $contact->created_at->diffForHumans() }})<br><br>

                                <strong>ID Pesan:</strong><br>
                                #{{ $contact->id }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="modal">
        <div class="modal-content">
            <h3>Tolak Pesan</h3>
            <form action="{{ route('admin.contacts.reject', $contact->id) }}" method="POST">
                @csrf
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">
                    Alasan penolakan (opsional):
                </label>
                <textarea name="admin_notes" placeholder="Masukkan alasan penolakan..."></textarea>

                <div class="modal-buttons">
                    <button type="button" class="btn btn-back" onclick="closeRejectModal()">Batal</button>
                    <button type="submit" class="btn btn-warning">Tolak Pesan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openRejectModal() {
            document.getElementById('rejectModal').classList.add('active');
        }

        function closeRejectModal() {
            document.getElementById('rejectModal').classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('rejectModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRejectModal();
            }
        });
    </script>
</body>
</html>
