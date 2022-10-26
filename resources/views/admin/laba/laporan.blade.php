<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Laba</title>
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Laporan Laba</h4>
        </center>
        <table class='table table-bordered' style="width:95%;margin:0 auto;">
            <thead>
                <tr>
                    <th class="border-top-0">ID</th>
                    <th class="border-top-0">Tanggal Transaksi</th>
                    <th class="border-top-0">Uang Masuk</th>
                    <th class="border-top-0">Uang Keluar</th>
                    <th class="border-top-0">Laba</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laba as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->uang_masuk }}</td>
                        <td>{{ $item->uang_keluar }}</td>
                        <td>{{ $item->laba }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>