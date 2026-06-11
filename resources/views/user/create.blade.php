<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah User
        </h2>
    </x-slot>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">Form Tambah User</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           required>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           required>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required>

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

                <hr>        

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">NIK</label>

                        <input type="number" class="form-control" name="nik">
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="" class="form-label">Tanggal Lahir</label>

                        <input type="date" class="form-control" name="birth_date">
                    </div>
                </div>

                <div class="row">

                    <div class="mb-3 col-md-6" >
                        <label for="" class="form-label">Role</label>
                        
                        <select name="role" id="" class="form-control mb-4">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Gender</label>

                        <select name="gender" id="" class="form-control mb-4">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Phone</label>
                        
                        <input type="Number" class="form-control" name="phone">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Alamat</label>

                        <input type="textarea" class="form-control" name="address">
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>

                    <a href="{{ route('user.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</x-app-layout>
