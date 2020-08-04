@extends('main')
@section('title', 'Order')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Order Dikerjakan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Order Dikerjakan</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Order Dikerjakan</strong>
                    </div>
                    @if (Auth::user()->name == 'worker')
                    <div class="pull-right">
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddModal">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
                    @endif
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Nama Worker</th>
                                <th>Bahan Digunakan</th>
                                <th>Jumlah Bahan</th>
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finish_order as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->order->id }}</td>
                                <td>{{ $item->worker->nama_worker }}</td>
                                <td>{{ $item->tempStock->nama }}</td>
                                <td>{{ $item->jumlah_bahan }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- add Modal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dikerjakan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{ url('order_dikerjakan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Order ID</label>
                    <select name="order_id" class="form-control">
                        <option hidden>==Pilih Order==</option>
                        @foreach ($order as $x)
                        <option value="{{$x->id}}">{{$x->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Worker</label>
                    <select name="worker_id" class="form-control">
                        <option hidden> ==Pilih Worker==</option>
                        @foreach ($worker as $x)
                        <option value="{{$x->id}}">{{$x->id}} - {{$x->nama_worker}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Bahan</label>
                    <select name="tempStock_id" class="form-control">
                        <option hidden> ==Pilih Bahan==</option>
                        @foreach ($tempStock as $x)
                        <option value="{{$x->id}}">{{$x->id}} - {{$x->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Bahan</label>
                    <input type="number" name="jumlah_bahan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" cols="10" rows="10" class="form-control"></textarea>
                </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
    </div>
    </div>
</div>
{{-- end AddModal --}}
@endsection
