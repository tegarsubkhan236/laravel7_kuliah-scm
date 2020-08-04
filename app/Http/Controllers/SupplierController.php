<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('gudang.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_supplier' => 'required',
            'email' => 'required',
            'hp_supplier' => 'required',
            'alamat_supplier' => 'required'
        ]);
        $data = new Supplier;
        $data->nama_supplier = $request->nama_supplier;
        $data->email = $request->email;
        $data->hp_supplier = $request->hp_supplier;
        $data->alamat_supplier = $request->alamat_supplier;
        $data->save();
        return redirect('supplier')->with('status', 'Data Supplier berhasil di Tambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Supplier::find($id);
        return view("gudang.supplier.update", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_supplier' => 'required',
            'email' => 'required',
            'hp_supplier' => 'required',
            'alamat_supplier' => 'required'
        ]);
        $data = Supplier::find($id);
        $data->nama_supplier = $request->nama_supplier;
        $data->email = $request->email;
        $data->hp_supplier = $request->hp_supplier;
        $data->alamat_supplier = $request->alamat_supplier;
        $data->save();
        return redirect('supplier')->with('status', 'Data Supplier berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Supplier::find($id)->first();
        $data->delete();
        return redirect('supplier')->with('status', 'Data supplier berhasil di Delete!');
    }
}
