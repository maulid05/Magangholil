<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Tambah Zakat
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Pengajuan Zakat
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('zakat.store') }}"
                    method="POST">

                    @csrf

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
                                    data-petugas="{{ $jenis->petugas?->name ?? '-' }}">
                        
                                    {{ $jenis->name }}
                        
                                </option>
                            
                            @endforeach
                            
                        </select>
                    </div>
                    <div id="previewZakat"
                        class="card mt-3 d-none">

                        <div class="card-header bg-success text-white">
                            Informasi Jenis Zakat
                        </div>
                    
                        <div class="card-body">
                        
                            <div class="row">
                            
                                <div class="col-md-4 text-center">
                                
                                    <img id="previewGambar"
                                        src=""
                                        class="img-fluid rounded border"
                                        style="max-height:200px;">
                                
                                </div>
                            
                                <div class="col-md-8">
                                
                                    <h4 id="previewNama"></h4>
                                
                                    <p id="previewDeskripsi"></p>
                                
                                    <hr>
                                
                                    <p>
                                        <strong>Wallet:</strong>
                                        <span id="previewWallet"></span>
                                    </p>
                                
                                    <p>
                                        <strong>Petugas:</strong>
                                        <span id="previewPetugas"></span>
                                    </p>
                                
                                </div>
                            
                            </div>
                        
                        </div>
                    
                    </div>
                    <div class="form-check mb-4">

                        <input class="form-check-input"
                            type="checkbox"
                            id="persetujuan"
                            required>

                        <label class="form-check-label"
                            for="persetujuan">

                            Saya menyatakan bahwa data yang saya kirimkan
                            adalah benar dan zakat yang diajukan sesuai
                            dengan ketentuan yang berlaku.

                        </label>

                    </div>

                    <button type="button"
                        class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#konfirmasiZakat">

                        Kirim Zakat

                    </button>

                    <a href="{{ url()->previous() }}"
                        class="btn btn-secondary">
                                        
                        Kembali
                                        
                    </a>

                    <!-- Modal -->

                    <div class="modal fade"
                        id="konfirmasiZakat"
                        tabindex="-1"
                        aria-hidden="true">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title">
                                        Konfirmasi Pengajuan Zakat
                                    </h5>

                                    <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal">
                                    </button>

                                </div>

                                <div class="modal-body">

                                    <p>
                                        Pastikan seluruh data zakat yang Anda
                                        masukkan sudah benar.
                                    </p>

                                    <p>
                                        Setelah dikirim, data akan diproses
                                        oleh petugas sesuai status yang dipilih.
                                    </p>

                                    <p class="mb-0">
                                        Apakah Anda yakin ingin melanjutkan?
                                    </p>

                                </div>

                                <div class="modal-footer">

                                    <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">

                                        Batal

                                    </button>

                                    <button type="submit"
                                        class="btn btn-success">

                                        Ya, Kirim Zakat

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

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
