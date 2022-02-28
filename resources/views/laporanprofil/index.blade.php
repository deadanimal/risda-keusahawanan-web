@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;">Laporan Profil Usahawan</h3>
            <div style="overflow-x: scroll !important;overflow-y: scroll !important;">
                <div style="padding-bottom: 20px;">
                    {{-- <input class="form-control usahawanfield" name="nokadpengenalan"   type="text"/> --}}
                    <input class="form-control" type="number" id="from" style="width: 150px;display: inline-block;"> Hingga
                    <input class="form-control" type="number" id="to" style="width: 150px;display: inline-block;">
                    <a class="btn btn-primary" onclick="ExportExcel()"><span>Export Excel</span></a>
                </div>
                <div style="padding-top: 10px;"> </div>
                <table id="insentiftbl" >
                    <colgroup>
                        <col span="1" style="width: 40%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 25%;">
                        <col span="1" style="width: 20%;">
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
                        .textlbl{
                            font-weight: 500 !important;
                            font-size: .8333333333rem;
                            letter-spacing: .02em;
                        }
                    </style>
                    <thead>
                        <tr class="align-middle">
                            <th scope="col">Nama</th>
                            <th scope="col">Negeri</th>
                            <th scope="col">Pusat Tanggungjawab</th>
                            <th scope="col">Laporan Profil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="align-middle">
                            <td class="text-nowrap textlbl">{{$user->namausahawan}}</td>
                            <td class="text-nowrap textlbl">@if($user->negeri){{$user->negeri->Negeri}}@endif</td>
                            <td class="text-nowrap textlbl">@if($user->PT){{$user->PT->keterangan}}@endif</td>
                            <td class="text-nowrap" style="text-align: center;">
                                <button class="btn btn-primary btn-sm mt-2" type="button" onclick="window.location.href='/profdetail/{{$user->id}}'">
                                Laporan
                            </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- style="display:none;" --}}
@endsection
@section('script')
<script type="text/javascript">

    $( document ).ready(function() {
        var table = $('#insentiftbl').DataTable({
            "paging":   true,
            "bFilter": true,
            "language": {
                "lengthMenu": "_MENU_ rekod setiap paparan",
                "zeroRecords": "Maaf - Tiada data dijumpai",
                "info": "Menunjukkan _PAGE_ daripada _PAGES_ paparan",
                "infoEmpty": "Tiada rekod dijumpai",
                "infoFiltered": "(ditapis daripada _MAX_ jumlah rekod)",
                "sSearch": "Carian :",
                "paginate": {
                    "previous": "Sebelum",
                    "next": "Seterus"
                }
            }
        });
        
        $('.loader').hide();
    });

    function ExportExcel(){
        var from = $("#from").val();
        var to = $("#to").val();

        window.location.href = "/ExcelLapProfil?from="+from+"&to="+to+"";
    }

    
    
</script>
@endsection