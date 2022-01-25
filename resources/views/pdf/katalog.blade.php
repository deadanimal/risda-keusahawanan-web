<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <style type="text/css">
        h4 {
            font-family: "Calibri", sans-serif;
            /* font-size: 11.1px; */
            font-weight: bold;
            font-style: normal;
            text-decoration: none;
            text-align: center
        }

        table,
        td,
        th {
            /* border: 1px solid black; */
            font-family: "Calibri", sans-serif;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            /* font-size: 13px; */
            color: white
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px
        }

        body {
            padding: 0px !important;
        }

        p, h2, h3 {
            color: white !important;
            font-family: "Calibri", sans-serif;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div style="position: absolute; left:-90px; top:-90px; z-index:0">
        <img src="image/KATALOG_REDS.pptx-removebg-preview.png" alt="" height="130px">
    </div>

    <div style="position: absolute; left:0px; top:-40px; color:white">
        <h2>{{ $katalog->namasyarikat }}</h2>
    </div>


    <div style="position: absolute; left:470px; top:-30px">
        <img src="image/KATALOG_REDS.pptx__1_-removebg-preview.png" alt="" height="40px">
    </div>

    <div style="position: absolute; left:530px; top:-40px;">
        <h2 style="color:black !important; font-weight: bold;">{{ $katalog->notelefon }}</h2>
    </div>

    <div style="
    position: absolute; 
    left:0px; 
    top:20px; 
    z-index:-1; 
    width:300px;
    padding: 30px;
    width: 700px;
    background-image:url(image/KATALOG_REDS.pptx__2_-removebg-preview.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-size: 100% 100%;
    ">
        {{-- <img src="image/KATALOG_REDS.pptx__2_-removebg-preview.png" alt="" height="550px"> --}}


        <P>ALAMAT : {{ $katalog->alamat1}}, {{ $katalog->alamat2}}, {{ $katalog->alamat3}}, {{ $katalog->poskod}}, {{ $katalog->Negeri}}</P>

        <P>GPS LANGITUD/ LONGITUD : {{ $katalog->latitud}} / {{ $katalog->logitud}}</P>

        <P>PEMASARAN : </P>

        <p>&nbsp;&nbsp; FACEBOOK : {{ $katalog->facebook}}</p>
        <p>&nbsp;&nbsp; INSTAGRAM : {{ $katalog->instagram}}</p>
        <p>&nbsp;&nbsp; TWITTER : {{ $katalog->twitter}}</p>
        <p>&nbsp;&nbsp; LAMAN WEB : {{ $katalog->lamanweb}}</p>
        <br>

        <p style="text-decoration: underline; font-weight:bold">{{ $katalog->nama_produk }}</p>
        <table>
            <tr>
                <td style="width: 150px">KANDUNGAN</td>
                <td>: {{ $katalog->kandungan_produk }}</td>
            </tr>
            <tr>
                <td>BERAT (NET)</td>

                <td>: {{ $katalog->berat_produk }} kg</td>
            </tr>

            <tr>
                <td>HARGA JUALAN</td>

                <td>: RM {{ $katalog->harga_produk }}</td>
            </tr>
        </table>

    </div>



    <div style="position: absolute; left:750px; top:40px">
        <img src="image/KATALOG_REDS.pptx__3_-removebg-preview.png" alt="" height="320px">
    </div>

    <div style="
    position: absolute; 
    left:770px; 
    top:35px; 
    width:250px; 
    height: 300px; 
    background-image:url({{ $katalog->gambar_url }});
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-size: 100% 100%;
    text-align:center
    ">
        {{-- <img src="{{$katalog->gambar_url}}" alt="" height="200px"> --}}
    </div>

    <div style="
    position: absolute; 
    left:790px; 
    top:300px; 
    z-index:2; 
    width:200px;
    padding: 10px;
    background-image:url(image/KATALOG_REDS.pptx__2_-removebg-preview.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-size: 100% 100%;
    text-align:center
    ">
        <p><i>{{ $katalog->nama_produk }} </i> </p>

    </div>







</body>
