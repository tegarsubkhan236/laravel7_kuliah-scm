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
                        <a href="{{ url('order_ditampung') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i>Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('order_ditampung',$data->id) }}" method="POST">
                                @method("PATCH")
                                @csrf
                                <div class="form-group">
                                    <label>Nama Marketing</label>
                                    <input type="text" value="{{ $data->marketing->nama_marketing }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Cuci</label>
                                    <input type="text" value="{{ $data->jenis->nama }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Barang</label>
                                    <input type="text" value="{{ $data->barang }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option @if(old('status',$data->status) == 'Dalam Pengerjaan') selected @endif> Dalam Pengerjaan </option>
                                        <option @if(old('status',$data->status) == 'Dikerjakan') selected @endif> Dikerjakan </option>
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