<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Supplier;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = Stock::all();
        return view('gudang.stock.index', compact('stock'));
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

            'stock' => 'required',
            'nama' => 'required',
        ]);
        $data = new Stock;

        $data->stock = $request->stock;
        $data->nama = $request->nama;
        $data->save();
        return redirect('stock')->with('status', 'Data Stock berhasil di Tambah !');
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
        $data = Stock::find($id);
        return view("gudang.stock.update", compact('data', 'supplier'));
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

            'stock' => 'required',
            'nama' => 'required',
        ]);
        $data = Stock::find($id);

        $data->stock = $request->stock;
        $data->nama = $request->nama;
        $data->save();
        return redirect('stock')->with('status', 'Data Stock berhasil di Tambah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Stock::find($id);
        $data->delete();
        return redirect('stock')->with('status', 'Data stock berhasil di Delete!');
    }
}
