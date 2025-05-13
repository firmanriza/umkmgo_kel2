<?php $__env->startSection('content'); ?>
<div class="row min-vh-100 align-items-center justify-content-center" style="background: none;">
    <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-center p-0" style="background: url('/images/Register.jpg') center center/cover no-repeat; min-height: 100vh; border-radius: 30px 0 0 30px;">
        <div class="text-white text-center p-5" style="background: rgba(0,0,0,0.35); border-radius: 30px 0 0 30px; width: 100%;">
            <img src="/images/logoumkm.png" alt="UMKMGo Logo" style="max-width: 200px; margin-bottom: 30px;">
            <h1 class="fw-bold mb-3">Building the Future...</h1>
            <p class="mb-0">Website ini lahir bukan hanya sekedar tugas biasa namun ada suka duka serta harapan untuk memajukan UMKM di Indonesia dikancah global</p>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card p-4 w-100" style="max-width: 420px; border-radius: 20px;">
            <h4 class="text-center mb-4">Create an Account</h4>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required autofocus value="<?php echo e(old('name')); ?>">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required value="<?php echo e(old('email')); ?>">
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="user" <?php echo e(old('role') == 'user' ? 'selected' : ''); ?>>User</option>
                        <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button class="custom-button mt-4 w-100">Register Here</button>
            </form>
            <div class="text-center mt-3">
                <span>Already have an account? <a href="<?php echo e(route('login')); ?>" class="fw-bold">LOGIN HERE</a></span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/auth/register.blade.php ENDPATH**/ ?>