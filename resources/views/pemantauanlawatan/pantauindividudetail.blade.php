@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
      <a style="margin-top:-2vh;margin-left:-2vh;" class="btn btn-sm btn-outline-secondary border-300 me-2" href="/pantauindividu"> 
        <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Kembali</a>
        <div class="row align-items-center">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;padding-top:3vh;">LAPORAN LAWATAN PEMANTAUAN INDIVIDU BAGI TAHUN 
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
                <div style="padding-bottom: 20px;">
                    <a class="btn btn-primary" onclick="ExportPDF()">Export PDF</a>
                </div>
                <table id="laporanpantauind" class="table table-sm table-hover" style="border:none;border-collapse: collapse;">
                    <colgroup>
                        <col span="1" style="width:30%;border:none;">
                        <col span="1" style="width:70%;">
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
                        .table td{
                            border: none;
                        }
                    </style>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tblname">
                        <input style="display: none;" id="userid" value="{{$usahawan->usahawanid}}" />
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Nama Usahawan</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->namausahawan}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Nama Syarikat</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->syarikat}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Daerah</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->daerah}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Negeri</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->negeri}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Jenis Perniagaan</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->jenisniaga}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Jenis Insentif</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->jenis_insentif}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Tahun Terima Insentif</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->tahun}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" style="padding-top: 20px;">Tarikh Lawatan</td>
                            <td class="text-nowrap" style="padding-top: 20px;">: &nbsp {{$usahawan->tarikh_lawatan}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Masa Lawatan</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->masa_lawatan}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Pegawai Lawatan</td>
                            <td class="text-nowrap" >: &nbsp {{$usahawan->pegawai}}</td>
                        </tr>
                        <tr class="align-middle" style="text-align: left;">
                            <td class="text-nowrap" >Gambar Lawatan</td>
                            <td class="text-nowrap" style="padding-top: 20px;">:
                                <div style="display: none;">
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;<br>
                                    &nbsp;<br>
                                </div>
                                    <img id="gambau" style="height:200px;width:200px;" src="{{$usahawan->gambar_lawatan}}"/>
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="text-nowrap" colspan="2" style="padding-top: 20px;">
                                Tindakan yang perlu dilaksanakan oleh usahawan
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-nowrap" colspan="2" style="border: 1px solid black;padding:25px 15px">
                                {{$usahawan->tindakan}}
                            </td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <td class="text-nowrap" colspan="2" style="padding-top: 20px;">
                                Catatan/Komen Keseluruhan
                            </td>
                            <td></td>

                        </tr>
                        <tr>
                            <td class="text-nowrap" colspan="2" style="border: 1px solid black;padding:25px 15px">
                                {{$usahawan->komen}}
                            </td>
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
        $('#laporanpantauind').DataTable( {
            searching: false,
            sorting:false,
            paging:false,
            dom: 'Bfrtip',
            exportOptions: {
                stripHtml: false,
            },
            buttons: [
                'copy', 'csv', 'excel'
            ]
        });
        $('.loader').hide();
    })
    
    function gettabledata(type,val){
        $('.loader').show();
        
        var year = document.getElementById("iptYear").value;
        var usahawanid = document.getElementById("userid").value;
        console.log(usahawanid);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/pantauinddtl",
            type:"GET",
            data: {     
                tahun:year,
                usahawanid:usahawanid
            },
            success: function(data) {
                console.log(data);
                $("#tblname").html(data);
                $('.loader').hide();
            }
        });
    }

    function ExportPDF(){
        
        var doc = new jsPDF("p", "mm", "a4")
        doc.autoTable({ html: '#laporanpantauind' })
        var myImage = document.getElementById("gambau").src; 
        doc.addImage(myImage, 'JPEG', 80, 100, 60, 35);
        doc.save('PemantauanLawatanIndividu.pdf')
    
    }
</script>
@endsection