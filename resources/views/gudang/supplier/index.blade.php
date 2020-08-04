@extends('main')
@section('title', 'Supplier')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Supplier</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Supplier</a></li>
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
                        <strong>Data Supplier</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('supplier.create') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddModal">
                            <i class="fa fa-plus"></i>add
                        </a>
                    </div>
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
                                <td>Nama Supplier</td>
                                <td>Email</td>
                                <td>No HP</td>
                                <td>Alamat</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_supplier }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->hp_supplier }}</td>
                                <td>{{ $item->alamat_supplier }}</td>
                                <td class="text-center">
                                    <a href="{{ url('supplier/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('supplier',$item->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
    </div>
</div>

    <!-- add Modal-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{ url('supplier') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" 
                    name="nama_supplier" 
                    value="{{ old('nama_supplier') }}" 
                    class="form-control 
                    @error('nama_supplier') is-invalid @enderror" autofocus>
                    @error('nama_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    class="form-control 
                    @error('email') is-invalid @enderror" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input 
                    type="text" 
                    name="hp_supplier" 
                    value="{{ old('hp_supplier') }}" 
                    class="form-control 
                    @error('hp_supplier') is-invalid @enderror" 
                    autofocus
                    >
                    @error('hp_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea 
                    name="alamat_supplier" 
                    class="form-control 
                    @error('alamat_supplier') is-invalid @enderror"
                    >
                    {{ old('alamat_supplier') }}
                    </textarea>
                    @error('alamat_supplier')
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