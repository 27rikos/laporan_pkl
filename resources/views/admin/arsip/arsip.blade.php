@extends('partials.admin')
@section('content')
<a href="/arsip/create" class="btn btn-primary my-3"><i class="fa-solid fa-plus mr-2"></i>Tambah</a>
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Arsip</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                        <tr>
                                
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><a href="/dokumen/{{ $item->id }}" >{{ $item->dokumen }}</a></td>
                           
                            <td class="d-flex">
                                <a href="/arsip/{{ $item->id }}/edit" class="btn btn-primary mx-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/arsip/{{ $item->id }}" method="post">
                                    @method('delete')
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

