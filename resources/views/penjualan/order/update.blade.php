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
                        <strong>Data Order</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('order') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('order',$data->id) }}" method="POST">
                                @method("PATCH")
                                @csrf
                                <div class="form-group">
                                    <label>Nama Marketing</label>
                                    <input type="hidden" name="id" class="form-control" id="id">
                                    <select name="marketing_id" class="form-control" id="marketing_id">
                                        <option hidden> ==Pilih nama marketing==</option>
                                        @foreach ($marketing as $x)
                                        <option value="{{ $x->id }}" {{ $x->id == $x->id ? 'selected' : '' }}>{{$x->id}} - {{$x->nama_marketing}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Cuci</label>
                                    <select name="jenis_id" class="form-control" id="jenis_id">
                                        <option hidden> ==Pilih jenis cuci==</option>
                                        @foreach ($jenis as $x)
                                        <option value="{{ $x->id }}" {{ $x->id == $x->id ? 'selected' : '' }}>{{$x->id}} - {{$x->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Barang</label>
                                    <input type="text" name="barang" class="form-control @error('barang') is-invalid @enderror" autofocus value="{{old('barang', $data->barang)}}">
                                    @error('barang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option @if(old('status',$data->status) == 'Diterima') selected @endif> Diterima </option>
                                        <option @if(old('status',$data->status) == 'Dalam Pengerjaan') selected @endif> Dalam Pengerjaan </option>
                                    </select>
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