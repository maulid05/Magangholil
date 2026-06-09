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
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-success text-white shadow h-100">
                        <div class="card-body text-center">
                            <h5></h5>
                            <h2></h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>