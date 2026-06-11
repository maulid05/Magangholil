<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Manajemen Permission
        </h2>
    </x-slot>

    <div class="container mt-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
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
                    Daftar Permission
                </h5>

                <a href="{{ route('permision.create') }}"
                    class="btn btn-success">
                    Tambah Permission
                </a>
            </div>

            <div class="card-body">

                <input type="text"
                    id="searchInput"
                    class="form-control mb-3"
                    placeholder="Cari permission...">

                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-success">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Route</th>
                            <th>Dibuat</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="permisionTable">

                        @forelse($permisions as $index => $permision)

                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $permision->name }}</td>

                                <td>{{ $permision->route }}</td>

                                <td>
                                    {{ $permision->created_at->format('d-m-Y') }}
                                </td>

                                <td>

                                    <a href="{{ route('permision.edit', $permision->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('permision.destroy', $permision->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                            class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>

                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center">
                                    Belum ada permission.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</x-app-layout>
