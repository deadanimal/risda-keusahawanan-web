@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <div id="displaysatu" >
                <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Usahawan</h3>
                <table id="penggunatbl">
                    <colgroup>
                        <col span="1" style="width: 40%;">
                        <col span="1" style="width: 20%;">
                        <col span="1" style="width: 20%;">
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
                    </style>
                    <thead>
                        <tr class="align-middle">
                            <th scope="col">Nama</th>
                            <th scope="col">No. KP</th>
                            <th scope="col">Aktifkan Pengguna</th>
                            <th scope="col">Tatapan Profil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <input style="display: none;" type="text" name="user" value="{{$user->id}}"/>
                        <tr class="align-middle">
                            <td class="text-nowrap"><label class="form-check-label">{{$user->name}}</label></td>
                            <td class="text-nowrap"><label class="form-check-label">{{$user->no_kp}}</label></td>
                            <td class="align-middle text-nowrap">
                                <div class="form-check form-switch" >
                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                <input class="form-check-input" id="flexSwitchCheckDefault{{$user->id}}" name="pengguna" type="checkbox" onclick="aktifkanpengguna({{$user->id}},{{$user->status_pengguna}})"/>
                                </div>
                            </td>
                            <td class="text-nowrap"><button class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" onclick="tetapanpengguna('satu')">
                                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tetapan Profil
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
                    <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Back</a>
                <div class="card-header" style="padding-top:2vh;">
                    <h3 class="text" style="padding-bottom:20px;color:#00A651;">Kemaskini Usahawan</h3>
                  </div>
                  <div class="card-body bg-light">
                      <form class="row g-3">
                        <div class="col-lg-12">
                          <label class="form-label" for="first-name">Nama Usahawan</label>
                          <input class="form-control" id="first-name" type="text" value="Anthony" />
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="last-name">No Kad Pengenalan</label>
                          <input class="form-control" id="last-name" type="text" value="Hopkins" />
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="email1">Tarikh Lahir</label>
                          <input class="form-control" id="email1" type="text" value="anthony@gmail.com" />
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="email2">Jantina</label>
                          <input class="form-control" id="email2" type="text" value="+44098098304" />
                        </div>
                        <div class="col-lg-12">
                          <label class="form-label" for="email3">Bangsa</label>
                          <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                          <label class="form-label" for="intro">Status Perkahwinan</label>
                          <textarea class="form-control" id="intro" name="intro" cols="30" rows="13">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking. I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face. There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</textarea>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Pendidikan</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Alamat</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Bandar</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Poskod</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Negeri</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Daerah</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Mukim</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Parlimen</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Dun</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Kampung</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Seksyen</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Kategori</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Gambar</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">notelefon</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">No Hp</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="email3">Email</label>
                            <input class="form-control" id="email3" type="text" value="Software Engineer" />
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                          <button class="btn btn-primary" type="submit">Update </button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
             
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
    const dataTableBasic = new simpleDatatables.DataTable("#penggunatbl", {
          searchable: true,
          fixedHeight: true,
          sortable: false
      });
    //$('#penggunatbl').DataTable();
    GetPengguna();
});

function GetPengguna(){
    var user = <?php echo $users; ?>;
    //var user = document.getElementsByName("user");
    for (var i=0; i < user.length; i++) {
        //console.log(users);
        //console.log("flexSwitchCheckDefault"+user[i].value);
        if(user[i].status_pengguna == 1){
            $("#flexSwitchCheckDefault"+user[i].id).attr("checked","");
        }else{
            //$("#flexSwitchCheckDefault"+user[i].value).attr("checked","");
        }
    }
}

function aktifkanpengguna(id,status){
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/usahawan/"+id,
        type:"PUT",
        data: {     
            id:id,
            status:status
        },
        success: function(data) {
            location.reload();
        }
    });
}

function tetapanpengguna(page){
    if(page == 'satu'){
        $("#displaysatu").hide();
        $("#displaydua").show();
    }else if(page == 'dua'){
        $("#displaysatu").show();
        $("#displaydua").hide();
    }
    
    //window.location.href = "/usahawan/"+id;
}

</script>
@endsection