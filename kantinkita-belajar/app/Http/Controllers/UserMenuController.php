<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth; // ★ WAJIB

class UserMenuController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter');
        $search = $request->get('search');
        $sort = $request->get('sort');

        $allmenu = Menu::all();
        $query = Menu::query();

        if (!empty($filter) && $filter !== 'all') {
            $query->where('nama_kategori', ucfirst($filter));
        }

        if (!empty($search)) {
            $query->where('nama_menu', 'like', '%' . $search . '%');
        }

        switch ($sort) {
            case 'termurah':
                $query->orderBy('harga_menu', 'asc');
                break;
            case 'termahal':
                $query->orderBy('harga_menu', 'desc');
                break;
            default:
                $query->orderBy('nama_kategori')->orderBy('nama_menu');
                break;
        }

        $semuamenu = $query->get();

        // ===== FIX: hitung cart user =====
        $cart = Cart::where('id_user', Auth::user()->id_user)->get();
        $total_items = $cart->sum('jumlah');
        $total_price = $cart->sum(fn($i) => $i->jumlah * $i->menu->harga_menu);

        return view('user.menu.menu', compact(
            'semuamenu', 'allmenu', 'total_items', 'total_price'
        ));
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('user.menu.detail_menu', compact('menu'));
    }
}
