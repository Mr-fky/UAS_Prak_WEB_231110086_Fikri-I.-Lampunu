

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Transaksi</h1>
        <a href="<?php echo e(route('transaksi.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
    </div>

    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Kategori</th>
                <th class="p-2 border">Jenis</th>
                <th class="p-2 border">Jumlah</th>
                <th class="p-2 border">Keterangan</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="p-2 border"><?php echo e($transaksi->tanggal); ?></td>
                    <td class="p-2 border"><?php echo e($transaksi->kategori->nama); ?></td>
                    <td class="p-2 border capitalize"><?php echo e($transaksi->kategori->jenis); ?></td>
                    <td class="p-2 border text-right">Rp <?php echo e(number_format($transaksi->jumlah, 0, ',', '.')); ?></td>
                    <td class="p-2 border"><?php echo e($transaksi->keterangan); ?></td>
                    <td class="p-2 border">
                        <a href="<?php echo e(route('transaksi.edit', $transaksi)); ?>" class="text-blue-500 mr-2">Edit</a>
                        <form action="<?php echo e(route('transaksi.destroy', $transaksi)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Tugas Uas\manajemen-anggaran\resources\views/transaksi/index.blade.php ENDPATH**/ ?>