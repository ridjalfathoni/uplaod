@extends('layouts/index')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <img class="card-img-top" src="holder.js/100x180/" alt="">
      <div class="card-body">
        <div class="d-flex flex-direction-row justify-content-between">
          <h4 class="card-title flex-start">Profil</h4>
          <a class="btn btn-info pull-right mb-3" href="{{ url('profil/create') }}">Tambah</a>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
        @endif  
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th style="width:30%">Foto Profil</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          @php ($i = 0)
            @foreach($datas as $key => $value)
            @php ($i++)
              <tr>
                <td>{{$i}}</td>
                <td>
                    @if(strlen($value->foto_profil)>0)
                    <div style="width: 50%; height: 100%;">
                      <img style="width: 100%;" src="{{ asset('foto/'.$value->foto_profil) }}">
                    </div>
                    @endif
                </td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->jenis_kelamin }}</td>
                <td>{{ $value->tempat_lahir}}, {{ $value->tgl_lahir }}</td>
                <td>
                  <div class="row">
                    <div class="col-sm-4">
                      <a class="btn btn-info" href="{{ url('profil/'.$value->id.'/edit') }}">Update</a>
                    </div>
                    <div class="col-sm-4">
                      <form action="{{ url('profil/'.$value->id) }}" method="POST">
                        @csrf 
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
            <!-- <tr>
              <td>1</td>
              <td>Nama File</td>
              <td>
                <img src="" alt="Gambar1">
              </td>
              <td>
                <a name="edit-content" id="edit-content" class="btn btn-primary" href="#" role="button">Edit</a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Nama File</td>
              <td>
                <img src="" alt="Gambar1">
              </td>
              <td>
                <a name="edit-content" id="edit-content" class="btn btn-primary" href="#" role="button">Edit</a>
              </td>
            </tr> -->
          </tbody>
        </table>   
        <!-- <form method="post" action="" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="nama">Nama File</label>
            <input type="nama" class="form-control" id="nama" aria-describedby="namaFile" placeholder="Nama File">
          </div>
          <div class="form-group">
            <label for="file-content">File</label>
            <input type="file" name="file-content" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form> -->
      </div>
    </div>
  </div>
</div>
@endsection