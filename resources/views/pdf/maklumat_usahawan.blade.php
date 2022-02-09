<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <style type="text/css">
        span.cls_001 {
            font-family: "Calibri Bold", sans-serif;
            font-size: 12px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        span.cls_002 {
            font-family: "Calibri Bold", sans-serif;
            font-size: 12px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }

        span.cls_003 {
            font-family: "Calibri Bold", sans-serif;
            font-size: 14px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }

        div.cls_002 {
            font-family: "Calibri Bold", sans-serif;
            font-size: 9.8px;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }


        table,
        th,
        td {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px;
            /* font-family: Arial, sans-serif;
            font-size: 12px; */
        }

        .border_black {
            border: 1px solid black;
        }

        th {
            text-align: left;
        }

        h2,
        h4 {
            font-family: Arial, sans-serif;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-style: normal;
            text-decoration: none
        }

    </style>
    <script type="text/javascript"
        src="e5e32482-6f8c-11ec-a980-0cc47a792c0a_id_e5e32482-6f8c-11ec-a980-0cc47a792c0a_files/wz_jsgraphics.js"></script>
</head>

<body>
    <div style="margin:20px">


        {{-- <div style="position:absolute;left:156.36px;top:52.06px" class="cls_002"><span
                class="cls_002">MAKLUMAT PENUH USAHAWAN</span>
        </div> --}}

        <h2 style="text-align: center">MAKLUMAT PENUH USAHAWAN</h2>

        <h4>PROFIL USAHAWAN</h4>


        <table style="width: 100%;">

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Peribadi</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Negeri Premis Perniagaan</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->negeri->Negeri }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Pusat Tanggungjawab</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->PT->keterangan }}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">No. Usahawan</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->usahawanid }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Nama Penuh</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->namausahawan }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">No. Kad Pengenalan</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->nokadpengenalan }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Tarikh Lahir</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->tarikhlahir }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Jantina</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->U_Jantina_ID == 1)
                            LELAKI
                        @else
                            PEREMPUAN
                        @endif
                    </span>
                </td>

                <td>
                    <span class="cls_002">Status Perkahwinan</span>
                </td>
                <td>
                    <span class="cls_001" style="text-transform: uppercase">
                        @if ($usahawan->statusperkahwinan == 1)
                            Tidak Pernah Berkahwin

                        @elseif ($usahawan->statusperkahwinan == 2)
                            Berkahwin

                        @elseif ($usahawan->statusperkahwinan == 3)
                            Balu / Duda

                        @elseif ($usahawan->statusperkahwinan == 4)
                            Bercerai

                        @elseif ($usahawan->statusperkahwinan == 5)
                            Berpisah

                        @elseif ($usahawan->statusperkahwinan == 9)
                            Tiada maklumat
                        @endif
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Bangsa</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->U_Bangsa_ID == 1)
                            Melayu
                        @elseif ($usahawan->U_Bangsa_ID == 2)
                            Orang Asli Semenanjung
                        @elseif ($usahawan->U_Bangsa_ID == 3)
                            Bumiputera Sabah
                        @elseif ($usahawan->U_Bangsa_ID == 4)
                            Bumiputera Sarawak
                        @elseif ($usahawan->U_Bangsa_ID == 5)
                            Cina
                        @elseif ($usahawan->U_Bangsa_ID == 6)
                            India
                        @elseif ($usahawan->U_Bangsa_ID == 7)
                            Lain-lain
                        @endif
                    </span>
                </td>

                <td>
                    <span class="cls_002">Etnik</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->etnik->Etnik }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Tahap Pendidikan</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->U_Pendidikan_ID == 1)
                            Tidak Bersekolah
                        @elseif ($usahawan->U_Pendidikan_ID == 2)
                            Sekolah Rendah / Setara
                        @elseif ($usahawan->U_Pendidikan_ID == 3)
                            Sekolah Menengah / Setara
                        @elseif ($usahawan->U_Pendidikan_ID == 4)
                            Kolej / Universiti / Setara
                        @endif
                    </span>
                </td>

                <td>
                    <span class="cls_002">Taraf Kelulusan</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->U_Pendidikan_ID == 1)
                            UPSR/PSRA/Setaraf
                        @elseif ($usahawan->U_Pendidikan_ID == 2)
                            PMR/SRP/LCE/Setaraf
                        @elseif ($usahawan->U_Pendidikan_ID == 3)
                            SPM/MCE/Setaraf
                        @elseif ($usahawan->U_Pendidikan_ID == 4)
                            STPM/Diploma/Setaraf
                        @elseif ($usahawan->U_Pendidikan_ID == 5)
                            Ijazah Pertama/Ke Atas
                        @elseif ($usahawan->U_Pendidikan_ID == 6)
                            Tiada
                        @endif

                    </span>
                </td>
            </tr>



            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Peribadi</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 1)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->alamat1 }}
                    </span>
                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 2)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->alamat2 }}
                    </span>
                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 3)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->alamat3 }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Bandar</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->bandar }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Poskod</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->poskod }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Negeri</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->negeri->Negeri }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Daerah</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->daerah->Daerah }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Parlimen</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->parlimen->Parlimen }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Dun</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->dun->Dun }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Mukim</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{-- {{ $usahawan->mukim->Mukim }} --}}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Kampung</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{-- {{ $usahawan->kampung->Kampung }} --}}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Seksyen</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Lain</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Hubungan Usahawan dan Pekebun Kecil</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Kategori Usahawan</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No Telefon</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">No Telefon (HP)</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">E-mail</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

        </table>


        <div style="page-break-after: always"></div>
        <h4>PROFIL SYARIKAT</h4>


        <table style="width: 100%;">

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Syarikat</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Nama Syarikat</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Jenis Milikan</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No. Daftar SSM</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">No. Daftar PBT</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No. Daftar Persijilan Halal</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">No Daftar MESTI</span>
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Tahun Mula Operasi</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Bilangan Pekerja</span>
                </td>
                <td>

                </td>
            </tr>


            <tr>
                <td colspan="4">
                    <span class="cls_002">&nbsp;</span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 1)</span>
                </td>
                <td colspan="3">

                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 2)</span>
                </td>
                <td colspan="3">

                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 3)</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Tarikh Mula MOF</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Tarikh Tamat MOF</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Status Bumiputera</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Prefix ID</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Nama Akaun Bank</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">No. Akaun Bank</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">No Telefon</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">No Telefon (HP)</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">E-mail</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

        </table>



        <div style="page-break-after: always"></div>
        <h4>PROFIL PERNIAGAAN</h4>

        <table style="width: 100%;">

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Perniagaan</span>
                </td>
            </tr>
            <br>

            <tr>
                <td>
                    <span class="cls_002">Jenis Perniagaan</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Kluster Perniagaan</span>
                </td>
                <td colspan="3">

                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Sub Kluster Perniagaan</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 1)</span>
                </td>
                <td colspan="3">

                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 2)</span>
                </td>
                <td colspan="3">

                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 3)</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Bandar</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Poskod</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Negeri</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Daerah</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Parlimen</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Dun</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Mukim</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Kampung</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Seksyen</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Latitud</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Longitud</span>
                </td>
                <td>

                </td>
            </tr>


            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Media Sosial</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Facebook</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Instagram</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Twitter</span>
                </td>
                <td colspan="3">

                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Laman Web</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Pemasaran</span>
                </td>
            </tr>


            <tr>
                <td>
                    <span class="cls_002">Bilangan Dropship</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Bilangan Ejen</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Bilangan Stokis</span>
                </td>
                <td>

                </td>
                <td>
                    <span class="cls_002">Bilangan Outlet</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Pasaran Domestik</span>
                </td>
                <td colspan="3">

                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Pasaran Luar Negara</span>
                </td>
                <td colspan="3">

                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Pasaran Online</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Pendapatan</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Purata Jualan Tahunan Tahun Sebelum Bantuan</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Purata Jualan Tahunan Bagi Tahun Semasa</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Peratus Kenaikan</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Produk</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Maklumat Produk</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Unit Metrik</span>
                </td>
                <td>

                </td>
                <td>
                    <span class="cls_002">Harga Per Unit</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Kapasiti Maksimum</span>
                </td>
                <td>

                </td>
                <td>
                    <span class="cls_002">Kapasiti Semasa</span>
                </td>
                <td>

                </td>
            </tr>



        </table>


        <div style="page-break-after: always"></div>
        <h4>PROFIL PEKEBUN KECIL SANDARAN</h4>

        <table style="width: 100%;">

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Pekebun Kecil</span>
                </td>
            </tr>
            <br>

            <tr>
                <td>
                    <span class="cls_002">No Kad Pengenalan</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Nama Pekebun Kecil</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No Tanam Semula/SIC</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Tanah</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No Geran</span>
                </td>
                <td colspan="3">

                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Negeri</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Daerah</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Mukim</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Parlimen</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Dun</span>
                </td>
                <td>

                </td>

                <td>
                    <span class="cls_002">Kampung</span>
                </td>
                <td>

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Seksyen</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Keluasan Hektar</span>
                </td>
                <td colspan="3">

                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Maklumat Tanaman</span>
                </td>
                <td colspan="3">

                    <span class="cls_001">
                        Jenis Tanaman
                    </span>
                </td>

            </tr>
        </table>


        <div style="page-break-after: always"></div>
        <h4>MAKLUMAT INSENTIF</h4>

        <table style="width: 100%;">

            <tr>
                <th><span class="cls_002">BIL</span></th>
                <th><span class="cls_002">JENIS INSENTIF</span></th>
                <th><span class="cls_002">TAHUN TERIMA</span></th>
                <th><span class="cls_002">JUMLAH (RM)</span></th>
            </tr>

            <tr>
                <td>1</td>
                <td>AET</td>
                <td>2013</td>
                <td>100000</td>
            </tr>

        </table>


        <div style="page-break-after: always"></div>
        <h4> PENYATA UNTUNG RUGI</h4>
        {{-- <h4>BULAN
            @if ($bulan = 1)
                JANUARI
            @elseif ($bulan = 2)
                FEBRUARI
            @elseif ($bulan = 3)
                MAC
            @elseif ($bulan = 4)
                APRIL
            @elseif ($bulan = 5)
                MEI
            @elseif ($bulan = 6)
                JUN
            @elseif ($bulan = 7)
                JULAI
            @elseif ($bulan = 8)
                OGOS
            @elseif ($bulan = 9)
                SEPTEMBER
            @elseif ($bulan = 10)
                OKTOBER
            @elseif ($bulan = 11)
                NOVEMBER
            @elseif ($bulan = 12)
                DISEMBER
            @endif
            TAHUN {{ $tahun }}
        </h4>
        <h4> {{ $syarikat->namasyarikat }}</h4>
    
        <table>
            <thead>
                <tr>
                    <th style="width: 300px"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
    
            </thead>
            <tbody>
    
                <tr>
                    <td style="font-weight: bold">HASIL JUALAN / PEROLEHAN (SALES) </td>
                    <td style="text-align: center">RM</td>
                    <td style="text-align: center">RM</td>
                    <td style="text-align: center">RM</td>
                </tr>
    
                <tr>
                    <td>JUALAN/PEROLEHAN</td>
                    <td></td>
                    <td></td>
                    <td style="text-align: end">{{ number_format($jualan_perolehan, 2) }}</td>
                </tr>
    
                <tr>
                    <td>Deposit Jualan</td>
                    <td></td>
                    <td></td>
                    <td style="text-align: end">{{ number_format($deposit_jualan, 2) }}</td>
                </tr>
    
                <tr>
                    <td>Pulangan Jualan</td>
                    <td></td>
                    <td></td>
                    <td style="text-align: end">{{ number_format($pulangan_jualan, 2) }}</td>
                </tr>
    
                <tr>
                    <td style="color: red">Jualan Bersih</td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            $jualan_bersih = $jualan_perolehan + $deposit_jualan - $pulangan_jualan;
                        @endphp
                        {{ number_format($jualan_bersih, 2) }}
                    </td>
                </tr>
    
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="font-weight: bold">KOS LANGSUNG / KOS JUALAN (COGS)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Stok Awal</td>
                    <td></td>
                    <td>{{ number_format($stok_awal, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Deposit Belian</td>
                    <td> {{ number_format($deposit_belian, 2) }} </td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Belian</td>
                    <td> {{ number_format($belian, 2) }} </td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="color: red">Belian Bersih</td>
                    <td>
                        <?php
                        $belian_bersih = $deposit_belian + $belian;
                        
                        ?>
                        {{ number_format($belian_bersih, 2) }}
    
                    </td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Pulangan Belian</td>
                    <td>{{ number_format($pulangan_belian, 2) }}</td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="color: red">Kos Belian</td>
                    <td></td>
                    <td>
                        @php
                            $kos_belian = $belian_bersih - $pulangan_belian;
                        @endphp
                        {{ number_format($kos_belian, 2) }}
    
                    </td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="color: red">Kos Barang Sedia Dijual</td>
                    <td></td>
                    <td>
                        @php
                            $kos_barang_sedia_dijual = $stok_awal + $kos_belian;
                        @endphp
                        {{ number_format($kos_barang_sedia_dijual, 2) }}
    
                    </td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Stok Akhir</td>
                    <td></td>
                    <td>{{ $stok_akhir }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="color: red">Kos Jualan</td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            $kos_jualan = $kos_barang_sedia_dijual - $stok_akhir;
                        @endphp
                        {{ number_format($kos_jualan, 2) }}
                    </td>
                </tr>
    
                <tr>
                    <td style="font-weight: bold">UNTUNG / RUGI KASAR</td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            $untung_rugi_kasar = $jualan_bersih - $kos_jualan;
                        @endphp
                        {{ number_format($untung_rugi_kasar, 2) }}
                    </td>
                </tr>
    
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="font-weight: bold">PERBELANJAAN PENTADBIRAN DAN OPERASI (OPEX)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Kos Pengeposan</td>
                    <td></td>
                    <td>{{ number_format($kos_pengeposan, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Kos Alat Tulis</td>
                    <td></td>
                    <td>{{ number_format($kos_alat_tulis, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Bayaran Sewa</td>
                    <td></td>
                    <td>{{ number_format($bayaran_sewa, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Upah/ Gaji Pekerja</td>
                    <td></td>
                    <td>{{ number_format($upah_gaji_pekerja, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Upah/ Gaji Sendiri</td>
                    <td></td>
                    <td>{{ number_format($upah_gaji_sendiri, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>KWSP/ SOCSO</td>
                    <td></td>
                    <td>{{ number_format($kwsp_socso, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Bayaran Bil (Utiliti)</td>
                    <td></td>
                    <td>{{ number_format($bayaran_bil, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Petrol/ Tol/ Parking</td>
                    <td></td>
                    <td>{{ number_format($petrol_tol_parking, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Penyelenggaraan</td>
                    <td></td>
                    <td>{{ number_format($penyelenggaraan, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Belian Aset</td>
                    <td></td>
                    <td>{{ number_format($belian_aset, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Bayaran Komisen</td>
                    <td></td>
                    <td>{{ number_format($bayaran_komisen, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Cukai/ Zakat</td>
                    <td></td>
                    <td>{{ number_format($cukai_zakat, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Bayaran Lain</td>
                    <td></td>
                    <td>{{ number_format($bayaran_lain, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="color: red">JUMLAH PERBELANJAAN PENTADBIRAN DAN OPERASI</td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            $jumlah_perbelanjaan = $kos_pengeposan + $kos_alat_tulis + $bayaran_sewa + $upah_gaji_pekerja + $upah_gaji_sendiri + $kwsp_socso + $bayaran_bil + $petrol_tol_parking + $penyelenggaraan + $belian_aset + $bayaran_komisen + $cukai_zakat + $bayaran_lain;
                        @endphp
                        {{ number_format($jumlah_perbelanjaan, 2) }}
                    </td>
                </tr>
    
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>HASIL - HASIL LAIN</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Hasil Komisen</td>
                    <td></td>
                    <td> {{ number_format($hasil_komisen, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Hasil Dividen</td>
                    <td></td>
                    <td> {{ number_format($hasil_dividen, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Hasil Sewaan</td>
                    <td></td>
                    <td> {{ number_format($hasil_sewaan, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td>Hasil Lain</td>
                    <td></td>
                    <td> {{ number_format($hasil_lain, 2) }}</td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="color: red">JUMLAH HASIL -HASIL LAIN</td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            $jumlah_hasil = $hasil_komisen + $hasil_dividen + $hasil_sewaan + $hasil_lain;
                        @endphp
    
                        {{ number_format($jumlah_hasil, 2) }}
                    </td>
                </tr>
    
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    
                <tr>
                    <td style="font-weight: bold">UNTUNG / RUGI BERSIH</td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            $untung_rugi_bersih = $jualan_bersih - $kos_jualan - $jumlah_perbelanjaan + $jumlah_hasil;
                        @endphp
                        {{ number_format($untung_rugi_bersih, 2) }}
                    </td>
                </tr>
    
            </tbody>
        </table> --}}

    </div>

</body>

</html>
