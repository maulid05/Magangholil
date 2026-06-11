<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Manajemen Navigasi
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
                    Daftar Navigasi
                </h5>

                <a href="{{ route('nav.create') }}"
                    class="btn btn-success">
                    Tambah Navigasi
                </a>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <input type="text"
                        id="searchInput"
                        class="form-control"
                        placeholder="Cari nama menu atau URL...">
                </div>

                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-success">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Menu</th>
                            <th>Route</th>
                            <th>Dibuat</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="navTable">
                        @forelse($navs as $index => $nav)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $nav->name }}</td>
                                <td>{{ $nav->route }}</td>
                                <td>{{ $nav->created_at->format('d-m-Y') }}</td>

                                <td>
                                    <a href="{{ route('nav.edit', $nav->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('nav.destroy', $nav->id) }}"
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
                                <td colspan="5" class="text-center">
                                    Belum ada data navigasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('keyup', function () {

                const keyword = this.value.toLowerCase();
                const rows = document.querySelectorAll('#navTable tr');

                rows.forEach(function(row) {

                    const text = row.textContent.toLowerCase();

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