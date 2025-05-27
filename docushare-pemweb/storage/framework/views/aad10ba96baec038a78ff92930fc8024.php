<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah File - DocuShare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Global Body Styling - Disatukan untuk layout halaman upload */
        body {
            max-width: 1200px;
            margin: 0 auto;
            overflow-x: hidden;
            background-color: #ffffff;
            font-family: 'Roboto', sans-serif;
            padding-top: 70px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            min-height: 100vh;
        }

        /* Navbar Styling - Sama dengan halaman Home */
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

        /* Content Wrapper - Diatur ulang untuk halaman upload */
        .content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 15px;
        }

        /* Upload Card Styling */
        .upload-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 600px;
            text-align: center;
            margin-bottom: 30px;
        }

        .upload-icon {
            font-size: 5rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .upload-text {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 0;
        }

        .upload-text a {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .upload-text a:hover {
            text-decoration: underline;
        }

        .btn-upload-file {
            padding: 12px 40px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light navbar-custom fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="<?php echo e(route('home')); ?>" class="navbar-brand-custom">DocuShare</a>
            <div class="user-greeting-container">
                <span class="user-greeting">Halo, <?php echo e(Auth::check() ? Auth::user()->name : 'Tamu'); ?>!</span>
                <a href="<?php echo e(route('edit_profile')); ?>" class="settings-icon ms-2" title="Edit Profil"><i
                        class="fa-solid fa-gear"></i></a>
                <a href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="settings-icon ms-2" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show w-100 mb-4" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger alert-dismissible fade show w-100 mb-4" role="alert">
                Ada masalah dengan unggahan Anda:
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('document.store')); ?>" method="POST" enctype="multipart/form-data"
            class="w-100 d-flex flex-column align-items-center">
            <?php echo csrf_field(); ?>
            <div class="upload-card">
                <i class="fa-solid fa-file-lines upload-icon"></i>
                <p class="upload-text">Tarik file ke sini atau <a href="#" id="browse-file-link">Telusuri File</a>
                </p>
                
                <input type="file" id="file-input" name="file_input" style="display: none;" required>
                <p id="file-name" class="mt-2">Belum ada file yang dipilih.</p>
                <div class="form-group mt-3">
                    <label for="original_filename_input" class="form-label">Nama Dokumen (Opsional)</label>
                    <input type="text" class="form-control" id="original_filename_input" name="original_filename"
                        placeholder="Masukkan nama dokumen jika berbeda" value="<?php echo e(old('original_filename')); ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="description_input" class="form-label">Deskripsi (Opsional)</label>
                    <textarea class="form-control" id="description_input" name="description" rows="3"
                        placeholder="Tambahkan deskripsi dokumen"><?php echo e(old('description')); ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-upload-file">Unggah</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

        <script>
            document.getElementById('browse-file-link').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('file-input').click();
            });

            document.getElementById('file-input').addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file yang dipilih.';
                document.getElementById('file-name').textContent = fileName;
            });
        </script>
    </div>
</body>

</html>
<?php /**PATH C:\Users\THINKPAD\Documents\College\Pemmrograman Web\pemweb_project_akhir\docushare-pemweb\resources\views/upload_file.blade.php ENDPATH**/ ?>