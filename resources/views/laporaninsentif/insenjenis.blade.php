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
                            <th scope="col">&nbsp; &nbsp; &nbsp;BIL &nbsp; &nbsp; &nbsp;<div style="display: none;">P.PRODUK MAKANAN</div></th>
                            <th scope="col">RM</th>
                            <th scope="col">&nbsp; &nbsp; &nbsp;BIL &nbsp; &nbsp; &nbsp;<div style="display: none;">P.PRODUK BUKAN MAKANAN</div></th>
                            <th scope="col">RM</th>
                            <th scope="col">&nbsp; &nbsp; &nbsp;BIL &nbsp; &nbsp; &nbsp;<div style="display: none;">P.PRODUK PERTANIAN</div></th>
                            <th scope="col">RM</th>
                            <th scope="col">&nbsp; &nbsp; &nbsp;BIL &nbsp; &nbsp; &nbsp;<div style="display: none;">PERKHIDMATAN PEMASARAN</div></th>
                            <th scope="col">RM</th>
                            <th scope="col">&nbsp; &nbsp; &nbsp;BIL &nbsp; &nbsp; &nbsp;<div style="display: none;">PERKHIDMATAN BUKAN PEMASARAN</div></th>
                            <th scope="col">RM</th>
                            <th scope="col">&nbsp; &nbsp; &nbsp;BIL &nbsp; &nbsp; &nbsp;<div style="display: none;">JUMLAH</div></th>
                            <th scope="col">RM</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <?php $num=1; ?>
                        @foreach ($reports as $report)
                        <tr class="align-middle" style="text-align: center;">
                            <td class="text-nowrap" style="padding-right:2vh;"><label class="form-check-label"><?php echo $num++;?></label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->negeri}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->jenis}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$report->tab3}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab4)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab5)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab6)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab7)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab8)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab9)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab10)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab11)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab12)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->tab13)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->jumbil)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->jumrm)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->puratajual)}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{number_format($report->puratapend)}}</label></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="tblfoot">
                        <tr style="display:none;">
                            <th></th>
                            <th></th>
                            <th>
                                <div>JUMLAH</div>
                                <div>PURATA JUALAN</div>
                            </th>
                            <th></th>
                            <th>
                                <div>{{number_format($total->satu)}}</div>
                                <div>{{number_format($avg->satu)}}</div>
                            </th>
                            <th>{{number_format($rm->satu)}}</th>
                            <th>
                                <div>{{number_format($total->dua)}}</div>
                                <div>{{number_format($avg->dua)}}</div>
                            </th>
                            <th>{{number_format($rm->dua)}}</th>
                            <th>
                                <div>{{number_format($total->tiga)}}</div>
                                <div>{{number_format($avg->tiga)}}</div>
                            </th>
                            <th>{{number_format($rm->tiga)}}</th>
                            <th>
                                <div>{{number_format($total->empat)}}</div>
                                <div>{{number_format($avg->empat)}}</div>
                            </th>
                            <th>{{number_format($rm->empat)}}</th>
                            <th>
                                <div>{{number_format($total->lima)}}</div>
                                <div>{{number_format($avg->lima)}}</div>
                            </th>
                            <th>{{number_format($rm->lima)}}</th>
                            <th>
                                <div>{{number_format($total->enam)}}</div>
                                <div>{{number_format($avg->enam)}}</div>
                            </th>
                            <th>{{number_format($rm->enam)}}</th>
                            <th>
                                <div>{{number_format($total->tujuh)}}</div>
                            </th>
                            <th>{{number_format($rm->tujuh)}}</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th colspan="4" style="border-top: 1px solid black;border-bottom: 1px solid black;">JUMLAH</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($total->satu)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($rm->satu)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($total->dua)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($rm->dua)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($total->tiga)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($rm->tiga)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($total->empat)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($rm->empat)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($total->lima)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($rm->lima)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($total->enam)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($rm->enam)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($total->tujuh)}}</th>
                            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">{{number_format($rm->tujuh)}}</th>
                        </tr>
                        <tr class="align-middle" style="text-align: center;">
                            <th colspan="4" style="border-bottom: 1px solid black;">Purata Jualan</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{number_format($avg->satu)}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{number_format($avg->dua)}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{number_format($avg->tiga)}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{number_format($avg->empat)}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{number_format($avg->lima)}}</th>
                            <th colspan="2" style="border-bottom: 1px solid black;">{{number_format($avg->enam)}}</th>
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
        var today = new Date();
        var year = today.getFullYear();
        $('#laporaninsentifjenis').DataTable( {
            searching: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:       '<span class="bi bi-files">Copy</span>',
                    className: 'btn btn-primary btn-xs',
                    titleAttr: 'Copy',
                    title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF MENGIKUT JENIS PERNIAGAAN SETAKAT '+year,
                    footer: true,
                },
                {
                    extend:    'excelHtml5',
                    text:      '<span class="bi bi-file-spreadsheet">Excel</span>',
                    className: 'btn btn-primary btn-xs',
                    titleAttr: 'Excel',
                    title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF MENGIKUT JENIS PERNIAGAAN SETAKAT '+year,
                    footer: true,
                },
                {
                    extend:    'csvHtml5',
                    text:      '<span class="bi bi-filetype-csv">CSV</span>',
                    className: 'btn btn-primary btn-xs',
                    titleAttr: 'CSV',
                    title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF MENGIKUT JENIS PERNIAGAAN SETAKAT '+year
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<span class="bi bi-file-earmark-pdf">PDF</span>',
                    className: 'btn btn-primary btn-xs',
                    titleAttr: 'PDF',
                    title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF MENGIKUT JENIS PERNIAGAAN SETAKAT '+year,
                    orientation:'landscape',
                    footer: true,
                    customize: function(doc) {
                        doc.styles.tableHeader.fontSize = 9,
                        doc.styles.tableHeader.fillColor = '#00A651',
                        doc.styles.tableFooter.fontSize = 10,
                        doc.styles.tableFooter.fillColor = '',
                        doc.styles.tableFooter.color = 'black',
                        doc.defaultStyle.alignment = 'center',
                        doc.defaultStyle.fontSize = 9;
                    }
                }
                // {
                //     extend:    'print',
                //     text:      '<span class="bi bi-printer">Print</span>',
                //     className: 'btn btn-primary btn-xs',
                //     titleAttr: 'PDF',
                //     title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF MENGIKUT JENIS PERNIAGAAN SETAKAT '+year
                // }
            ]
        });
        $('.loader').hide();
    });

    function gettabledata(type,val){
        $('.loader').show();
        $('#laporaninsentifjenis').dataTable().fnClearTable();
        $('#laporaninsentifjenis').dataTable().fnDestroy();
        var sel = document.getElementById("iptJenisInsentif");
        if(sel.selectedIndex == 0){
            var jenistext = '';
        }else{
            var jenistext= sel.options[sel.selectedIndex].text;
        }
        
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
                        searching: true,
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend:    'copyHtml5',
                                text:       '<span class="bi bi-files">Copy</span>',
                                className: 'btn btn-primary btn-xs',
                                titleAttr: 'Copy',
                                footer: true,
                                title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF '+jenistext+' MENGIKUT JENIS PERNIAGAAN SETAKAT '+year
                            },
                            {
                                extend:    'excelHtml5',
                                text:      '<span class="bi bi-file-spreadsheet">Excel</span>',
                                className: 'btn btn-primary btn-xs',
                                titleAttr: 'Excel',
                                footer: true,
                                title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF '+jenistext+' MENGIKUT JENIS PERNIAGAAN SETAKAT '+year
                            },
                            {
                                extend:    'csvHtml5',
                                text:      '<span class="bi bi-filetype-csv">CSV</span>',
                                className: 'btn btn-primary btn-xs',
                                titleAttr: 'CSV',
                                title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF '+jenistext+' MENGIKUT JENIS PERNIAGAAN SETAKAT '+year
                            },
                            {
                                extend:    'pdfHtml5',
                                text:      '<span class="bi bi-file-earmark-pdf">PDF</span>',
                                className: 'btn btn-primary btn-xs',
                                titleAttr: 'PDF',
                                title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF '+jenistext+' MENGIKUT JENIS PERNIAGAAN SETAKAT '+year,
                                orientation:'landscape',
                                footer: true,
                                customize: function(doc) {
                                    doc.styles.tableHeader.fontSize = 9,
                                    doc.styles.tableHeader.fillColor = '#00A651',
                                    doc.styles.tableFooter.fontSize = 10,
                                    doc.styles.tableFooter.fillColor = '',
                                    doc.styles.tableFooter.color = 'black',
                                    doc.defaultStyle.alignment = 'center',
                                    doc.defaultStyle.fontSize = 9;
                                }
                            },
                            // {
                            //     extend:    'print',
                            //     text:      '<span class="bi bi-printer">Print</span>',
                            //     className: 'btn btn-primary btn-xs',
                            //     titleAttr: 'PDF',
                            //     title: 'LAPORAN ANALISA PURATA JUALAN/ PENDAPATAN PENERIMA INSENTIF '+jenistext+' MENGIKUT JENIS PERNIAGAAN SETAKAT '+year
                            // }
                        ]
                    });
                }
                $('.loader').hide();
            }
        });
  }
</script>
@endsection