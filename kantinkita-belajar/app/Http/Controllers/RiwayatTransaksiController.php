<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class RiwayatTransaksiController extends Controller
{
    public function adminRiwayat()
    {
        // Ambil hanya transaksi yang statusnya 'completed'
        $transaksi = Transaksi::with('detailTransaksi.menu', 'user')
            ->where('status_pesanan', 'completed')
            ->orderBy('created_at', 'desc')
            ->get();

        // Total item terjual (jumlah semua menu di transaksi completed)
        $totalItemTerjual = $transaksi->flatMap(fn($t) => $t->detailTransaksi)
            ->sum('jumlah');

        // Total pemasukan (total sub_total semua transaksi completed)
        $totalPemasukan = $transaksi->flatMap(fn($t) => $t->detailTransaksi)
            ->sum('sub_total');

        return view('admin.riwayat_transaksi', compact('transaksi', 'totalItemTerjual', 'totalPemasukan'));
    }
}
