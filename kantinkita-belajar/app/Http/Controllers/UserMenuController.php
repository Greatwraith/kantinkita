<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

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

        return view('user.menu.menu', compact('semuamenu', 'allmenu'));
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('user.menu.detail_menu', compact('menu'));
    }
}
