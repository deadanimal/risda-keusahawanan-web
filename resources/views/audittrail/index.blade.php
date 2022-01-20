@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-header bg-light">
      <h5 class="mb-0">Audit Trail</h5>
    </div>
    <div class="card-body fs--1 p-0">
      @foreach ($Audits as $Audit)
        <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
          <div class="notification-body">
            <p class="mb-1"><strong>{{$Audit->pegawai}}</strong> {{$Audit->Desc}} di <strong>{{$Audit->jenis}}</strong></p>
            <span class="notification-time">{{$Audit->Date}}</span>
          </div>
        </a>
      @endforeach
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