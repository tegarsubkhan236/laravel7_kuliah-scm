<?php

namespace App\Http\Controllers;

use App\JenisCuci;
use App\Marketing;
use App\Order;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('marketing', 'jenis')->get();
        $marketing = Marketing::all();
        $jenis = JenisCuci::all();
        return view('penjualan.order.index', compact('order', 'marketing', 'jenis'));
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
            'marketing_id' => 'required',
            'jenis_id' => 'required',
            'barang' => 'required',
            'status' => 'required',
        ]);
        $data = new Order;
        $data->marketing_id = $request->marketing_id;
        $data->jenis_id = $request->jenis_id;
        $data->barang = $request->barang;
        $data->status = $request->status;
        $data->save();
        return redirect('order')->with('status', 'Data Order berhasil di Tambah !');
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
        $data = Order::find($id);
        $marketing = Marketing::all();
        $jenis = JenisCuci::all();
        return view('penjualan.order.update', compact('data', 'marketing', 'jenis'));
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
            'marketing_id' => 'required',
            'jenis_id' => 'required',
            'barang' => 'required',
            'status' => 'required',
        ]);
        $data = Order::find($id);
        $data->marketing_id = $request->marketing_id;
        $data->jenis_id = $request->jenis_id;
        $data->barang = $request->barang;
        $data->status = $request->status;
        $data->save();
        return redirect('order')->with('status', 'Data Order berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect('order')->with('status', 'Data Order berhasil di Delete!');
    }
}
