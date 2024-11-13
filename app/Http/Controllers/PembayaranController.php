<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PembayaranController extends Controller
{
    public function index() {
        $pembayarans = Pembayaran::all();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create() {
        return view('pembayaran.create');
    }

    public function store(Request $request) {
        $request->validate([
            'jenis_pembayaran' => 'required'
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('succsesa', 'Pembayaran berhasil di tambahkan');
    }


    public function edit(Pembayaran $pembayaran) {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, Pembayaran $pembayaran) {
        $request->validate([
            'jenis_pembayaran' => 'required'
        ]);

        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with('succsesa', 'Pembayaran berhasil di update');
    }

    public function destroy(Pembayaran $pembayaran) {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Berhasil di hapus');
    }
}
