
perniagaan Edit

<br><br>

<form method="POST" action="/perniagaan">
    @csrf

    usahawanid <input value="{{$perniagaan->usahawanid }}" type="text" name="usahawanid"> <br>
    jenisperniagaan  <input value="{{$perniagaan->jenisperniagaan }}" type="text" name="jenisperniagaan"> <br>
    klusterperniagaan <input value="{{$perniagaan->klusterperniagaan }}" type="text" name="klusterperniagaan"><br>
    subkluster <input value="{{$perniagaan->subkluster }}" type="text" name="subkluster"><br>
    alamat1 <input value="{{$perniagaan->alamat1 }}" type="text" name="alamat1"><br>
    alamat2 <input value="{{$perniagaan->alamat2 }}" type="text" name="alamat2"><br>
    alamat3 <input value="{{$perniagaan->alamat3 }}" type="text" name="alamat3"><br>
    bandar  <input value="{{$perniagaan->bandar }}" type="text" name="bandar"><br>
    poskod <input value="{{$perniagaan->poskod }}" type="text" name="poskod"><br>
    U_Negeri_ID <input value="{{$perniagaan->U_Negeri_ID }}" type="text" name="U_Negeri_ID"><br>
    U_Daerah_ID <input value="{{$perniagaan->U_Daerah_ID }}" type="text" name="U_Daerah_ID"><br>
    U_Mukim_ID <input value="{{$perniagaan->U_Mukim_ID }}" type="text" name="U_Mukim_ID"><br>
    U_Parlimen_ID <input value="{{$perniagaan->U_Parlimen_ID }}" type="text" name="U_Parlimen_ID"><br>
    U_Dun_ID <input value="{{$perniagaan->U_Dun_ID }}" type="text" name="U_Dun_ID"><br>
    U_Kampung_ID <input value="{{$perniagaan->U_Kampung_ID }}" type="text" name="U_Kampung_ID"><br>
    U_Seksyen_ID <input value="{{$perniagaan->U_Seksyen_ID }}" type="text" name="U_Seksyen_ID"><br>
    latitud <input value="{{$perniagaan->latitud }}" type="text" name="latitud"><br>
    logitud <input value="{{$perniagaan->logitud }}" type="text" name="logitud"><br>
    facebook <input value="{{$perniagaan->facebook }}" type="text" name="facebook"><br>
    instagram <input value="{{$perniagaan->instagram }}" type="text" name="instagram"><br>
    twitter <input value="{{$perniagaan->twitter }}" type="text" name="twitter"><br>
    lamanweb <input value="{{$perniagaan->lamanweb }}" type="text" name="lamanweb"><br>
    dropship <input value="{{$perniagaan->dropship }}" type="text" name="dropship"><br>
    ejen <input value="{{$perniagaan->ejen }}" type="text" name="ejen"><br>
    stokis <input value="{{$perniagaan->stokis }}" type="text" name="stokis"><br>
    outlet <input value="{{$perniagaan->outlet }}" type="text" name="outlet"><br>
    domestik <input value="{{$perniagaan->domestik }}" type="text" name="domestik"><br>
    luarnegara <input value="{{$perniagaan->luarnegara }}" type="text" name="luarnegara"><br>
    pasaranonline <input value="{{$perniagaan->pasaranonline }}" type="text" name="pasaranonline"><br>
    purata_jualan_bulanan <input value="{{$perniagaan->purata_jualan_bulanan }}" type="text" name="purata_jualan_bulanan"><br>
    peratus_kenaikan <input value="{{$perniagaan->peratus_kenaikan }}" type="text" name="peratus_kenaikan"><br>
    hasil_jualan_tahunan  <input value="{{$perniagaan->hasil_jualan_tahunan }}" type="text" name="hasil_jualan_tahunan"><br>
    gambar_url <input value="{{$perniagaan->gambar_url }}" type="text" name="gambar_url"><br>
    createdby_id <input value="{{$perniagaan->createdby_id }}" type="text" name="createdby_id"><br>
    createdby_kod_PT <input value="{{$perniagaan->createdby_kod_PT }}" type="text" name="createdby_kod_PT"><br>
    modifiedby_id <input value="{{$perniagaan->modifiedby_id }}" type="text" name="modifiedby_id"><br>
    modifiedby_kod_PT <input value="{{$perniagaan->modifiedby_kod_PT }}" type="text" name="modifiedby_kod_PT"><br>

    <input type="submit" name="" id="">

</form>