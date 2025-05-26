<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - DocuShare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Global Body Styling */
        body {
            max-width: 1200px;
            margin: 0 auto;
            overflow-x: hidden;
            background-color: #ffffff; /* Ubah ke putih */
            font-family: 'Roboto', sans-serif;
            padding-top: 70px;
        }

        /* Navbar Styling */
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

        /* Content Wrapper */
        .content-wrapper {
            padding: 20px 15px;
        }

        /* Search Bar Styling */
        .search-bar-container {
            margin-bottom: 25px;
        }

        .search-input-group {
            width: 100%;
        }

        .search-input {
            border-radius: 50px !important;
            padding: 0.75rem 1.25rem;
            background-color: #e9ecef;
            border: none;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, .075);
        }

        .search-input:focus {
            background-color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .search-button-addon {
            border-radius: 0 50px 50px 0 !important;
            background-color: #0d6efd;
            color: #fff;
            padding: 0.75rem 1.25rem;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-button-addon:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        /* Upload Button Styling */
        .upload-button-container {
            text-align: right;
            margin-bottom: 25px;
        }

        /* Document List Styling */
        .document-list-container {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
            padding-right: 15px;
        }

        .document-item {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .document-item-title {
            font-weight: 500;
            color: #333;
        }

        .document-actions .btn {
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-left: 10px;
        }

        .document-actions .btn-edit {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .document-actions .btn-edit:hover {
            background-color: #5c636a;
            border-color: #565e64;
        }

        .document-actions .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .document-actions .btn-delete:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }

        .document-list-container p {
            color: #555;
            font-size: 12px;
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

    <div class="content-wrapper">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show w-100 mb-4" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="search-bar-container">
            <form class="d-flex" action="<?php echo e(route('home')); ?>" method="GET"> <input class="form-control me-2 search-input" type="search" name="search" placeholder="Cari dokumen.." aria-label="Search" value="<?php echo e(request('search')); ?>">
                <button class="btn btn-outline-primary btn-search" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="upload-button-container">
            <a href="<?php echo e(route('upload-file')); ?>" class="btn btn-primary"><i class="fa-solid fa-upload me-2"></i>Unggah Dokumen</a>
        </div>

        <div class="document-list-container">
            <?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="document-item">
                <span class="document-item-title">
                    
                    <a href="<?php echo e(asset('storage/' . $document->file_path)); ?>"><?php echo e($document->original_filename); ?></a>
                    <p>Diupload oleh : <?php echo e($document->user->name); ?></p>
                </span>
                <div class="document-actions">
                    <a href="<?php echo e(route('documents.edit', $document->id)); ?>" class="btn btn-edit" title="Edit Dokumen"><i class="fa-solid fa-pencil"></i></a>
                    
                    <form action="<?php echo e(route('documents.destroy', $document->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')" title="Hapus Dokumen"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center text-muted">Belum ada dokumen yang diunggah.</p>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html><?php /**PATH C:\Users\THINKPAD\Documents\College\Pemmrograman Web\pemweb_project_akhir\docushare-pemweb\resources\views/home.blade.php ENDPATH**/ ?>