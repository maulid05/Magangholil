<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Edit Zakat
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Edit Zakat
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('zakat.update', $masterZakat->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <input type="hidden"
                        name="id_pemberi"
                        value="{{ $masterZakat->id_pemberi }}">

                    <input type="hidden"
                        name="id_penerima"
                        value="{{ $masterZakat->id_penerima }}">

                    <input type="hidden"
                        name="status"
                        value="{{ $masterZakat->status }}">

                    <div class="mb-3">
                        <label class="form-label">
                            Jenis Zakat
                        </label>

                        <select name="id_jenis_zakat"
                            id="jenisZakat"
                            class="form-select"
                            required>

                            <option value="">
                                Pilih Jenis Zakat
                            </option>

                            @foreach($jenisZakats as $jenis)

                                <option
                                    value="{{ $jenis->id }}"
                                    data-name="{{ $jenis->name }}"
                                    data-deskripsi="{{ $jenis->deskripsi_singkat }}"
                                    data-wallet="{{ $jenis->wallet }}"
                                    data-gambar="{{ asset('storage/' . $jenis->gambar) }}"
                                    data-petugas="{{ $jenis->petugas?->name ?? '-' }}"
                                    {{ $masterZakat->id_jenis_zakat == $jenis->id ? 'selected' : '' }}>

                                    {{ $jenis->name }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div id="previewZakat"
                        class="card mt-3">

                        <div class="card-header bg-success text-white">
                            Informasi Jenis Zakat
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-4 text-center">

                                    <img id="previewGambar"
                                        src="{{ asset('storage/' . $masterZakat->jenisZakat->gambar) }}"
                                        class="img-fluid rounded border"
                                        style="max-height:200px;">

                                </div>

                                <div class="col-md-8">

                                    <h4 id="previewNama">
                                        {{ $masterZakat->jenisZakat->name }}
                                    </h4>

                                    <p id="previewDeskripsi">
                                        {{ $masterZakat->jenisZakat->deskripsi_singkat }}
                                    </p>

                                    <hr>

                                    <p>
                                        <strong>Wallet:</strong>
                                        <span id="previewWallet">
                                            {{ $masterZakat->jenisZakat->wallet }}
                                        </span>
                                    </p>

                                    <p>
                                        <strong>Petugas:</strong>
                                        <span id="previewPetugas">
                                            {{ $masterZakat->jenisZakat->petugas?->name ?? '-' }}
                                        </span>
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="form-check mb-4 mt-3">

                        <input class="form-check-input"
                            type="checkbox"
                            id="persetujuan"
                            required>

                        <label class="form-check-label"
                            for="persetujuan">

                            Saya menyatakan bahwa data yang saya ubah sudah benar.

                        </label>

                    </div>

                    <button type="submit"
                        class="btn btn-primary">

                        Update Zakat

                    </button>

                    <a href="{{ route('zakat.index') }}"
                        class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

<script>

document.addEventListener('DOMContentLoaded', function() {

    const jenisZakat =
        document.getElementById('jenisZakat');

    const card =
        document.getElementById('previewZakat');

    jenisZakat.addEventListener('change', function() {

        const selected =
            this.options[this.selectedIndex];

        if (!selected.value) {

            card.classList.add('d-none');
            return;

        }

        document.getElementById('previewNama')
            .textContent =
            selected.dataset.name;

        document.getElementById('previewDeskripsi')
            .textContent =
            selected.dataset.deskripsi;

        document.getElementById('previewWallet')
            .textContent =
            selected.dataset.wallet;

        document.getElementById('previewPetugas')
            .textContent =
            selected.dataset.petugas;

        document.getElementById('previewGambar')
            .src =
            selected.dataset.gambar;

        card.classList.remove('d-none');

    });

});

</script>

</x-app-layout>