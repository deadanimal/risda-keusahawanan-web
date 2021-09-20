edit info
<br><br>

<form method="POST" action="/usahawan/{{ $usahawan->id }}">
    @csrf
    @method('PUT')
    Kod_PT <input type="text" name="Kod_PT" value="{{ $usahawan->Kod_PT }}"><br>
    namausahawan <input type="text" name="namausahawan" value="{{ $usahawan->namausahawan }}"><br>
    nokadpengenalan <input type="text" name="nokadpengenalan" value="{{ $usahawan->nokadpengenalan }}"><br>
    tarikhlahir <input type="date" name="tarikhlahir" value="{{ $usahawan->tarikhlahir }}"><br>
    U_Jantina_ID <input type="text" name="U_Jantina_ID" value="{{ $usahawan->U_Jantina_ID }}"><br>
    U_Bangsa_ID <input type="text" name="U_Bangsa_ID" value="{{ $usahawan->U_Bangsa_ID }}"><br>
    statusperkahwinan <input type="text" name="statusperkahwinan" value="{{ $usahawan->statusperkahwinan }}"><br>
    U_Pendidikan_ID <input type="text" name="U_Pendidikan_ID" value="{{ $usahawan->U_Pendidikan_ID }}"><br>
    alamat1 <input type="text" name="alamat1" value="{{ $usahawan->alamat1 }}"><br>
    alamat2 <input type="text" name="alamat2" value="{{ $usahawan->alamat2 }}"><br>
    alamat3 <input type="text" name="alamat3" value="{{ $usahawan->alamat3 }}"><br>
    bandar <input type="text" name="bandar" value="{{ $usahawan->bandar }}"><br>
    poskod <input type="text" name="poskod" value="{{ $usahawan->poskod }}"><br>
    U_Negeri_ID <input type="text" name="U_Negeri_ID" value="{{ $usahawan->U_Negeri_ID }}"><br>
    U_Daerah_ID <input type="text" name="U_Daerah_ID" value="{{ $usahawan->U_Daerah_ID }}"><br>
    U_Mukim_ID <input type="text" name="U_Mukim_ID" value="{{ $usahawan->U_Mukim_ID }}"><br>
    U_Parlimen_ID <input type="text" name="U_Parlimen_ID" value="{{ $usahawan->U_Parlimen_ID }}"><br>
    U_Dun_ID <input type="text" name="U_Dun_ID" value="{{ $usahawan->U_Dun_ID }}"><br>
    U_Kampung_ID <input type="text" name="U_Kampung_ID" value="{{ $usahawan->U_Kampung_ID }}"><br>
    U_Seksyen_ID <input type="text" name="U_Seksyen_ID" value="{{ $usahawan->U_Seksyen_ID }}"><br>
    id_kategori_usahawan <input type="text" name="id_kategori_usahawan" value="{{ $usahawan->id_kategori_usahawan }}"><br>
    gambar_url <input type="text" name="gambar_url" value="{{ $usahawan->gambar_url }}"><br>
    notelefon <input type="text" name="notelefon" value="{{ $usahawan->notelefon }}"><br>
    nohp <input type="text" name="nohp" value="{{ $usahawan->nohp }}"><br>
    email <input type="text" name="email" value="{{ $usahawan->email }}"><br>
    createdby_id <input type="text" name="createdby_id" value="{{ $usahawan->createdby_id }}"><br>
    createdby_kod_PT <input type="text" name="createdby_kod_PT" value="{{ $usahawan->createdby_kod_PT }}"><br>
    modifiedby_id <input type="text" name="modifiedby_id" value="{{ $usahawan->modifiedby_id }}"><br>
    modifiedby_kod_PT <input type="text" name="modifiedby_kod_PT" value="{{ $usahawan->modifiedby_kod_PT }}"><br>

    <input type="submit">
</form>