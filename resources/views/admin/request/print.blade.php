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
            <p align="center"><b><u>Form Permintaan Sparepart</u></b></p>
            <table style="margin-left:20%;margin-right:20%;">
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{ $request_spareparts->nik }}</td>
                </tr>
                <tr>
                    <td>Nama Karyawan</td>
                    <td>:</td>
                    <td>{{ $request_spareparts->name }}</td>
                </tr>
                <tr>
                    <td>Nama Mesin</td>
                    <td>:</td>
                    <td>{{ $request_spareparts->nama }}</td>
                </tr>
                <tr>
                    <td>No Request</td>
                    <td>:</td>
                    <td>{{ $request_spareparts->no_request }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>{{ $request_spareparts->status_request }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{ $request_spareparts->tgl }}</td>
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
            <table style="margin-left:20%;margin-right:20%;width:100%;">
                <tr style="height:200px;">
                    <td>Admin</td>
                    <td>Mekanik</td>
                </tr>
                <tr style="padding-top:100px;">
                    <td></td>
                    <td><b><u>{{ $request_spareparts->name }}</u></b></td>
                </tr>
            </table>
        </div>
    </body>
</html>