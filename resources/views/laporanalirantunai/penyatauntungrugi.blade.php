@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;">LAPORAN PENYATA UNTUNG RUGI
                BAGI TAHUN
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
            </h3>
            <div style="overflow-x: scroll !important;overflow-y: scroll !important;">
                <table id="pnlbulk" class="table table-sm table-bordered table-hover">
                    <colgroup>
                        <col span="1" style="width: 35%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 25%;">
                        <col span="1" style="width: 25%;">
                    </colgroup>
                    <thead>
                        <tr class="align-middle">
                            <th scope="col">PERKARA/BULAN</th>
                            <th scope="col">JANUARI</th>
                            <th scope="col">FEBRUARI</th>
                            <th scope="col">MAC</th>
                            <th scope="col">APRIL</th>
                            <th scope="col">MEI</th>
                            <th scope="col">JUN</th>
                            <th scope="col">JULAI</th>
                            <th scope="col">OGOS</th>
                            <th scope="col">SEPTEMBER</th>
                            <th scope="col">OKTOBER</th>
                            <th scope="col">NOVEMBER</th>
                            <th scope="col">DISEMBER</th>
                            <th scope="col">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <tr class="align-middle">
                            <td class="text-nowrap">HASIL JUALAN</td>
                            <td class="text-nowrap">{{$Hasil->bul1}}</td>
                            <td class="text-nowrap">{{$Hasil->bul2}}</td>
                            <td class="text-nowrap">{{$Hasil->bul3}}</td>
                            <td class="text-nowrap">{{$Hasil->bul4}}</td>
                            <td class="text-nowrap">{{$Hasil->bul5}}</td>
                            <td class="text-nowrap">{{$Hasil->bul6}}</td>
                            <td class="text-nowrap">{{$Hasil->bul7}}</td>
                            <td class="text-nowrap">{{$Hasil->bul8}}</td>
                            <td class="text-nowrap">{{$Hasil->bul9}}</td>
                            <td class="text-nowrap">{{$Hasil->bul10}}</td>
                            <td class="text-nowrap">{{$Hasil->bul11}}</td>
                            <td class="text-nowrap">{{$Hasil->bul12}}</td>
                            <td class="text-nowrap">{{$Hasil->jumlah}}</td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-nowrap">KOS JUALAN</td>
                            <td class="text-nowrap">{{$Kos->bul1}}</td>
                            <td class="text-nowrap">{{$Kos->bul2}}</td>
                            <td class="text-nowrap">{{$Kos->bul3}}</td>
                            <td class="text-nowrap">{{$Kos->bul4}}</td>
                            <td class="text-nowrap">{{$Kos->bul5}}</td>
                            <td class="text-nowrap">{{$Kos->bul6}}</td>
                            <td class="text-nowrap">{{$Kos->bul7}}</td>
                            <td class="text-nowrap">{{$Kos->bul8}}</td>
                            <td class="text-nowrap">{{$Kos->bul9}}</td>
                            <td class="text-nowrap">{{$Kos->bul10}}</td>
                            <td class="text-nowrap">{{$Kos->bul11}}</td>
                            <td class="text-nowrap">{{$Kos->bul12}}</td>
                            <td class="text-nowrap">{{$Kos->jumlah}}</td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-nowrap">UNTUNG/RUGI KASAR</td>
                            <td class="text-nowrap">{{$Kasar->bul1}}</td>
                            <td class="text-nowrap">{{$Kasar->bul2}}</td>
                            <td class="text-nowrap">{{$Kasar->bul3}}</td>
                            <td class="text-nowrap">{{$Kasar->bul4}}</td>
                            <td class="text-nowrap">{{$Kasar->bul5}}</td>
                            <td class="text-nowrap">{{$Kasar->bul6}}</td>
                            <td class="text-nowrap">{{$Kasar->bul7}}</td>
                            <td class="text-nowrap">{{$Kasar->bul8}}</td>
                            <td class="text-nowrap">{{$Kasar->bul9}}</td>
                            <td class="text-nowrap">{{$Kasar->bul10}}</td>
                            <td class="text-nowrap">{{$Kasar->bul11}}</td>
                            <td class="text-nowrap">{{$Kasar->bul12}}</td>
                            <td class="text-nowrap">{{$Kasar->jumlah}}</td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-nowrap">PERBELANJAAN PENTADBIRAN & OPERASI</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul1}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul2}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul3}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul4}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul5}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul6}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul7}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul8}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul9}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul10}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul11}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->bul12}}</td>
                            <td class="text-nowrap">{{$Perbelanjaan->jumlah}}</td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-nowrap">HASIL-HASIL LAIN</td>
                            <td class="text-nowrap">{{$Lain->bul1}}</td>
                            <td class="text-nowrap">{{$Lain->bul2}}</td>
                            <td class="text-nowrap">{{$Lain->bul3}}</td>
                            <td class="text-nowrap">{{$Lain->bul4}}</td>
                            <td class="text-nowrap">{{$Lain->bul5}}</td>
                            <td class="text-nowrap">{{$Lain->bul6}}</td>
                            <td class="text-nowrap">{{$Lain->bul7}}</td>
                            <td class="text-nowrap">{{$Lain->bul8}}</td>
                            <td class="text-nowrap">{{$Lain->bul9}}</td>
                            <td class="text-nowrap">{{$Lain->bul10}}</td>
                            <td class="text-nowrap">{{$Lain->bul11}}</td>
                            <td class="text-nowrap">{{$Lain->bul12}}</td>
                            <td class="text-nowrap">{{$Lain->jumlah}}</td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-nowrap">UNTUNG/RUGI BERSIH</td>
                            <td class="text-nowrap">{{$Bersih->bul1}}</td>
                            <td class="text-nowrap">{{$Bersih->bul2}}</td>
                            <td class="text-nowrap">{{$Bersih->bul3}}</td>
                            <td class="text-nowrap">{{$Bersih->bul4}}</td>
                            <td class="text-nowrap">{{$Bersih->bul5}}</td>
                            <td class="text-nowrap">{{$Bersih->bul6}}</td>
                            <td class="text-nowrap">{{$Bersih->bul7}}</td>
                            <td class="text-nowrap">{{$Bersih->bul8}}</td>
                            <td class="text-nowrap">{{$Bersih->bul9}}</td>
                            <td class="text-nowrap">{{$Bersih->bul10}}</td>
                            <td class="text-nowrap">{{$Bersih->bul11}}</td>
                            <td class="text-nowrap">{{$Bersih->bul12}}</td>
                            <td class="text-nowrap">{{$Bersih->jumlah}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="overflow-x: scroll !important;overflow-y: scroll !important;padding-top: 5vh;">
                <table id="pnlind">
                    <colgroup>
                        <col span="1" style="width: 35%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 25%;">
                        <col span="1" style="width: 25%;">
                    </colgroup>
                    <thead>
                        <tr class="align-middle">
                            <th scope="col">Nama</th>
                            <th scope="col">Negeri</th>
                            <th scope="col">Pusat Tanggungjawab</th>
                            <th scope="col">Penyata Untung Rugi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="align-middle">
                            <td class="text-nowrap textlbl">{{$user->namausahawan}}</td>
                            <td class="text-nowrap textlbl">{{$user->negeri}}</td>
                            <td class="text-nowrap textlbl">{{$user->PusatTang}}</td>
                            <td class="text-nowrap" style="text-align: center;">
                                <button class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" onclick="generatereport(14,'/penyatauntungrugiDetail',{{$user->id}});return false;">
                                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Penyata Untung Rugi
                            </button></td>
                        </tr>
                        @endforeach
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
        var table = $('#pnlbulk').DataTable({
            "paging":   false,
            "searching": false,
            "sorting":false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        var table = $('#pnlind').DataTable({
            "paging":   true,
            "bFilter": true,
        });
        
        
        $('.loader').hide();
    });

    function gettabledata(type,val){
        $('.loader').show();
        $('#pnlbulk').dataTable().fnClearTable();
        $('#pnlbulk').dataTable().fnDestroy();
        
        var year = document.getElementById("iptYear").value;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/penyatauntungrugi/apa",
            type:"GET",
            data: {     
                tahun:year
            },
            success: function(data) {
                console.log(data);
                $("#tblname").html(data);
                // $("#tblfoot").html(data[1]);
                if(data[0] != null){
                    $('#pnlbulk').DataTable( {
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