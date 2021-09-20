Syarikat list

<table>
    <tr>
        <td>id</td>
        <td>usahawanid</td>
        <td>namasyarikat</td>
        <td>jenismilikanperniagaan</td>
        <td>nodaftarssm</td>
        <td>nodaftarpbt</td>
        <td>nodaftarpersijilanhalal</td>
        <td>nodaftarmesti</td>
        <td>tahunmulaoperasi</td>
        <td>bilanganpekerja</td>
        <td>alamat1_ssm</td>
        <td>alamat2_ssm</td>
        <td>alamat3_ssm</td>
        <td>tarikh_mula_mof</td>
        <td>tarikh_tamat_mof</td>
        <td>status_bumiputera</td>
        <td>tarikh_daftar_ssm</td>
        <td>notelefon</td>
        <td>no_hp</td>
        <td>email</td>
        <td>logo_syarikat</td>
        <td>prefix_id</td>
        <td>createdby_id</td>
        <td>createdby_kod_PT</td>
        <td>modifiedby_id</td>
        <td>modifiedby_kod_PT</td>
    </tr>
    @foreach ($syarikat as $syarikat)
        <tr>
            <td>{{ $syarikat->id }}</td>
            <td>{{ $syarikat->usahawanid }}</td>
            <td>{{ $syarikat->namasyarikat }}</td>
            <td>{{ $syarikat->jenismilikanperniagaan }}</td>
            <td>{{ $syarikat->nodaftarssm }}</td>
            <td>{{ $syarikat->nodaftarpbt }}</td>
            <td>{{ $syarikat->nodaftarpersijilanhalal }}</td>
            <td>{{ $syarikat->nodaftarmesti }}</td>
            <td>{{ $syarikat->tahunmulaoperasi }}</td>
            <td>{{ $syarikat->bilanganpekerja }}</td>
            <td>{{ $syarikat->alamat1_ssm}}</td>
            <td>{{ $syarikat->alamat2_ssm }}</td>
            <td>{{ $syarikat->alamat3_ssm }}</td>
            <td>{{ $syarikat->tarikh_mula_mof }}</td>
            <td>{{ $syarikat->tarikh_tamat_mof }}</td>
            <td>{{ $syarikat->status_bumiputera }}</td>
            <td>{{ $syarikat->tarikh_daftar_ssm }}</td>
            <td>{{ $syarikat->notelefon }}</td>
            <td>{{ $syarikat->no_hp }}</td>
            <td>{{ $syarikat->email }}</td>
            <td>{{ $syarikat->logo_syarikat }}</td>
            <td>{{ $syarikat->prefix_id }}</td>
            <td>{{ $syarikat->createdby_id }}</td>
            <td>{{ $syarikat->createdby_kod_PT }}</td>
            <td>{{ $syarikat->modifiedby_id }}</td>
            <td>{{ $syarikat->modifiedby_kod_PT }}</td>
        </tr>
    @endforeach

</table>

<br><br><br><br><br>

<form method="POST" action="/syarikat">
    @csrf
    usahawanid <input type="text" name="usahawanid"><br>
    namasyarikat <input type="text" name="namasyarikat"><br>
    jenismilikanperniagaan <input type="text" name="jenismilikanperniagaan"><br>
    nodaftarssm <input type="text" name="nodaftarssm"><br>
    nodaftarpbt <input type="text" name="nodaftarpbt"><br>
    nodaftarpersijilanhalal <input type="text" name="nodaftarpersijilanhalal"><br>
    nodaftarmesti <input type="text" name="nodaftarmesti"><br>
    tahunmulaoperasi <input type="text" name="tahunmulaoperasi"><br>
    bilanganpekerja <input type="text" name="bilanganpekerja"><br>
    alamat1_ssm <input type="text" name="alamat1_ssm"><br>
    alamat2_ssm <input type="text" name="alamat2_ssm"><br>
    alamat3_ssm <input type="text" name="alamat3_ssm"><br>
    tarikh_mula_mof <input type="date" name="tarikh_mula_mof"><br>
    tarikh_tamat_mof <input type="date" name="tarikh_tamat_mof"><br>
    status_bumiputera <input type="text" name="status_bumiputera"><br>
    tarikh_daftar_ssm <input type="date" name="tarikh_daftar_ssm"><br>
    notelefon <input type="text" name="notelefon"><br>
    no_hp <input type="text" name="no_hp"><br>
    email <input type="email" name="email"><br>
    logo_syarikat <input type="text" name="logo_syarikat"><br>
    prefix_id <input type="text" name="prefix_id"><br>
    createdby_id <input type="text" name="createdby_id"><br>
    createdby_kod_PT <input type="text" name="createdby_kod_PT"><br>
    modifiedby_id <input type="text" name="modifiedby_id"><br>
    modifiedby_kod_PT <input type="text" name="modifiedby_kod_PT"><br>

    <input type="submit">
</form>
