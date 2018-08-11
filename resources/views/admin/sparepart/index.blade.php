@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Sparepart</h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <a href="/admin/sparepart/add" class="btn btn-primary">+ Add</a>
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
                  <th>Kode Part</th>
                  <th>Nama</th>
                  <th>Stok</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($spareparts as $sparepart)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $sparepart->kode_part }}</td>
                  <td>{{ $sparepart->nama_part }}</td>
                  <td>{{ $sparepart->stok }}</td>
                  <td>Rp. {{ number_format($sparepart->harga,0, ',' , '.') }}</td>
                  <td>
                    <a href="/admin/sparepart/edit/{{ $sparepart->id }}">
                    Edit
                    </a> |
                    <a href="/admin/sparepart/delete/{{ $sparepart->id }}">
                    Delete
                    </a>
                  </td>
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