<!-- ============================================
     TAHAP 7: DETAIL CONTACT VIEW
     ============================================
     Lokasi: resources/views/admin/contacts/show.blade.php
-->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesan - <?php echo e($contact->name); ?></title>
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
            max-width: 1000px;
            margin: 0 auto;
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

        /* Responsive */
        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .action-card {
                position: static;
            }
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
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>📧 Detail Pesan Contact</h1>
            <a href="<?php echo e(route('admin.contacts.index')); ?>" class="btn btn-back">← Kembali</a>
        </div>

        <!-- Alert Messages -->
        <?php if(session('success')): ?>
        <div class="alert alert-success">
            ✓ <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <?php if(session('info')): ?>
        <div class="alert alert-info">
            ℹ <?php echo e(session('info')); ?>

        </div>
        <?php endif; ?>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Main Content -->
            <div>
                <div class="card">
                    <h2>Informasi Pengirim</h2>

                    <div class="info-row">
                        <label>Nama Lengkap</label>
                        <div class="value"><?php echo e($contact->name); ?></div>
                    </div>

                    <div class="info-row">
                        <label>Email</label>
                        <div class="value">
                            <a href="mailto:<?php echo e($contact->email); ?>" style="color: #3498db; text-decoration: none;">
                                <?php echo e($contact->email); ?>

                            </a>
                        </div>
                    </div>

                    <div class="info-row">
                        <label>Instansi / Sekolah</label>
                        <div class="value"><?php echo e($contact->institution ?? '-'); ?></div>
                    </div>

                    <div class="info-row">
                        <label>Status</label>
                        <div>
                            <span class="badge badge-<?php echo e($contact->status); ?>">
                                <?php echo e($contact->status_text); ?>

                            </span>
                        </div>
                    </div>

                    <div class="info-row">
                        <label>Pesan</label>
                        <div class="message-box"><?php echo e($contact->message); ?></div>
                    </div>

                    <?php if($contact->approved_by): ?>
                    <div class="meta-info">
                        <strong>Ditinjau oleh:</strong> <?php echo e($contact->approver->name ?? 'Admin'); ?><br>
                        <strong>Waktu:</strong> <?php echo e($contact->approved_at->format('d/m/Y H:i')); ?>

                    </div>
                    <?php endif; ?>
                </div>

                <!-- Admin Notes -->
                <div class="card notes-section">
                    <h2>Catatan Admin</h2>
                    <form action="<?php echo e(route('admin.contacts.notes', $contact->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <textarea name="admin_notes" placeholder="Tambahkan catatan internal..."><?php echo e($contact->admin_notes); ?></textarea>
                        <button type="submit" class="btn btn-primary">💾 Simpan Catatan</button>
                    </form>
                </div>
            </div>

            <!-- Action Sidebar -->
            <div>
                <div class="card action-card">
                    <h2>Aksi</h2>

                    <div class="action-buttons">
                        <?php if($contact->isPending()): ?>
                        <!-- Approve Button -->
                        <form action="<?php echo e(route('admin.contacts.approve', $contact->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Yakin ingin menyetujui pesan ini?')">
                                ✓ Setujui Pesan
                            </button>
                        </form>

                        <!-- Reject Button -->
                        <button type="button" class="btn btn-warning" onclick="openRejectModal()">
                            ✕ Tolak Pesan
                        </button>
                        <?php else: ?>
                        <div style="padding: 1rem; background: #f8f9fa; border-radius: 5px; text-align: center; color: #666;">
                            Pesan sudah ditinjau
                        </div>
                        <?php endif; ?>

                        <!-- Delete Button -->
                        <form action="<?php echo e(route('admin.contacts.destroy', $contact->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
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
                            <?php echo e($contact->created_at->format('d F Y, H:i')); ?><br>
                            (<?php echo e($contact->created_at->diffForHumans()); ?>)<br><br>

                            <strong>ID Pesan:</strong><br>
                            #<?php echo e($contact->id); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="modal">
        <div class="modal-content">
            <h3>Tolak Pesan</h3>
            <form action="<?php echo e(route('admin.contacts.reject', $contact->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
<?php /**PATH C:\laragon\www\1.-gabut\resources\views/admin/contacts/show.blade.php ENDPATH**/ ?>