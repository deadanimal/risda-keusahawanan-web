@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center" id="contentbody">
            <h4 class="text" style="display: inline-block;padding-bottom:20px;color:#00A651;">BUKU TUNAI RINGKASAN BULAN
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:25vh" onchange="gettabledata('month',this.value)" id="iptBulan">
                    <option value="">Bulan</option>
                      
                </select>
                  <br>DAN TAHUN
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
                            <th scope="col" rowspan="2">TARIKH</th>
                            <th scope="col" rowspan="2">BUTIRAN</th>
                            <th scope="col" rowspan="2">RUJUKAN</th>
                            <th scope="col" rowspan="2">DEBIT</th>
                            <th scope="col" rowspan="2">KREDIT</th>
                            <th scope="col" rowspan="2">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <?php $count = 1; ?>
                        @foreach ($reports as $report)
                            @if ($loop->first && $report->tab8 == 1)
                                <tr class="align-middle" style="text-align: left;">
                                    <td></td>
                                    <td class="text-nowrap"><label class="form-check-label">A) PENDAPATAN AKTIF</label></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 1)
                                <tr class="align-middle" style="text-align: center;">
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab3}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->nama_jenis}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab5}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab6}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab7}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->total}}</label></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 2 && $count != 3)
                                <?php $count = 2; ?>
                            @endif
                            @if ($report->tab8 == 2 && $count == 2)
                                <?php $count = 3; ?>
                                <tr class="align-middle" style="text-align: left;">
                                    <td></td>
                                    <td class="text-nowrap"><label class="form-check-label">B) PENDAPATAN PASIF</label></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 2)
                                <tr class="align-middle" style="text-align: center;">
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab3}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->nama_jenis}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab5}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab6}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab7}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->total}}</label></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 3 && $count == 3)
                                <tr class="align-middle" style="text-align: left;">
                                    <td></td>
                                    <td class="text-nowrap"><label class="form-check-label">C) JUMLAH ALIRAN MASUK (RM)</label></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 3 && $count != 4)
                                <?php $count = 3; ?>
                            @endif
                            @if ($report->tab8 == 3 && $count == 3)
                                <?php $count = 4; ?>
                                <tr class="align-middle" style="text-align: left;">
                                    <td></td>
                                    <td class="text-nowrap"><label class="form-check-label">D) PERBELANJAAN PERNIAGAAN (RM)</label></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 3)
                                <tr class="align-middle" style="text-align: center;">
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab3}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->nama_jenis}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab5}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab6}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->tab7}}</label></td>
                                    <td class="text-nowrap"><label class="form-check-label">{{$report->total}}</label></td>
                                </tr>
                            @endif
                        @endforeach
                        @if($count == 4)
                        <tr class="align-middle" style="text-align: left;">
                            <td></td>
                            <td class="text-nowrap"><label class="form-check-label">G) JUMLAH ALIRAN KELUAR</label></td>
                        </tr>
                        @endif
                        <tr class="align-middle" style="text-align: left;">
                            <td></td>
                            <td class="text-nowrap"><label class="form-check-label">JUMLAH BAKI/SIMPANAN</label></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection