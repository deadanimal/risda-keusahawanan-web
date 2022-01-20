@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <a style="margin-top:-2vh;margin-left:-2vh;" class="btn btn-sm btn-outline-secondary border-300 me-2" href="/laporanalirantunai"> 
        <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Kembali</a>
        <div class="row align-items-center" id="contentbody" style="padding-top:15px;">
            <h4 class="text" style="display: inline-block;padding-bottom:20px;color:#00A651;">BUKU TUNAI RINGKASAN BULAN
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:25vh" onchange="gettabledata('month',this.value)" id="iptBulan">
                    <option value="">Bulan</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                  <br>DAN TAHUN
                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:20vh" onchange="gettabledata('year',this.value)" id="iptYear">
                    {{-- <option value="">Tahun</option> --}}
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
                <table id="laporanbukutunai" class="table table-sm table-bordered table-hover">
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
                            <th scope="col" >TARIKH</th>
                            <th scope="col" >BUTIRAN</th>
                            <th scope="col" >RUJUKAN</th>
                            <th scope="col" >DEBIT</th>
                            <th scope="col" >KREDIT</th>
                            <th scope="col" >JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <?php $count = 1; ?>
                        @foreach ($reports as $report)
                            @if ($loop->first && $report->tab8 == 1)
                                <tr class="align-middle" style="text-align: left;">
                                    <td></td>
                                    <td class="text-nowrap">A) PENDAPATAN AKTIF</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 1)
                                <tr class="align-middle" style="text-align: center;">
                                    <td class="text-nowrap">{{$report->tab3}}</td>
                                    <td class="text-nowrap">{{$report->nama_jenis}}</td>
                                    <td class="text-nowrap">{{$report->tab5}}</td>
                                    <td class="text-nowrap">{{$report->tab6}}</td>
                                    <td class="text-nowrap">{{$report->tab7}}</td>
                                    <td class="text-nowrap">{{$report->total}}</td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 2 && $count != 3)
                                <?php $count = 2; ?>
                            @endif
                            @if ($report->tab8 == 2 && $count == 2)
                                <?php $count = 3; ?>
                                <tr class="align-middle" style="text-align: left;">
                                    <td></td>
                                    <td class="text-nowrap">B) PENDAPATAN PASIF</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 2)
                                <tr class="align-middle" style="text-align: center;">
                                    <td class="text-nowrap">{{$report->tab3}}</td>
                                    <td class="text-nowrap">{{$report->nama_jenis}}</td>
                                    <td class="text-nowrap">{{$report->tab5}}</td>
                                    <td class="text-nowrap">{{$report->tab6}}</td>
                                    <td class="text-nowrap">{{$report->tab7}}</td>
                                    <td class="text-nowrap">{{$report->total}}</td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 3 && $count == 3)
                                <tr class="align-middle" style="text-align: center;">
                                    <td></td>
                                    <td class="text-nowrap" style="text-align: left;">C) JUMLAH ALIRAN MASUK (RM)</td>
                                    <td class="text-nowrap">{{$total->satu}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 3 && $count != 4)
                                <?php $count = 3; ?>
                            @endif
                            @if ($report->tab8 == 3 && $count == 3)
                                <?php $count = 4; ?>
                                <tr class="align-middle" style="text-align: left;">
                                    <td></td>
                                    <td class="text-nowrap">D) PERBELANJAAN PERNIAGAAN (RM)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @if ($report->tab8 == 3)
                                <tr class="align-middle" style="text-align: center;">
                                    <td class="text-nowrap">{{$report->tab3}}</td>
                                    <td class="text-nowrap">{{$report->nama_jenis}}</td>
                                    <td class="text-nowrap">{{$report->tab5}}</td>
                                    <td class="text-nowrap">{{$report->tab6}}</td>
                                    <td class="text-nowrap">{{$report->tab7}}</td>
                                    <td class="text-nowrap">{{$report->total}}</td>
                                </tr>
                            @endif
                        @endforeach
                        @if($count == 4)
                        <tr class="align-middle" style="text-align: center;">
                            <td></td>
                            <td class="text-nowrap" style="text-align: left;">G) JUMLAH ALIRAN KELUAR</td>
                            <td class="text-nowrap">{{$total->dua}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                        <tr class="align-middle" style="text-align: center;">
                            <td></td>
                            <td class="text-nowrap" style="text-align: left;">JUMLAH BAKI/SIMPANAN</td>
                            <td class="text-nowrap">{{$total->tiga}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
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

$( document ).ready(function() {
    $('#laporanbukutunai').DataTable( {
        searching: false,
        sorting:false,
        paging:false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.loader').hide();
});

function gettabledata(type,val){
    $('.loader').show();
    $('#laporanbukutunai').dataTable().fnClearTable();
    $('#laporanbukutunai').dataTable().fnDestroy();
    if (type == 'month'){
      var bulan = val;
      var year = document.getElementById("iptYear").value;
    }else if(type == 'year'){
      var bulan = document.getElementById("iptBulan").value;
      var year = val;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/laporanalirantunaiDetail/apa",
        type:"GET",
        data: {     
            tahun:year,
            bulan:bulan
        },
        success: function(data) {
            console.log(data);
            $("#tblname").html(data);
            // $("#tblfoot").html(data[1]);
            if(data[0] != null){
                $('#laporanbukutunai').DataTable( {
                    searching: false,
                    sorting:false,
                    paging:false,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
            $('.loader').hide();
        }
    });
}
</script>
@endsection