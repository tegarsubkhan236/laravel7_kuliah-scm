<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDikerjakan;
use App\TemporaryStock;
use App\Worker;
use Illuminate\Http\Request;

class OrderDikerjakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finish_order = OrderDikerjakan::all();
        $order = Order::where('status', 'Dalam Pengerjaan')->get();
        $worker = Worker::all();
        $tempStock = TemporaryStock::all();
        return view('worker.order_process.finish_index', compact('finish_order', 'order', 'worker', 'tempStock'));
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
        $data = new OrderDikerjakan();

        $data->tempStock_id = $request->tempStock_id;
        $data->order_id = $request->order_id;
        $data->worker_id = $request->worker_id;
        $data->jumlah_bahan = $request->jumlah_bahan;
        $data->keterangan = $request->keterangan;
        $data->save();

        $tempstock = TemporaryStock::findOrFail($request->tempStock_id);
        $tempstock->stock -= $request->jumlah_bahan;
        $tempstock->save();

        $order = Order::findOrFail($request->order_id);
        $order->status = "Selesai";
        $order->save();

        return redirect('order_dikerjakan')->with('status', 'Data Pengerjaan berhasil di Tambah !');
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
