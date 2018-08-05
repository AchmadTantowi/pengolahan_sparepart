@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Request</h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <a href="/admin/received/add" class="btn btn-primary">+ Add</a>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Nama Part</th>
                  <th>Supplier</th>
                  <th>Jml Barang</th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($datas as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->no_invoice}}</td>
                  <td>{{ $data->nama_part }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->jml_barang }}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @stop
  @section('script')
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
        });
    });
    </script>
  @stop