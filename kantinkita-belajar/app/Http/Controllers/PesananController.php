<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;

class PesananController extends Controller
{
    // ✅ Halaman pesanan user
    public function index()
    {
        $userId = Auth::id();

        $pesanan = Transaksi::where('id_user', $userId)
            ->with('detailTransaksi.menu')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.cart.pesanan', compact('pesanan'));
    }

    public function show($id)
{
    $userId = Auth::id();

    $transaksi = Transaksi::where('id_transaksi', $id)
        ->where('id_user', $userId)
        ->with('detailTransaksi.menu')
        ->firstOrFail();

    return view('user.cart.detail_pesanan', compact('transaksi'));
}

public function adminShow($id)
{
    $transaksi = Transaksi::with('detailTransaksi.menu', 'user')
        ->findOrFail($id);

    return view('admin.pesanan.detail_pesanan', compact('transaksi'));
}


   public function adminIndex(Request $request)
{
    $status = $request->get('status');
    $search = $request->get('search');

    $pesanan = Transaksi::with('user');

    // filter status
    if ($status === 'menunggu') {
        $pesanan->where('status_pesanan', 'menunggu');
    } elseif ($status === 'completed') {
        $pesanan->where('status_pesanan', 'completed');
    }

    // filter SEARCH berdasarkan nama user
    if ($search) {
        $pesanan->whereHas('user', function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%");
        });
    }

    $pesanan = $pesanan->orderBy('created_at', 'desc')->get();

    return view('admin.pesanan.index_pesanan', compact('pesanan', 'status', 'search'));
}



    // ✅ Checkout oleh user
    // public function checkout()
    // {
    //     $userId = Auth::id();
    //     $carts = Cart::with('menu')->where('id_user', $userId)->get();

    //     if ($carts->isEmpty()) {
    //         return back()->with('error', 'Keranjang kamu kosong.');
    //     }

    //     try {
    //         DB::transaction(function () use ($carts, $userId) {
    //             $transaksi = Transaksi::create([
    //                 'id_user' => $userId,
    //                 'status_pesanan' => 'menunggu',
    //             ]);

    //             foreach ($carts as $cart) {
    //                 $menu = $cart->menu;

    //                 if ($cart->jumlah > $menu->stok_menu) {
    //                     throw new \Exception("Stok menu {$menu->nama_menu} tidak mencukupi.");
    //                 }

    //                 DetailTransaksi::create([
    //                     'id_transaksi' => $transaksi->id_transaksi,
    //                     'id_menu' => $cart->id_menu,
    //                     'jumlah' => $cart->jumlah,
    //                     'harga_satuan' => $menu->harga_menu,
    //                     'sub_total' => $cart->total_harga,
    //                 ]);

    //                 // Kurangi stok menu
    //                 $menu->decrement('stok_menu', $cart->jumlah);
    //             }

    //             // Hapus isi keranjang user
    //             Cart::where('id_user', $userId)->delete();
    //         });

    //         return redirect()->route('user.pesanan.index')
    //             ->with('success', 'Pesanan berhasil dikonfirmasi!');

    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //     }
    // }





    // ... fungsi lain seperti index(), adminIndex(), cancel(), adminCancel() ...

    // ✅ Checkout oleh user → hanya buat transaksi, status 'menunggu', DetailTransaksi belum dibuat
   public function checkout()
{
    $userId = Auth::id();
    $carts = Cart::with('menu')->where('id_user', $userId)->get();

    if ($carts->isEmpty()) {
        return back()->with('error', 'Keranjang kamu kosong.');
    }

    DB::transaction(function () use ($carts, $userId) {
        // Buat transaksi
        $transaksi = Transaksi::create([
            'id_user' => $userId,
            'status_pesanan' => 'menunggu',
        ]);

        // Buat DetailTransaksi dari cart
        foreach ($carts as $cart) {
            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id_transaksi,
                'id_menu' => $cart->id_menu,
                'jumlah' => $cart->jumlah,
                'harga_satuan' => $cart->menu->harga_menu,
                'sub_total' => $cart->total_harga,
            ]);

            // Kurangi stok menu
            $cart->menu->decrement('stok_menu', $cart->jumlah);
        }

        // Hapus cart user
        Cart::where('id_user', $userId)->delete();
    });

    return redirect()->route('user.pesanan.index')
        ->with('success', 'Pesanan berhasil dibuat dan menunggu konfirmasi admin!');
}


    // ✅ Complete oleh admin → baru buat DetailTransaksi dan kurangi stok
  public function complete($id)
{
    $transaksi = Transaksi::findOrFail($id);

    if ($transaksi->status_pesanan !== 'menunggu') {
        return back()->with('error', 'Pesanan ini tidak bisa dikonfirmasi lagi.');
    }

    $transaksi->update(['status_pesanan' => 'completed']);

    return back()->with('success', 'Pesanan berhasil diselesaikan!');
}



    // ... fungsi l







    // ✅ Pembatalan pesanan oleh user
    public function cancel($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.menu')->findOrFail($id);

        if ($transaksi->status_pesanan !== 'menunggu') {
            return back()->with('error', 'Pesanan tidak bisa dibatalkan.');
        }

        DB::transaction(function () use ($transaksi) {
            $transaksi->update(['status_pesanan' => 'canceled']);

            foreach ($transaksi->detailTransaksi as $detail) {
                if ($detail->menu) {
                    $detail->menu->increment('stok_menu', $detail->jumlah);
                } else {
                    Menu::where('id_menu', $detail->id_menu)
                        ->increment('stok_menu', $detail->jumlah);
                }
            }
        });

        return redirect()->route('user.pesanan.index')
            ->with('success', 'Pesanan berhasil dibatalkan!');
    }

    // ✅ Pembatalan pesanan oleh admin
    public function adminCancel($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.menu')->findOrFail($id);

        if ($transaksi->status_pesanan !== 'menunggu') {
            return back()->with('error', 'Pesanan tidak bisa dibatalkan.');
        }

        DB::transaction(function () use ($transaksi) {
            $transaksi->update(['status_pesanan' => 'canceled']);

            foreach ($transaksi->detailTransaksi as $detail) {
                if ($detail->menu) {
                    $detail->menu->increment('stok_menu', $detail->jumlah);
                } else {
                    Menu::where('id_menu', $detail->id_menu)
                        ->increment('stok_menu', $detail->jumlah);
                }
            }
        });

        return redirect()->route('admin.pesanan.index')
            ->with('success', 'Pesanan berhasil dibatalkan oleh admin.');
    }
}
