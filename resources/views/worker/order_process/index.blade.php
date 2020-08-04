@extends('main')
@section('title', 'Order')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Order Ditampung</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Order Ditampung</a></li>
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
                        <strong>Data Order Ditampung</strong>
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
                                <td>ID.</td>
                                {{-- <td>Nama Marketing</td> --}}
                                <td>Jenis Cuci</td>
                                <td>Barang</td>
                                <td>Tanggal Order</td>
                                <td>Status</td>
                                {{-- <td>Action</td> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                {{-- <td>{{ $item->marketing->nama_marketing }}</td> --}}
                                <td>{{ $item->jenis->nama }}</td>
                                <td>{{ $item->barang }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status }}</td>
                                {{-- <td class="text-center">
                                    <a href="{{ url('order_ditampung/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
