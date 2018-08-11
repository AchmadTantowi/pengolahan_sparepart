@extends('admin.layouts.app')
@section('css')
<style>
  #parts {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 60%;
  }

  #parts td, #parts th {
      border: 1px solid #ddd;
      padding: 8px;
  }

  #parts tr:nth-child(even){background-color: #f2f2f2;}

  #parts tr:hover {background-color: #ddd;}

  #parts th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #FE980F;
      color: white;
  }
</style>
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
            <form role="form" method="POST" action="/admin/request/update/{{ $request_spareparts->no_request }}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" name="nik" class="form-control" id="exampleInputEmail1" value="{{ $request_spareparts->nik }}" readonly>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Nama Karyawan</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="{{ $request_spareparts->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Mesin</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $request_spareparts->name }}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Request</label>
                  <input type="text" name="tgl" class="form-control" id="exampleInputEmail1" value="{{ $request_spareparts->tgl }}" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select class="form-control" name="status">
                      <option {{ $request_spareparts->status == 'Awaiting' ? 'selected':'' }}>Awaiting</option>
                      <option {{ $request_spareparts->status == 'Accept' ? 'selected':'' }}>Accept</option>
                      <option {{ $request_spareparts->status == 'Canceled' ? 'selected':'' }}>Canceled</option>
                  </select>
                </div>
              <h3 align="center"><b><u>Daftar Sparepart</u></b></h3>
              <table id="parts" align="center">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Part</th>
                          <th>Nama Part</th>
                          <th>Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                  @php($no = 1)
                  @foreach($listSpareparts as $listSparepart)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $listSparepart->kode_part }}</td>
                      <td>{{ $listSparepart->nama_part}}</td>
                      <td>{{ $listSparepart->jumlah}}</td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
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