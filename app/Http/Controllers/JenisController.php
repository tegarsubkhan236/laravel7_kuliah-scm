<?php

namespace App\Http\Controllers;

use App\JenisCuci;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = JenisCuci::all();
        return view('penjualan.jenis_cuci.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan.jenis_cuci.add');
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
            'nama' => 'required',
            'harga' => 'required',
            'pengerjaan' => 'required',
            'desc' => 'required'
        ]);
        $data = new JenisCuci;
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->pengerjaan = $request->pengerjaan;
        $data->desc = $request->desc;
        $data->save();
        return redirect('cuci')->with('status', 'Data Jenis Cuci berhasil di Tambah !');
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
        $data = JenisCuci::find($id);
        return view("penjualan.jenis_cuci.update", compact('data'));
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
            'nama' => 'required',
            'harga' => 'required',
            'pengerjaan' => 'required',
            'desc' => 'required'
        ]);
        $data = JenisCuci::find($id);
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->pengerjaan = $request->pengerjaan;
        $data->desc = $request->desc;
        $data->save();
        return redirect('cuci')->with('status', 'Data Jenis Cuci berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = JenisCuci::find($id);
        $data->delete();
        return redirect('cuci')->with('status', 'Data Jenis Cuci berhasil di Delete!');
    }
}
