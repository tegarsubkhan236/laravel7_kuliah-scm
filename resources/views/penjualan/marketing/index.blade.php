@extends('main')
@section('title', 'Marketing')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Marketing</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Marketing</a></li>
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
                        <strong>Data Marketing</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('marketing.create') }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddModal">
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
                                <td>Nama Marketing</td>
                                <td>Email</td>
                                <td>No HP</td>
                                <td>Alamat</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marketing as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_marketing }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->hp_marketing }}</td>
                                <td>{{ $item->alamat_marketing }}</td>
                                <td class="text-center">
                                    <a href="{{ url('marketing/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('marketing',$item->id) }}" class="d-inline" method="post" onsubmit="return confirm('Yakin hapus data ini?')">
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Marketing</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <form action="{{ url('marketing') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Marketing</label>
                    <input type="text" 
                    name="nama_marketing" 
                    value="{{ old('nama_marketing') }}" 
                    class="form-control 
                    @error('nama_marketing') is-invalid @enderror" autofocus>
                    @error('nama_marketing')
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
                    name="hp_marketing" 
                    value="{{ old('hp_marketing') }}" 
                    class="form-control 
                    @error('hp_marketing') is-invalid @enderror" 
                    autofocus
                    >
                    @error('hp_marketing')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea 
                    name="alamat_marketing" 
                    class="form-control 
                    @error('alamat_marketing') is-invalid @enderror"
                    >
                    {{ old('alamat_marketing') }}
                    </textarea>
                    @error('alamat_marketing')
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