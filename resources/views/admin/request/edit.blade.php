@extends('admin.layouts.app')
@section('css')
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit product
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif  
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/admin/request/update/{{ $getRequest->id }}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Karyawan</label>
                <select class="form-control" name="nik">
                    @foreach($users as $user)
                        <option value="{{ $user->nik }}" {{ $user->nik == $getRequest->nik ? 'selected':'' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Sparepart</label>
                <select class="form-control" name="kode_part">
                    @foreach($spareparts as $sparepart)
                        <option value="{{ $sparepart->kode_part }}" {{ $sparepart->kode_part == $getRequest->kode_part ? 'selected':'' }}>{{ $sparepart->nama_part }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" value="{{ $getRequest->jumlah }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select class="form-control" name="status">
                        <option {{ $getRequest->status == 'Awaiting' ? 'selected':'' }}>Awaiting</option>
                        <option {{ $getRequest->status == 'Accept' ? 'selected':'' }}>Accept</option>
                        <option {{ $getRequest->status == 'Canceled' ? 'selected':'' }}>Canceled</option>
                    </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('script')
  @stop