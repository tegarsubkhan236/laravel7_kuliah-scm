<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption>
                Cleaning Share Fish Order
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong>#{{ $data->id }}</strong></th>
                    <th>{{ $data->created_at->format('D, d M Y') }}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Perusahaan: </h4>
                        <p>Cleaing Share Fish<br>
                            Jl Ninjaku<br>
                            085343966997<br>
                            support@CleaningShareFish.id
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Marketing: </h4>
                        <p>{{ $data->order->marketing->nama_marketing }}<br>
                        {{ $data->order->marketing->alamat_marketing }}<br>
                        {{ $data->order->marketing->hp_marketing }} <br>
                        {{ $data->order->marketing->email }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Produk</th>
                    <th>Jenis Cuci</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>{{ $data->order->barang }}</td>
                    <td>{{ $data->order->jenis->nama }}</td>
                    <td>Rp {{ number_format($data->order->jenis->harga) }}</td>
                    <td>Rp {{ number_format($data->order->jenis->harga) }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td>Rp {{ number_format($data->order->jenis->harga) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>