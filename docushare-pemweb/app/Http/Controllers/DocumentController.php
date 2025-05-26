<?php

namespace App\Http\Controllers;

use App\Models\Document; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage; 

class DocumentController extends Controller
{
    /**
     * Menampilkan form untuk mengunggah dokumen baru (sesuai view upload_file.blade.php)
     */
    public function create()
    {
        return view('upload_file');
    }

    /**
     * Menyimpan dokumen yang diunggah ke storage dan metadatanya ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'file_input' => 'required|file|max:102400|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif',
            // original_filename dan description: opsional
            'original_filename' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $file = $request->file('file_input');
        // Jika tidak ada nama file asli yang diberikan, gunakan nama file asli dari upload
        $originalFilename = $request->original_filename ?: $file->getClientOriginalName();
        // Membuat nama file unik untuk disimpan di server
        $storedFilename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Simpan file ke disk 'public' (folder storage/app/public)
        $filePath = $request->file('file_input')->store('documents', 'public'); // Simpan di subfolder 'documents'

        // Membuat entri dokumen baru di database
        Document::create([
            'user_id' => Auth::id(), // ID user yang sedang login
            'original_filename' => $originalFilename,
            'stored_filename' => $storedFilename,
            'file_path' => $filePath, // Path relatif dari disk storage
            'file_mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'description' => $request->description,
        ]);

        // Redirect user ke halaman home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Dokumen berhasil diunggah!');
    }

    /**
     * Menampilkan form untuk mengedit dokumen tertentu (sesuai view edit.blade.php)
     * Parameter $document akan otomatis diisi oleh Route Model Binding berdasarkan ID di URL
     */
    public function edit(Document $document)
    {
        // Otorisasi: Pastikan user yang sedang login adalah pemilik dokumen ini
        if (Auth::user()->id !== $document->user_id) {
            abort(403, 'Anda tidak berhak mengedit dokumen ini.'); // Tampilkan error 403 jika tidak berhak
        }

        // Mengirimkan objek dokumen ke view 'edit'
        return view('edit', compact('document'));
    }

    /**
     * Memperbarui metadata dokumen tertentu di database
     * Parameter $document akan otomatis diisi oleh Route Model Binding
     */
    public function update(Request $request, Document $document)
    {
        // Otorisasi
        if (Auth::user()->id !== $document->user_id) {
            abort(403, 'Anda tidak berhak memperbarui dokumen ini.');
        }

        // Validasi input
        $request->validate([
            'original_filename' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Perbarui data dokumen
        $document->original_filename = $request->original_filename;
        $document->description = $request->description;
        $document->save(); // Menyimpan perubahan ke database

        // Redirect user ke halaman home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Dokumen berhasil diperbarui!');
    }

    /**
     * Menghapus dokumen dari storage dan database.
     * Parameter $document akan otomatis diisi oleh Route Model Binding
     */
    public function destroy(Document $document)
    {
        // Otorisasi
        if (Auth::user()->id !== $document->user_id) {
            abort(403, 'Anda tidak berhak menghapus dokumen ini.');
        }

        // Hapus file fisik dari storage disk 'public'
        Storage::disk('public')->delete($document->file_path);

        // Hapus entri dokumen dari database
        $document->delete();

        // Redirect user ke halaman home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Dokumen berhasil dihapus.');
    }
}