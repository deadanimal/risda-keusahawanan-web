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
                {{-- <div style="padding-bottom: 20px;">
                    <a class="btn btn-primary" onclick="ExportExcel()">Export Excel</a>
                    <a class="btn btn-primary" onclick="ExportPDF()">Export PDF</a>
                </div> --}}
                <table id="tbllaporaninsentif" class="table table-sm table-bordered table-hover">
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
                            <th scope="col" rowspan="3">Jenis Insentif</th>
                            <th scope="col" rowspan="3">Tahun</th>
                            <th scope="col" colspan="10">Jenis Perniagaan</th>
                            <th scope="col" rowspan="3">Jumlah Project</th>
                            <th scope="col" rowspan="3">%</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col" colspan="2">P. PRODUK MAKANAN</th>
                            <th scope="col" colspan="2">P. PRODUK BUKAN MAKANAN</th>
                            <th scope="col" colspan="2">P. PRODUK PERTANIAN</th>
                            <th scope="col" colspan="2">PERKHIDMATAN PEMASARAN</th>
                            <th scope="col" colspan="2">PERKHIDMATAN BUKAN PEMASARAN</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col">Bil</th>
                            <th scope="col">%</th>
                            <th scope="col">Bil</th>
                            <th scope="col">%</th>
                            <th scope="col">Bil</th>
                            <th scope="col">%</th>
                            <th scope="col">Bil</th>
                            <th scope="col">%</th>
                            <th scope="col">Bil</th>
                            <th scope="col">%</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <?php $num=1; ?>
                        @foreach ($reports as $report)
                        <tr class="align-middle" style="text-align: center;">
                            <td class="text-nowrap" style="padding-right:2vh;"><?php echo $num++;?></td>
                            <td class="text-nowrap">{{$report->negeri}}</td>
                            <td class="text-nowrap" style="text-align: left;">{{$report->jenis}}</td>
                            <td class="text-nowrap">{{$report->tab3}}</td>
                            <td class="text-nowrap">{{$report->tab4}}</td>
                            <td class="text-nowrap">{{$report->percent1}}</td>
                            <td class="text-nowrap">{{$report->tab5}}</td>
                            <td class="text-nowrap">{{$report->percent2}}</td>
                            <td class="text-nowrap">{{$report->tab6}}</td>
                            <td class="text-nowrap">{{$report->percent3}}</td>
                            <td class="text-nowrap">{{$report->tab7}}</td>
                            <td class="text-nowrap">{{$report->percent4}}</td>
                            <td class="text-nowrap">{{$report->tab8}}</td>
                            <td class="text-nowrap">{{$report->percent5}}</td>
                            <td class="text-nowrap" style="padding-left:2vh;">{{$report->jumproject}}</td>
                            <td class="text-nowrap">{{$report->jumprojectpercent}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="tblfoot">
                        <tr class="align-middle" style="text-align: center;">
                            <td colspan="4" style="border-top: 1px solid black;border-bottom: 1px solid black;" colspan="4">Jumlah</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->satu}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$percent->satu}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->dua}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$percent->dua}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->tiga}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$percent->tiga}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->empat}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$percent->empat}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->lima}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$percent->lima}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->enam}}</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$percent->enam}}</td>
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
        $('#tbllaporaninsentif').DataTable( {
            searching: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

  function gettabledata(type,val){
    $('#tbllaporaninsentif').dataTable().fnClearTable();
    $('#tbllaporaninsentif').dataTable().fnDestroy();
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
        url: "/laporaninsentif/apa",
        type:"GET",
        data: {     
            tahun:year,
            id_jenis_insentif:jenis
        },
        success: function(data) {
            
            $("#tblname").html(data[0]);
            $("#tblfoot").html(data[1]);
            if(data[0] != null){
                $('#tbllaporaninsentif').DataTable( {
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