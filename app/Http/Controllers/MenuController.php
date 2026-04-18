<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the menu.
     */
public function index(Request $request)
{
    Gate::authorize('admin-access');

    $filter = $request->get('filter');
    $search = $request->get('search');

    // Semua data (untuk hitung total kategori)
    $allmenu = Menu::all();

    // Query untuk data hasil filter
    $query = Menu::query();

    if (!empty($filter) && $filter !== 'all') {
        $query->where('nama_kategori', ucfirst($filter));
    }

    if (!empty($search)) {
        $query->where('nama_menu', 'like', '%' . $search . '%');
    }

    $semuamenu = $query->orderBy('nama_kategori')
                       ->orderBy('nama_menu')
                       ->get();

    return view('admin.menu.index_menu', compact('semuamenu', 'allmenu'));
}




    /**
     * Show the form for creating a new menu.
     */
    public function create()
    {
        Gate::authorize('admin-access');

        return view('admin.menu.create_menu');
    }

    /**
     * Store a newly created menu in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('admin-access');

        $request->validate([
            'nama_kategori' => 'required|in:Makanan,Minuman',
            'nama_menu'     => 'required|string|max:255',
            'harga_menu' => 'required|integer|min:1000',
            'deskripsi_menu'=> 'nullable|string',
            'gambar_menu'   => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:30720', // 30MB
            'status_menu'   => 'required|in:tersedia',
            'stok_menu'     => 'required|integer|min:1',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar_menu')) {
            $gambarPath = $request->file('gambar_menu')->store('menu_images', 'public');
        }

        Menu::create([
            'nama_kategori' => $request->nama_kategori,
            'nama_menu'     => $request->nama_menu,
            'harga_menu'    => $request->harga_menu,
            'deskripsi_menu'=> $request->deskripsi_menu,
            'gambar_menu'   => $gambarPath,
            'status_menu'   => $request->status_menu,
            'stok_menu'     => $request->stok_menu,
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified menu.
     */
    public function edit($id)
    {
        Gate::authorize('admin-access');

        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit_menu', compact('menu'));
    }

    /**
     * Update the specified menu in storage.
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('admin-access');

        $request->validate([
            'nama_kategori' => 'required|in:Makanan,Minuman',
            'nama_menu'     => 'required|string|max:255',
            'harga_menu' => 'required|integer|min:1000',
            'deskripsi_menu'=> 'nullable|string',
            'gambar_menu'   => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:30720',
            'status_menu'   => 'required|in:tersedia',
            'stok_menu'     => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($id);

        // Update basic fields
        $menu->update([
            'nama_kategori' => $request->nama_kategori,
            'nama_menu'     => $request->nama_menu,
            'harga_menu'    => $request->harga_menu,
            'deskripsi_menu'=> $request->deskripsi_menu,
            'stok_menu'     => $request->stok_menu,
            'status_menu'   => $request->status_menu,
        ]);

        // Handle image upload
        if ($request->hasFile('gambar_menu')) {
            // Delete old image if exists
            if ($menu->gambar_menu && Storage::disk('public')->exists($menu->gambar_menu)) {
                Storage::disk('public')->delete($menu->gambar_menu);
            }

            $path = $request->file('gambar_menu')->store('menu_images', 'public');
            $menu->gambar_menu = $path;
            $menu->save();
        }

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Remove the specified menu from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('admin-access');

        $hapusmenu = Menu::findOrFail($id);

        // Delete image if exists
        if ($hapusmenu->gambar_menu && Storage::disk('public')->exists($hapusmenu->gambar_menu)) {
            Storage::disk('public')->delete($hapusmenu->gambar_menu);
        }

        $hapusmenu->delete();

        // Cek apakah tabel sekarang kosong
        if (Menu::count() === 0) {
            // Reset AUTO_INCREMENT ke 1
            DB::statement('ALTER TABLE ' . (new Menu)->getTable() . ' AUTO_INCREMENT = 1');
        }

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus!');
    }

    /**
     * Display the specified menu details.
     */
    public function show($id)
    {
        Gate::authorize('admin-access');

        $menu = Menu::findOrFail($id);
        return view('admin.menu.detail_menu', compact('menu'));
    }
}
