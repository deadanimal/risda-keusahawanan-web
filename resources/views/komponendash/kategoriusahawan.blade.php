@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <div class="row align-items-center">
            <h3 class="text" style="padding-bottom:20px;color:#00A651;">Tetapan Kategori Usahawan</h3>
            <table id="tbl" style="padding-bottom:2vh;text-align:center;">
                <colgroup>
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 15%;">
                 </colgroup>
                 <thead>
                    <tr class="align-middle">
                        <th scope="col">ID Kategori Usahawan</th>
                        <th scope="col">Nama Kategori Usahawan</th>
                        <th scope="col">Jualan Minimum Usahawan</th>
                        <th scope="col">Jualan Maximum Usahawan</th>
                        <th scope="col">Status Kategori Usahawan</th>
                        <th scope="col"></th>
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                        <form method="POST" action="/kategoriusahawan" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <td><input class="form-control form-control-sm" name="id_kategori_usahawan" id="field-name" type="text" value=""/></td>
                        <td><input class="form-control form-control-sm" name="nama_kategori_usahawan" id="field-name" type="text" value=""/></td>
                        <td><input class="form-control form-control-sm" name="jualan_usahawan_min" id="field-name" type="number" value=""/></td>
                        <td><input class="form-control form-control-sm" name="jualan_usahawan_max" id="field-name" type="number" value=""/></td>
                        <td><select class="form-select form-select-sm" name="status_kategori_usahawan" aria-label=".form-select-sm example" style="display:inline-block;">
                            <option selected=""></option>
                            <option value="aktif">aktif</option>
                            <option value="tak aktif">tak aktif</option>
                        </select></td>
                        <td style="text-align:center;"><button class="btn btn-primary btn-sm" type="submit" onclick="simpanaliran();" >Simpan </button></td>
                        </form>
                    </tr>
                    @foreach ($kategoriusahawan as $kateusahawan)
                    <tr>
                        <form method="POST" action="/kategoriusahawan/{{$kateusahawan->id}}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <td class="text-nowrap">
                            <input class="form-control form-control-sm" name="id_kategori_usahawan" id="field-name" type="text" value="{{$kateusahawan->id_kategori_usahawan}}"/>
                        </td>
                        <td class="text-nowrap">
                            <input class="form-control form-control-sm" name="nama_kategori_usahawan" id="field-name" type="text" value="{{$kateusahawan->nama_kategori_usahawan}}"/>
                        </td>
                        <td class="text-nowrap">
                            <input class="form-control form-control-sm" name="jualan_usahawan_min" id="field-name" type="text" value="{{$kateusahawan->jualan_usahawan_min}}"/>
                        </td>
                        <td class="text-nowrap">
                            <input class="form-control form-control-sm" name="jualan_usahawan_max" id="field-name" type="text" value="{{$kateusahawan->jualan_usahawan_max}}"/>
                        </td>
                        <td class="text-nowrap">
                            <select class="form-select form-select-sm" name="status_kategori_usahawan" aria-label=".form-select-sm example" style="display:inline-block;">
                                <option selected="{{$kateusahawan->status}}"></option>
                                <option {{ ( $kateusahawan->status_kategori_usahawan == "aktif" ) ? 'selected' : '' }} value="aktif">aktif</option>
                                <option {{ ( $kateusahawan->status_kategori_usahawan == "tak aktif" ) ? 'selected' : '' }} value="tak aktif">tak aktif</option>
                            </select>
                        </td>
                        <td class="text-nowrap">
                            <button type="submit" class="btn btn-primary btn-sm">Ubah </button>
                        </form>
                            &nbsp
                            <form method="POST" style="display:inline-block;" action="{{ route('kategoriusahawan.destroy', $kateusahawan->id) }}">
                            @csrf  
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">X</button>
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