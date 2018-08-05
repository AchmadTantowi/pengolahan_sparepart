@extends('admin.layouts.app')
@section('css')

@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Penerimaan Barang</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
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
        
        <form method="POST" action="/admin/received/save">
              {{ csrf_field() }}
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Invoice</label>
                  <input type="text" name="no_invoice" value="{{$no_invoice}}" class="form-control" id="exampleInputEmail1" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Part</label>
                    <select class="form-control" name="kode_part">
                        @foreach($parts as $part)
                            <option value="{{$part->kode_part}}">{{$part->nama_part}}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Supplier</label>
                    <select class="form-control" name="supplier">
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->nama}}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" class="form-control" id="exampleInputEmail1">
                </div>
              </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('script')
   
  @stop