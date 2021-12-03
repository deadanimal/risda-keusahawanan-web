@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center" id="contentbody">
            <h4 class="text" style="display: inline-block;padding-bottom:20px;color:#00A651;">LAPORAN PEMANTAUAN LAWATAN BAGI INSENTIF SETAKAT      
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:20vh" onchange="gettabledata('year',this.value)" id="iptYear">
                  <option value="">Tahun</option>
                  <?php
                  $curryear = date("Y");
                  $fromyear = date("Y") - 10;
                  for ($year = $curryear; $year >= $fromyear; $year--) {
                      $selected = (isset($getYear) && $getYear == $year) ? 'selected' : '';
                      echo "<option value=$year $selected>$year</option>";
                  }
                  ?>
                </select>
                MENGIKUT DAERAH/PT
          </h4>
            <div style="overflow-x: scroll !important;overflow-y: scroll !important;">
                <table id="laporaninsentif" class="table table-sm table-bordered table-hover">
                    <colgroup>
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                        <col span="1" style="width:10%;">
                    </colgroup>
                    <style>
                        .dataTable-dropdown{
                            display: inline;
                            padding-right:10vh;
                        }
                        .dataTable-search{
                            display: inline;
                        }
                        ul {
                            list-style-type: none;
                        }
                        .dataTable-pagination-list{
                            display: inline-flex;
                        }
                        .active{
                            padding-right: 5px;
                        }
                        .dataTable-bottom{
                            padding-top: 3vh;
                        }
                    </style>
                    <thead>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col" rowspan="3" style="padding-right:2vh;">Bil</th>
                            <th scope="col" rowspan="3">Negeri</th>
                            <th scope="col" rowspan="3">PT</th>
                            <th scope="col" rowspan="3">Tahun</th>
                            <th scope="col" rowspan="3">Jumlah Keseluruhan Usahawan</th>
                            <th scope="col" >Bulan Semasa</th>
                            <th scope="col" colspan="3">Kumulatif</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col" >Telah Dilawat</th>
                            <th scope="col" >Telah Dilawat</th>
                            <th scope="col" >Baki</th>
                            <th scope="col" >Peratusan Usahawan Keseluruhan</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col">Bil Usahawan (Org)</th>
                            <th scope="col">Bil Usahawan (Org)</th>
                            <th scope="col">Bil Usahawan (Org)</th>
                            <th scope="col">%</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <?php $num=1; ?>
                        @foreach ($reports as $report)
                        <tr class="align-middle" style="text-align: center;">
                            <td class="text-nowrap" style="padding-right:2vh;"><?php echo $num++;?></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->negeri}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->daerah}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab3}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab4}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab5}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab6}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab7}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->percent}}</label></td>
                        </tr>
                        @endforeach
                        <tr class="align-middle" style="text-align: center;">
                            <td class="text-nowrap" colspan="4"><label class="form-check-label">Jumlah</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$total->satu}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$total->dua}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$total->tiga}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$total->empat}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">100</label></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection