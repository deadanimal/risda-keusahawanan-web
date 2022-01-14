@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center" id="contentbody">
            <h4 class="text" style="display: inline-block;padding-bottom:20px;color:#00A651;">LAPORAN JUMLAH JUALAN / PURATA JUALAN PENERIMA INSENTIF
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:25vh" onchange="gettabledata('jenis',this.value)" id="iptJenisInsentif">
                    <option value="">Jenis Insentif</option>
                      @foreach ($ddInsentif as $items)
                          <option value="{{ $items->id_jenis_insentif }}"> 
                              {{ $items->nama_insentif }} 
                          </option>
                      @endforeach
                </select>
                  MENGIKUT DAERAH/PT SETAKAT 
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
                <table id="laporaninsentifjantina" class="table table-sm table-bordered table-hover">
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
                            <th scope="col" rowspan="3" style="padding-right:2vh;">Umur</th>
                            <th scope="col" rowspan="3">Jenis Insentif</th>
                            <th scope="col" rowspan="3">Tahun</th>
                            <th scope="col" rowspan="1" colspan="6">Jantina</th>
                            <th scope="col" rowspan="2" colspan="2">Jumlah</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col" colspan="2">Lelaki</th>
                            <th scope="col" colspan="2">Perempuan</th>
                            <th scope="col" colspan="2">Lain-Lain</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col" >Bil</th>
                            <th scope="col" >%</th>
                            <th scope="col" >Bil</th>
                            <th scope="col" >%</th>
                            <th scope="col" >Bil</th>
                            <th scope="col" >%</th>
                            <th scope="col" >Bil</th>
                            <th scope="col" >%</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        @foreach ($reports as $report)
                        <tr class="align-middle" style="text-align: center;">
                            <td class="text-nowrap">{{$report->tab1}}</td>
                            <td class="text-nowrap">{{$report->jenis}}</td>
                            <td class="text-nowrap">{{$report->tab3}}</td>
                            <td class="text-nowrap">{{$report->tab4}}</td>
                            <td class="text-nowrap">{{$report->percent1}}</td>
                            <td class="text-nowrap">{{$report->tab5}}</td>
                            <td class="text-nowrap">{{$report->percent2}}</td>
                            <td class="text-nowrap">{{$report->tab6}}</td>
                            <td class="text-nowrap">{{$report->percent3}}</td>
                            <td class="text-nowrap">{{$report->jumbil}}</td>
                            <td class="text-nowrap">{{$report->jumpercent}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="tblfoot">
                        <tr class="align-middle" style="text-align: center;">
                            <th class="text-nowrap" colspan="3">Jumlah</th>
                            <th class="text-nowrap">{{$jumlah->satu}}</th>
                            <th class="text-nowrap">{{$jumlah->dua}}</th>
                            <th class="text-nowrap">{{$jumlah->tiga}}</th>
                            <th class="text-nowrap">{{$jumlah->empat}}</th>
                            <th class="text-nowrap">{{$jumlah->lima}}</th>
                            <th class="text-nowrap">{{$jumlah->enam}}</th>
                            <th class="text-nowrap">{{$jumlah->tujuh}}</th>
                            <th class="text-nowrap">{{$jumlah->lapan}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $( document ).ready(function() {
        $('#laporaninsentifjantina').DataTable( {
            searching: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    function gettabledata(type,val){
        $('#laporaninsentifjantina').dataTable().fnClearTable();
        $('#laporaninsentifjantina').dataTable().fnDestroy();
        if (type == 'year'){
        var year = val;
        var jenis = document.getElementById("iptJenisInsentif").value;
        }else if(type == 'jenis'){
        var year = document.getElementById("iptYear").value;
        var jenis = val;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/insenjantinaumur/apa",
            type:"GET",
            data: {     
                tahun:year,
                id_jenis_insentif:jenis
            },
            success: function(data) {

                $("#tblname").html(data[0]);
                $("#tblfoot").html(data[1]);
                if(data[0] != null){
                    $('#laporaninsentifjantina').DataTable( {
                        searching: false,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                }
            }
        });
    }
</script>
@endsection