
Syarikat Edit
<br><br>
<form method="POST" action="/syarikat/{{ $syarikat->id }}">
    @csrf
    @method('PUT')
    usahawanid <input type="text" name="usahawanid" value="{{ $syarikat->usahawanid }}"><br>
    namasyarikat <input type="text" name="namasyarikat" value="{{ $syarikat->namasyarikat }}"><br>
    jenismilikanperniagaan <input type="text" name="jenismilikanperniagaan" value="{{ $syarikat->jenismilikanperniagaan }}"><br>
    nodaftarssm <input type="text" name="nodaftarssm" value="{{ $syarikat->nodaftarssm }}"><br>
    nodaftarpbt <input type="text" name="nodaftarpbt" value="{{ $syarikat->nodaftarssm }}"><br>
    nodaftarpersijilanhalal <input type="text" name="nodaftarpersijilanhalal" value="{{ $syarikat->nodaftarpersijilanhalal }}"><br>
    nodaftarmesti <input type="text" name="nodaftarmesti" value="{{ $syarikat->nodaftarmesti }}"><br>
    tahunmulaoperasi <input type="text" name="tahunmulaoperasi" value="{{ $syarikat->tahunmulaoperasi }}"><br>
    bilanganpekerja <input type="text" name="bilanganpekerja" value="{{ $syarikat->bilanganpekerja }}"><br>
    alamat1_ssm <input type="text" name="alamat1_ssm" value="{{ $syarikat->alamat1_ssm }}"><br>
    alamat2_ssm <input type="text" name="alamat2_ssm" value="{{ $syarikat->alamat2_ssm }}"><br>
    alamat3_ssm <input type="text" name="alamat3_ssm" value="{{ $syarikat->alamat3_ssm }}"><br>
    tarikh_mula_mof <input type="date" name="tarikh_mula_mof" value="{{ $syarikat->tarikh_mula_mof }}"><br>
    tarikh_tamat_mof <input type="date" name="tarikh_tamat_mof" value="{{ $syarikat->tarikh_tamat_mof }}"><br>
    status_bumiputera <input type="text" name="status_bumiputera" value="{{ $syarikat->status_bumiputera }}"><br>
    tarikh_daftar_ssm <input type="date" name="tarikh_daftar_ssm" value="{{ $syarikat->tarikh_daftar_ssm }}"><br>
    notelefon <input type="text" name="notelefon" value="{{ $syarikat->notelefon }}"><br>
    no_hp <input type="text" name="no_hp" value="{{ $syarikat->no_hp }}"><br>
    email <input type="email" name="email" value="{{ $syarikat->email }}"><br>
    logo_syarikat <input type="text" name="logo_syarikat" value="{{ $syarikat->logo_syarikat }}"><br>
    prefix_id <input type="text" name="prefix_id" value="{{ $syarikat->prefix_id }}"><br>
    createdby_id <input type="text" name="createdby_id" value="{{ $syarikat->createdby_id }}"><br>
    createdby_kod_PT <input type="text" name="createdby_kod_PT" value="{{ $syarikat->createdby_kod_PT }}"><br>
    modifiedby_id <input type="text" name="modifiedby_id" value="{{ $syarikat->modifiedby_id }}"><br>
    modifiedby_kod_PT <input type="text" name="modifiedby_kod_PT" value="{{ $syarikat->modifiedby_kod_PT }}"><br>

    <input type="submit">
</form>