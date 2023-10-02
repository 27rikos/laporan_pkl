@extends('partials.admin')
@section('content')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/arsip">Arsip</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Arsip Pegawai</li>
    </ol>
  </nav>
<div class="container-fluid  col-lg-12 mt-3">
    <div class="card shadow">
      <div class="mx-3 my-3">
        <h4 class="mb-3">Edit Arsip Pegawai</h4>
        <form  method="POST" action="/arsip/{{ $data->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">NIP</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control border " name="nip" required value="{{ $data->nip }}">
                </div>
              </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control border " name="nama" required value="{{ $data->nama }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="" class="col-sm-4 col-form-label fw-bold">Dokumen Gantung</label>
                <div class="col-sm-8">
                  <input type="file" class="form-control border " name="dokumen" >
                </div>
              </div>
             
              <button class="btn btn-primary text-light mt-3" type="submit">Simpan</button>
    
        </form>
      </div>
    </div>
       
    </div>
@endsection