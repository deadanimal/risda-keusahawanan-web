@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
      <a style="margin-top:-2vh;margin-left:-2vh;" class="btn btn-sm btn-outline-secondary border-300 me-2" href="/laporanprofil"> 
        <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Kembali</a>
        <div class="row align-items-center">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;padding-top:3vh;">Laporan Profil Usahawan</h3>
        </div>
        <style>
            .col-lg-5{
                display: inline-block;padding-top: 20px;
            }
            .col-lg-12{
                padding-top: 20px;
            }
        </style>
        <table style="width: 100%;">
        <colgroup>
            <col span="1" style="width: 17%;">
            <col span="1" style="width: 28%;">
            <col span="1" style="width: 17%;">
            <col span="1" style="width: 28%;">
        </colgroup>
            <tr>
                <td><label class="form-label">Negeri</label></td>
                <td><label class="form-label">: {{$user->negeri}}</label></td>
                <td><label class="form-label">Pusat Tanggungjawab</label></td>
                <td><label class="form-label">: {{$user->PusatTang}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Nama Pemohon</label></td>
                <td><label class="form-label">: {{$user->namausahawan}}</label></td>
                <td><label class="form-label">No Kad Pengenalan</label></td>
                <td><label class="form-label">: {{$user->nokadpengenalan}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Umur</label></td>
                <td><label class="form-label">: {{$user->umur}}</label></td>
                <td><label class="form-label">Jantina</label></td>
                <td><label class="form-label">: {{$user->jantina}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Taraf Pendidikan</label></td>
                <td><label class="form-label">: {{$user->taraf_pendidikan}}</label></td>
                <td><label class="form-label">No.Telefon</label></td>
                <td><label class="form-label">: @if($user->notelefon != "") {{$user->notelefon}} @endif {{$user->nohp}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Alamat</label></td>
                <td colspan="3"><label class="form-label">: @if($user->alamat1 != ""){{$user->alamat1}}, <br>&nbsp;@endif @if($user->alamat2 != ""){{$user->alamat2}}, <br>&nbsp;@endif {{$user->alamat3}}</label></td>
            </tr>
        </table>
        <div class="col-lg-5">
            <label class="form-label">Poskod</label> : <label class="form-label">{{$user->poskod}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Daerah</label> : <label class="form-label">{{$user->daerah}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Negeri</label> : <label class="form-label">{{$user->negeri}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Dun</label> : <label class="form-label">{{$user->dun}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Parlimen</label> : <label class="form-label">{{$user->parlimen}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">No SIC/ No T/S Pekebun Kecil</label> : <label class="form-label">{{$user->PKnoTS}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">No K/P (Pekebun Kecil)</label> : <label class="form-label">{{$user->PKnoKP}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Kategori Pemohon</label> : <label class="form-label">{{$user->status_daftar_usahawan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Jenis Perniagaan</label> : <label class="form-label">{{$user->JenisPerniagaan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Kluster Projek</label> : <label class="form-label">{{$user->KlusterPerniagaan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Sub Kluster (Produk / Perkhidmatan)</label> : <label class="form-label">{{$user->SubKlusterPerniagaan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Medium Pemasaran (Media Sosial)</label> : <label class="form-label">{{$user->MediumPemasaran}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Alamat Medium Pemasaran (Media Sosial)</label> : <label class="form-label">{{$user->AlamatMediumPemasaran}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Jenis Bantuan (Program Tahun Semasa)</label> : <label class="form-label">{{$user->jnsbantuansemasa}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Kelulusan Bantuan Tahun Semasa (RM)</label> : <label class="form-label">{{$user->kelulusanbantuansemasa}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Tahun Terima Bantuan Tahun Semasa</label> : <label class="form-label">{{$user->thnbantuansemasa}}</label>
        </div>
        <div class="col-lg-12">
            <label class="form-label">JUMLAH JUALAN BULANAN  (RM)  - TAHUN 2021</label>
        </div>
        <div class="col-lg-12" style="padding-right: none;">
            <table style="width: 100%;">
                <tr>
                    <td>Jan</td>
                    <td>Feb</td>
                    <td>Mac</td>
                    <td>Apr</td>
                    <td>Mei</td>
                    <td>Jun</td>
                    <td>Jul</td>
                    <td>Aug</td>
                    <td>Sep</td>
                    <td>Okt</td>
                    <td>Nov</td>
                    <td>Dis</td>
                </tr>
                <tr>
                    <td>{{$user->aliran1}}</td>
                    <td>{{$user->aliran2}}</td>
                    <td>{{$user->aliran3}}</td>
                    <td>{{$user->aliran4}}</td>
                    <td>{{$user->aliran5}}</td>
                    <td>{{$user->aliran6}}</td>
                    <td>{{$user->aliran7}}</td>
                    <td>{{$user->aliran8}}</td>
                    <td>{{$user->aliran9}}</td>
                    <td>{{$user->aliran10}}</td>
                    <td>{{$user->aliran11}}</td>
                    <td>{{$user->aliran12}}</td>
                </tr>
            </table>
        </div>

        <div class="col-lg-5">
            <label class="form-label">Jumlah Jualan (RM)</label> : <label class="form-label">{{$user->jumaliran}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Purata Jualan Bulanan (RM)</label> : <label class="form-label">{{$user->purataaliran}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Pencapaian Sasaran RM 2500/BLN</label> : <label class="form-label">{{$user->capaisasaran}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Kategori Usahawan</label> : <label class="form-label">{{$user->KateUsahawan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Nama Syarikat</label> : <label class="form-label">{{$user->namasyarikat}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Jenis Milikan Syarikat</label> : <label class="form-label">{{$user->jenismilikan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">No. Daftar Syarikat (SSM)</label> : <label class="form-label">{{$user->nodaftarssm}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Alamat Syarikat/Perniagaan</label> : <label class="form-label">{{$user->alamatsyarikat}}</label>
        </div>
        <div class="col-lg-12">
            <label class="form-label">Koordinat Premis Perniagaan</label>
            <label class="form-label">Latitud</label> : <label class="form-label">{{$user->latitud}}</label>
            <label class="form-label">Longitud</label> : <label class="form-label">{{$user->logitud}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">E-Mail</label> : <label class="form-label">{{$user->emailsyarikat}}</label>
        </div>
        {{-- <div class="col-lg-5">
            <label class="form-label">Status Perniagaan (Aktif / TIdak Aktif)</label> : <label class="form-label">None</label>
        </div> --}}
        <div class="col-lg-12">
            <label class="form-label">Lain - Lain Bantuan RISDA Tahun Sebelum</label>
        </div>
        <div class="col-lg-12">
            <table style="width: 100%;">
                <tr>
                    <td>Jenis Bantuan</td>
                    <td>Kelulusan Bantuan (RM)</td>
                    <td>Tahun Terima</td>
                </tr>
                <tr>
                    @foreach ($insentif2 as $insentif2s)
                    <td>{{$insentif2s->namainsen}}</td>
                    <td>{{$insentif2s->nilai_insentif}}</td>
                    <td>{{$insentif2s->tahun_terima_insentif}}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        {{-- <div class="col-lg-5">
            <label class="form-label">Latihan/Kursus RISDA Telah Dihadiri</label> : <label class="form-label">None</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Daftar Jenama Produk </label><span> (Jika Menerima Bantuan Pembungkusan & Pelabelan RISDA)</span> : <label class="form-label">None</label>
        </div> --}}
        <div class="col-lg-5">
            <label class="form-label">No Sijil HALAL JAKIM</label> : <label class="form-label">{{$user->nodaftarpersijilanhalal}}</label>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    $('.loader').hide();
})

</script>
@endsection