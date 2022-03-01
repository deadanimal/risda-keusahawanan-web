@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
      <a style="margin-top:-2vh;margin-left:-2vh;" class="btn btn-sm btn-outline-secondary border-300 me-2" href="/laporanprofil"> 
        <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Kembali</a>
        <div style="padding-bottom: 20px;">
            <a class="btn btn-primary" onclick="ExportPDF()"><span >PDF</span></a>
        </div>
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
        <table id="usahawan" style="width: 100%;">
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
                <td><label class="form-label">Taraf Pendidikan Tertinggi</label></td>
                <td><label class="form-label">: {{$user->taraf_pendidikan_tinggi}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">No.Telefon</label></td>
                <td><label class="form-label">: {{$user->notelefon}}</label></td>
                <td><label class="form-label">No.HP</label></td>
                <td><label class="form-label">: {{$user->nohp}}</label></td>
            </tr>
            <tr>
                <td rowspan="3"><label class="form-label">Alamat</label></td>
                <td rowspan="3"><label class="form-label">: @if($user->alamat1 != ""){{$user->alamat1}}, <br>&nbsp;@endif @if($user->alamat2 != ""){{$user->alamat2}}, <br>&nbsp;@endif {{$user->alamat3}}</label></td>
                <td><label class="form-label">Poskod</label></td>
                <td><label class="form-label">: {{$user->poskod}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Daerah</label></td>
                <td><label class="form-label">: {{$user->daerah}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Negeri</label></td>
                <td><label class="form-label">: {{$user->negeri}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Dun</label></td>
                <td><label class="form-label">: {{$user->dun}}</label></td>
                <td><label class="form-label">Parlimen</label></td>
                <td><label class="form-label">: {{$user->parlimen}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">No SIC/ No T/S Pekebun Kecil</label></td>
                <td><label class="form-label">: {{$user->PKnoTS}}</label></td>
                <td><label class="form-label">No K/P (Pekebun Kecil)</label></td>
                <td><label class="form-label">: {{$user->PKnoKP}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Kategori Pemohon</label></td>
                <td><label class="form-label">: {{$user->status_daftar_usahawan}}</label></td>
                <td><label class="form-label">Jenis Perniagaan</label></td>
                <td><label class="form-label">: {{$user->JenisPerniagaan}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Kluster Projek</label></td>
                <td><label class="form-label">: {{$user->KlusterPerniagaan}}</label></td>
                <td><label class="form-label">Sub Kluster (Produk / Perkhidmatan)</label></td>
                <td><label class="form-label">: {{$user->SubKlusterPerniagaan}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Medium Pemasaran (Media Sosial)</label></td>
                <td><label class="form-label">:<?php echo $user->MediumPemasaran; ?></label></td>
                <td><label class="form-label">Alamat Medium Pemasaran (Media Sosial)</label></td>
                <td> <label class="form-label">:<?php echo $user->AlamatMediumPemasaran; ?></label></td>
            </tr>
            <tr>
                <td><label class="form-label">Jenis Bantuan (Program Tahun Semasa)</label></td>
                <td><label class="form-label">: {{$user->jnsbantuansemasa}}</label></td>
                <td><label class="form-label">Kelulusan Bantuan Tahun Semasa (RM)</label></td>
                <td><label class="form-label">: {{$user->kelulusanbantuansemasa}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Tahun Terima Bantuan Tahun Semasa</label></td>
                <td><label class="form-label">: {{$user->thnbantuansemasa}}</label></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" style="padding-top: 2vh; text-align:center;"><label class="form-label">JUMLAH JUALAN BULANAN  (RM)  - TAHUN <?php echo date("Y"); ?></label></td>
            </tr>
            <tr>
                <td colspan="4">
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
                        <td>Dis<br></td>
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
                        <td>{{$user->aliran12}}<br></td>
                    </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Jumlah Jualan (RM)</label></td>
                <td><label class="form-label">: {{$user->jumaliran}}</label></td>
                <td><label class="form-label">Purata Jualan Bulanan (RM)</label></td>
                <td><label class="form-label">: {{$user->purataaliran}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Pencapaian Sasaran RM 2500/BLN</label></td>
                <td><label class="form-label">: {{$user->capaisasaran}}</label></td>
                <td><label class="form-label">Kategori Usahawan</label></td>
                <td><label class="form-label">: {{$user->KateUsahawan}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">Nama Syarikat</label></td>
                <td><label class="form-label">: {{$user->namasyarikat}}</label></td>
                <td><label class="form-label">Jenis Milikan Syarikat</label></td>
                <td><label class="form-label">: {{$user->jenismilikan}}</label></td>
            </tr>
            <tr>
                <td><label class="form-label">No. Daftar Syarikat (SSM)</label></td>
                <td><label class="form-label">: {{$user->nodaftarssm}}</label></td>
                <td><label class="form-label">Alamat Syarikat/Perniagaan</label></td>
                <td><label class="form-label">: {{$user->alamatsyarikat}}</label></td>
            </tr>
            <tr>
                <td colspan="4">
                    <label class="form-label" style="padding-right: 5vh;">Koordinat Premis Perniagaan - </label>
                    <label class="form-label">Latitud</label> : <label class="form-label" style="padding-right: 2vh;">{{$user->latitud}}</label>
                    <label class="form-label">Longitud</label> : <label class="form-label">{{$user->logitud}}</label>                
                </td>
            </tr>
            <tr>
                <td><label class="form-label">E-Mail</label></td>
                <td><label class="form-label">: {{$user->emailsyarikat}}</label></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><label class="form-label">Lain - Lain Bantuan RISDA Tahun Sebelum</label></td>
            </tr>
            <tr>
                <td colspan="4" style="padding:2vh 0vh">
                    <table style="width: 100%;" class="form-label">
                        <tr>
                            <th>Jenis Bantuan</th>
                            <th>Kelulusan Bantuan (RM)</th>
                            <th>Tahun Terima <br></th>
                        </tr>
                        @foreach ($insentif2 as $insentif2s)
                        <tr>
                            <td>{{$insentif2s->namainsen}}</td>
                            <td>{{number_format($insentif2s->nilai_insentif)}}</td>
                            <td>{{$insentif2s->tahun_terima_insentif}}<br></td>   
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">No Sijil HALAL JAKIM</label></td>
                <td><label class="form-label">: {{$user->nodaftarpersijilanhalal}}</label></td>
            </tr>
        </table>
        
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    
    $('.loader').hide();
})

function ExportPDF(){
    // var year = document.getElementById("iptYear").value;
    var doc = new jsPDF("p", "mm", "a4")
    doc.text(15, 10, "LAPORAN PROFIL USAHAWAN");
    doc.autoTable({ 
        html: '#usahawan' 
    })
    // var elem = document.getElementById('gambau');
    // console.log(elem.getAttribute('src'));
    // if(elem.getAttribute('src') != ""){
    //     var myImage = document.getElementById("gambau").src; 
    //     doc.addImage(myImage, 'JPEG', 80, 100, 60, 35);
    // }
    doc.save('LaporanProfilUsahawan.pdf')

}

</script>
@endsection