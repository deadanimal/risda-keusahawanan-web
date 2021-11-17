@extends('dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="../../../js/jquery-3.6.0.min.js"> </script>

@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6" style="overflow-x: scroll !important;overflow-y: scroll !important;">
        <div class="row align-items-center">
            <div id="displaysatu" >
                <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Usahawan</h3>
                <table id="penggunatbl">
                    <colgroup>
                        <col span="1" style="width: 30%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 20%;">
                        <col span="1" style="width: 15%;">
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
                    </style>
                    <thead>
                        <tr class="align-middle">
                            <th scope="col">Nama</th>
                            <th scope="col">Negeri</th>
                            <th scope="col">Pusat Tanggungjawab</th>
                            <th scope="col">Aktifkan Pengguna</th>
                            <th scope="col">Kemaskini Profil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <input style="display: none;" type="text" name="user" value="{{$user->id}}"/>
                        <tr class="align-middle">
                            <td class="text-nowrap"><label class="form-check-label">{{$user->namausahawan}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$user->U_Negeri_ID}}</label></td>
                            <td class="text-nowrap"><select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display:inline-block;width:20vh;">
                                <option selected="">Kawasan</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select></td>
                            <td class="align-middle text-nowrap">
                                <div class="form-check form-switch" style="margin-left:10px;">
                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                <input class="form-check-input" id="flexSwitchCheckDefault{{$user->id}}" name="pengguna" type="checkbox" onclick="aktifkanpengguna({{$user}})"/>
                                </div>
                            </td>
                            <td class="text-nowrap"><button class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" onclick="tetapanpengguna('satu',{{$user}})">
                                <span class="me-1" data-fa-transform="shrink-3"></span>Kemaskini
                            </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @foreach ($users as $user) 
                <div class="form-check form-switch">
                    <input style="display: none;" type="text" name="user" value="{{$user->id}}"/>
                    <label class="form-check-label" for="flexSwitchCheckDefault">{{$user->name}} ( {{$user->no_kp}} )</label>
                    <input class="form-check-input" id="flexSwitchCheckDefault{{$user->id}}" name="pengguna" type="checkbox" onclick="aktifkanpengguna({{$user->id}},{{$user->status_pengguna}})"/>
                    <button class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" style="float: right;" onclick="tetapanpengguna('satu')">
                        <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tetapan Profil
                    </button>
                </div>
                @endforeach --}}
            </div>
            <div id="displaydua" style="display: none">
                <a style="margin-top:-2vh;margin-left:-2vh;" class="btn btn-sm btn-outline-secondary border-300 me-2" onclick="tetapanpengguna('dua')"> 
                    <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Kembali</a>
                <div class="card-header" style="padding-top:4vh;">
                <style>
                    .card-header{
                        margin-top: -1.0rem;
                    }
                </style>
                    <div class="row">
                        <div class="col-12">
                          <div class="card mb-3 btn-reveal-trigger">
                            <div class="card-header position-relative min-vh-25 mb-8">
                              <div class="cover-image">
                                <div class="bg-holder rounded-3 rounded-bottom-0">
                                    <h3 class="text" style="padding-bottom:20px;color:#00A651;padding:10px 0px 0px 20px;margin-top:2rem">Kemaskini Usahawan</h3>
                                </div>
                              </div>
                              <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle" style="position: relative !important;">
                                <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> <img src="../../assets/img/team/2.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                                  <input class="d-none" id="profile-image" type="file" name="gambarusahawan"/>
                                  {{-- <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label> --}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-body bg-light">
                      <form class="row g-3" id="datausahawan" method="POST" action="/usahawanWeb" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="col-lg-12">
                          <label class="form-label">Nama Usahawan</label>
                          <input class="form-control usahawanfield" name="namausahawan"   type="text"/>
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" >No Kad Pengenalan</label>
                          <input class="form-control usahawanfield" name="nokadpengenalan"   type="text"/>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" >No. Usahawan</label>
                            <input class="form-control usahawanfield" name="U_Pendidikan_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="tarikhlahir">Tarikh Lahir</label>
                          <input class="form-control usahawanfield" name="tarikhlahir" id="tarikhlahirid" type="text"/>
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" >Jantina</label>
                          <input class="form-control usahawanfield" name="U_Jantina_ID"   type="text"/>
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" >Bangsa</label>
                          <input class="form-control usahawanfield" name="U_Bangsa_ID"   type="text"/>
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label">Status Perkahwinan</label>
                          <input class="form-control usahawanfield" name="statusperkahwinan"   type="text"/>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" >Pendidikan</label>
                            <input class="form-control usahawanfield" name="U_Pendidikan_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" >Negeri Premis Perniagaan</label>
                            <input class="form-control usahawanfield" name="U_Pendidikan_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" >Pusat Tanggungjawab</label>
                            <input class="form-control usahawanfield" name="U_Pendidikan_ID"   type="text"  />
                        </div>
                        
                        
                        <div class="col-lg-12">
                            <label class="form-label">Alamat</label>
                            <input class="form-control usahawanfield" name="alamat1"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Bandar</label>
                            <input class="form-control usahawanfield" name="bandar"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Poskod</label>
                            <input class="form-control usahawanfield" name="poskod"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Negeri</label>
                            <input class="form-control usahawanfield" name="U_Negeri_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Daerah</label>
                            <input class="form-control usahawanfield" name="U_Daerah_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Mukim</label>
                            <input class="form-control usahawanfield" name="U_Mukim_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Parlimen</label>
                            <input class="form-control usahawanfield" name="U_Parlimen_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Dun</label>
                            <input class="form-control usahawanfield" name="U_Dun_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Kampung</label>
                            <input class="form-control usahawanfield" name="U_Kampung_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Seksyen</label>
                            <input class="form-control usahawanfield" name="U_Seksyen_ID"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Kategori</label>
                            <input class="form-control usahawanfield" name="id_kategori_usahawan"   type="text"  />
                        </div>
                        {{-- <div class="col-lg-6">
                            <label class="form-label">Gambar</label>
                            <input class="form-control" name="gambar_url" type="text"  />
                        </div> --}}
                        <div class="col-lg-6">
                            <label class="form-label">No. Telefon (R)</label>
                            <input class="form-control usahawanfield" name="notelefon" id="" type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">No. Telefon (HP)</label>
                            <input class="form-control usahawanfield" name="nohp"   type="text"  />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Email</label>
                            <input class="form-control usahawanfield" name="email"   type="text"  />
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                          <button class="btn btn-primary" type="submit" onclick="SubmitUsahawan()">Kemas Kini</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
            {{-- <textarea class="form-control" name="statusperkahwinan" cols="30" rows="13"></textarea> --}}
            {{-- <div class="form-check form-switch">
                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" />
                <label class="form-check-label" for="flexSwitchCheckChecked">Pengguna 2</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" id="flexSwitchCheckDisabled" type="checkbox" disabled="" />
                <label class="form-check-label" for="flexSwitchCheckDisabled">Pengguna 3</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" id="flexSwitchCheckCheckedDisabled" type="checkbox" checked="" disabled="" />
                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Pengguna 3</label>
            </div> --}}
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    GetPengguna();
    const dataTableBasic = new simpleDatatables.DataTable("#penggunatbl", {
          searchable: true,
          fixedHeight: true,
          sortable: true
      });
    //$('#penggunatbl').DataTable(); 
    //$( "#tarikhlahirid" ).datepicker();
    
});

function GetPengguna(){
    var user = <?php echo $users; ?>;
    //var user = document.getElementsByName("user");
    for (var i=0; i < user.length; i++) {
        //console.log("flexSwitchCheckDefault"+user[i].value);
        if(user[i].status_pengguna == 1){
            $("#flexSwitchCheckDefault"+user[i].id).attr("checked","");
        }else{
            //$("#flexSwitchCheckDefault"+user[i].value).attr("checked","");
        }
    }
    console.log(user);
}

function aktifkanpengguna(user){
    var id = user.id;
    var status = "";
    if ($("#flexSwitchCheckDefault"+id).is(":checked")){
        status = 1;
    }else{
        status = 0;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('usahawan.post') }}",
        type:"PUT",
        data: {     
            id:id,
            status:status
        },
        success: function(data) {
            if(status == 1){
                alert("Akaun Usahawan Berjaya Diaktifkan");
            }else{
                alert("Akaun Usahawan Berjaya Dinyahaktifkan");
            }
            
        }
    });
}

function tetapanpengguna(page,data){
    if(page == 'satu'){
        $("#displaysatu").hide();
        $("#displaydua").show();

        var role = <?php echo Auth::user()->role ?>;

        $("#displaydua input[name=namausahawan]").val(data.namausahawan);
        $("#displaydua input[name=nokadpengenalan]").val(data.nokadpengenalan);
        $("#displaydua input[name=tarikhlahir]").val(data.tarikhlahir);
        $("#displaydua input[name=U_Jantina_ID]").val(data.U_Jantina_ID);
        $("#displaydua input[name=U_Bangsa_ID]").val(data.U_Bangsa_ID);
        $("#displaydua input[name=statusperkahwinan]").val(data.statusperkahwinan);
        $("#displaydua input[name=U_Pendidikan_ID]").val(data.U_Pendidikan_ID);
        $("#displaydua input[name=alamat1]").val(data.alamat1);
        $("#displaydua input[name=bandar]").val(data.bandar);
        $("#displaydua input[name=poskod]").val(data.poskod);
        $("#displaydua input[name=U_Negeri_ID]").val(data.U_Negeri_ID);
        $("#displaydua input[name=U_Daerah_ID]").val(data.U_Daerah_ID);
        $("#displaydua input[name=U_Mukim_ID]").val(data.U_Mukim_ID);
        $("#displaydua input[name=U_Parlimen_ID]").val(data.U_Parlimen_ID);
        $("#displaydua input[name=U_Dun_ID]").val(data.U_Dun_ID);
        $("#displaydua input[name=U_Kampung_ID]").val(data.U_Kampung_ID);
        $("#displaydua input[name=U_Seksyen_ID]").val(data.U_Seksyen_ID);
        $("#displaydua input[name=id_kategori_usahawan]").val(data.id_kategori_usahawan);
        $("#displaydua input[name=gambar_url]").val(data.gambar_url);
        $("#displaydua input[name=notelefon]").val(data.notelefon);
        $("#displaydua input[name=nohp]").val(data.nohp);
        $("#displaydua input[name=email]").val(data.email);
        $("#datausahawan").attr("action", "/usahawanWeb/"+data.id);

        var x = document.getElementsByClassName("usahawanfield");       
        if (role == 1 || role == 7){
            for (var i = 0; i < x.length; i++) {
                x[i].disabled = false;
            }        
        }else{
            for (var i = 0; i < x.length; i++) {
                x[i].disabled = true;
            }
        }
        
    }else if(page == 'dua'){
        $("#displaysatu").show();
        $("#displaydua").hide();
    }
}

function SubmitUsahawan(){
    if (confirm('Anda pasti ingin simpan data usahawan?')) {
        $('#datausahawan').submit();
    } else {
        
    }
    
}

</script>
@endsection