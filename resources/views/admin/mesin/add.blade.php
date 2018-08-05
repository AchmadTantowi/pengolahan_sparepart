@extends('admin.layouts.app')
@section('css')

@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Mesin</h1>
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
        
        <form method="POST" action="/admin/mesin/save">
              {{ csrf_field() }}
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Mesin</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1">
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