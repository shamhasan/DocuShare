<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth; 

// --- Rute Halaman Publik (Tidak Butuh Login) ---
Route::get('/', function () {
    return view('welcome'); // Halaman Selamat Datang DocuShare
})->name('welcome');

// Rute Autentikasi (Register & Login)
Auth::routes();

// --- Rute yang Membutuhkan Autentikasi (Wajib Login) ---
// Semua rute di dalam grup ini akan dilindungi oleh middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Halaman Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/upload-file', [DocumentController::class, 'create'])->name('upload-file');
    // Rute untuk memproses unggah file (menyimpan)
    Route::post('/upload-file', [DocumentController::class, 'store'])->name('document.store');

    // membuka file
    Route::get('/documents/{filename}', function ($filename) {
        $path = storage_path('app/public/documents/' . $filename);
        
        if (!file_exists($path)) {
            abort(404);
        }
        
        return response()->file($path);
        })->name('documents.view');

    // Rute untuk edit dokumen (menggunakan ID dokumen)
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    // Rute untuk menyimpan perubahan dokumen (PUT request)
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    // Rute untuk menghapus dokumen (DELETE request)
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    // Halaman Edit Profil Pengguna
    Route::get('/edit-profile', [UserProfileController::class, 'edit'])->name('edit_profile');
    Route::put('/edit-profile', [UserProfileController::class, 'update'])->name('profile.update');

    // Menghapus rute '/edit' lama jika sudah digantikan oleh '/documents/{document}/edit'
    Route::get('/edit', function() { return redirect()->route('home'); })->name('edit');
});
