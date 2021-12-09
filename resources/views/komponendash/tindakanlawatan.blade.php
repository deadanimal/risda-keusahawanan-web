@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Tindakan Lawatan</h3>
            <table id="tbl" style="padding-bottom:2vh;text-align:center;">
                <colgroup>
                    <col span="1" style="width: 50%;">
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 30%;">
                 </colgroup>
                 <thead>
                    <tr class="align-middle">
                        <th scope="col">Nama Tindakan Lawatan</th>
                        <th scope="col">Status Tindakan Lawatan</th>
                        <th scope="col"></th>
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                        <form method="POST" action="/tindakanlawatan" enctype="multipart/form-data">
                        @csrf
                        @method("POST") 
                        <td><input class="form-control form-control-sm" name="nama_tindakan_lawatan" id="field-name" type="text" value=""/></td>
                        <td><select class="form-select form-select-sm" name="status_tindakan_lawatan" aria-label=".form-select-sm example" style="display:inline-block;width:20vh;">
                            <option selected=""></option>
                            <option value="aktif">aktif</option>
                            <option value="tak aktif">tak aktif</option>
                        </select></td>
                        <td style="text-align:center;"><button class="btn btn-primary btn-sm" type="submit" onclick="simpanaliran();" >Simpan </button></td>
                        </form>
                    </tr>
                    @foreach ($tindakanlawatan as $tindlawatan)
                    <tr>
                        <form method="POST" action="/tindakanlawatan/{{$tindlawatan->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <td class="text-nowrap">
                            <input class="form-control form-control-sm" name="nama_tindakan_lawatan" id="field-name" type="text" value="{{$tindlawatan->nama_tindakan_lawatan}}"/>
                        </td>
                        <td class="text-nowrap">
                            <select class="form-select form-select-sm" name="status_tindakan_lawatan" aria-label=".form-select-sm example" style="display:inline-block;width:20vh;">
                                <option selected="{{$tindlawatan->status_tindakan_lawatan}}"></option>
                                <option {{ ( $tindlawatan->status_tindakan_lawatan == "aktif" ) ? 'selected' : '' }} value="aktif">aktif</option>
                                <option {{ ( $tindlawatan->status_tindakan_lawatan == "tak aktif" ) ? 'selected' : '' }} value="tak aktif">tak aktif</option>
                            </select>
                        </td>
                        <td class="text-nowrap">
                            <button type="submit" class="btn btn-primary btn-sm">Ubah </button>
                        </form>
                            &nbsp
                            <form method="POST" style="display:inline-block;" action="{{ route('tindakanlawatan.destroy', $tindlawatan->id) }}">
                            @csrf  
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Buang</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                 </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection 