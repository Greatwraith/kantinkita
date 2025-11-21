<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Storage;

class UlasanController extends Controller
{
    public function index(Request $request)
{
    // Semua ulasan untuk menghitung total bintang
    $all = Ulasan::all();

    $counts = [
        5 => $all->where('rating', 5)->count(),
        4 => $all->where('rating', 4)->count(),
        3 => $all->where('rating', 3)->count(),
        2 => $all->where('rating', 2)->count(),
        1 => $all->where('rating', 1)->count(),
    ];

    $total = $all->count();

    // FILTER
    $query = Ulasan::with('user');

    if ($request->has('rating')) {
        $query->where('rating', $request->rating);
    }

    // Data yang tampil
    $ulasans = $query->orderBy('created_at', 'DESC')->get();

    return view('user.ulasan.ulasan', compact(
        'ulasans',
        'total',
        'counts'
    ));
}


    public function create()
    {
        return view('user.ulasan.tambah_ulasan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:35840',
        ]);

        $userId = auth()->user()->id_user;

        // Cek user sudah punya ulasan
        $existing = Ulasan::where('id_user', $userId)->first();

        if ($existing) {
            return redirect()->route('ulasan.index')
                             ->with('error', 'Kamu sudah memberi ulasan!');
        }

        $gambarPath = $request->hasFile('gambar')
            ? $request->file('gambar')->store('ulasan', 'public')
            : null;

        Ulasan::create([
            'id_user' => $userId,
            'rating'  => $request->rating,
            'ulasan'  => $request->ulasan,
            'gambar'  => $gambarPath,
        ]);

        return redirect()->route('ulasan.index')
                         ->with('success', 'Ulasan berhasil dikirim!');
    }

    public function edit()
    {
        $userId = auth()->user()->id_user;

        $ulasan = Ulasan::where('id_user', $userId)->first();

        if (!$ulasan) {
            return redirect()->route('ulasan.create');
        }

        return view('user.ulasan.edit_ulasan', compact('ulasan'));
    }

    public function update(Request $request)
    {
        $userId = auth()->user()->id_user;

        $ulasan = Ulasan::where('id_user', $userId)->first();

        if (!$ulasan) {
            return redirect()->route('ulasan.create');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:35840',
        ]);

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($ulasan->gambar) {
                Storage::disk('public')->delete($ulasan->gambar);
            }

            $ulasan->gambar = $request->file('gambar')->store('ulasan', 'public');
        }

        $ulasan->rating = $request->rating;
        $ulasan->ulasan = $request->ulasan;
        $ulasan->save();

        return redirect()->route('ulasan.index')
                         ->with('success', 'Ulasan berhasil diperbarui!');
    }

    public function destroy()
    {
        $userId = auth()->user()->id_user;

        $ulasan = Ulasan::where('id_user', $userId)->first();

        if (!$ulasan) {
            return redirect()->route('ulasan.index')->with('error', 'Tidak ada ulasan untuk dihapus.');
        }

        if ($ulasan->gambar) {
            Storage::disk('public')->delete($ulasan->gambar);
        }

        $ulasan->delete();

        return redirect()->route('ulasan.index')
                         ->with('success', 'Ulasan berhasil dihapus.');
    }


    
}
