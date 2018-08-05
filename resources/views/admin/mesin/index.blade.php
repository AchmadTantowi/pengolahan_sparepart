@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Mesin</h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <a href="/admin/mesin/add" class="btn btn-primary">+ Add</a>
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
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($mesins as $mesin)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mesin->nama }}</td>
                  <td>{{ $mesin->keterangan }}</td>
                  <td>
                    {{-- <a href="/admin/content/edit/{{ $content->id }}">
                    Edit
                    </a> |
                    <a href="/admin/content/delete/{{ $content->id }}">
                    Delete
                    </a> --}}
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