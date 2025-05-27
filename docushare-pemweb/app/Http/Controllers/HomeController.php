<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Document;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman home dengan daftar dokumen user.
     */
    public function index(Request $request)
    {
        /** @var \App\Models\User $user */ // 
        $user = Auth::user(); 

        $searchQuery = $request->input('search'); // Ambil query pencarian dari input

        $documentsQuery = Document::query();

        if ($searchQuery) {
            $documentsQuery->where(function ($query) use ($searchQuery) {
                $query->where('original_filename', 'like', '%' . $searchQuery . '%')
                      ->orWhere('description', 'like', '%' . $searchQuery . '%');
            });
        }

        $documents = $documentsQuery->with('user')->latest()->get();

        return view('home', compact('documents'));
    }
}