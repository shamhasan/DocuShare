<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di DocuShare!</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif; 
        }
        .container-center {
            text-align: center;
            padding: 20px;
            max-width: 600px;
            width: 100%;
        }
        .btn {
            margin: 10px;
            min-width: 120px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="container-center ">
        <h1 class="mb-3 display- fw-bold">Selamat Datang di DocuShare !</h1>
        <p class="lead mb-4">Aplikasi yang siap membantumu untuk mengelola file mu secara online</p>
        <div>
            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary btn-lg">Mulai</a>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-primary btn-lg">Masuk</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html><?php /**PATH C:\Users\THINKPAD\Documents\College\Pemmrograman Web\pemweb_project_akhir\docushare-pemweb\resources\views/welcome.blade.php ENDPATH**/ ?>