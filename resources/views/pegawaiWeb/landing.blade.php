@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        <form method="get" id="allpegawai" method="get" action="/ViewAll">
            @csrf
            @method("GET")
            <div class="col-lg-12">
                <h4>Lihat Semua Data Pegawai</h4>
                <button class="btn btn-primary" type="button" onclick="viewall()">Lihat Semua</button>
            </div>
        </form>
        <form method="post" action="/CariPegawai" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="col-lg-12" style="padding-top: 30px;">
                <h4>Carian Khusus Data Pegawai</h4>
            </div>
            <div class="col-lg-12">
                <label class="form-label">Nama Pegawai</label>
                <input class="form-control" name="nama" type="text"/>
            </div>
            <div class="col-lg-12">
                <label class="form-label">No Kad Pengenalan Pegawai</label>
                <input class="form-control" name="nokp" type="text"/>
            </div>
            <div class="col-lg-12">
                <label class="form-label mukim">Mukim Pegawai</label>
                <select name="mukim" class="form-select" aria-label=".form-select mukim" style="display:inline-block;">
                    <option selected="true" value='' disabled="disabled">Mukim</option>
                    <option value=''>Semua Mukim</option>
                    @foreach ($ddMukim as $items)
                        <option value="{{ $items->U_Mukim_ID }}"> 
                            {{ $items->Mukim }} 
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12">
                <label class="form-label pt">Pusat Tanggungjawab Pegawai</label>
                <select name="PT" class="form-select" aria-label=".form-select pt" style="display:inline-block;">
                    <option selected="true" value='' disabled="disabled">Pusat Tanggungjawab</option>
                    <option value=''>Semua Pusat Tanggungjawab</option>
                    @foreach ($ddPT as $items)
                        <option value="{{ $items->Kod_PT }}"> 
                            {{ $items->keterangan }} 
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12" style="padding-top: 20px;">
                <button class="btn btn-primary" type="submit">Carian Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    $('.loader').hide();
});

function viewall(){
    if (confirm("Amaran! Panggilan data semua pegawai akan mengambil masa yang lama.")) {
        $('#allpegawai').submit();
    }else{
        return false;
    }
}
</script>
@endsection