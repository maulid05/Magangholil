<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Tambah Role
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Tambah Role
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    {{-- Nama Role --}}
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Role
                        </label>

                        <input type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Admin">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            Simpan
                        </button>

                        <a href="{{ route('roles.index') }}"
                            class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>