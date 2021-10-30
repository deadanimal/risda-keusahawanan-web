@extends('dashboard')
@section('content')
@if (Auth::user()->role == 1)
    Super Admin                    
@endif 
@endsection
@section('script')
@endsection