<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Manajemen Jenis Zakat
        </h2>
    </x-slot>

    <div class="container mt-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        <div class="card shadow">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    Daftar Jenis Zakat
                </h5>

                <a href="{{ route('jeniszakat.create') }}"
                    class="btn btn-success">
                    Tambah Jenis Zakat
                </a>

            </div>

            <div class="card-body">

                <div class="mb-3">
                    <input type="text"
                        id="searchInput"
                        class="form-control"
                        placeholder="Cari jenis zakat...">
                </div>

                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-success">
                        <tr>
                            <th width="5%">No</th>
                            <th>Gambar</th>
                            <th>Nama Zakat</th>
                            <th>Deskripsi</th>
                            <th>Wallet</th>
                            <th>Petugas</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="zakatTable">

                        @forelse($jenisZakats as $index => $jenis)

                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    @if($jenis->gambar)
                                        <img
                                            src="{{ asset('storage/' . $jenis->gambar) }}"
                                            width="80"
                                            class="img-thumbnail">
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    {{ $jenis->name }}
                                </td>

                                <td>
                                    {{ $jenis->deskripsi_singkat }}
                                </td>

                                <td>
                                    {{ $jenis->wallet }}
                                </td>
                                
                                <td>
                                    {{ $jenis->petugas?->name ?? '-' }}
                                </td>

                                <td>

                                    <a href="{{ route('jeniszakat.edit', $jenis->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('jeniszakat.destroy', $jenis->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center">
                                    Belum ada data jenis zakat.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('#zakatTable tr');

            searchInput.addEventListener('keyup', function() {

                let keyword = this.value.toLowerCase();

                rows.forEach(function(row) {

                    let text = row.textContent.toLowerCase();

                    row.style.display =
                        text.includes(keyword)
                        ? ''
                        : 'none';

                });

            });

        });
    </script>

</x-app-layout>
