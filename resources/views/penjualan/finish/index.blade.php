@extends('main')
@section('title', 'Order')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Order Selesai</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Order Selesai</a></li>
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
                        <strong>Data Order Selesai</strong>
                    </div>
                    {{-- <div class="pull-right">
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddModal">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div> --}}
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
                                <th>Tanggal Selesai</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                @if (Auth::user()->name == "penjualan")
                                <th>Cetak Nota</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finish_order as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->order->id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->order->jenis->harga }}</td>
                                @if (Auth::user()->name == "penjualan")
                                <td class="text-center">
                                    <a href="{{ url('finish/'.$item->id) }}" class="btn btn-primary btn-sm">
                                        Nota
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection