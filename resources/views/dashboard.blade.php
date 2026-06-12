<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">

            <!-- Welcome Card -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            <h3 class="card-title">Welcome to the Dashboard</h3>
                            <p class="card-text mb-0">
                                Halo {{ Auth::user()->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->roles->first()->id == 1)
            <!-- Statistik -->
            <div class="row g-4">
                
                <div class="col-md-4">
                    <div class="card bg-success text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Total User</h5>
                            <h2>{{ $usercount }}</h2>
                            <a href="{{ route('user.index') }}" class="btn btn-success text-white">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-success text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Role</h5>
                            <h2>{{ $role }}</h2>
                            <a href="{{ route('roles.index') }}" class="btn btn-success text-white">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-success text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5>Total Zakat</h5>
                            <h2>{{ $totalzakat }}</h2>
                            <a href="{{ route('zakat.index') }}" class="btn btn-success text-white">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif (Auth::user()->roles->first()->id == 3)
            <div class="row g-4" >
                <div class="col-md-4">
                        <div class="card bg-success text-white shadow h-100">
                            <div class="card-body text-center">
                                <h5></h5>
                                <h2></h2>
                                <a href="#" class="btn btn-success text-white">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-success text-white shadow h-100">
                            <div class="card-body text-center">
                                <h5></h5>
                                <h2></h2>
                                <a href="#" class="btn btn-success text-white">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-success text-white shadow h-100">
                            <div class="card-body text-center">
                                <h5></h5>
                                <h2></h2>
                                <a href="#" class="btn btn-success text-white">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <style>
            .zakat-card{
                transition: .3s;
                overflow:hidden;
                border-radius:12px;
            }

            .zakat-card:hover{
                transform:translateY(-5px);
                box-shadow:0 10px 25px rgba(0,0,0,.25);
            }

            .zakat-card img{
                height:220px;
                object-fit:cover;
            }

            .zakat-overlay{
                background:#1b2838;
                color:white;
            }
            </style>

            <div class="row g-4">
            
                @foreach($jenisZakats as $jenis)
            
                    <div class="col-lg-4 col-md-6">
                    
                        <div class="card zakat-card border-0">
                        
                            <img src="{{ asset('storage/' . $jenis->gambar) }}"
                                alt="{{ $jenis->name }}">
                        
                            <div class="card-body zakat-overlay">
                            
                                <h5>{{ $jenis->name }}</h5>
                            
                                <p class="small">
                                    {{ Str::limit($jenis->deskripsi_singkat, 100) }}
                                </p>
                            
                                <div class="d-flex justify-content-between align-items-center">
                                
                                    <span class="badge bg-success">
                                        Tersedia
                                    </span>
                                
                                    <a href="{{ route('zakat.show', $jenis->id) }}"
                                       class="btn btn-success">
                                        Ajukan Zakat
                                    </a>
                                
                                </div>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                
                @endforeach
                
            </div>
            @endif


        </div>
    </div>
</x-app-layout>