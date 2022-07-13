<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('customer.customer', compact('customers'));
    }

    public function create()
    {
        return view('customer.customercreate');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_customer' => 'required|string|max:50',
            'alamat' => 'required',
            'nohp' => 'required'
        ]);

        $barangs = Customer::create([
            'nm_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            
        ]);
        if ($barangs) {
            return redirect()
                ->route('customer.index')
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
        $customer = Customer::findOrFail($id);
        return view('customer.customershow', compact('customer'));
    }

    
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.customeredit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_customer' => 'required|string|max:155',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        $customers = Customer::findOrFail($id);

        $customers->update([
            'nm_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp
        ]);

        if ($customers) {
            return redirect()
                ->route('customer.index')
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
        $customers = Customer::findOrFail($id);
        $customers->delete();

        if ($customers) {
            return redirect()
                ->route('customer.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('customer.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }    
}    

}
