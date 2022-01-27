<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Negeri;
use App\Models\JenisInsentif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LapProf implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
//     <table id="lapprofall">
//     <thead>
//         <tr>
//             <th rowspan="2" >NO</th>
//             <th rowspan="2">NEGERI</th>
//             <th rowspan="2">PT RISDA</th>
//             <th rowspan="2">NAMA PEMOHON</th>
//             <th rowspan="2">NO K/P</th>
//             <th rowspan="2">UMUR</th>
//             <th rowspan="2">JANTINA</th>
//             <th rowspan="2">TARAF PENDIDIKAN</th>
//             <th rowspan="2">ALAMAT</th>
//             <th rowspan="2">POSKOD</th>
//             <th rowspan="2">DAERAH</th>
//             <th rowspan="2">NEGERI</th>
//             <th rowspan="2">DUN</th>
//             <th rowspan="2">PARLIMEN</th>
//             <th rowspan="2">NO TEL</th>
//             <th rowspan="2">NO SIC/ NO T/S (PEKEBUN KECIL)</th>
//             <th rowspan="2">NO K/P (PEKEBUN KECIL)</th>
//             <th rowspan="2">KATEGORI PEMOHON</th>
//             <th rowspan="2">JENIS PERNIAGAAN</th>
//             <th rowspan="2">KLUSTER PROJEK</th>
//             <th rowspan="2">SUB KLUSTER (PRODUK/ PERKHIDMATAN)</th>
//             <th rowspan="2">MEDIUM PEMASARAN (MEDIA SOSIAL)</th>
//             <th rowspan="2">ALAMAT MEDIUM (MEDIA SOSIAL)</th>
//             <th rowspan="2">JENIS BANTUAN (PROGRAM THN SEMASA)</th>
//             <th rowspan="2">KELULUSAN BANTUAN THN SEMASA (RM)</th>
//             <th rowspan="2">TAHUN TERIMA BANTUAN THN SEMASA</th>
//             <th colspan="12">JUMLAH JUALAN BULANAN  (RM)  - TAHUN 2021</th>
//             <th rowspan="2">JUMLAH JUALAN (RM)</th>
//             <th rowspan="2">PURATA JUALAN BULANAN (RM)</th>
//             <th rowspan="2">PENCAPAIAN SASARAN RM 2500/BLN</th>
//             <th rowspan="2">KATEGORI USAHAWAN</th>
//             <th rowspan="2">NAMA SYSRIKAT</th>
//             <th rowspan="2">JENIS MILIKAN SYARIKAT</th>
//             <th rowspan="2">NO. DAFTAR SYARIKAT (SSM)</th>
//             <th rowspan="2">ALAMAT SYARIKAT/ PERNIAGAAN</th>
//             <th colspan="2">KOORDINAT PREMIS PERNIAGAAN</th>
//             <th rowspan="2">E-MAIL</th>
//             <th colspan="3">LAIN-LAIN BANTUAN RISDA TAHUN SEBELUM</th>
//             <th rowspan="2">NO SIJIL HALAL JAKIM</th>
//         </tr>
//         <tr>
//             <th>JAN</th>
//             <th>FEB</th>
//             <th>MAC</th>
//             <th>APR</th>
//             <th>MEI</th>
//             <th>JUN</th>
//             <th>JUL</th>
//             <th>AUG</th>
//             <th>SEP</th>
//             <th>OKT</th>
//             <th>NOV</th>
//             <th>DIS</th>
//             <th>LATITUD</th>
//             <th>LONGITUD</th>
//             <th>JENIS BANTUAN</th>
//             <th>KELULUSAN BANTUAN (RM)</th>
//             <th>TAHUN TERIMA</th>
//         </tr>
//     </thead>
//     <tbody>
//         <?php $num=1; 
//         @foreach ($users as $user)
//         <tr>
//             <td><?php echo $num++;/td>
//             <td>@if($user->negeri){{$user->negeri->Negeri}}@endif</td>
//             <td>@if($user->PT){{$user->PT->keterangan}}@endif</td>
//             <td>{{$user->namausahawan}}</td>
//             <td>{{$user->nokadpengenalan}}</td>
//             <td>{{$user->umur}}</td>
//             <td>{{$user->jantina}}</td>
//             <td>{{$user->taraf_pendidikan}}</td>
//             <td>@if($user->alamat1 != ""){{$user->alamat1}}, &nbsp;@endif @if($user->alamat2 != ""){{$user->alamat2}}, &nbsp;@endif {{$user->alamat3}}</td>
//             <td>{{$user->poskod}}</td>
//             <td>@if($user->daerah){{$user->daerah->Daerah}}@endif</td>
//             <td>@if($user->negeri){{$user->negeri->Negeri}}@endif</td>
//             <td>@if($user->dun){{$user->dun->Dun}}@endif</td>
//             <td>@if($user->parlimen){{$user->parlimen->Parlimen}}@endif</td>
//             <td>@if($user->notelefon != "") {{$user->notelefon}} @endif {{$user->nohp}}</td>
//             <td>@if($user->pekebun){{$user->pekebun->noTS}}@endif</td>
//             <td>@if($user->pekebun){{$user->pekebun->No_KP}}@endif</td>
//             <td>{{$user->status_daftar_usahawan}}</td>
//             <td>@if($user->perniagaan){{$user->perniagaan->jenis->nama_jenis_perniagaan}}@endif</td>
//             <td>@if($user->perniagaan){{$user->perniagaan->klusterperniagaan}}@endif</td>
//             <td>@if($user->perniagaan){{$user->perniagaan->subkluster}}@endif</td>
//             <td>{{$user->MediumPemasaran}}</td>
//             <td>{{$user->AlamatMediumPemasaran}}</td>
//             <td>{{$user->jnsbantuansemasa}}</td>
//             <td>{{$user->kelulusanbantuansemasa}}</td>
//             <td>{{$user->thnbantuansemasa}}</td>
//             <td>@if(isset($user->aliran1)){{$user->aliran1}}@endif</td>
//             <td>{{$user->aliran2}}</td>
//             <td>{{$user->aliran3}}</td>
//             <td>{{$user->aliran4}}</td>
//             <td>{{$user->aliran5}}</td>
//             <td>{{$user->aliran6}}</td>
//             <td>{{$user->aliran7}}</td>
//             <td>{{$user->aliran8}}</td>
//             <td>{{$user->aliran9}}</td>
//             <td>{{$user->aliran10}}</td>
//             <td>{{$user->aliran11}}</td>
//             <td>{{$user->aliran12}}</td>
//             <td>{{$user->jumaliran}}</td>
//             <td>{{$user->purataaliran}}</td>
//             <td>{{$user->capaisasaran}}</td>
//             <td>@if($user->kateusah){{$user->kateusah->nama_kategori_usahawan}}@endif</td>
//             <td>@if($user->syarikat){{$user->syarikat->namasyarikat}}@endif</td>
//             <td>{{$user->jenismilikan}}</td>
//             <td>@if($user->syarikat){{$user->syarikat->nodaftarssm}}@endif</td>
//             <td>{{$user->alamatsyarikat}}</td>
//             <td>@if($user->perniagaan){{$user->perniagaan->latitud}}@endif</td>
//             <td>@if($user->perniagaan){{$user->perniagaan->logitud}}@endif</td>
//             <td>@if($user->syarikat){{$user->syarikat->email}}@endif</td>
//             <td>{{$user->insentifsebelumnama}}</td>
//             <td>{{$user->insentifsebelumjum}}</td>
//             <td>{{$user->insentifsebelumtahun}}</td>
//             <td>@if($user->syarikat){{$user->syarikat->nodaftarpersijilanhalal}}@endif</td>
//         </tr>
//         @endforeach
//     </tbody>
// </table>
    public function collection()
    {
        $negeri = Negeri::all();
        return $negeri;
    }

    public function headings(): array
    {
        return ["NEGERI", "PUSAT TANGGUNGJAWAB RISDA", "TAHUN", "BILANGAN PENERIMA INSENTIF", "JUMLAH INSENTIF", "JUMLAH JUALAN", "PURATA JUALAN"];
    }
}