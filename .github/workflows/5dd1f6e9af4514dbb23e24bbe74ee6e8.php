

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Kategori</h1>
        <a href="<?php echo e(route('kategori.create')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
    </div>

    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Jenis</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="p-2 border"><?php echo e($kategori->nama); ?></td>
                    <td class="p-2 border capitalize"><?php echo e($kategori->jenis); ?></td>
                    <td class="p-2 border">
                        <a href="<?php echo e(route('kategori.edit', $kategori)); ?>" class="text-blue-500 mr-2">Edit</a>
                        <form action="<?php echo e(route('kategori.destroy', $kategori)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Yakin?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Tugas Uas\manajemen-anggaran\resources\views/kategori/index.blade.php ENDPATH**/ ?>