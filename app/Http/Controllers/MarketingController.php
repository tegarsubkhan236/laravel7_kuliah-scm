<?php

namespace App\Http\Controllers;

use App\Marketing;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marketing = Marketing::all();
        return view("penjualan.marketing.index", compact('marketing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("penjualan.marketing.create");
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
            'nama_marketing' => 'required',
            'email' => 'required',
            'hp_marketing' => 'required',
            'alamat_marketing' => 'required'
        ]);
        $marketing = new Marketing;
        $marketing->nama_marketing = $request->nama_marketing;
        $marketing->email = $request->email;
        $marketing->hp_marketing = $request->hp_marketing;
        $marketing->alamat_marketing = $request->alamat_marketing;
        $marketing->save();
        return redirect('marketing')->with('status', 'Data marketing berhasil di Tambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show(Marketing $marketing)
    {
        $marketing = Marketing::all();
        return view("penjualan.marketing.index", compact('marketing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketing $marketing)
    {
        $data = Marketing::find($marketing)->first();
        return view("penjualan.marketing.update", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marketing $marketing)
    {
        $validatedData = $request->validate([
            'nama_marketing' => 'required',
            'email' => 'required',
            'hp_marketing' => 'required',
            'alamat_marketing' => 'required'
        ]);
        $marketing = Marketing::find($marketing)->first();
        $marketing->nama_marketing = $request->nama_marketing;
        $marketing->email = $request->email;
        $marketing->hp_marketing = $request->hp_marketing;
        $marketing->alamat_marketing = $request->alamat_marketing;
        $marketing->save();
        return redirect('marketing')->with('status', 'Data marketing berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketing $marketing)
    {
        $data = Marketing::find($marketing)->first();
        $data->delete();
        return redirect('marketing')->with('status', 'Data marketing berhasil di Delete!');
    }
}
