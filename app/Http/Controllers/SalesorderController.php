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
        $salesorders = salesorder::with('customer')->get();
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
            
            'tanggal' => 'required',
            'id_customer' => 'required',
            'produk' => 'required',
            'qty' => 'required|max:3',
            'harga_satuan' => 'required',
        ]);

        $salesorders = salesorder::create([
            'tgl' => $request->tanggal,
            'id_customer' => $request->id_customer,
            'produk' => $request->produk,
            'qty' => $request->qty,
            'hargasatuan' => $request->harga_satuan,
            'produk2' => $request->produk2,
            'qty2' => $request->qty2,
            'hargasatuan2' => $request->harga_satuan2,
            'produk3' => $request->produk3,
            'qty3' => $request->qty3,
            'hargasatuan3' => $request->harga_satuan3,            
            
        ]);
        if ($salesorders) {
            return redirect()
                ->route('salesorder.index')
                ->with([
                    'success' => 'Data Telah Berhasil Di Tambahkan'
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
        $customers = Customer::all();

        return view('salesorder.salesorderedit', compact('salesorder', 'customers'));
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'id_customer' => 'required',
            'produk' => 'required',
            'qty' => 'required',
            'harga_satuan' => 'required',
        ]);

        $salesorders = salesorder::findOrFail($id);

        $salesorders->update([
            'tgl' => $request->tanggal,
            'id_customer' => $request->id_customer,
            'produk' => $request->produk,
            'qty' => $request->qty,
            'hargasatuan' => $request->harga_satuan,
            'produk2' => $request->produk2,
            'qty2' => $request->qty2,
            'hargasatuan2' => $request->harga_satuan2,
            'produk3' => $request->produk3,
            'qty3' => $request->qty3,
            'hargasatuan3' => $request->harga_satuan3   
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
