<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $data ['barangs'] = Barang::all();
        return view ('Barang.index', $data);
    }
    public function create()
    {
        $barangs = Barang::all();
        return view('Barang.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
        'kode_barang' => 'required|max:255',
        'nama_barang' => 'required|max:255',
        'jenis' => 'required|max:150',
        'harga' => 'required|numeric',
        ]);
     

        Barang::create($validated);
        $notification = array(
            'message' => 'Data Barang berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if($request->save == true) {
            return redirect()->route('Barang')->with($notification);
        } else {
        return redirect()->route('Barang.create')->with($notification);
        }
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        $notification = array(
            'message' => 'Data barang berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('Barang')->with($notification);
    }
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('Barang.edit', compact('barang',));
    }

    public function update(Request $request, string $id)
{
    $barang = Barang::find($id);
    $validated = $request->validate([
        'kode_barang' => 'required|max:255',
        'nama_barang' => 'required|max:150',
        'jenis' => 'required|max:150',
        'harga' => 'required|numeric',
        
    ]);


    $barang->update($validated);
    
    $notification = [
        'message' => 'Data barang berhasil diperbaharui',
        'alert-type' => 'success'
    ];

    return redirect()->route('Barang')->with($notification);
}



}