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
                display: inline-block;
            }
            .col-lg-1{
                display: inline-block;
            }
        </style>
        <div class="col-lg-5">
            <label class="form-label">Negeri</label> : <label class="form-label">{{$user->negeri}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Pusat Tanggungjawab</label> : <label class="form-label">{{$user->PusatTang}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Nama Pemohon</label> : <label class="form-label">{{$user->namausahawan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">No Kad Pengenalan</label> : <label class="form-label">{{$user->nokadpengenalan}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Umur</label> : <label class="form-label">{{$user->umur}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Jantina</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Taraf Pendidikan</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">No.Telefon</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-10">
            <label class="form-label">Alamat</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Poskod</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Daerah</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Negeri</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Dun</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Parlimen</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">No SIC/ No T/S Pekebun Kecil</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">No K/P (Pekebun Kecil)</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Kategori Pemohon</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Jenis Perniagaan</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Kluster Projek</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Sub Kluster (Produk / Perkhidmatan)</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Medium Pemasaran (Media Sosial)</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Alamat Medium Pemasaran (Media Sosial)</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Jenis Bantuan (Program Tahun Semasa)</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Kelulusan Bantuan Tahun Semasa (RM)</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">Tahun Terima Bantuan Tahun Semasa</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-12">
            <label class="form-label">JUMLAH JUALAN BULANAN  (RM)  - TAHUN 2021</label>
        </div>
        <div class="col-lg-12" style="padding-right: none;">
            <table style="width: 100%">
                <tr>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mac</th>
                    <th>Apr</th>
                    <th>Mei</th>
                    <th>Jun</th>
                    <th>Jul</th>
                    <th>Aug</th>
                    <th>Sep</th>
                    <th>Okt</th>
                    <th>Nov</th>
                    <th>Dis</th>
                </tr>
                <tr>
                    <td>100</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="col-lg-5">
            <label class="form-label">aaaaaaaaaaa</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">aaaaaaaaaaa</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">aaaaaaaaaaa</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label">aaaaaaaaaaa</label> : <label class="form-label">{{$user->U_Jantina_ID}}</label>
        </div>
        <div class="col-lg-5">
            <label class="form-label" >No Kad Pengenalan</label>
            <input class="form-control usahawanfield" name="nokadpengenalan"   type="text"/>
        </div>
        <div class="col-lg-5">
            <label class="form-label" >No. Usahawan</label>
            <input class="form-control usahawanfield" name="No_Usahawan"   type="text"  />
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection