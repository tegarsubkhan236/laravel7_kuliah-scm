<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Stock;
use App\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembelian::all();
        $supplier = Supplier::all();
        $stock = Stock::all();
        return view('gudang.Pembelian.index', compact('data', 'supplier', 'stock'));
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

            'stock_id' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'keterangan' => 'nullable',
        ]);
        $data = new Pembelian;

        $data->stock_id = $request->stock_id;
        $data->supplier_id = $request->supplier_id;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->keterangan = $request->keterangan;
        $data->save();

        $stock = Stock::findOrFail($request->stock_id);
        $stock->stock += $request->jumlah;
        $stock->save();

        return redirect('pembelian')->with('status', 'Data Pembelian berhasil di Tambah !');
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
        $data = Pembelian::find($id);
        return view("gudang.Pembelian.update", compact('data', 'supplier'));
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

            'stock_id' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);
        $data = Pembelian::find($id);

        $data->stock_id = $request->stock_id;
        $data->supplier_id = $request->supplier_id;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect('pembelian')->with('status', 'Data Pembelian berhasil di Tambah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pembelian::find($id);
        $data->delete();
        return redirect('pembelian')->with('status', 'Data Pembelian berhasil di Delete!');
    }
}
