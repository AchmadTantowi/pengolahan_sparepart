@extends('admin.layouts.app')
@section('css')

@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Laporan Kerusakan Mesin</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        <form method="POST" action="/admin/laporan/print" target="_blank">
              {{ csrf_field() }}
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>Dari tanggal
                  <input type="date" name="start_date" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sampai tanggal</label>
                    <input type="date" name="end_date" class="form-control" id="exampleInputEmail1">
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Status Request</label>
                    <select name="status" class="form-control">
                        <option value="All">All</option>
                        <option value="Awating">Awating</option>
                        <option value="Accept">Accept</option>
                        <option value="Canceled">Canceled</option>
                    </select>
                </div> --}}
              </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Print</button>
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