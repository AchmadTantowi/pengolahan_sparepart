@extends('admin.layouts.app')
@section('css')

@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Request Sparepart</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        {{-- @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif   --}}
        <form method="POST" id="insert_form">
          {{ csrf_field() }}
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body pad">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Request</label>
                <input value="{{$no_request}}" name="no_request" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Mesin</label>
                  <select class="form-control" name="kode_mesin" id="kode_mesin">
                    @foreach($mesins as $mesin)
                      <option value="{{$mesin->id}}">{{$mesin->nama}}</option> 
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select class="form-control" name="status_request">
                    <option value="">-- Pilih Status --</option>
                    <option value="Kerusakan">Kerusakan</option>
                    <option value="Rutinitas">Rutinitas</option>
                  </select>
                </div>
                <h3>Daftar Sparepart</h3>
                <div class="form-group">
                  <table class="table table-bordered" id="item_table">
                    <tr>
                      <th>Nama Part</th>
                      <th>Jumlah Barang</th>
                      <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
  <script type="text/javascript">
  $(document).ready(function(){

    // tambah list sparepart
    $(document).on('click', '.add', function(){
      var html = '';
      html += '<tr>';
      html += '<td><select name="kode_part[]" class="form-control item_unit"><option value="">Pilih Sparepart</option>@foreach($parts as $part)<option value="{{$part->kode_part}}">{{$part->nama_part}}</option>@endforeach</select></td>';
      html += '<td><input type="text" name="jumlah_barang[]" class="form-control item_quantity" /></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
      $('#item_table').append(html);
    });

    // delete list sparepart
    $(document).on('click', '.remove', function(){
      $(this).closest('tr').remove();
    });

    // simpan list sparepart
    $('#insert_form').on('submit', function(){
      event.preventDefault();   
      var form_data = $(this).serialize();
      $.ajax({
        url: '/admin/send-request',
        method: 'POST',
        data: form_data,
        success: function(data) {
          console.log("data", data);
          if(data.return == 'ok'){
            alert("Data terkirim");
            window.location = '/admin/request-sparepart';
          }
        }
      });
    });

  });
  
  </script>
  @stop