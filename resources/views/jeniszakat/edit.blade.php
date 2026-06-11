```blade
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

                <form action="{{ route('jeniszakat.update', $jenisZakat->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Zakat
                        </label>

                        <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ $jenisZakat->name }}"
                            required>

                    </div>

                     <input type="hidden"
                            name="id_petugas"
                            class="form-control"
                            value="{{ Auth::user()->id }}"
                            required>

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi Singkat
                        </label>

                        <textarea name="deskripsi_singkat"
                            rows="4"
                            class="form-control"
                            required>{{ $jenisZakat->deskripsi_singkat }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Wallet
                        </label>

                        <input type="text"
                            name="wallet"
                            class="form-control"
                            value="{{ $jenisZakat->wallet }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Gambar Saat Ini
                        </label>

                        <br>

                        @if($jenisZakat->gambar)

                            <img src="{{ asset('storage/' . $jenisZakat->gambar) }}"
                                width="150"
                                class="img-thumbnail">

                        @else

                            <p>Tidak ada gambar</p>

                        @endif

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Ganti Gambar
                        </label>

                        <input type="file"
                            name="gambar"
                            class="form-control">

                    </div>

                    <button type="submit"
                        class="btn btn-primary">
                        Update
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
```
