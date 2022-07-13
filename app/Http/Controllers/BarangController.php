<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Barang;
class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::get();
        return view('barang.barang', compact('barangs'));
    }
    public function create()
    {
        return view('barang.barangcreate');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required|string|max:50',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        $barangs = Barang::create([
            'nm_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            
        ]);
        if ($barangs) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Data Barang Telah Berhasil Di Tambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }   

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.barangtampill', compact('barang'));
    }


    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.barangedit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required|string|max:155',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);

        $post = Barang::findOrFail($id);

        $post->update([
            'nm_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        if ($post) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }    

    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();

        if ($barangs) {
            return redirect()
                ->route('barang.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('barang.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }    
}
}
    

    


