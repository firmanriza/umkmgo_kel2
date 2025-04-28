

<?php $__env->startSection('content'); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        tailwind.config = {
            corePlugins: {
                preflight: false
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
<?php $__env->stopPush(); ?>

<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold text-center mb-6">Pilih Kategori UMKM</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('quiz.final_intro', ['id' => $kategori->id])); ?>" 
               class="block text-center bg-white shadow hover:shadow-lg rounded-xl p-4 transition">
                <div class="text-4xl mb-2">
                    <?php switch($kategori->nama_kategori):
                        case ('Kuliner'): ?> 🍜 <?php break; ?>
                        <?php case ('Jasa'): ?> 🛠️ <?php break; ?>
                        <?php case ('Kerajinan'): ?> 🎨 <?php break; ?>
                        <?php case ('Fashion'): ?> 👗 <?php break; ?>
                        <?php case ('Perikanan'): ?> 🐟 <?php break; ?>
                        <?php default: ?> 📦
                    <?php endswitch; ?>
                </div>
                <p class="font-semibold"><?php echo e($kategori->nama_kategori); ?></p>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkmgo\resources\views/quiz/final_kategori.blade.php ENDPATH**/ ?>