@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center" id="contentbody">
            <h4 class="text" style="display: inline-block;padding-bottom:20px;color:#00A651;">LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:25vh" onchange="gettabledata('jenis',this.value)" id="iptJenisInsentif">
                    <option value="">Jenis Insentif</option>
                      @foreach ($ddInsentif as $items)
                          <option value="{{ $items->id_jenis_insentif }}"> 
                              {{ $items->nama_insentif }} 
                          </option>
                      @endforeach
                </select>
                  MENGIKUT JENIS PERNIAGAAN SETAKAT 
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
                <table id="laporaninsentifjenis" class="table table-sm table-bordered table-hover">
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
                            <td class="text-nowrap">{{$report->negeri}}</td>
                            <td class="text-nowrap">{{$report->jenis}}</td>
                            <td class="text-nowrap">{{$report->tab3}}</td>
                            <td class="text-nowrap">{{$report->tab4}}</td>
                            <td class="text-nowrap">{{$report->tab5}}</td>
                            <td class="text-nowrap">{{$report->tab6}}</td>
                            <td class="text-nowrap">{{$report->tab7}}</td>
                            <td class="text-nowrap">{{$report->tab8}}</td>
                            <td class="text-nowrap">{{$report->tab9}}</td>
                            <td class="text-nowrap">{{$report->tab10}}</td>
                            <td class="text-nowrap">{{$report->tab11}}</td>
                            <td class="text-nowrap">{{$report->tab12}}</td>
                            <td class="text-nowrap">{{$report->tab13}}</td>
                            <td class="text-nowrap">{{$report->jumbil}}</td>
                            <td class="text-nowrap">{{$report->jumrm}}</td>
                            <td class="text-nowrap">{{$report->puratajual}}</td>
                            <td class="text-nowrap">{{$report->puratapend}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="tblfoot">
                        <tr class="align-middle" style="text-align: center;">
                            <th colspan="4" style="border-top: 1px solid black;border-bottom: 1px solid black;">JUMLAH</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->satu}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$rm->satu}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->dua}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$rm->dua}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->tiga}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$rm->tiga}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->empat}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$rm->empat}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->lima}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$rm->lima}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->enam}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$rm->enam}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$total->tujuh}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{$rm->tujuh}}</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th colspan="4" style="border-bottom: 1px solid black;">Purata Jualan</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{$avg->satu}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{$avg->dua}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{$avg->tiga}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{$avg->empat}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{$avg->lima}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{$avg->enam}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;"></th>
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
        $('#laporaninsentifjenis').DataTable( {
            searching: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.loader').hide();
    });

    function gettabledata(type,val){
        $('.loader').show();
        $('#laporaninsentifjenis').dataTable().fnClearTable();
        $('#laporaninsentifjenis').dataTable().fnDestroy();
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
                console.log(data[0]);
                $("#tblname").html(data[0]);
                $("#tblfoot").html(data[1]);
                if(data[0] != null){
                    $('#laporaninsentifjenis').DataTable( {
                        searching: false,
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