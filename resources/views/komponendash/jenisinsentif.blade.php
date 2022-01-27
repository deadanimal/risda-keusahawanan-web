@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center" style="overflow-x: scroll !important;overflow-y: scroll !important;">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Jenis Insentif</h3>
            <table id="tbl" style="padding-bottom:2vh;text-align:center;">
                <colgroup>
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 45%;">
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 20%;">
                 </colgroup>
                 <thead>
                    <tr class="align-middle">
                        <th scope="col">Kod Insentif</th>
                        <th scope="col">Nama Insentif</th>
                        <th scope="col">Status Insentif</th>
                        <th scope="col"></th>
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                        <form method="POST" action="/jenisinsentif" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <td><input class="form-control form-control-sm" name="id_jenis_insentif" id="field-name" type="text" value=""/></td>
                        <td><input class="form-control form-control-sm" name="nama_insentif" id="field-name" type="text" value=""/></td>
                        <td><select class="form-select form-select-sm" name="status" aria-label=".form-select-sm example" style="display:inline-block;width:20vh;">
                            <option selected=""></option>
                            <option value="aktif">aktif</option>
                            <option value="tak aktif">tak aktif</option>
                        </select></td>
                        <td style="text-align:center;"><button class="btn btn-primary btn-sm" style="width:15vh" type="submit" >Simpan </button></td>
                        </form>
                    </tr>
                    @foreach ($jenisinsentif as $jenisinsentif)
                    <tr>
                        <form method="POST" action="/jenisinsentif/{{$jenisinsentif->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <td class="text-nowrap">
                            <input class="form-control form-control-sm" name="id_jenis_insentif" id="field-name" type="text" value="{{$jenisinsentif->id_jenis_insentif}}"/>
                        </td>
                        <td class="text-nowrap">
                            <input class="form-control form-control-sm" name="nama_insentif" id="field-name" type="text" value="{{$jenisinsentif->nama_insentif}}"/>
                        </td>
                        <td class="text-nowrap">
                            <select class="form-select form-select-sm" name="status" aria-label=".form-select-sm example" style="display:inline-block;width:20vh;">
                                <option selected="{{$jenisinsentif->status}}"></option>
                                <option {{ ( $jenisinsentif->status == "aktif" ) ? 'selected' : '' }} value="aktif">aktif</option>
                                <option {{ ( $jenisinsentif->status == "tak aktif" ) ? 'selected' : '' }} value="tak aktif">tak aktif</option>
                            </select>
                        </td>
                        <td class="text-nowrap">
                            <button type="submit" class="btn btn-primary btn-sm" style="width:15vh">Kemaskini</button>
                        </form>
                            {{-- &nbsp
                            <form method="POST" style="display:inline-block;" action="{{ route('jenisinsentif.destroy', $jenisinsentif->id) }}">
                            @csrf  
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Buang</button>
                            </form> --}}
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
<script type="text/javascript">
    $( document ).ready(function() {
        $('.loader').hide();
    })
</script>
@endsection 