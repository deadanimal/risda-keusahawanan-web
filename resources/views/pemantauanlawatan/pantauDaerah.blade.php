@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center" id="contentbody">
            <h4 class="text" style="display: inline-block;padding-bottom:20px;color:#00A651;">LAPORAN PEMANTAUAN LAWATAN BAGI INSENTIF SETAKAT      
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
                MENGIKUT DAERAH/PT
          </h4>
            <div style="overflow-x: scroll !important;overflow-y: scroll !important;">
                <table id="laporlawatdaerah" class="table table-sm table-bordered table-hover">
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
                            <td class="text-nowrap">{{$report->negeri}}</td>
                            <td class="text-nowrap">{{$report->daerah}}</td>
                            <td class="text-nowrap">{{$report->tab3}}</td>
                            <td class="text-nowrap">{{$report->tab4}}</td>
                            <td class="text-nowrap">{{$report->tab5}}</td>
                            <td class="text-nowrap">{{$report->tab6}}</td>
                            <td class="text-nowrap">{{$report->tab7}}</td>
                            <td class="text-nowrap">{{$report->percent}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="tblfoot">
                        <tr class="align-middle" style="text-align: center;">
                            <th class="text-nowrap" colspan="4">Jumlah</th>
                            <th class="text-nowrap">{{$total->satu}}</th>
                            <th class="text-nowrap">{{$total->dua}}</th>
                            <th class="text-nowrap">{{$total->tiga}}</th>
                            <th class="text-nowrap">{{$total->empat}}</th>
                            <th class="text-nowrap">100</th>
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
        $('#laporlawatdaerah').DataTable( {
            searching: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

    function gettabledata(type,val){
        $('#laporlawatdaerah').dataTable().fnClearTable();
        $('#laporlawatdaerah').dataTable().fnDestroy();
        if (type == 'year'){
            var year = val;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/pantauDaerah/apa",
            type:"GET",
            data: {     
                tahun:year
            },
            success: function(data) {
                console.log(data);
                $("#tblname").html(data[0]);
                $("#tblfoot").html(data[1]);
                if(data[0] != null){
                    $('#laporlawatdaerah').DataTable( {
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