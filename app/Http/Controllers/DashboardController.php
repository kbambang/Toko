<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function index(){
        $totalBarang = Barang::count();  
        $totalPembayaran = Pembayaran::count(); 
        $totalkasir = User::where('role', 'kasir')->count(); 
        return view('dashboard.index', compact('totalBarang', 'totalPembayaran', 'totalkasir'));
    }
    
}
