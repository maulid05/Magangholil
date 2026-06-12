<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Edit Zakat
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-body">

                <form action="{{ route('zakat.store') }}"
                    method="POST">

                    @csrf


                    <input type="hidden"
                        name="id_pemberi"
                        value="{{ Auth::user()->id }}">

                    <input type="hidden"
                        name="id_penerima"
                        value="{{ $masterZakat->petugas?->id }}">

                    <input type="hidden"
                        name="status"
                        value="Menunggu">

                    <input type="hidden"
                        name="id_jenis_zakat"
                        value="{{ $masterZakat->id }}">
                    
                    <div id="previewZakat"
                        class="card mt-3">

                        <div class="card-header bg-success text-white">
                            Informasi Jenis Zakat
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-4 text-center">

                                    <img id="previewGambar"
                                        src="{{ asset('storage/' . $masterZakat->gambar) }}"
                                        class="img-fluid rounded border"
                                        style="max-height:200px;">

                                </div>

                                <div class="col-md-8">

                                    <h4 id="previewNama">
                                        {{ $masterZakat->name }}
                                    </h4>

                                    <p id="previewDeskripsi">
                                        {{ $masterZakat->deskripsi_singkat }}
                                    </p>

                                    <hr>

                                    <p>
                                        <strong>Wallet:</strong>
                                        <span id="previewWallet">
                                            {{ $masterZakat->wallet }}
                                        </span>
                                    </p>

                                    <p>
                                        <strong>Petugas:</strong>
                                        <span id="previewPetugas">
                                            {{ $masterZakat->petugas?->name ?? '-' }}
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
                        class="btn btn-success">

                        Berzakat

                    </button>

                    <a href="{{ route('dashboard') }}"
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