@extends('dashboard')
@section('content') 
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center" style="overflow-x: scroll !important;overflow-y: scroll !important;">
            <div id="displaysatu" >
                <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Kategori Aliran</h3>
                <table id="pegawaitbl" style="padding-bottom:2vh;text-align:center;">
                    <colgroup>
                        <col span="1" style="width: 28%;">
                        <col span="1" style="width: 28%;">
                        <col span="1" style="width: 14%;">
                        <col span="1" style="width: 30%;">
                     </colgroup>
                     <thead>
                        <tr class="align-middle">
                            <th scope="col">Jenis Aliran</th>
                            <th scope="col">Bahagian Aliran</th>
                            <th scope="col">Nama Aliran</th>
                            <th scope="col">Status Aliran</th>
                            <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                        <form method="POST" action="/kategorialiran" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                            {{-- <td><input class="form-control form-control-sm" name="jenis_aliran" id="field-name" type="text" value=""/></td> --}}
                            <td><select class="form-select form-select-sm" name="jenis_aliran" aria-label=".form-select-sm example" style="display:inline-block;width:20vh;">
                                <option selected=""></option>
                                <option value="tunai_masuk">Tunai Masuk</option>
                                <option value="tunai_keluar">Tunai Keluar</option>
                            </select></td>
                            <td><select class="form-select form-select-sm" name="jenis_aliran_dua" aria-label=".form-select-sm example" style="display:inline-block;width:32vh;">
                                <option selected=""></option>
                                <option value="1">Pendapatan Aktif</option>
                                <option value="2">Pendapatan Pasif</option>
                                <option value="3">Perbelanjaan Perniagaan</option>
                            </select></td>
                            <td><input class="form-control form-control-sm" name="nama_kategori_aliran" id="field-name" type="text" style="width:28vh;" value=""/></td>
                            <td><select class="form-select form-select-sm" name="status_kategori_aliran" aria-label=".form-select-sm example" style="display:inline-block;width:15vh;">
                                <option selected=""></option>
                                <option value="aktif">aktif</option>
                                <option value="tak aktif">tak aktif</option>
                            </select></td>
                            <td style="text-align:center;"><button class="btn btn-primary btn-sm" type="submit" style="width:15vh" onclick="simpanaliran();" >Simpan </button></td>
                        </form>
                        </tr>
                        @foreach ($kategorialiran as $katealiran)
                        <tr>
                            <form method="POST" action="/kategorialiran/{{$katealiran->id}}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <td class="text-nowrap">
                                <select class="form-select form-select-sm" name="jenis_aliran" aria-label=".form-select-sm example" style="display:inline-block;width:20vh;">
                                    <option selected="{{$katealiran->jenis_aliran}}"></option>
                                    <option {{ ( $katealiran->jenis_aliran == "tunai_masuk" ) ? 'selected' : '' }} value="tunai_masuk">Tunai Masuk</option>
                                    <option {{ ( $katealiran->jenis_aliran == "tunai_keluar" ) ? 'selected' : '' }} value="tunai_keluar">Tunai Keluar</option>
                                </select>
                                {{-- <input class="form-control form-control-sm" name="jenis_aliran" id="field-name" type="text" value="{{$katealiran->jenis_aliran}}"/> --}}
                            </td>
                            <td class="text-nowrap">
                                <select class="form-select form-select-sm" name="jenis_aliran_dua" aria-label=".form-select-sm example" style="display:inline-block;width:32vh;">
                                    <option selected="{{$katealiran->jenis_aliran}}"></option>
                                    <option {{ ( $katealiran->bahagian == "1" ) ? 'selected' : '' }} value="1">Pendapatan Aktif</option>
                                    <option {{ ( $katealiran->bahagian == "2" ) ? 'selected' : '' }} value="2">Pendapatan Pasif</option>
                                    <option {{ ( $katealiran->bahagian == "3" ) ? 'selected' : '' }} value="3">Perbelanjaan Perniagaan</option>
                                </select>
                            </td>
                            <td class="text-nowrap">
                                <input class="form-control form-control-sm" name="nama_kategori_aliran" id="field-name" type="text" style="width:28vh;" value="{{$katealiran->nama_kategori_aliran}}"/>
                            </td>
                            <td class="text-nowrap">
                                <select class="form-select form-select-sm" name="status_kategori_aliran" aria-label=".form-select-sm example" style="display:inline-block;width:15vh;">
                                    <option selected="{{$katealiran->status_kategori_aliran}}"></option>
                                    <option {{ ( $katealiran->status_kategori_aliran == "aktif" ) ? 'selected' : '' }} value="aktif">aktif</option>
                                    <option {{ ( $katealiran->status_kategori_aliran == "tak aktif" ) ? 'selected' : '' }} value="tak aktif">tak aktif</option>
                                </select>
                                {{-- <input class="form-control form-control-sm" name="status_kategori_aliran" id="field-name" type="text" value="{{$katealiran->status_kategori_aliran}}"/> --}}
                            </td>
                            <!-- <td>
                                <form><input type="submit" value="ubah"></form>
                                <form><input type="submit" value="ubah"></form>
                            </td> -->
                        
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm" style="width:15vh">Kemaskini</button>
                                </form>
                                {{-- <form method="POST" style="display:inline-block;" action="{{ route('kategorialiran.destroy', $katealiran->id) }}">
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
</div>
@endsection
@section('script')
<script type="text/javascript">
$( document ).ready(function() {
    $('.loader').hide();
})
</script>
@endsection