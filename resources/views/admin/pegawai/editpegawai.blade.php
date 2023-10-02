@extends('partials.admin')
@section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data Pegawai</li>
    </ol>
  </nav>
<div class="container-fluid  col-lg-12 mt-3">
    <div class="card alumni shadow">
      <div class="mx-3 my-3">
        <h4 class="mb-3">Edit Data Pegawai</h4>
      <form  method="POST" action="/pegawai/{{ $data->id }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="mb-3 row">
            <label for="" class="col-sm-4 col-form-label fw-bold">NIP</label>
            <div class="col-sm-8">
              <input type="text" class="form-control border"  name="nip" required value="{{ $data->nip }}">
             
            </div>
          </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control border " name="nama" required value="{{ $data->nama }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">Jabatan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control border " name="jabatan" required value="{{ $data->jabatan }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">Golongan</label>
                <div class="col-sm-8">
                  <select name="golongan" class="form-control border" required>
                    <option value="{{ $data->golongan }}">{{ $data->golongan }}</option>
                    <option value="I/A">I/A</option>
                    <option value="I/B">I/B</option>
                    <option value="I/C">I/C</option>
                    <option value="I/D">I/D</option>
                    <option value="II/A">II/A</option>
                    <option value="II/B">II/B</option>
                    <option value="II/C">II/C</option>
                    <option value="II/D">II/D</option>
                    <option value="III/A">III/A</option>
                    <option value="III/B">III/B</option>
                    <option value="III/C">III/C</option>
                    <option value="III/D">III/D</option>
                    <option value="IV/A">IV/A</option>
                    <option value="IV/B">IV/B</option>
                    <option value="IV/C">IV/C</option>
                    <option value="IV/D">IV/D</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">Eselon</label>
                <div class="col-sm-8">
                 <select name="eselon" class="form-control border" required>
                    <option value="{{ $data->eselon }}">{{ $data->eselon }}</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">Foto</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control border " name="file" >
                  <img src="{{ asset('storage/foto_pegawai/'.$data->file) }}" alt=".." id="profile" style="width:250px;height:250px;">
                </div>
              </div>
              <button class="btn btn-primary text-light mt-3" type="submit">Simpan</button>
    
        </form>
      </div>
    </div>
       
    </div>
@endsection