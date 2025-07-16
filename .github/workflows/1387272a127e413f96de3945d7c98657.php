

<?php $__env->startSection('content'); ?>

<form method="GET" class="mb-4 flex items-center space-x-2">
    <select name="bulan" class="p-2 border rounded">
        <option value="">-- Semua Bulan --</option>
        <?php for($i = 1; $i <= 12; $i++): ?>
            <option value="<?php echo e($i); ?>" <?php echo e(request('bulan') == $i ? 'selected' : ''); ?>>
                <?php echo e(DateTime::createFromFormat('!m', $i)->format('F')); ?>

            </option>
        <?php endfor; ?>
    </select>

    <select name="tahun" class="p-2 border rounded">
        <option value="">-- Semua Tahun --</option>
        <?php for($y = date('Y'); $y >= 2020; $y--): ?>
            <option value="<?php echo e($y); ?>" <?php echo e(request('tahun') == $y ? 'selected' : ''); ?>>
                <?php echo e($y); ?>

            </option>
        <?php endfor; ?>
    </select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>

    <?php if(request('bulan') || request('tahun')): ?>
        <a href="<?php echo e(route('dashboard')); ?>" class="text-blue-600 ml-2">Reset</a>
    <?php endif; ?>
</form>

    <h1 class="text-xl font-bold mb-4">Dashboard Keuangan</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-green-100 p-4 rounded shadow">
            <h2 class="text-sm text-gray-600">Total Pemasukan</h2>
            <p class="text-lg font-bold text-green-700">
                Rp <?php echo e(number_format($total_pemasukan, 0, ',', '.')); ?>

            </p>
        </div>
        <div class="bg-red-100 p-4 rounded shadow">
            <h2 class="text-sm text-gray-600">Total Pengeluaran</h2>
            <p class="text-lg font-bold text-red-700">
                Rp <?php echo e(number_format($total_pengeluaran, 0, ',', '.')); ?>

            </p>
        </div>
        <div class="bg-blue-100 p-4 rounded shadow">
            <h2 class="text-sm text-gray-600">Sisa Anggaran</h2>
            <p class="text-lg font-bold text-blue-700">
                Rp <?php echo e(number_format($sisa_anggaran, 0, ',', '.')); ?>

            </p>
        </div>
    </div>

    <h2 class="text-md font-bold mb-2">Riwayat Transaksi Terbaru</h2>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Kategori</th>
                <th class="p-2 border">Jenis</th>
                <th class="p-2 border">Jumlah</th>
                <th class="p-2 border">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transaksis->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="p-2 border"><?php echo e($t->tanggal); ?></td>
                    <td class="p-2 border"><?php echo e($t->kategori->nama); ?></td>
                    <td class="p-2 border capitalize"><?php echo e($t->kategori->jenis); ?></td>
                    <td class="p-2 border text-right">
                        Rp <?php echo e(number_format($t->jumlah, 0, ',', '.')); ?>

                    </td>
                    <td class="p-2 border"><?php echo e($t->keterangan); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Tugas Uas\manajemen-anggaran\resources\views/dashboard.blade.php ENDPATH**/ ?>