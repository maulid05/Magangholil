<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Edit Jenis Zakat
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Edit Jenis Zakat
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('jeniszakat.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            Nama Zakat
                        </label>

                        <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required>

                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi Singkat
                        </label>

                        <textarea name="deskripsi_singkat"
                            rows="4"
                            class="form-control"
                            required>{{ old('deskripsi_singkat') }}</textarea>

                        @error('deskripsi_singkat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <input  type="hidden" name="id_petugas" value="{{ Auth::user()->id }}" >

                    <div class="mb-3">
                        <label class="form-label">
                            Wallet
                        </label>

                        <input type="text"
                            name="wallet"
                            class="form-control"
                            value="{{ old('wallet') }}"
                            required>

                        @error('wallet')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Gambar
                        </label>

                        <input type="file"
                            name="gambar"
                            class="form-control">

                        @error('gambar')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <button type="submit"
                        class="btn btn-success">
                        Buat
                    </button>

                    <a href="{{ url()->previous() }}"
                        class="btn btn-secondary">
                                        
                        Kembali
                                        
                    </a>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>
