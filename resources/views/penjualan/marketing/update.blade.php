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
                    <li class="">Data</li>
                    <li class="active">Edit</li>
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
                        <strong>Data Marketing</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('marketing') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('marketing',$data->id) }}" method="POST">
                                @method("PATCH")
                                @csrf
                                <div class="form-group">
                                    <label>Nama Marketing</label>
                                    <input 
                                    type="text" 
                                    name="nama_marketing" 
                                    class="form-control 
                                    @error('nama_marketing') is-invalid @enderror" 
                                    autofocus 
                                    value="{{old('nama_marketing', $data->nama_marketing)}}"
                                    >
                                    @error('nama_marketing')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control 
                                    @error('email') is-invalid @enderror" 
                                    autofocus 
                                    value="{{old('email', $data->email)}}"
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input 
                                    type="text" 
                                    name="hp_marketing" 
                                    class="form-control 
                                    @error('hp_marketing') is-invalid @enderror" 
                                    autofocus 
                                    value="{{old('hp_marketing', $data->hp_marketing)}}"
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
                                    {{old('alamat_marketing', $data->alamat_marketing)}}
                                    </textarea>
                                    @error('alamat_marketing')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
@endsection