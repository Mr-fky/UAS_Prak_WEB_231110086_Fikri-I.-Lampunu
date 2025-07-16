<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Anggaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4">

    <nav class="bg-blue-600 text-white p-4 mb-4 rounded">
        <div class="flex justify-between">
            <div>
                <a href="<?php echo e(route('dashboard')); ?>" class="font-bold">Dashboard</a>
                <a href="<?php echo e(route('kategori.index')); ?>" class="ml-4">Kategori</a>
                <a href="<?php echo e(route('transaksi.index')); ?>" class="ml-4">Transaksi</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto">
        <?php if(session('success')): ?>
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>
</html>
<?php /**PATH D:\Tugas Uas\manajemen-anggaran\resources\views/layouts/app.blade.php ENDPATH**/ ?>