<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Pesanan;   // ← WAJIB DITAMBAH
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;





class UserController extends Controller
{
    /**
     * Show the login page.
     */
    public function login()
    {
        return view('login');
    }

 
public function logincheck(Request $request)
{
    $credential = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $credential['email'])->first();

    if (!$user) {
        // Langsung kembali ke login dengan popup error
        return back()->with('error', 'Account not found. Please contact admin!');
    }

    if (Auth::attempt($credential)) {
        $request->session()->regenerate();

        // Cek role dan arahkan sesuai
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return redirect()->route('dashboard')->with('success', 'Welcome back!');
    }

    return back()->with('error', 'Invalid email or password.');
}

public function profile()
{
    $user = Auth::user(); // Ambil data user dari tb_user

    // Ambil semua transaksi user yang sudah selesai
    $orders = \App\Models\Transaksi::where('id_user', $user->id_user)
                ->where('status_pesanan', 'completed') // status selesai
                ->with('detailTransaksi.menu')        // relasi ke detail transaksi dan menu
                ->orderBy('created_at', 'DESC')
                ->get();

    return view('user.profile', compact('user', 'orders'));
}



   
//      public function registercheck(Request $request)
// {
//     $validation = $request->validate([
//         'name' => 'required|string|max:255',
//         'username' => 'required|string|max:255|unique:users',
//         'email' => 'required|email|unique:users',
//         'password' => 'required|min:6',
//         'nis' => 'nullable|string|max:12|unique:users',
//         'kelas' => 'nullable|string|max:10',
//         'jurusan' => 'nullable|in:PPLG,DKV,TKJ,TJAT,ANIMASI',
//         'tanggal_lahir' => 'required|date',
//         'telepon' => 'required|string|max:20',
//     ]);

//     $user = User::create([
//         'name' => $validation['name'],
//         'username' => $validation['username'],
//         'email' => $validation['email'],
//         'password' => bcrypt($validation['password']),
//         'nis' => $validation['nis'] ?? null,
//         'kelas' => $validation['kelas'] ?? null,
//         'jurusan' => $validation['jurusan'] ?? null,
//         'tanggal_lahir' => $validation['tanggal_lahir'],
//         'telepon' => $validation['telepon'],
//         'role' => 'user',
//     ]);

//     return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
// }










     
   

     









    // public function registercheck(Request $request)
    // {
    //     $validation = $request->validate([
    //         'name' => 'required',
    //         'usename' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //     ]);

    //     $user = User::create([
    //         'name' => $validation['name'],
    //         'username' => $validation['username'],
    //         'email' => $validation['email'],
    //         'password' => bcrypt($validation['password']),
    //     ]);

    //     Auth::login($user);
    //     return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    // }

    /**
     * Redirect to the correct dashboard.
     */
public function goDashboard()
{
    if (Auth::check() && Auth::user()->role === 'admin') { 
        
        $menus = Menu::count();  
        $totalPesanan = \App\Models\Transaksi::count();
        $transaksiHariIni = \App\Models\Transaksi::whereDate('created_at', now())->count();

        $totalPendapatan = \App\Models\DetailTransaksi::sum('sub_total');

        $income = \App\Models\DetailTransaksi::join('tb_transaksi', 'tb_detailtransaksi.id_transaksi', '=', 'tb_transaksi.id_transaksi')
    ->where('tb_transaksi.status_pesanan', 'completed')
    ->selectRaw('MONTH(tb_transaksi.created_at) as bulan, SUM(tb_detailtransaksi.sub_total) as total')
    ->groupBy('bulan')
    ->orderBy('bulan')
    ->pluck('total', 'bulan')
    ->toArray();

    

        return view('admin.dashboard', compact(
            'menus',
            'totalPesanan',
            'transaksiHariIni',
            'totalPendapatan',
            'income'
        ));
    }

    return view('dashboard'); // user
}



    /**
     * Logout the current user.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have logged out successfully.');
    }

public function index(Request $request)
{
    $query = Ulasan::query();

    if ($request->has('rating')) {
        $query->where('rating', $request->rating);
    }

    $ulasans = $query->latest()->get();

    $total = $ulasans->count();
    $counts = [
        5 => $ulasans->where('rating', 5)->count(),
        4 => $ulasans->where('rating', 4)->count(),
        3 => $ulasans->where('rating', 3)->count(),
        2 => $ulasans->where('rating', 2)->count(),
        1 => $ulasans->where('rating', 1)->count(),
    ];

    return view('user.ulasan.ulasan', compact(
        'ulasans',
        'total',
        'counts'
    ));
}

public function adminProfile()
{
    $user = Auth::user(); // admin yang sedang login
    return view('admin.profile', compact('user'));
}


}
