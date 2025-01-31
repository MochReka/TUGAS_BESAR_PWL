<!DOCTYPE html>

<html lang="en">

    <head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    </head>

    <body>

        <h1 class="text-center">Data Barang</h1>

        <p class="text-center">Laporan Data Barang Tahun 2024</p>

        <br/>

        <table id="table-data" class="table table-bordered">

            <thead>

                <tr>

                    <th>NO</th>

                    <th>Tanggal Masuk</th>

                    <th>Kode Barang Masuk</th>

                    <th>Jumlah Barang Masuk</th>

                </tr>

            </thead>

            <tbody>

                @php $num = 1; @endphp

                @foreach($barang_masuk as $barangmasuk)

                    <tr>

                        <td>{{ $num++ }}</td>

                        <td>{{ $barangmasuk->tgl_masuk }}</td>

                        <td>{{ $barangmasuk->kode_barang_masuk }}</td>

                        <td>{{ $barangmasuk->jumlah_masuk }}</td>

                    </tr>

                @endforeach

                

            </tbody>

        </table>

    </body>

</html> 