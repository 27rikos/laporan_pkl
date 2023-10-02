@extends('partials.admin')
@section('content')
<h1 class="h3  text-gray-800">Dashboard</h1>
<div class="row">

    <!-- jumlah pegawai -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pegawai }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-users fa-xl text-gray-300"></i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- dokumnen -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah Arsip pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $arsip }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>

@endsection
