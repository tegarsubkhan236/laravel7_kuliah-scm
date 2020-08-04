<?php

namespace App\Http\Controllers;

use App\TemporaryStock;
use Illuminate\Http\Request;

class TemporaryStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TemporaryStock::all();
        return view('worker.temp_stock.index', compact('data'));
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
        $data = new TemporaryStock;

        $data->stock = $request->stock;
        $data->nama = $request->nama;
        $data->save();
        return redirect('temp_stock')->with('status', 'Data Temporary Stock berhasil di Tambah !');
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
        $data = TemporaryStock::find($id);
        return view("worker.temp_stock.update", compact('data'));
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
        $data = TemporaryStock::find($id);

        $data->stock = $request->stock;
        $data->nama = $request->nama;
        $data->save();
        return redirect('temp_stock')->with('status', 'Data Temporary Stock berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TemporaryStock::find($id);
        $data->delete();
        return redirect('stock')->with('status', 'Data stock berhasil di Delete!');
    }
}
