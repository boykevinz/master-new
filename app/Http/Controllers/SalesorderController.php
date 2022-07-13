<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\salesorder;
use Illuminate\Support\Facades\DB;


class SalesorderController extends Controller
{
    public function index()
    {
        $salesorders = salesorder::get();
        return view('salesorder.salesorder', compact('salesorders'));
    }

    public function create()
    {

        $customers = Customer::get();
        $barangs = Barang::get();

        return view('salesorder.salesordercreate', compact('customers', 'barangs'));
        
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'nama_customer' => 'required',
            'produk' => 'required',
            'qty' => 'required',
            'harga_satuan' => 'required'
        ]);

        $salesorders = salesorder::create([
            'tgl' => $request->tanggal,
            'nm_customer' => $request->nama_customer,
            'produk' => $request->produk,
            'qty' => $request->qty,
            'hargasatuan' => $request->harga_satuan,
            
        ]);
        if ($salesorders) {
            return redirect()
                ->route('salesorder.index')
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
        $salesorder = salesorder::findOrFail($id);
        return view('salesorder.salesordershow', compact('salesorder'));
    }   
    
    public function edit($id)
    {
        $salesorder = salesorder::findOrFail($id);
        return view('salesorder.salesorderedit', compact('salesorder'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'nama_customer' => 'required',
            'produk' => 'required',
            'qty' => 'required',
            'harga_satuan' => 'required',
        ]);

        $salesorders = salesorder::findOrFail($id);

        $salesorders->update([
            'tgl' => $request->tanggal,
            'nm_customer' => $request->nama_customer,
            'produk' => $request->produk,
            'qty' => $request->qty,
            'hargasatuan' => $request->harga_satuan
        ]);

        if ($salesorders) {
            return redirect()
                ->route('salesorder.index')
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
        $salesorders = salesorder::findOrFail($id);
        $salesorders->delete();

        if ($salesorders) {
            return redirect()
                ->route('salesorder.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('salesorder.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }    
}
}
