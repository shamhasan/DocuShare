<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dokumen - DocuShare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            max-width: 1200px;
            margin: 0 auto;
            overflow-x: hidden;
            background-color: #f8f9fa;
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

        .content-wrapper {
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: calc(100vh - 70px);
        }

        .card-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            max-width: 550px;
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

        .form-control, .form-textarea {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            background-color: #e9ecef;
        }

        .form-control:focus, .form-textarea:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-update-doc {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 20px;
        }

        .file-info {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
            text-align: left;
            font-size: 0.95rem;
            color: #555;
            word-break: break-all;
        }

        .file-info strong {
            color: #333;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light navbar-custom fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="navbar-brand-custom">DocuShare</a>
            <div class="user-greeting-container">
                <span class="user-greeting">Halo, {{ Auth::check() ? Auth::user()->name : 'Tamu' }}!</span>
                <a href="{{ route('edit_profile') }}" class="settings-icon ms-2" title="Edit Profil"><i class="fa-solid fa-gear"></i></a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="settings-icon ms-2" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show w-100 mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show w-100 mb-4" role="alert">
                Ada masalah saat memperbarui dokumen:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-form">
            <h2>Edit Dokumen</h2>
            <form action="{{ route('documents.update', $document->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="original_filename" class="form-label">Nama File</label>
                    <input type="text" class="form-control" id="original_filename" name="original_filename"
                        value="{{ old('original_filename', $document->original_filename) }}" required>
                    @error('original_filename')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Deskripsi (Opsional)</label>
                    <textarea class="form-control form-textarea" id="description" name="description" rows="3">{{ old('description', $document->description) }}</textarea>
                    @error('description')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="file-info">
                    <strong>Tipe File:</strong> {{ $document->file_mime_type ?? '-' }} <br>
                    <strong>Ukuran:</strong> {{ number_format($document->file_size / 1024, 2) }} KB <br>
                    <small>Tanggal Unggah: {{ $document->created_at->format('d M Y H:i') }}</small>
                </div>

                <button type="submit" class="btn btn-primary btn-update-doc">Simpan Perubahan</button>

                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-update-doc mt-3">Batal</a>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>