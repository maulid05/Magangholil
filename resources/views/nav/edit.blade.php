<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Tambah Navigasi
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Tambah Navigasi
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('nav.update', $navs->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            Nama Menu
                        </label>

                        <input type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ $navs->name }}"
                            placeholder="Masukkan nama menu">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            URL
                        </label>

                        <input type="text"
                            name="route"
                            class="form-control @error('route') is-invalid @enderror"
                            value="{{ $navs->route }}"
                            placeholder="/dashboard">

                        @error('url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit"
                            class="btn btn-success">
                            Simpan
                        </button>

                        <a href="{{ route('nav.index') }}"
                            class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>
