perniagaan list

<br><br>

<table>
    <tr>
        <td>usahawanid</td>
        <td>jenisperniagaan</td>
        <td>klusterperniagaan</td>
        <td>subkluster</td>
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
        <td>latitud</td>
        <td>logitud</td>
        <td>facebook</td>
        <td>instagram</td>
        <td>twitter</td>
        <td>lamanweb</td>
        <td>dropship</td>
        <td>ejen</td>
        <td>stokis</td>
        <td>outlet</td>
        <td>domestik</td>
        <td>luarnegara</td>
        <td>pasaranonline</td>
        <td>purata_jualan_bulanan</td>
        <td>peratus_kenaikan</td>
        <td>hasil_jualan_tahunan</td>
        <td>gambar_url</td>
        <td>createdby_id</td>
        <td>createdby_kod_PT</td>
        <td>modifiedby_id</td>
        <td>modifiedby_kod_PT</td>
    </tr>

    @foreach ($perniagaan as $perniagaan)
        <tr>
            <td>{{ $perniagaan->usahawanid }}</td>
            <td>{{ $perniagaan->jenisperniagaan }}</td>
            <td>{{ $perniagaan->klusterperniagaan }}</td>
            <td>{{ $perniagaan->subkluster }}</td>
            <td>{{ $perniagaan->alamat1 }}</td>
            <td>{{ $perniagaan->alamat2 }}</td>
            <td>{{ $perniagaan->alamat3 }}</td>
            <td>{{ $perniagaan->bandar }}</td>
            <td>{{ $perniagaan->poskod }}</td>
            <td>{{ $perniagaan->U_Negeri_ID }}</td>
            <td>{{ $perniagaan->U_Daerah_ID }}</td>
            <td>{{ $perniagaan->U_Mukim_ID }}</td>
            <td>{{ $perniagaan->U_Parlimen_ID }}</td>
            <td>{{ $perniagaan->U_Dun_ID }}</td>
            <td>{{ $perniagaan->U_Kampung_ID }}</td>
            <td>{{ $perniagaan->U_Seksyen_ID }}</td>
            <td>{{ $perniagaan->latitud }}</td>
            <td>{{ $perniagaan->logitud }}</td>
            <td>{{ $perniagaan->facebook }}</td>
            <td>{{ $perniagaan->instagram }}</td>
            <td>{{ $perniagaan->twitter }}</td>
            <td>{{ $perniagaan->lamanweb }}</td>
            <td>{{ $perniagaan->dropship }}</td>
            <td>{{ $perniagaan->ejen }}</td>
            <td>{{ $perniagaan->stokis }}</td>
            <td>{{ $perniagaan->outlet }}</td>
            <td>{{ $perniagaan->domestik }}</td>
            <td>{{ $perniagaan->luarnegara }}</td>
            <td>{{ $perniagaan->pasaranonline }}</td>
            <td>{{ $perniagaan->purata_jualan_bulanan }}</td>
            <td>{{ $perniagaan->peratus_kenaikan }}</td>
            <td>{{ $perniagaan->hasil_jualan_tahunan }}</td>
            <td>{{ $perniagaan->gambar_url }}</td>
            <td>{{ $perniagaan->createdby_id }}</td>
            <td>{{ $perniagaan->createdby_kod_PT }}</td>
            <td>{{ $perniagaan->modifiedby_id }}</td>
            <td>{{ $perniagaan->modifiedby_kod_PT }}</td>
        </tr>
    @endforeach
</table>


<br><br><br><br>

<form method="POST" action="/perniagaan">
    @csrf

    usahawanid <input type="text" name="usahawanid"> <br>
    jenisperniagaan  <input type="text" name="jenisperniagaan"> <br>
    klusterperniagaan <input type="text" name="klusterperniagaan"><br>
    subkluster <input type="text" name="subkluster"><br>
    alamat1 <input type="text" name="alamat1"><br>
    alamat2 <input type="text" name="alamat2"><br>
    alamat3 <input type="text" name="alamat3"><br>
    bandar  <input type="text" name="bandar"><br>
    poskod <input type="text" name="poskod"><br>
    U_Negeri_ID <input type="text" name="U_Negeri_ID"><br>
    U_Daerah_ID <input type="text" name="U_Daerah_ID"><br>
    U_Mukim_ID <input type="text" name="U_Mukim_ID"><br>
    U_Parlimen_ID <input type="text" name="U_Parlimen_ID"><br>
    U_Dun_ID <input type="text" name="U_Dun_ID"><br>
    U_Kampung_ID <input type="text" name="U_Kampung_ID"><br>
    U_Seksyen_ID <input type="text" name="U_Seksyen_ID"><br>
    latitud <input type="text" name="latitud"><br>
    logitud <input type="text" name="logitud"><br>
    facebook <input type="text" name="facebook"><br>
    instagram <input type="text" name="instagram"><br>
    twitter <input type="text" name="twitter"><br>
    lamanweb <input type="text" name="lamanweb"><br>
    dropship <input type="text" name="dropship"><br>
    ejen <input type="text" name="ejen"><br>
    stokis <input type="text" name="stokis"><br>
    outlet <input type="text" name="outlet"><br>
    domestik <input type="text" name="domestik"><br>
    luarnegara <input type="text" name="luarnegara"><br>
    pasaranonline <input type="text" name="pasaranonline"><br>
    purata_jualan_bulanan <input type="text" name="purata_jualan_bulanan"><br>
    peratus_kenaikan <input type="text" name="peratus_kenaikan"><br>
    hasil_jualan_tahunan  <input type="text" name="hasil_jualan_tahunan"><br>
    gambar_url <input type="text" name="gambar_url"><br>
    createdby_id <input type="text" name="createdby_id"><br>
    createdby_kod_PT <input type="text" name="createdby_kod_PT"><br>
    modifiedby_id <input type="text" name="modifiedby_id"><br>
    modifiedby_kod_PT <input type="text" name="modifiedby_kod_PT"><br>

    <input type="submit" name="" id="">

</form>
