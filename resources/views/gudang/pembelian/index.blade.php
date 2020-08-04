@extends('main')
@section('title', 'Pembelian')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pembelian</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Pembelian</a></li>
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
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Pembelian</strong>
                    </div>
                    @if (Auth::user()->name == 'gudang')
                    <div class="pull-right">
                        <a href="{{ route('pembelian.create') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddModal">
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
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tanggal Beli</td>
                                <td>Supplier</td>
                                <td>Stock</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Total Harga</td>
                                <td>Keterangan</td>
                                @if (Auth::user()->name == 'gudang')
                                <td></td>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->supplier->nama_supplier }}</td>
                                <td>{{ $item->stock->nama }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $total = $item->harga * $item->jumlah }}</td>
                                <td>{{ $item->keterangan }}</td>
                                @if (Auth::user()->name == 'gudang')
                                <td class="text-center">
                                    <a href="{{ url('pembelian/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('pembelian',$item->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
    </div>
</div>

    <!-- add Modal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembelian</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{ url('pembelian') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <select name="supplier_id" class="form-control">
                        <option hidden> ==Pilih nama supplier==</option>
                        @foreach ($supplier as $x)
                        <option value="{{$x->id}}">{{$x->id}} - {{$x->nama_supplier}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Stock</label>
                    <select name="stock_id" class="form-control">
                        <option hidden> ==Pilih nama stock==</option>
                        @foreach ($stock as $x)
                        <option value="{{$x->id}}">{{$x->id}} - {{$x->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Pembelian</label>
                    <input type="number" 
                    name="jumlah" 
                    value="{{ old('jumlah') }}" 
                    class="form-control 
                    @error('jumlah') is-invalid @enderror" autofocus>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" 
                    name="harga" 
                    value="{{ old('harga') }}" 
                    class="form-control 
                    @error('harga') is-invalid @enderror" autofocus>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea 
                    name="keterangan" 
                    class="form-control 
                    @error('keterangan') is-invalid @enderror">
                    {{ old('keterangan') }}
                    </textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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