<!-- ============================================
     TAHAP 6: ADMIN DASHBOARD VIEW
     ============================================
     Lokasi: resources/views/admin/contacts/index.blade.php
-->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Pesan Contact</title>
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

        .admin-header .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-logout {
            background: #e74c3c;
            color: #fff;
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
        }

        /* Stats Cards */
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
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .stat-card.total h3 { color: #3498db; }
        .stat-card.pending h3 { color: #f39c12; }
        .stat-card.approved h3 { color: #27ae60; }
        .stat-card.rejected h3 { color: #e74c3c; }

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

        .btn {
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
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

        .bulk-actions span {
            font-weight: 500;
        }

        /* Table */
        .table-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8f9fa;
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #e9ecef;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
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

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }

        /* Alert Messages */
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

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            padding: 1.5rem;
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
            background: #3498db;
            color: #fff;
            border-color: #3498db;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="admin-header">
            <h1>📧 Kelola Pesan Contact</h1>
            <div class="user-info">
                <span>Halo, <strong><?php echo e(Auth::user()->name); ?></strong></span>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
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

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card total">
                <h3><?php echo e($stats['total']); ?></h3>
                <p>Total Pesan</p>
            </div>
            <div class="stat-card pending">
                <h3><?php echo e($stats['pending']); ?></h3>
                <p>Menunggu Review</p>
            </div>
            <div class="stat-card approved">
                <h3><?php echo e($stats['approved']); ?></h3>
                <p>Disetujui</p>
            </div>
            <div class="stat-card rejected">
                <h3><?php echo e($stats['rejected']); ?></h3>
                <p>Ditolak</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="filters">
            <form method="GET" action="<?php echo e(route('admin.contacts.index')); ?>">
                <select name="status">
                    <option value="all" <?php echo e(request('status') == 'all' ? 'selected' : ''); ?>>Semua Status</option>
                    <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Menunggu</option>
                    <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Disetujui</option>
                    <option value="rejected" <?php echo e(request('status') == 'rejected' ? 'selected' : ''); ?>>Ditolak</option>
                </select>

                <input type="text" name="search" placeholder="Cari nama, email, atau pesan..." value="<?php echo e(request('search')); ?>">

                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="<?php echo e(route('admin.contacts.index')); ?>" class="btn" style="background: #95a5a6; color: #fff;">Reset</a>
            </form>
        </div>

        <!-- Bulk Actions -->
        <div class="bulk-actions" id="bulkActions">
            <span id="selectedCount">0 dipilih</span>
            <button class="btn btn-success btn-sm" onclick="bulkAction('approve')">Setujui Semua</button>
            <button class="btn btn-warning btn-sm" onclick="bulkAction('reject')">Tolak Semua</button>
            <button class="btn btn-danger btn-sm" onclick="bulkAction('delete')">Hapus Semua</button>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Instansi</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><input type="checkbox" class="contact-checkbox" value="<?php echo e($contact->id); ?>"></td>
                        <td><strong><?php echo e($contact->name); ?></strong></td>
                        <td><?php echo e($contact->email); ?></td>
                        <td><?php echo e($contact->institution ?? '-'); ?></td>
                        <td><?php echo e(Str::limit($contact->message, 50)); ?></td>
                        <td>
                            <span class="badge badge-<?php echo e($contact->status); ?>">
                                <?php echo e($contact->status_text); ?>

                            </span>
                        </td>
                        <td><?php echo e($contact->created_at->format('d/m/Y H:i')); ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="<?php echo e(route('admin.contacts.show', $contact->id)); ?>" class="btn btn-primary btn-sm">Detail</a>

                                <?php if($contact->isPending()): ?>
                                <form action="<?php echo e(route('admin.contacts.approve', $contact->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 2rem; color: #999;">
                            Tidak ada data pesan
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <?php echo e($contacts->links()); ?>

            </div>
        </div>
    </div>

    <script>
        // Select All Checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.contact-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateBulkActions();
        });

        // Individual Checkbox
        document.querySelectorAll('.contact-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActions);
        });

        // Update Bulk Actions Display
        function updateBulkActions() {
            const checked = document.querySelectorAll('.contact-checkbox:checked');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');

            if (checked.length > 0) {
                bulkActions.classList.add('active');
                selectedCount.textContent = checked.length + ' dipilih';
            } else {
                bulkActions.classList.remove('active');
            }
        }

        // Bulk Actions
        function bulkAction(action) {
            const checked = Array.from(document.querySelectorAll('.contact-checkbox:checked'));
            const ids = checked.map(cb => cb.value);

            if (ids.length === 0) {
                alert('Pilih minimal satu pesan');
                return;
            }

            if (!confirm(`Yakin ingin ${action} ${ids.length} pesan?`)) {
                return;
            }

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `<?php echo e(url('admin/contacts/bulk-')); ?>${action}`;

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '<?php echo e(csrf_token()); ?>';
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
<?php /**PATH C:\laragon\www\1.-gabut\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>