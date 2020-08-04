<?php

namespace App\Http\Controllers;

use App\Penyaluran;
use App\Stock;
use App\TemporaryStock;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penyaluran::all();
        $temp_stock = TemporaryStock::all();
        $stock = Stock::all();
        return view('gudang.penyaluran.index', compact('data', 'temp_stock', 'stock'));
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

            'id' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'nullable',
        ]);
        $data = new Penyaluran;

        $id = $request['id'];
        $id_explode = explode('|', $id);

        $data->stock_id = $id_explode[0];
        $data->temp_stock_id = $id_explode[1];
        $data->jumlah = $request->jumlah;
        $data->keterangan = $request->keterangan;
        $data->save();

        $stock = Stock::findOrFail($id_explode[0]);
        $stock->stock -= $request->jumlah;
        $stock->save();

        $temp_stock = TemporaryStock::findOrFail($id_explode[1]);
        $temp_stock->stock += $request->jumlah;
        $temp_stock->save();

        return redirect('penyaluran')->with('status', 'Data Penyaluran berhasil di Tambah !');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
