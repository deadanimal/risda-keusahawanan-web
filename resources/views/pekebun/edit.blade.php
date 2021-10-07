pekebun Edit

<br><br><br>


<form method="POST" action="/pekebun/{{$pekebun->id}}">
    @csrf
    @method('PUT')
    usahawanid <input value="{{$pekebun->usahawanid}}" type="text" name="usahawanid"> <br>
    status_daftar_usahawan<input value="{{$pekebun->status_daftar_usahawan}}" type="text" name="status_daftar_usahawan"> <br>
    Nama_PK <input value="{{$pekebun->Nama_PK}}" type="text" name="Nama_PK"> <br>
    No_KP<input value="{{$pekebun->No_KP}}" type="text" name="No_KP"> <br>
    No_Geran<input value="{{$pekebun->No_Geran}}" type="text" name="No_Geran"> <br>
    No_Lot<input value="{{$pekebun->No_Lot}}" type="text" name="No_Lot"> <br>
    U_Negeri_ID<input value="{{$pekebun->U_Negeri_ID}}" type="text" name="U_Negeri_ID"> <br>
    U_Daerah_ID<input value="{{$pekebun->U_Daerah_ID}}" type="text" name="U_Daerah_ID"> <br>
    U_Mukim_ID<input value="{{$pekebun->U_Mukim_ID}}" type="text" name="U_Mukim_ID"> <br>
    U_Parlimen_ID<input value="{{$pekebun->U_Parlimen_ID}}" type="text" name="U_Parlimen_ID"> <br>
    U_Dun_ID<input value="{{$pekebun->U_Dun_ID}}" type="text" name="U_Dun_ID"> <br>
    U_Kampung_ID<input value="{{$pekebun->U_Kampung_ID}}" type="text" name="U_Kampung_ID"> <br>
    U_Seksyen_ID<input value="{{$pekebun->U_Seksyen_ID}}" type="text" name="U_Seksyen_ID"> <br>
    keluasan_hektar<input value="{{$pekebun->keluasan_hektar}}" type="text" name="keluasan_hektar"> <br>
    jenis_tanaman_kebun<input value="{{$pekebun->jenis_tanaman_kebun}}" type="text" name="jenis_tanaman_kebun"> <br>

    <input  type="submit">
</form>