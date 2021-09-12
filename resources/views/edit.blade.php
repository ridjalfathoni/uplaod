@extends('layouts/index')
@section('content')
    <form method="POST" action="{{ url('profil/'.$model->id) }}" enctype="multipart/form-data">
        @csrf 
        <input type="hidden" name="_method" value="PATCH">

        @include('form')
    </form>
@endsection