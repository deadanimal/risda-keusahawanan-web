Pekebun list


<br><br><br>

<table>
    <tr>
        <td>usahawanid</td>
        <td>status_daftar_usahawan</td>
        <td>Nama_PK</td>
        <td>No_KP</td>
        <td>No_Geran</td>
        <td>No_Lot</td>
        <td>U_Negeri_ID</td>
        <td>U_Daerah_ID</td>
        <td>U_Mukim_ID</td>
        <td>U_Parlimen_ID</td>
        <td>U_Dun_ID</td>
        <td>U_Kampung_ID</td>
        <td>U_Seksyen_ID</td>
        <td>keluasan_hektar</td>
        <td>jenis_tanaman_kebun</td>
    </tr>

    @foreach ($pekebun as $pekebun)

        <tr>
            <td>{{$pekebun->usahawanid}}</td>
            <td>{{$pekebun->status_daftar_usahawan}}</td>
            <td>{{$pekebun->Nama_PK}}</td>
            <td>{{$pekebun->No_KP}}</td>
            <td>{{$pekebun->No_Geran}}</td>
            <td>{{$pekebun->No_Lot}}</td>
            <td>{{$pekebun->U_Negeri_ID}}</td>
            <td>{{$pekebun->U_Daerah_ID}}</td>
            <td>{{$pekebun->U_Mukim_ID}}</td>
            <td>{{$pekebun->U_Parlimen_ID}}</td>
            <td>{{$pekebun->U_Dun_ID}}</td>
            <td>{{$pekebun->U_Kampung_ID}}</td>
            <td>{{$pekebun->U_Seksyen_ID}}</td>
            <td>{{$pekebun->keluasan_hektar}}</td>
            <td>{{$pekebun->jenis_tanaman_kebun}}</td>
        </tr>

    @endforeach
</table>


<br><br><br>

<form method="POST" action="/pekebun">
    @csrf

    usahawanid <input type="text" name="usahawanid"> <br>
    status_daftar_usahawan<input type="text" name="status_daftar_usahawan"> <br>
    Nama_PK <input type="text" name="Nama_PK"> <br>
    No_KP<input type="text" name="No_KP"> <br>
    No_Geran<input type="text" name="No_Geran"> <br>
    No_Lot<input type="text" name="No_Lot"> <br>
    U_Negeri_ID<input type="text" name="U_Negeri_ID"> <br>
    U_Daerah_ID<input type="text" name="U_Daerah_ID"> <br>
    U_Mukim_ID<input type="text" name="U_Mukim_ID"> <br>
    U_Parlimen_ID<input type="text" name="U_Parlimen_ID"> <br>
    U_Dun_ID<input type="text" name="U_Dun_ID"> <br>
    U_Kampung_ID<input type="text" name="U_Kampung_ID"> <br>
    U_Seksyen_ID<input type="text" name="U_Seksyen_ID"> <br>
    keluasan_hektar<input type="text" name="keluasan_hektar"> <br>
    jenis_tanaman_kebun<input type="text" name="jenis_tanaman_kebun"> <br>

    <input type="submit">
</form>
