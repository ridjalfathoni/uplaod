@extends('layouts/index')
@section('content')
    <form method="POST" action="{{ url('profil') }}" enctype="multipart/form-data">
        @csrf 
        @include('form')
    </form>
@endsection