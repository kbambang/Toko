<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('barang', 'pembayaran')->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $pembayarans = Pembayaran::all();
        return view('transaksis.create', compact('barangs', 'pembayarans'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'pembayaran_id' => 'required|exists:pembayarans,id',
            'jumlah' => 'required|numeric|min:1',
            'uang_diterima' => 'required|numeric|min:0',
        ]);
    

        $barang = Barang::find($request->barang_id);
    

        if ($barang->stok_barang < $request->jumlah) {
            return redirect()->back()->withErrors(['stok' => 'Stok barang tidak cukup']);
        }

        $totalHarga = $barang->harga_barang * $request->jumlah;
    
        if ($request->uang_diterima < $totalHarga) {
            return redirect()->back()->with('error', 'Uang diterima tidak cukup, silakan periksa jumlah pembayaran Anda.');
        }
        
        $transaksi = Transaksi::create([
            'barang_id' => $request->barang_id,
            'pembayaran_id' => $request->pembayaran_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $totalHarga,
            'uang_diterima' => $request->uang_diterima,
            'kembalian' => $request->uang_diterima - $totalHarga
        ]);

        $barang->stok_barang -= $request->jumlah;
        $barang->save(); 
    
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan');
    }
    

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $barang = Barang::find($transaksi->barang_id);

        if ($barang) {
            $barang->stok_barang += $transaksi->jumlah;
            $barang->save();
        }

        $transaksi->delete();

        return redirect()->route('transaksis.index');
    }



    public function laporanPendapatan()
    {
        $transaksis = Transaksi::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(total_harga) as total_pendapatan'))
            ->whereYear('created_at', date('Y')) 
            ->whereMonth('created_at', date('m')) 
            ->groupBy(DB::raw('DATE(created_at)'))  
            ->orderBy('tanggal', 'asc') 
            ->get();

  
        $totalPendapatan = $transaksis->sum('total_pendapatan');

        return view('laporan.pendapatan', compact('transaksis', 'totalPendapatan'));
    }


    public function exportPDF()
    {
        $transaksis = Transaksi::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(total_harga) as total_pendapatan'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal', 'asc')
            ->get();

        $totalPendapatan = $transaksis->sum('total_pendapatan');

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('laporan.pendapatan_pdf', compact('transaksis', 'totalPendapatan'));

        return $pdf->download('laporan_pendapatan_bulan_ini.pdf');
    }

   

    public function cetakStruk($id)
    {
        $transaksi = Transaksi::with('barang')->findOrFail($id);
     $pdf = app('dompdf.wrapper');
        $pdf->loadView('struk', compact('transaksi'));
    
        return $pdf->download('struk_transaksi_' . $transaksi->id . '.pdf');
    }
    

}
