@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <h4 class="text" style="display: inline-block;padding-bottom:20px;color:#00A651;">LAPORAN JUMLAH JUALAN / PURATA JUALAN PENERIMA INSENTIF MENGIKUT NEGERI SETAKAT 
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:25vh">
                <option selected="">Tahun</option>
                <option value="1">2021</option>
                <option value="2">2020</option>
                <option value="3">2019</option>
              </select></h4>
            
            <table id="pendapatanbultbl">
                <colgroup>
                    <col span="1" style="width: 5%;">
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 10%;">
                    <col span="1" style="width: 10%;">
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
                    <tr class="align-middle">
                        <th scope="col">Bil</th>
                        <th scope="col">Negeri</th>
                        <th scope="col">Jenis Insentif</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Bil Penerima Insentif</th>
                        <th scope="col">Jumlah Insentif</th>
                        <th scope="col">Jumlah Jualan</th>
                        <th scope="col">Purata Jualan</th>
                        <th scope="col">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user)
                    <tr class="align-middle">
                        <td class="text-nowrap"><label class="form-check-label">{{$user->namausahawan}}</label></td>
                        <td class="text-nowrap"><label class="form-check-label">{{$user->nokadpengenalan}}</label></td>
                        <td class="text-nowrap"><button class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" onclick="window.location.href='/insentifdetail/{{$user->id}}'">
                            <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Kemaskini
                        </button></td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

    $( document ).ready(function() {
        const dataTableBasic = new simpleDatatables.DataTable("#pendapatanbultbl", {
            searchable: true,
            fixedHeight: true,
            sortable: false
        });
    });
    
    </script
@endsection