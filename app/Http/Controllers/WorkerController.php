<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Worker::all();
        return view('worker.worker.index', compact('data'));
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
            'nama_worker' => 'required',
            'email' => 'required',
            'hp_worker' => 'required',
            'alamat_worker' => 'required'
        ]);
        $data = new Worker;
        $data->nama_worker = $request->nama_worker;
        $data->email = $request->email;
        $data->hp_worker = $request->hp_worker;
        $data->alamat_worker = $request->alamat_worker;
        $data->save();
        return redirect('worker')->with('status', 'Data Worker berhasil di Tambah !');
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
        $data = Worker::find($id);
        return view("worker.worker.update", compact('data'));
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
            'nama_worker' => 'required',
            'email' => 'required',
            'hp_worker' => 'required',
            'alamat_worker' => 'required'
        ]);
        $data = Worker::find($id);
        $data->nama_worker = $request->nama_worker;
        $data->email = $request->email;
        $data->hp_worker = $request->hp_worker;
        $data->alamat_worker = $request->alamat_worker;
        $data->save();
        return redirect('worker')->with('status', 'Data Worker berhasil di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Worker::find($id);
        $data->delete();
        return redirect('worker')->with('status', 'Data worker berhasil di Delete!');
    }
}
