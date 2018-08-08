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
        
        {{-- <form method="POST" action="/admin/received/save"> --}}
          <form method="POST" id="insert_form">
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
                  <label for="exampleInputEmail1">Supplier</label>
                  <select class="form-control" name="supplier">
                      @foreach($suppliers as $supplier)
                          <option value="{{$supplier->id}}">{{$supplier->nama}}</option> 
                      @endforeach
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

    // simpan penerimaan
    $('#insert_form').on('submit', function(){
      event.preventDefault();   
      var form_data = $(this).serialize();
      $.ajax({
        url: '/admin/received/save',
        method: 'POST',
        data: form_data,
        success: function(data) {
          console.log("data", data);
          if(data.return == 'ok'){
            alert("Data terkirim");
            window.location = '/admin/received ';
          }
        }
      });
    });
  
  });
  </script>
   
  @stop