usahawan list

<table>
    <tr>
        <td>Kod_PT</td>
        <td>namausahawan</td>
        <td>nokadpengenalan</td>
        <td>tarikhlahir</td>
        <td>U_Jantina_ID</td>
        <td>U_Bangsa_ID</td>
        <td>statusperkahwinan</td>
        <td>U_Pendidikan_ID</td>
        <td>alamat1</td>
        <td>alamat2</td>
        <td>alamat3</td>
        <td>bandar</td>
        <td>poskod</td>
        <td>U_Negeri_ID</td>
        <td>U_Daerah_ID</td>
        <td>U_Mukim_ID</td>
        <td>U_Parlimen_ID</td>
        <td>U_Dun_ID</td>
        <td>U_Kampung_ID</td>
        <td>U_Seksyen_ID</td>
        <td>id_kategori_usahawan</td>
        <td>gambar_url</td>
        <td>notelefon</td>
        <td>nohp</td>
        <td>email</td>
        <td>createdby_id</td>
        <td>createdby_kod_PT</td>
        <td>modifiedby_id</td>
        <td>modifiedby_kod_PT</td>
    </tr>
    @foreach ($usahawan as $usahawan)
        <tr>
            <td>{{ $usahawan->Kod_PT }}</td>
            <td>{{ $usahawan->namausahawan }}</td>
            <td>{{ $usahawan->nokadpengenalan }}</td>
            <td>{{ $usahawan->tarikhlahir }}</td>
            <td>{{ $usahawan->U_Jantina_ID }}</td>
            <td>{{ $usahawan->U_Bangsa_ID }}</td>
            <td>{{ $usahawan->statusperkahwinan }}</td>
            <td>{{ $usahawan->U_Pendidikan_ID }}</td>
            <td>{{ $usahawan->alamat1 }}</td>
            <td>{{ $usahawan->alamat2 }}</td>
            <td>{{ $usahawan->alamat3 }}</td>
            <td>{{ $usahawan->bandar }}</td>
            <td>{{ $usahawan->poskod }}</td>
            <td>{{ $usahawan->U_Negeri_ID }}</td>
            <td>{{ $usahawan->U_Daerah_ID }}</td>
            <td>{{ $usahawan->U_Mukim_ID }}</td>
            <td>{{ $usahawan->U_Parlimen_ID }}</td>
            <td>{{ $usahawan->U_Dun_ID }}</td>
            <td>{{ $usahawan->U_Kampung_ID }}</td>
            <td>{{ $usahawan->U_Seksyen_ID }}</td>
            <td>{{ $usahawan->id_kategori_usahawan }}</td>
            <td>{{ $usahawan->gambar_url }}</td>
            <td>{{ $usahawan->notelefon }}</td>
            <td>{{ $usahawan->nohp }}</td>
            <td>{{ $usahawan->email }}</td>
            <td>{{ $usahawan->createdby_id }}</td>
            <td>{{ $usahawan->createdby_kod_PT }}</td>
            <td>{{ $usahawan->modifiedby_id }}</td>
            <td>{{ $usahawan->modifiedby_kod_PT }}</td>
        </tr>
    @endforeach

</table>

<br><br><br><br><br>

<form method="POST" action="/usahawan">
    @csrf
    Kod_PT <input type="text" name="Kod_PT"><br>
    namausahawan <input type="text" name="namausahawan"><br>
    nokadpengenalan <input type="text" name="nokadpengenalan"><br>
    tarikhlahir <input type="date" name="tarikhlahir"><br>
    U_Jantina_ID <input type="text" name="U_Jantina_ID"><br>
    U_Bangsa_ID <input type="text" name="U_Bangsa_ID"><br>
    statusperkahwinan <input type="text" name="statusperkahwinan"><br>
    U_Pendidikan_ID <input type="text" name="U_Pendidikan_ID"><br>
    alamat1 <input type="text" name="alamat1"><br>
    alamat2 <input type="text" name="alamat2"><br>
    alamat3 <input type="text" name="alamat3"><br>
    bandar <input type="text" name="bandar"><br>
    poskod <input type="text" name="poskod"><br>
    U_Negeri_ID <input type="text" name="U_Negeri_ID"><br>
    U_Daerah_ID <input type="text" name="U_Daerah_ID"><br>
    U_Mukim_ID <input type="text" name="U_Mukim_ID"><br>
    U_Parlimen_ID <input type="text" name="U_Parlimen_ID"><br>
    U_Dun_ID <input type="text" name="U_Dun_ID"><br>
    U_Kampung_ID <input type="text" name="U_Kampung_ID"><br>
    U_Seksyen_ID <input type="text" name="U_Seksyen_ID"><br>
    id_kategori_usahawan <input type="text" name="id_kategori_usahawan"><br>
    gambar_url <input type="text" name="gambar_url"><br>
    notelefon <input type="text" name="notelefon"><br>
    nohp <input type="text" name="nohp"><br>
    email <input type="text" name="email"><br>
    createdby_id <input type="text" name="createdby_id"><br>
    createdby_kod_PT <input type="text" name="createdby_kod_PT"><br>
    modifiedby_id <input type="text" name="modifiedby_id"><br>
    modifiedby_kod_PT <input type="text" name="modifiedby_kod_PT"><br>

    <input type="submit">
</form>
