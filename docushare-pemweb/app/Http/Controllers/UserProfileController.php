<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk user yang login
use Illuminate\Support\Facades\Hash; // Untuk hash password
use Illuminate\Validation\Rule; // Untuk validasi unique email

class UserProfileController extends Controller
{
    /**
     * Menampilkan form edit profil user yang login (sesuai view edit_profile.blade.php)
     */
    public function edit()
    {
        return view('edit_profile');
    }

    /**
     * Memperbarui profil user yang login di database
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        if (!$user instanceof \App\Models\User) {
            abort(500, 'Authenticated user is not a valid User model instance.');
        }

        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Email harus unik, kecuali jika itu adalah email user yang sedang diupdate
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // Password opsional, hanya jika diisi dan harus sama dengan password_confirmation
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        // Perbarui nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Perbarui password hanya jika field password diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Hash password baru
        }

        $user->save(); // Menyimpan perubahan ke database

        // Redirect kembali ke halaman edit profil dengan pesan sukses
        return redirect()->route('home')->with('success', 'Profil berhasil diperbarui!');
    }
}