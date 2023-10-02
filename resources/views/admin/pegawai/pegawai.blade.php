@extends('partials.admin')
@section('content')
<a href="/pegawai/create" class="btn btn-primary my-3"><i class="fa-solid fa-plus mr-2"></i>Tambah</a>
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Eselon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                        <tr>
                            
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->eselon }}</td>
                            <td class="d-flex">
                               <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail{{ $item->id }}">
    <i class="fa-solid fa-circle-info"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row-lg-12">
                <div class="col">
                    <div class="row">
                        <div class="col mb-3 text-center me-2 mt-5">
                            <img src="{{ asset('storage/foto_pegawai/'.$item->file) }}" alt=".." id="profile" style="width:250px;height:250px;">
                        </div>
                        <div class="col ">
                        <table class="table table-borderless">
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td>{{ $item->nip }}</td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                  <td>:</td>
                                <td>{{ $item->nama }}</td>
                            </tr>
                            <tr>
                                <th>JABATAN</th>
                                  <td>:</td>
                                <td>{{ $item->jabatan }}</td>
                            </tr>
                            <tr>
                                <th>GOLONGAN</th>
                                  <td>:</td>
                                <td>{{ $item->golongan }}</td>
                            </tr>
                            <tr>
                                <th>ESELON</th>
                                  <td>:</td>
                                <td>{{ $item->eselon }}</td>
                            </tr>
                                    
                        </table>          
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
         
        </div>
      </div>
    </div>
  </div>
                                <a href="/pegawai/{{ $item->id }}/edit" class="btn btn-primary mx-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/pegawai/{{ $item->id }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
