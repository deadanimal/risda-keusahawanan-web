@extends('dashboard')
@section('content')
<div class="card">
    <div class="card-body overflow-hidden p-lg-6">
        {{$peranan->nama_peranan ?? ''}}
    </div>
</div>
@endsection
@section('script')
@endsection