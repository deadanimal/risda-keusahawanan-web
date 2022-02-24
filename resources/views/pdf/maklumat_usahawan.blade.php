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

        .cls_001 {
            font-family: "Calibri Bold", sans-serif;
            font-size: 12px;
            color: rgb(0, 0, 0);
            font-weight: normal;
            font-style: normal;
            text-decoration: none
        }

        .cls_002 {
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
                        @if ($usahawan->etnik != null)
                            {{ $usahawan->etnik->Etnik }}
                        @endif
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
                        @if ($usahawan->negeri != null)
                            {{ $usahawan->negeri->Negeri }}
                        @endif

                    </span>
                </td>

                <td>
                    <span class="cls_002">Daerah</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->daerah != null)
                            {{ $usahawan->daerah->Daerah }}
                        @endif

                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Parlimen</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->parlimen != null)
                            {{ $usahawan->parlimen->Parlimen }}
                        @endif

                    </span>
                </td>

                <td>
                    <span class="cls_002">Dun</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->dun != null)
                            {{ $usahawan->dun->Dun }}
                        @endif

                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Mukim</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->mukim != null)
                            {{ $usahawan->mukim->Mukim }}
                        @endif

                    </span>
                </td>

                <td>
                    <span class="cls_002">Kampung</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->kampung != null)
                            {{ $usahawan->kampung->Kampung }}
                        @endif

                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Seksyen</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        @if ($usahawan->seksyen != null)
                            {{ $usahawan->seksyen->Seksyen }}
                        @endif

                    </span>
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
                    <span class="cls_001">
                        <span class="cls_001">
                            @if ($usahawan->status_daftar_usahawan == 'KP01')
                                PEKEBUN KECIL
                            @elseif ($usahawan->status_daftar_usahawan == 'KP02')
                                PASANGAN PEKEBUN KECIL
                            @elseif ($usahawan->status_daftar_usahawan == 'KP03')
                                ANAK PEKEBUN KECIL
                            @endif
                        </span>
                    </span>
                </td>
                <td>
                    <span class="cls_002">Kategori Usahawan</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->kateusah->nama_kategori_usahawan }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No Telefon</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->notelefon }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">No Telefon (HP)</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->nohp }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">E-mail</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->email }}
                    </span>
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
                    <span class="cls_001">
                        {{ $usahawan->syarikat->namasyarikat }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Jenis Milikan</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        @if ($usahawan->syarikat->jenismilikanperniagaan == 'JPP01')
                            PEMILIKAN TUNGGAL
                        @elseif ($usahawan->syarikat->jenismilikanperniagaan == 'JPP02')
                            PERKONGSIAN
                        @elseif ($usahawan->syarikat->jenismilikanperniagaan == 'JPP03')
                            SYARIKAT SDN BHD
                        @elseif ($usahawan->syarikat->jenismilikanperniagaan == 'JPP04')
                            PERKONGSIAN LIABILITI TERHAD
                        @endif
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No. Daftar SSM</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->nodaftarssm }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">No. Daftar PBT</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->nodaftarpbt }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No. Daftar Persijilan Halal</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->nodaftarpersijilanhalal }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">No Daftar MESTI</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->nodaftarmesti }}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Tahun Mula Operasi</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->tahunmulaoperasi }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Bilangan Pekerja</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->bilanganpekerja }}
                    </span>
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
                    <span class="cls_001">
                        {{ $usahawan->syarikat->alamat1_ssm }}
                    </span>
                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 2)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->syarikat->alamat2_ssm }}
                    </span>
                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 3)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->syarikat->alamat3_ssm }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Tarikh Mula MOF</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->tarikh_mula_mof }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Tarikh Tamat MOF</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->tarikh_tamat_mof }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Status Bumiputera</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->tarikh_tamat_mof }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Prefix ID</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->prefix_id }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Nama Akaun Bank</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->syarikat->nama_akaun_bank }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">No. Akaun Bank</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->syarikat->no_akaun_bank }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">No Telefon</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->notelefon }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">No Telefon (HP)</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->syarikat->no_hp }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">E-mail</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->syarikat->email }}
                    </span>
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
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->jenisperniagaan == 'A')
                            PENGELUARAN PRODUK MAKANAN
                        @elseif ($usahawan->perniagaan->jenisperniagaan == 'B')
                            PENGELUARAN PRODUK BUKAN MAKANAN
                        @elseif ($usahawan->perniagaan->jenisperniagaan == 'C')
                            PENGELUARAN PRODUK PERTANIAN
                        @elseif ($usahawan->perniagaan->jenisperniagaan == 'D')
                            PERKHIDMATAN PEMASARAN
                        @elseif ($usahawan->perniagaan->jenisperniagaan == 'E')
                            PERKHIDMATAN BUKAN PEMASARAN
                        @endif
                    </span>
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
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->subkluster }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 1)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->alamat1 }}
                    </span>
                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 2)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->alamat2 }}
                    </span>
                </td>

            </tr>
            <tr>
                <td>
                    <span class="cls_002">Alamat (Baris 3)</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->alamat3 }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Bandar</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->bandar }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Poskod</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->poskod }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Negeri</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->negeri != null)
                            {{ $usahawan->perniagaan->negeri->Negeri }}
                        @endif
                    </span>
                </td>

                <td>
                    <span class="cls_002">Daerah</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->daerah != null)
                            {{ $usahawan->perniagaan->daerah->Daerah }}
                        @endif
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Parlimen</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->parlimen != null)
                            {{ $usahawan->perniagaan->parlimen->Parlimen }}
                        @endif
                    </span>
                </td>

                <td>
                    <span class="cls_002">Dun</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->dun != null)
                            {{ $usahawan->perniagaan->dun->Dun }}
                        @endif
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Mukim</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->mukim != null)
                            {{ $usahawan->perniagaan->mukim->Mukim }}
                        @endif
                    </span>
                </td>

                <td>
                    <span class="cls_002">Kampung</span>
                </td>
                <td>
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->kampung != null)
                            {{ $usahawan->perniagaan->kampung->Kampung }}
                        @endif

                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Seksyen</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        @if ($usahawan->perniagaan->seksyen != null)
                            {{ $usahawan->perniagaan->seksyen->Seksyen }}
                        @endif
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Latitud</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->latitud }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Longitud</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->logitud }}
                    </span>
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
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->facebook }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Instagram</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->instagram }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Twitter</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->twitter }}
                    </span>
                </td>

            </tr>

            <tr>
                <td>
                    <span class="cls_002">Laman Web</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->lamanweb }}
                    </span>
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
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->dropship }}
                    </span>
                </td>

                <td>
                    <span class="cls_002">Bilangan Ejen</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->ejen }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Bilangan Stokis</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->stokis }}
                    </span>
                </td>
                <td>
                    <span class="cls_002">Bilangan Outlet</span>
                </td>
                <td>
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->outlet }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Pasaran Domestik</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->domestik }}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Pasaran Luar Negara</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->luarnegara }}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="cls_002">Pasaran Online</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->pasaranonline }}
                    </span>
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
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->purata_jualan_bulanan }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Purata Jualan Tahunan Bagi Tahun Semasa</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->hasil_jualan_tahunan }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Peratus Kenaikan</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        {{ $usahawan->perniagaan->peratus_kenaikan }}
                    </span>
                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <span class="cls_003">Maklumat Produk</span>
                </td>
            </tr>

            @foreach ($usahawan->perniagaan->produk as $produk)
                <tr>
                    <td>
                        <span class="cls_002">Maklumat Produk {{ $loop->index + 1 }}</span>
                    </td>
                    <td colspan="3">

                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Jenama Produk</span>
                    </td>
                    <td colspan="3">
                        <span class="cls_001">
                            {{ $produk->jenamaproduk }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Unit Metrik</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            {{ $produk->unitmatrik }}
                        </span>
                    </td>
                    <td>
                        <span class="cls_002">Harga Per Unit</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            {{ $produk->hargaperunit }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Kapasiti Maksimum</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            {{ $produk->kapasitimaksimum }}
                        </span>
                    </td>
                    <td>
                        <span class="cls_002">Kapasiti Semasa</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            {{ $produk->kapasitisemasa }}
                        </span>
                    </td>
                </tr>
            @endforeach



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
                    <span class="cls_001">
                        @if ($usahawan->pekebun->No_KP != null)
                            {{ $usahawan->pekebun->No_KP }}
                        @endif

                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">Nama Pekebun Kecil</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        @if ($usahawan->pekebun->Nama_PK != null)
                            {{ $usahawan->pekebun->Nama_PK }}
                        @endif
                        {{-- {{ $usahawan->pekebun->Nama_PK }} --}}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="cls_002">No Tanam Semula/SIC</span>
                </td>
                <td colspan="3">
                    <span class="cls_001">
                        @if ($usahawan->pekebun->noTS != null)
                            {{ $usahawan->pekebun->noTS }}
                        @endif
                        {{-- {{ $usahawan->pekebun->noTS }} --}}
                    </span>
                </td>
            </tr>

            @foreach ($usahawan->pekebun->tanah as $tanah)
                <tr>
                    <td colspan="4">
                        <span class="cls_003">Maklumat Tanah {{ $loop->index + 1 }}</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">No Geran</span>
                    </td>
                    <td colspan="3">
                        <span class="cls_001">
                            {{ $tanah->No_Geran }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="cls_002">Negeri</span>
                    </td>
                    <td>
                        <span class="cls_001">

                            @if ($tanah->negeri != null)
                                {{ $tanah->negeri->Negeri }}
                            @endif
                        </span>
                    </td>

                    <td>
                        <span class="cls_002">Daerah</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            @if ($tanah->daerah != null)
                                {{ $tanah->daerah->Daerah }}
                            @endif
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Mukim</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            @if ($tanah->mukim != null)
                                {{ $tanah->mukim->Mukim }}
                            @endif

                        </span>
                    </td>

                    <td>
                        <span class="cls_002">Parlimen</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            @if ($tanah->parlimen != null)
                                {{ $tanah->parlimen->Parlimen }}
                            @endif

                        </span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Dun</span>
                    </td>
                    <td>
                        <span class="cls_001">
                            @if ($tanah->dun != null)
                                {{ $tanah->dun->Dun }}
                            @endif
                        </span>
                    </td>

                    <td>
                        <span class="cls_002">Kampung</span>
                    </td>
                    <td>
                        <span class="cls_001">

                            @if ($tanah->kampung != null)
                                {{ $tanah->kampung->Kampung }}
                            @endif
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Seksyen</span>
                    </td>
                    <td colspan="3">
                        <span class="cls_001">
                            @if ($tanah->seksyen != null)
                                {{ $tanah->seksyen->Seksyen }}
                            @endif

                        </span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Keluasan Hektar</span>
                    </td>
                    <td colspan="3">
                        <span class="cls_001">
                            {{ $tanah->keluasan_hektar }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="cls_002">Maklumat Tanaman</span>
                    </td>
                    <td colspan="3">

                        <span class="cls_001">
                            @foreach ($tanah->tanaman as $tanaman)
                                Jenis Tanaman {{ $loop->index + 1 }} : {{ $tanaman->jenis_tanaman_kebun }}
                                <br>
                            @endforeach

                        </span>
                    </td>

                </tr>
            @endforeach
        </table>


        <div style="page-break-after: always"></div>
        <h4>MAKLUMAT INSENTIF</h4>

        <table style="width: 100%;">

            <tbody>
                <tr>
                    <td style="text-align: center; width:10% !important"><span class="cls_002">BIL</span></td>
                    <td style="text-align: center; width:50% !important"><span class="cls_002">JENIS
                            INSENTIF</span></td>
                    <td style="text-align: center; width:15% !important"><span class="cls_002">TAHUN
                            TERIMA</span></td>
                    <td style="text-align: center; width:15% !important"><span class="cls_002">JUMLAH
                            (RM)</span></td>
                </tr>
                @foreach ($usahawan->insentif as $insentif)
                    <tr>
                        <td style="text-align: center;width: 10% ">
                            <span class="cls_001">
                                {{ $loop->index + 1 }}
                            </span>
                        </td>
                        <td style="width: 50%">
                            <span class="cls_001">
                                {{ $insentif->jenis->nama_insentif }}
                            </span>
                        </td>
                        <td style="text-align: center; width:15%">
                            <span class="cls_001">
                                {{ $insentif->tahun_terima_insentif }}
                            </span>
                        </td>
                        <td style="text-align:right; width:15%">
                            <span class="cls_001">
                                {{ number_format($insentif->nilai_insentif, 2) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>


        <div style="page-break-after: always"></div>
        <h4> PENYATA UNTUNG RUGI BULAN
            @if ($bulan == 1)
                JANUARI
            @elseif ($bulan == 2)
                FEBRUARI
            @elseif ($bulan == 3)
                MAC
            @elseif ($bulan == 4)
                APRIL
            @elseif ($bulan == 5)
                MEI
            @elseif ($bulan == 6)
                JUN
            @elseif ($bulan == 7)
                JULAI
            @elseif ($bulan == 8)
                OGOS
            @elseif ($bulan == 9)
                SEPTEMBER
            @elseif ($bulan == 10)
                OKTOBER
            @elseif ($bulan == 11)
                NOVEMBER
            @elseif ($bulan == 12)
                DISEMBER
            @endif
            TAHUN {{ $tahun }}
        </h4>

        <table>

            <tbody>

                <tr>
                    <td style="font-weight: bold">
                        <span class="cls_002">
                            HASIL JUALAN / PEROLEHAN (SALES)
                        </span>
                    </td>
                    <td style="text-align: center">
                        <span class="cls_002">RM</span>
                    </td>
                    <td style="text-align: center">
                        <span class="cls_002">RM</span>
                    </td>
                    <td style="text-align: center">
                        <span class="cls_002">RM</span>
                    </td>
                </tr>

                <tr>
                    <td class="cls_001">JUALAN/PEROLEHAN</td>
                    <td></td>
                    <td></td>
                    <td class="cls_001" style="text-align: end">{{ number_format($jualan_perolehan, 2) }}
                    </td>
                </tr>

                <tr>
                    <td class="cls_001">Deposit Jualan</td>
                    <td></td>
                    <td></td>
                    <td class="cls_001" style="text-align: end">{{ number_format($deposit_jualan, 2) }}</td>
                </tr>

                <tr>
                    <td class="cls_001">Pulangan Jualan</td>
                    <td></td>
                    <td></td>
                    <td class="cls_001" style="text-align: end">{{ number_format($pulangan_jualan, 2) }}</td>
                </tr>

                <tr>
                    <td class="cls_001" style="color: red">Jualan Bersih</td>
                    <td></td>
                    <td></td>
                    <td class="cls_001">
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
                    <td class="cls_002" style="font-weight: bold">KOS LANGSUNG / KOS JUALAN (COGS)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Stok Awal</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($stok_awal, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Deposit Belian</td>
                    <td class="cls_001"> {{ number_format($deposit_belian, 2) }} </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Belian</td>
                    <td class="cls_001"> {{ number_format($belian, 2) }} </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001" style="color: red">Belian Bersih</td>
                    <td class="cls_001">
                        <?php
                        $belian_bersih = $deposit_belian + $belian;
                        
                        ?>
                        {{ number_format($belian_bersih, 2) }}

                    </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Pulangan Belian</td>
                    <td class="cls_001">{{ number_format($pulangan_belian, 2) }}</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001" style="color: red">Kos Belian</td>
                    <td></td>
                    <td class="cls_001">
                        @php
                            $kos_belian = $belian_bersih - $pulangan_belian;
                        @endphp
                        {{ number_format($kos_belian, 2) }}

                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001" style="color: red">Kos Barang Sedia Dijual</td>
                    <td></td>
                    <td class="cls_001">
                        @php
                            $kos_barang_sedia_dijual = $stok_awal + $kos_belian;
                        @endphp
                        {{ number_format($kos_barang_sedia_dijual, 2) }}

                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Stok Akhir</td>
                    <td></td>
                    <td>{{ $stok_akhir }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001" style="color: red">Kos Jualan</td>
                    <td></td>
                    <td></td>
                    <td class="cls_001">
                        @php
                            $kos_jualan = $kos_barang_sedia_dijual - $stok_akhir;
                        @endphp
                        {{ number_format($kos_jualan, 2) }}
                    </td>
                </tr>

                <tr>
                    <td class="cls_002" style="font-weight: bold">UNTUNG / RUGI KASAR</td>
                    <td></td>
                    <td></td>
                    <td class="cls_002">
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
                    <td class="cls_002" style="font-weight: bold">PERBELANJAAN PENTADBIRAN DAN OPERASI (OPEX)
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Kos Pengeposan</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($kos_pengeposan, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Kos Alat Tulis</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($kos_alat_tulis, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Bayaran Sewa</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($bayaran_sewa, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Upah/ Gaji Pekerja</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($upah_gaji_pekerja, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Upah/ Gaji Sendiri</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($upah_gaji_sendiri, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">KWSP/ SOCSO</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($kwsp_socso, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Bayaran Bil (Utiliti)</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($bayaran_bil, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Petrol/ Tol/ Parking</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($petrol_tol_parking, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Penyelenggaraan</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($penyelenggaraan, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Belian Aset</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($belian_aset, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Bayaran Komisen</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($bayaran_komisen, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Cukai/ Zakat</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($cukai_zakat, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Bayaran Lain</td>
                    <td></td>
                    <td class="cls_001">{{ number_format($bayaran_lain, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_002" style="color: red">JUMLAH PERBELANJAAN PENTADBIRAN DAN OPERASI</td>
                    <td></td>
                    <td></td>
                    <td class="cls_002">
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
                    <td class="cls_002">HASIL - HASIL LAIN</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Hasil Komisen</td>
                    <td></td>
                    <td class="cls_001"> {{ number_format($hasil_komisen, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Hasil Dividen</td>
                    <td></td>
                    <td class="cls_001"> {{ number_format($hasil_dividen, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Hasil Sewaan</td>
                    <td></td>
                    <td class="cls_001"> {{ number_format($hasil_sewaan, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_001">Hasil Lain</td>
                    <td></td>
                    <td class="cls_001"> {{ number_format($hasil_lain, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="cls_002" style="color: red">JUMLAH HASIL -HASIL LAIN</td>
                    <td></td>
                    <td></td>
                    <td class="cls_002">
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
                    <td class="cls_002" style="font-weight: bold">UNTUNG / RUGI BERSIH</td>
                    <td></td>
                    <td></td>
                    <td class="cls_002">
                        @php
                            $untung_rugi_bersih = $jualan_bersih - $kos_jualan - $jumlah_perbelanjaan + $jumlah_hasil;
                        @endphp
                        {{ number_format($untung_rugi_bersih, 2) }}
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

</body>

</html>
