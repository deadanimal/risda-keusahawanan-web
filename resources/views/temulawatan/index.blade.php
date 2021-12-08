@extends('dashboard')
@section('content')
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
      <div class="card h-lg-100 overflow-hidden">
        <div class="card-header bg-light">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0" style="color:#00A651;">Temujanji Lawatan</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
        <div class="card h-lg-100">
        <div style="padding-top: 20px;padding-left:20px;overflow-x: scroll !important;overflow-y: scroll !important;">
            <table id="tbltemulawatan" class="table table-sm table-hover" style="width:max-content;">
                <colgroup>
                    <col span="1" style="width:15%;">
                    <col span="1" style="width:15%;">
                    <col span="1" style="width:20%;">
                    <col span="1" style="width:20%;white-space:pre-wrap; word-wrap:break-word;white-space: pre;">
                    <col span="1" style="width:10%;">
                    <col span="1" style="width:20%;">
                    <col span="1" style="width:20%;">
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
                    .dataTable-container{
                        padding-top: 3vh;
                    }
                    .dataTable-bottom{
                        padding-top: 3vh;
                    }
                </style>
                <thead>
                    <tr class="align-middle" style="text-align: center;">
                        <th>Tarikh Lawatan</th>
                        <th>Masa Lawatan</th>
                        <th>Usahawan</th>
                        <th>Pegawai</th>
                        <th>Jenis Lawatan</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="tblname">
                @foreach ($lawatans as $lawatan)
                    <tr class="align-middle" style="text-align: center;">
                        <td>{{ $lawatan->tarikh_lawatan }}</td>
                        <td>{{ $lawatan->masa_lawatan }}</td>
                        <td>{{ $lawatan->nama_usahawan }}</td>
                        <td>{{ $lawatan->nama_pegawai }}</td>
                        <td>{{ $lawatan->jenis_lawatan }}</td>
                        <td>{{ $lawatan->nama_status }}</td>
                        @if($lawatan->status_lawatan == 1)
                            <td></td>
                        @endif
                        @if($lawatan->status_lawatan == 2)
                            <td><div style="width: 190px;"><button class="btn btn-primary btn-sm" style="display: inline-block !important">Setuju</button> 
                                <button class="btn btn-info btn-sm" style="display: inline-block !important">Tarikh Baru</button></div>
                            </td>
                        @endif
                        @if($lawatan->status_lawatan == 3)
                            <td><button class="btn btn-primary btn-sm" >Selesai</button></td>
                        @endif
                        @if($lawatan->status_lawatan == 4)
                        @endif
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
        const dataTableBasic = new simpleDatatables.DataTable("#tbltemulawatan", {
        searchable: true,
        fixedHeight: true,
        sortable: false,
        paging: true
        });
    });


</script>
@endsection