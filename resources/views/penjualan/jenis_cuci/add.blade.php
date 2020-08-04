@extends('main')
@section('title', 'Jenis Cuci')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Jenis Cuci</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Jenis Cuci</a></li>
                    <li class="">Data</li>
                    <li class="active">Add</li>
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
                        <strong>Data Jenis Cuci</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('cuci') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('cuci') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Jenis Cuci</label>
                                    <input type="text" 
                                    name="nama" 
                                    value="{{ old('nama') }}" 
                                    class="form-control 
                                    @error('nama') is-invalid @enderror" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" 
                                    name="harga" 
                                    value="{{ old('harga') }}" 
                                    class="form-control 
                                    @error('harga') is-invalid @enderror" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Pengerjaan / hari</label>
                                    <input 
                                    type="text" 
                                    name="pengerjaan" 
                                    value="{{ old('pengerjaan') }}" 
                                    class="form-control 
                                    @error('pengerjaan') is-invalid @enderror" 
                                    autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea 
                                    name="desc" 
                                    class="form-control 
                                    @error('desc') is-invalid @enderror">
                                    </textarea>
                                </div>
                                <button class="btn btn-success" type="submit">Save</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection