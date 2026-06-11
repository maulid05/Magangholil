<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Manajemen Zakat
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
                    Daftar Zakat
                </h5>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <input type="text"
                        id="searchInput"
                        class="form-control"
                        placeholder="Cari data zakat...">
                </div>

                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Jenis Zakat</th>
                            <th>Pemberi</th>
                            <th>Penerima</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="zakatTable">

                        @forelse($masterZakats as $index => $zakat)

                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ $zakat->jenisZakat->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $zakat->pemberi->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $zakat->penerima->name ?? 'Belum Ada' }}
                                </td>

                                <td>
                                    @if($zakat->status == 'Menunggu')
                                        <span class="badge bg-warning">
                                            Menunggu
                                        </span>
                                    @elseif($zakat->status == 'Diterima')
                                        <span class="badge bg-primary">
                                            Diterima
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            Disalurkan
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $zakat->created_at->format('d-m-Y') }}
                                </td>

                                <td>
                                    @if (Auth::user()->roles->first()->id == 3)
                                    <a href="{{ route('zakat.edit', $zakat->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    @endif
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada data zakat.
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

                    if (text.includes(keyword)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }

                });

            });

        });
    </script>

</x-app-layout>