<html>
    <head></head>
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
    <body>
        <div width="50%">
            <div align="center">
                <h1>PT Torabika Eka Semesta</h1>
                <h3>Jalan Raya Serang KM.12,5, Bitung Jaya Village, Cikupa, Sukadamai, Cikupa, Sukadamai, Cikupa, Tangerang, Banten 15710</h3>
                <hr>
            </div>
            <p align="center"><b><u>Surat Penerimaan Barang dari Supplier</u></b></p>
            <table style="margin-left:20%;margin-right:20%;">
                <tr>
                    <td>No Invoice</td>
                    <td>:</td>
                    <td>{{ $received_spareparts->no_invoice }}</td>
                </tr>
                <tr>
                    <td>Nama Supplier</td>
                    <td>:</td>
                    <td>{{ $received_spareparts->nama_supplier }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{ $received_spareparts->tgl_terima }}</td>
                </tr>
                
            </table>
            <hr>
            <h3 align="center"><b><u>Daftar Sparepart</u></b></h3>
            <table id="parts" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Part</th>
                        <th>Nama Part</th>
                    </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($listSpareparts as $listSparepart)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $listSparepart->kode_part }}</td>
                    <td>{{ $listSparepart->nama_part}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <table style="margin-left:20%;margin-right:20%;width:210%;">
                <tr style="height:200px;">
                    <td>Admin</td>
                    <td>Supplier</td>
                </tr>
                <tr style="padding-top:100px;">
                    <td></td>
                    <td><b><u>{{ $received_spareparts->nama_supplier }}</u></b></td>
                </tr>
            </table>
        </div>
    </body>
</html>