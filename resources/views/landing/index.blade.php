@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        Maklumat Profil Pegawai :- <br>
        NAMA : {{$authuser->name ?? ''}} <br>
        NO KP : {{$authuser->no_kp ?? ''}} <br>
        EMAIL : {{$authuser->email ?? ''}} <br>
        PERANAN PEGAWAI : {{$authuser->peranan->nama_peranan ?? ''}} <br>
    </div>
</div>
@if ($noti == 1)
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        Sila Sahkan Kemaskini Usahawan Di <a class="btn btn-primary" href="/usahawanWeb">Tetapan Usahawan</a>
    </div>
</div>
@endif
@endsection
@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    $('.loader').hide();
});

</script>
@endsection