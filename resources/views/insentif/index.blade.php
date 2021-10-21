@extends('dashboard')
@section('content')
<div class="card">
  <div class="card-body overflow-hidden p-lg-6">
      <div class="row align-items-center">
          
              <h3 class="text" style="padding-bottom:20px;color:#00A651;">Insentif Usahawan</h3>
              <table id="insentiftbl">
                  <colgroup>
                      <col span="1" style="width: 50%;">
                      <col span="1" style="width: 30%;">
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
                  </style>
                  <thead>
                      <tr class="align-middle">
                          <th scope="col">Nama</th>
                          <th scope="col">No. KP</th>
                          <th scope="col">Tetapan Insentif</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                      <tr class="align-middle">
                          <td class="text-nowrap"><label class="form-check-label">{{$user->namausahawan}}</label></td>
                          <td class="text-nowrap"><label class="form-check-label">{{$user->nokadpengenalan}}</label></td>
                          <td class="text-nowrap"><button class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" onclick="window.location.href='/insentifdetail/{{$user->id}}'">
                              <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Insentif
                          </button></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          
      </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    const dataTableBasic = new simpleDatatables.DataTable("#insentiftbl", {
        searchable: true,
        fixedHeight: true,
        sortable: false
    });
});

</script>
@endsection