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
        .header {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
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

        .btn-back {
            background: #95a5a6;
            color: #fff;
        }

        .btn-back:hover {
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

        .alert-info {
            background: #E8F4F8;
            color: #5FB574;
            border: 2px solid #5FB574;
        }

        /* Main Content */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            padding: 2rem;
            transition: all 0.3s;
        }

        .card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        .card h2 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #E8F4F8;
            color: #5FB574;
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
            padding: 1rem;
            background: #F7FCF9;
            border-radius: 10px;
            font-size: 0.95rem;
            border: 1px solid #E8F4F8;
        }

        .message-box {
            padding: 1.2rem;
            background: #F7FCF9;
            border-radius: 10px;
            line-height: 1.8;
            min-height: 150px;
            white-space: pre-wrap;
            border: 1px solid #E8F4F8;
        }

        .badge {
            padding: 0.5rem 1.2rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-pending {
            background: #FFF4E6;
            color: #C29239;
        }

        .badge-approved {
            background: #E8F5EC;
            color: #4FA564;
        }

        .badge-rejected {
            background: #FFE8E1;
            color: #D96F4A;
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
        }

        .notes-section textarea {
            width: 100%;
            padding: 1.2rem;
            border: 2px solid #E8F4F8;
            border-radius: 10px;
            font-family: inherit;
            min-height: 120px;
            resize: vertical;
            margin-bottom: 1rem;
            transition: all 0.3s;
        }

        .notes-section textarea:focus {
            outline: none;
            border-color: #5FB574;
            background: #F7FCF9;
        }

        /* Meta Info */
        .meta-info {
            background: #F7FCF9;
            padding: 1.2rem;
            border-radius: 10px;
            font-size: 0.85rem;
            color: #666;
            line-height: 1.8;
            border: 1px solid #E8F4F8;
        }

        .meta-info strong {
            color: #5FB574;
        }

        .info-box {
            padding: 1rem;
            background: #F7FCF9;
            border-radius: 10px;
            text-align: center;
            color: #666;
            border: 1px solid #E8F4F8;
        }

        .meta-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #E8F4F8;
        }

        .meta-section h3 {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #5FB574;
        }

        .meta-section .meta-text {
            font-size: 0.85rem;
            color: #666;
            line-height: 1.8;
        }

        .meta-section .meta-text strong {
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
            border-radius: 15px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .modal-content h3 {
            margin-bottom: 1rem;
            color: #5FB574;
        }

        .modal-content label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #555;
        }

        .modal-content textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid #E8F4F8;
            border-radius: 10px;
            font-family: inherit;
            min-height: 100px;
            resize: vertical;
            margin-bottom: 1rem;
            transition: all 0.3s;
        }

        .modal-content textarea:focus {
            outline: none;
            border-color: #5FB574;
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

            .header {
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
                                <a href="mailto:{{ $contact->email }}" style="color: #5FB574; text-decoration: none; font-weight: 600;">
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
                            <div class="info-box">
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
                        <div class="meta-section">
                            <h3>Informasi Tambahan</h3>
                            <div class="meta-text">
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
                <label>Alasan penolakan (opsional):</label>
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
