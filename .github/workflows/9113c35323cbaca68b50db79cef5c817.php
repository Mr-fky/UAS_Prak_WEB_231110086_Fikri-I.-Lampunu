

<?php $__env->startSection('content'); ?>
    <h1 class="text-xl font-bold mb-4"><?php echo e(isset($kategori) ? 'Edit' : 'Tambah'); ?> Kategori</h1>

    <form action="<?php echo e(isset($kategori) ? route('kategori.update', $kategori) : route('kategori.store')); ?>" method="POST" class="bg-white p-4 rounded shadow-md">
        <?php echo csrf_field(); ?>
        <?php if(isset($kategori)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="mb-4">
            <label>Nama Kategori</label>
            <input type="text" name="nama" value="<?php echo e(old('nama', $kategori->nama ?? '')); ?>" class="w-full p-2 border rounded">
            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label>Jenis</label>
            <select name="jenis" class="w-full p-2 border rounded">
                <option value="">-- Pilih --</option>
                <option value="pemasukan" <?php echo e(old('jenis', $kategori->jenis ?? '') == 'pemasukan' ? 'selected' : ''); ?>>Pemasukan</option>
                <option value="pengeluaran" <?php echo e(old('jenis', $kategori->jenis ?? '') == 'pengeluaran' ? 'selected' : ''); ?>>Pengeluaran</option>
            </select>
            <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded"><?php echo e(isset($kategori) ? 'Update' : 'Simpan'); ?></button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Tugas Uas\manajemen-anggaran\resources\views/kategori/form.blade.php ENDPATH**/ ?>