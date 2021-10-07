Pegawai list


<br><br><br>

<table>
    <tr>
       <td>nokp</td>
       <td>nama</td>
       <td>nopekerja</td>
       <td>GelaranJwtn</td>
       <td>NamaPT</td>
       <td>NamaPA</td>
       <td>NamaUnit</td>
       <td>Jawatan</td>
       <td>StesenBertugas</td>
       <td>email</td>
       <td>notel</td>
       <td>mukim</td>
       <td>peranan_pegawai</td>
    </tr>

    @foreach ($pegawai as $pegawai)

        <tr>
            <td>{{ $pegawai->nokp }}</td>
            <td>{{ $pegawai->nama }}</td>
            <td>{{ $pegawai->nopekerja }}</td>
            <td>{{ $pegawai->GelaranJwtn }}</td>
            <td>{{ $pegawai->NamaPT }}</td>
            <td>{{ $pegawai->NamaPA }}</td>
            <td>{{ $pegawai->NamaUnit }}</td>
            <td>{{ $pegawai->Jawatan }}</td>
            <td>{{ $pegawai->StesenBertugas }}</td>
            <td>{{ $pegawai->email }}</td>
            <td>{{ $pegawai->notel }}</td>
            <td>{{ $pegawai->mukim }}</td>
            <td>{{ $pegawai->peranan_pegawai }}</td>
    
        </tr>

    @endforeach
</table>


<br><br><br>

<form method="POST" action="/pegawai">
    @csrf

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


