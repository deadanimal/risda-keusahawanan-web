@extends('dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="../../../js/jquery-3.6.0.min.js"> </script>
@section('content')
<div class="card">
    <div class="card-body p-lg-6" style="overflow-x: scroll !important;overflow-y: scroll !important;">
        <div class="row align-items-center">
            <div id="displaysatu" >
                <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Pegawai</h3>
                <table id="pegawaitbl" style="padding-bottom:2vh;">
                    <colgroup>
                        <col span="1" style="width: 21%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 14%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 15%;">
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
                            <th scope="col">Nama</th>
                            <th scope="col">Negeri</th>
                            <th scope="col">Daerah</th>
                            <th scope="col">Mukim</th>
                            <th scope="col">Peranan</th>
                            <th scope="col">Aktifkan Pengguna</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $user)
                        <tr class="align-middle">
                            <td class="text-nowrap"><label class="form-check-label">{{$user->nama}}</label></td>
                            <td class="text-nowrap"><label id="fldNegeri{{$user->id}}" class="form-check-label">{{$user->negerinama}}</label></td>
                            <td class="text-nowrap"><label id="fldDaerah{{$user->id}}" class="form-check-label">{{$user->daerahnama}}</label></td>
                            <td class="text-nowrap">
                                <select id="ddmukim{{$user->id}}" class="form-select form-select-sm" aria-label=".form-select-sm example" style="display:inline-block;width:10rem;" onchange="ChangeMukim({{$user->id}}, this.value)">
                                <option selected="true" disabled="disabled">Mukim</option>
                                @foreach ($ddMukim as $items)
                                    <option value="{{ $items->U_Mukim_ID }}" {{ ( $items->U_Mukim_ID == $user->mukim) ? 'selected' : '' }}> 
                                        {{ $items->Mukim }} 
                                    </option>
                                @endforeach
                            </select></td>
                            <td>
                                <select id="ddperanan{{$user->id}}" class="form-select form-select-sm" aria-label=".form-select-sm example" style="display:inline-block;width:9rem;">
                                    <option selected="true" disabled="disabled">Peranan</option>
                                    @foreach ($ddPeranan as $items)
                                        <option value="{{ $items->peranan_id }}" {{ ( $items->peranan_id == $user->peranan_pegawai) ? 'selected' : '' }}> 
                                            {{ $items->kod_peranan }} 
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="align-middle text-nowrap" >
                                <div class="form-check form-switch" style="margin-left:10px;">
                                    <label class="form-check-label" for="flexSwitchCheckDefault{{$user->id}}"></label>
                                    <input class="form-check-input" id="flexSwitchCheckDefault{{$user->id}}" name="pengguna" type="checkbox"/>
                            </td>
                            <td class="align-middle text-nowrap">
                                <button class="btn btn-primary" type="submit" onclick="simpanpengguna({{$user}})" >Simpan </button>
                            </td>
                            <td></td>
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
    const dataTableBasic = new simpleDatatables.DataTable("#pegawaitbl", {
        searchable: true,
        fixedHeight: true,
        sortable: true
    });
    //$('#pegawaitbl').DataTable();
    GetPengguna();
    // var user = <?php echo $pegawai; ?>;
    // for (var i=0; i < user.length; i++) {
    //     ChangeMukim(user[i].id,user[i].mukim);
    // }
});

function GetPengguna(){
    var user = <?php echo $pegawai; ?>;
    for (var i=0; i < user.length; i++) {
        //console.log(user);
        //console.log("flexSwitchCheckDefault"+user[i].value);
        if(user[i].status_pengguna == 1){
            $("#flexSwitchCheckDefault"+user[i].id).attr("checked","");
        }else{
            //$("#flexSwitchCheckDefault"+user[i].value).attr("checked","");
        }
    }
}

function simpanpengguna(user){
    var id = user.id;
    var status = "";
    if ($("#flexSwitchCheckDefault"+id).is(":checked")){
        status = 1;
    }else{
        status = 0;
    }
    var peranan = $("#ddperanan"+id).find(":selected").val();
    var mukim = $("#ddmukim"+id).find(":selected").val();
    //console.log(peranan);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('pegawai.post') }}",
        type:"PUT",
        data: {     
            id:id,
            status:status,
            peranan:peranan,
            mukim:mukim
        },
        success: function(data) {
            //swal("Congrats!", ", Your account is created!", "success");
            alert("Akaun Pegawai Kemaskini Berjaya");
            //location.reload();
        }
    });
}

function ChangeMukim(id,value){
    //alert(value);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/pegawai/apa",
        type:"GET",
        data: {     
            id:id,
            value:value
        },
        success: function(data) {
            $("#fldNegeri"+id).html(data.negeri);
            $("#fldDaerah"+id).html(data.daerah);
            //alert(data.negeri);
            //swal("Congrats!", ", Your account is created!", "success");
            //alert("Akaun Pegawai Kemaskini Berjaya");
            //location.reload();
        }
    });
}

</script>
@endsection