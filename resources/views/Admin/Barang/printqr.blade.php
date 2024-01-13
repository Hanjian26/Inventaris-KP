<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print QR Code Barang</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            padding: 10px;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 16px;
            text-align: center;
        }
        .font-bold{
            font-weight: 600;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="grid-container">
        @foreach ($barang as $b)
            <div class="grid-item">
                <img width="40%" style="margin-bottom: 1rem;" src="{{asset('storage/barang/' . $b->barang_qr)}}"/>
                <br/>
                <span>{{$b->barang_kode}}</span>
                <br/>
                <span class="font-bold">{{$b->barang_nama}}</span>
            </div>
        @endforeach
    </div>
</body>

</html>
