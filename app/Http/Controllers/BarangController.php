<?php 

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    
    public function index() {
        $barangs = Barang::all();
        return view('barang.index',  compact('barangs'));
    }

    public function create() {
        return view('barang.create');
    }
    

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'ukuran' => 'required|string|max:50',
            'stok_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Menyimpan gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar_barang')) {
            $gambarPath = $request->file('gambar_barang')->store('barang', 'public'); // Menyimpan di public/storage/barang
        }

        // Menyimpan data barang
        $data = $request->all();
        $data['gambar_barang'] = $gambarPath; // Menyimpan path gambar

        // Membersihkan harga (misal, menghapus 'Rp', spasi, dan titik)
        $data['harga_barang'] = preg_replace('/[Rp\s.]/', '', $data['harga_barang']);

        // Menyimpan barang baru ke database
        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(Barang $barang) {
        return view('barang.lihat', compact('barang'));
    }

    public function edit(Barang $barang) {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
{
    // Validasi input
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'ukuran' => 'required|string|max:50',
        'stok_barang' => 'required|numeric',
        'harga_barang' => 'required|numeric',
        'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Gambar bersifat opsional
    ]);

    // Ambil data input yang diperlukan
    $data = $request->only(['nama_barang', 'ukuran', 'stok_barang', 'harga_barang']);

    // Cek apakah ada gambar baru yang diunggah
    if ($request->hasFile('gambar_barang')) {
        // Hapus gambar lama jika ada
        if ($barang->gambar_barang) {
            Storage::delete('public/' . $barang->gambar_barang);  // Hapus gambar lama dari storage
        }

        // Simpan gambar baru
        $path = $request->file('gambar_barang')->store('images', 'public');
        $data['gambar_barang'] = $path;  // Simpan path gambar baru
    }

    // Update barang dengan data baru
    $barang->update($data);

    // Redirect setelah update sukses
    return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
}


    public function destroy(Barang $barang) {
        // Hapus gambar jika ada
        if ($barang->gambar_barang && Storage::exists('public/' . $barang->gambar_barang)) {
            Storage::delete('public/' . $barang->gambar_barang);
        }

        // Hapus data barang
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
