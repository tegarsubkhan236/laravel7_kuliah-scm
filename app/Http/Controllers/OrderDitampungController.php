<?php

namespace App\Http\Controllers;

use App\JenisCuci;
use App\Marketing;
use App\Order;
use App\OrderDitampung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderDitampungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('marketing', 'jenis')->where('status', 'Dalam Pengerjaan')->get();
        $marketing = Marketing::all();
        $jenis = JenisCuci::all();
        return view('worker.order_process.index', compact('order', 'marketing', 'jenis'));
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
        //
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
        return view('worker.order_process.update', compact('data', 'marketing', 'jenis'));
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
            'status' => 'required',
        ]);
        $data = Order::find($id);
        $data->status = $request->status;
        $data->save();
        return redirect('order_ditampung')->with('status', 'Data Order berhasil di Update !');
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
