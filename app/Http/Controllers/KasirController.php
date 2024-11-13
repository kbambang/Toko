<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = User::where('role', 'kasir')->get();
        return view("kasir.index", compact("kasirs"));
    }

    public function create() {
        return view("kasir.create");
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|string|min:3|confirmed',
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'role' => 'kasir',
            'password'=> bcrypt($request->password)
        ]);

        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil ditambahkan');
    }

    public function edit(User $kasir) {
        return view('kasir.edit', compact('kasir'));
    }

  public function update(Request $request, User $kasir) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $kasir->id, 
        'password' => 'nullable|string|min:3|confirmed',
    ]);

    $kasir->update([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> $request->password ? bcrypt($request->password) : $kasir->password,
    ]);
    return redirect()->route('kasir.index')->with('success', 'berhasil di edit');
}


    public function destroy(User $kasir) {
        $kasir->delete();
        return redirect()->route('kasir.index')->with('success','berhasil di hapus');
    }
}
