pegawai edit

<br><br><br>

<br><br><br>

<form method="POST" action="/pegawai/{{ $pegawai->id }}">
    @csrf
    @method('PUT')
    nokp <input type="text" name="nokp"> <br>
    nama<input type="text" name="nama"> <br>
    nopekerja <input type="text" name="nopekerja"> <br>
    GelaranJwtn<input type="text" name="GelaranJwtn"> <br>
    NamaPT<input type="text" name="NamaPT"> <br>
    NamaPA<input type="text" name="NamaPA"> <br>
    NamaUnit<input type="text" name="NamaUnit"> <br>
    Jawatan<input type="text" name="Jawatan"> <br>
    StesenBertugas<input type="text" name="StesenBertugas"> <br>
    email<input type="text" name="email"> <br>
    notel<input type="text" name="notel"> <br>
    mukim<input type="text" name="mukim"> <br>
    peranan_pegawai<input type="text" name="peranan_pegawai"> <br>

    <input type="submit">
</form>
