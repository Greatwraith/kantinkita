<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('menu', 'user')
            ->where('id_user', Auth::user()->id_user)
            ->get();
        return view('user.cart.cart', compact('carts'));
    }

    public function store(Request $request, $id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        $jumlah = (int) $request->input('jumlah', 1);

        if ($jumlah > $menu->stok_menu) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        $cart = Cart::where('id_user', Auth::user()->id_user)
            ->where('id_menu', $menu->id_menu)
            ->first();

        if ($cart) {
            $totalBaru = $cart->jumlah + $jumlah;
            if ($totalBaru > $menu->stok_menu) {
                return back()->with('error', 'Stok tidak mencukupi untuk menambah jumlah.');
            }

            $cart->jumlah = $totalBaru;
            $cart->total_harga = $cart->jumlah * $menu->harga_menu;
            $cart->save();
        } else {
            Cart::create([
                'id_user' => Auth::user()->id_user,
                'id_menu' => $menu->id_menu,
                'jumlah' => $jumlah,
                'total_harga' => $jumlah * $menu->harga_menu,
            ]);
        }

        // ❌ HAPUS pengurangan stok di sini
        // $menu->stok_menu -= $jumlah;
        // $menu->save();

        return redirect()->route('user.cart.index')->with('success', 'Menu berhasil dimasukkan ke keranjang!');
    }

    public function edit($id)
{
    $cart = Cart::findOrFail($id); // item yang sedang diedit
    $carts = Cart::with('menu', 'user')
        ->where('id_user', Auth::user()->id_user)
        ->get(); // semua item keranjang user

    return view('user.cart.edit_cart', compact('cart', 'carts'));
}


   public function update(Request $request, $id)
{
    $cart = Cart::findOrFail($id);
    $menu = Menu::findOrFail($cart->id_menu);
    $jumlahBaru = (int) $request->input('jumlah');

    if ($jumlahBaru < 1) {
        return back()->with('error', 'Jumlah minimal 1.');
    }

    if ($jumlahBaru > $menu->stok_menu) {
        return back()->with('error', 'Stok tidak mencukupi.');
    }

    $cart->jumlah = $jumlahBaru;
    $cart->total_harga = $jumlahBaru * $menu->harga_menu;
    $cart->save();

    // ❌ Jangan redirect ke index, tapi kembali ke edit_cart
    return redirect()->route('user.cart.edit', $cart->id_keranjang)
                     ->with('success', 'Keranjang berhasil diperbarui.');
}

public function updateAll(Request $request)
{
    $dataJumlah = $request->input('jumlah'); // array: id_keranjang => jumlah baru

    foreach ($dataJumlah as $id_keranjang => $jumlahBaru) {

        $cart = Cart::find($id_keranjang);
        if (!$cart) continue;

        $menu = Menu::find($cart->id_menu);

        if ($jumlahBaru < 1) $jumlahBaru = 1;
        if ($jumlahBaru > $menu->stok_menu)
            return back()->with('error', 'Stok tidak mencukupi untuk ' . $menu->nama_menu);

        // update
        $cart->jumlah = $jumlahBaru;
        $cart->total_harga = $jumlahBaru * $menu->harga_menu;
        $cart->save();
    }

    return redirect()->route('user.cart.index')
                     ->with('success', 'Keranjang berhasil diperbarui!');
}


public function destroy($id)
{
    $cart = Cart::findOrFail($id);

    // pastikan hanya pemilik keranjang yang bisa hapus
    if ($cart->id_user != Auth::user()->id_user) {
        return back()->with('error', 'Akses ditolak');
    }

    $cart->delete();

    // kalau keranjang sudah kosong
    $remaining = Cart::where('id_user', Auth::user()->id_user)->first();
    
    if (!$remaining) {
        return redirect()->route('user.cart.index')
                         ->with('success', 'Item berhasil dihapus!');
    }

    // redirect ke edit page, pakai id item pertama yang tersisa
    return redirect()->route('user.cart.edit', $remaining->id_keranjang)
                     ->with('success', 'Item berhasil dihapus!');
}



}
