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
                  <th>No Request</th>
                  <th>Nama karyawan</th>
                  <th>Status</th>
                  <th>Status Mesin</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($datas as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->no_request }}</td>
                  <td>{{ $data->name}}</td>
                  <td>
                    <small class="label bg-green">
                      {{ $data->status }}
                    </small>
                  </td>
                  <td>{{ $data->status_request }}</td>
                  <td>
                    <a href="/admin/request/edit/{{ $data->id }}">
                    Edit
                    </a> 
                    |
                    <a href="/admin/request/print/{{$data->id}}" target="_blank">
                      <i class="fa fa-print"></i> Print 
                    </a> 
                    {{-- |
                    <a href="/admin/content/delete/{{ $content->id }}">
                    Delete --}}
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