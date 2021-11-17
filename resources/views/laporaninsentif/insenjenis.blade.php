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
                            <th scope="col" colspan="12">Bidang</th>
                            <th scope="col" rowspan="3">Purata Jualan</th>
                            <th scope="col" rowspan="3">Purata Pendapatan</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col" colspan="2">P. PRODUK MAKANAN</th>
                            <th scope="col" colspan="2">P. PRODUK BUKAN MAKANAN</th>
                            <th scope="col" colspan="2">P. PRODUK PERTANIAN</th>
                            <th scope="col" colspan="2">PERKHIDMATAN PEMASARAN</th>
                            <th scope="col" colspan="2">PERKHIDMATAN BUKAN PEMASARAN</th>
                            <th scope="col" colspan="2">JUMLAH</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th scope="col">Bil</th>
                            <th scope="col">RM</th>
                            <th scope="col">Bil</th>
                            <th scope="col">RM</th>
                            <th scope="col">Bil</th>
                            <th scope="col">RM</th>
                            <th scope="col">Bil</th>
                            <th scope="col">RM</th>
                            <th scope="col">Bil</th>
                            <th scope="col">RM</th>
                            <th scope="col">Bil</th>
                            <th scope="col">RM</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <?php $num=1; ?>
                        @foreach ($reports as $report)
                        <tr class="align-middle" style="text-align: center;">
                            <td class="text-nowrap" style="padding-right:2vh;"><?php echo $num++;?></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->negeri}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->jenis}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab3}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab4}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab5}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab6}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab7}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab8}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab9}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab10}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab11}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab12}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab13}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->jumbil}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->jumrm}}</label></td>
                        </tr>
                        @endforeach
                        <tr class="align-middle" style="text-align: center;">
                            <td colspan="4">JUMLAH</td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$total->satu}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$rm->satu}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$total->dua}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$rm->dua}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$total->tiga}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$rm->tiga}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$total->empat}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$rm->empat}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$total->lima}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$rm->lima}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$total->enam}}</label></td>
                            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">{{$rm->enam}}</label></td>
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
        const dataTableBasic = new simpleDatatables.DataTable("#laporaninsentif", {
        searchable: false,
        fixedHeight: true,
        sortable: true,
        paging: false
        });
    });

    function gettabledata(type,val){
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
        url: "/insenjenis/apa",
        type:"GET",
        data: {     
            tahun:year,
            id_jenis_insentif:jenis
        },
        success: function(data) {

          $("#tblname").html(data);
        }
    });
  }
</script>
@endsection