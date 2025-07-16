

<?php $__env->startSection('content'); ?>
    <h1 class="text-xl font-bold mb-4"><?php echo e(isset($transaksi) ? 'Edit' : 'Tambah'); ?> Transaksi</h1>

    <form action="<?php echo e(isset($transaksi) ? route('transaksi.update', $transaksi) : route('transaksi.store')); ?>" method="POST" class="bg-white p-4 rounded shadow-md">
        <?php echo csrf_field(); ?>
        <?php if(isset($transaksi)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="mb-4">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?php echo e(old('tanggal', $transaksi->tanggal ?? date('Y-m-d'))); ?>" class="w-full p-2 border rounded">
            <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label>Kategori</label>
            <select name="kategori_id" class="w-full p-2 border rounded">
                <option value="">-- Pilih --</option>
                <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kategori->id); ?>" <?php echo e(old('kategori_id', $transaksi->kategori_id ?? '') == $kategori->id ? 'selected' : ''); ?>>
                        <?php echo e($kategori->nama); ?> (<?php echo e($kategori->jenis); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['kategori_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="<?php echo e(old('jumlah', $transaksi->jumlah ?? '')); ?>" class="w-full p-2 border rounded">
            <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label>Keterangan</label>
            <textarea name="keterangan" class="w-full p-2 border rounded"><?php echo e(old('keterangan', $transaksi->keterangan ?? '')); ?></textarea>
            <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-red-500 text-sm"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            <?php echo e(isset($transaksi) ? 'Update' : 'Simpan'); ?>

        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Tugas Uas\manajemen-anggaran\resources\views/transaksi/form.blade.php ENDPATH**/ ?>