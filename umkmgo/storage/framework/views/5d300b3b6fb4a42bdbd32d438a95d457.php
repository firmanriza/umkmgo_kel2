<?php $__env->startSection('content'); ?>
<div class="row min-vh-100 align-items-center justify-content-center" style="background: none;">
    <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center align-items-center p-0" style="background: url('/images/login.jpg') center center/cover no-repeat; min-height: 100vh; border-radius: 30px 0 0 30px;">
        <div class="text-white text-start p-5" style="background: rgba(0,0,0,0.35); border-radius: 30px 0 0 30px; width: 100%;">
            <h1 class="fw-bold mb-3">Dari Komunitas,<br>Untuk UMKM Naik Kelas.</h1>
            <p class="mb-0">Komunitas yang menjadi go global menjadi national excellence in the word</p>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="card p-4 w-100" style="max-width: 420px; border-radius: 20px;">
            <div class="mb-2 text-uppercase small">WELCOME BACK</div>
            <h4 class="mb-4">Log In to your Account</h4>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required autofocus value="<?php echo e(old('email')); ?>">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="<?php echo e(route('password.request')); ?>" class="small">Forgot Password?</a>
                </div>
                <button class="custom-button mt-2 w-100" type="submit">CONTINUE</button>
            </form>
            <div class="text-center my-3 text-muted">Or</div>
            <div class="d-grid gap-2 mb-2">
                <button class="btn btn-light border d-flex align-items-center justify-content-center" disabled><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" width="20" class="me-2"> Log In with Google</button>
                <button class="btn btn-light border d-flex align-items-center justify-content-center" disabled><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/facebook/facebook-original.svg" width="20" class="me-2"> Log In with Facebook</button>
                <button class="btn btn-light border d-flex align-items-center justify-content-center" disabled><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apple/apple-original.svg" width="20" class="me-2"> Log In with Apple</button>
            </div>
            <div class="text-center mt-3">
                <span>New User? <a href="<?php echo e(route('register')); ?>" class="fw-bold">SIGN UP HERE</a></span>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Aplikasi\Xampp\htdocs\umkmgo_kel2-Sean_umkgo\umkmgo_kel2-Sean_umkgo\umkmgo\resources\views/auth/login.blade.php ENDPATH**/ ?>