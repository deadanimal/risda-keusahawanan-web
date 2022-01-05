@extends('dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="card">
    <div class="card-body p-lg-6" style="overflow-x: scroll !important;overflow-y: scroll !important;">
        <div class="row align-items-center">
            <div id="displaysatu" >
                <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Pegawai</h3>
                <table class="tblpegawai table table-sm table-hover" id="pegawaitbl" style="padding-bottom:2vh;padding-right:4vh" >
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
                        /* .tblpegawai td{
                            padding-right: 1vh;
                            padding-left: 1vh;
                        } */
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
                            <td class="form-check-label">{{$user->nama}}</td>
                            <td class="form-check-label">{{$user->negerinama}}</td>
                            <td id="fldDaerah{{$user->id}}" class="form-check-label">{{$user->daerahnama}}</td>
                            <td >
                                <select id="ddmukim{{$user->id}}" class="form-select form-select-sm" aria-label=".form-select-sm example" style="display:inline-block;width:27vh;" onchange="ChangeMukim({{$user->id}}, this.value)">
                                <option selected="true" disabled="disabled">Mukim</option>
                                @foreach ($ddMukim as $items)
                                    <option value="{{ $items->U_Mukim_ID }}" {{ ( $items->U_Mukim_ID == $user->mukim) ? 'selected' : '' }}> 
                                        {{ $items->Mukim }} 
                                    </option>
                                @endforeach
                            </select></td>
                            <td>
                                <select id="ddperanan{{$user->id}}" class="form-select form-select-sm" aria-label=".form-select-sm example" style="display:inline-block;width:18vh;">
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
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="border: none">
                        <tr style="border: none">
                            <th><input type="text" placeholder="Search Nama" /></th>
                            <th>Negeri</th>
                            <th>Daerah</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
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
    GetPengguna();
    datatable();
    
});

function datatable(){
    var table = $('#pegawaitbl').DataTable({
        "paging":   true,
        "bFilter": true,
        "stateSave": true,
        initComplete: function () {
            this.api().columns([1, 2]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );

            this.api().columns([0]).every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

            var r = $('#pegawaitbl tfoot tr');
            r.find('th').each(function(){
                $(this).css('padding', 8);
            });
            $('#pegawaitbl thead').append(r);
            $('#search_0').css('text-align', 'center');
        }
    });
}

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
            location.reload();
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