@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>User</h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <a href="/admin/user/add" class="btn btn-primary">+ Add</a>
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
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Email</th>
                  {{-- <th>Divisi</th> --}}
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($users as $user)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $user->nik }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  {{-- <td>{{ $user->divisi }}</td> --}}
                  <td>
                    <a href="/admin/user/edit/{{ $user->id }}">
                    Edit
                    </a> |
                    <a href="/admin/user/delete/{{ $user->id }}">
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