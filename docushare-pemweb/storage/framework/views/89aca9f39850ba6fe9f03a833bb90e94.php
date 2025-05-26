<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbarui Profil - DocuShare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            background-color: #ffffff;
            font-family: 'Roboto', sans-serif;
            padding-top: 70px;
        }

        .navbar-custom {
            background-color: #fff;
            padding: 1rem 15px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            margin: 0 auto;
            max-width: 1200px;
        }

        .navbar-brand-custom {
            font-weight: 700;
            font-size: 1.5rem;
            color: #333;
            text-decoration: none;
        }

        .user-greeting-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-greeting {
            font-size: 1rem;
            font-weight: 500;
            color: #555;
        }

        .settings-icon {
            font-size: 1.2rem;
            color: #333;
            text-decoration: none;
        }

        .settings-icon:hover {
            color: #0d6efd;
        }

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 70px); /* Kurangi tinggi navbar fixed */
            padding: 20px;
        }

        .app-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
        }

        .card-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        .card-form h2 {
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
        }

        .form-label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            background-color: #e9ecef;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
            cursor: default;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-update {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light navbar-custom fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="<?php echo e(route('home')); ?>" class="navbar-brand-custom">DocuShare</a>
            <div class="user-greeting-container">
                <span class="user-greeting">Halo, <?php echo e(Auth::check() ? Auth::user()->name : 'Tamu'); ?>!</span>
                <a href="<?php echo e(route('edit_profile')); ?>" class="settings-icon ms-2" title="Edit Profil"><i class="fa-solid fa-gear"></i></a>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="settings-icon ms-2" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="card-form">
            <h2>Perbarui Datamu!</h2>
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show w-100 mb-4" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show w-100 mb-4" role="alert">
                    Ada masalah saat memperbarui profil:
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('profile.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', Auth::user()->name)); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email', Auth::user()->email)); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password (Kosongkan jika tidak diubah)</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi baru jika ingin diubah">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi baru">
                </div>

                <button type="submit" class="btn btn-primary btn-update">Perbarui</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html><?php /**PATH C:\Users\THINKPAD\Documents\College\Pemmrograman Web\pemweb_project_akhir\docushare-pemweb\resources\views/edit_profile.blade.php ENDPATH**/ ?>