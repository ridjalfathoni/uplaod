@extends('layouts/index')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form</h4>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
      @endif  
      <form method="POST" action="{{ url('profil') }}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Nama Lengkap" value="{{ $model->nama }}">
            @foreach($errors->get('nama') as $msg)
            <p class="text-danger">{{ $msg }}</p>
            @endforeach
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Tempat Lahir" value="{{ $model->tempat_lahir }}">
            @foreach($errors->get('tempat_lahir') as $msg)
            <p class="text-danger">{{ $msg }}</p>
            @endforeach
          </div>
          <div class="form-group">
            <label for="nama">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" format="yyyy-mm-ddd" data-provide="datepicker" value="{{ $model->tgl_lahir }}">
            @foreach($errors->get('tanggal_lahir') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="Laki - Laki" {{ ($model->jenis_kelamin=="Laki - Laki")? "checked" : "" }}>
                Laki - Laki
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ ($model->jenis_kelamin=="Perempuan")? "checked" : "" }}>
                Perempuan
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="foto_profil">Foto Profil</label>
            <input type="file" class="form-control" name="foto_profil" id="foto_profil" aria-describedby="foto_profil">
            @foreach($errors->get('foto_profil') as $msg)
            <p class="text-danger">{{ $msg }}</p>
            @endforeach 
            @if(strlen($model->foto_profil)>0)
            <div class="col-sm-6 mx-auto" style="width: 100%; height: 100%;">
              <img style="width: 100%;" src="{{ asset('foto/'.$model->foto_profil) }}">
            </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script></script>
@endsection