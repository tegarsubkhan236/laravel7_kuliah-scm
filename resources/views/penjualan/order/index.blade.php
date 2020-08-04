@extends('main')
@section('title', 'Order')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Order</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Order</a></li>
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
                        <strong>Data Order</strong>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddModal">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
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
                                <td>No.</td>
                                <td>Nama Marketing</td>
                                <td>Jenis Cuci</td>
                                <td>Barang</td>
                                <td>Tanggal Order</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->marketing->nama_marketing }}</td>
                                <td>{{ $item->jenis->nama }}</td>
                                <td>{{ $item->barang }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="text-center">
                                    <a href="{{ url('order/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('order',$item->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
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
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Order</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{ url('order') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Marketing</label>
                    <select name="marketing_id" class="form-control">
                        <option hidden>==Pilih nama marketing==</option>
                        @foreach ($marketing as $x)
                        <option value="{{$x->id}}">{{$x->id}} - {{$x->nama_marketing}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis Cuci</label>
                    <select name="jenis_id" class="form-control">
                        <option hidden> ==Pilih jenis cuci==</option>
                        @foreach ($jenis as $x)
                        <option value="{{$x->id}}">{{$x->id}} - {{$x->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Barang</label>
                    <input type="text" 
                    name="barang" 
                    value="{{ old('barang') }}" 
                    class="form-control 
                    @error('barang') is-invalid @enderror" autofocus>
                    @error('barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" value="Diterima" readonly>
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
