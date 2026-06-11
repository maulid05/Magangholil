<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Manajemen Role Permission
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
                    Daftar Role Permission
                </h5>

                <a href="{{ route('role-permision.create') }}"
                    class="btn btn-success">
                    Tambah Role Permission
                </a>

            </div>

            <div class="card-body">

                <input type="text"
                    id="searchInput"
                    class="form-control mb-3"
                    placeholder="Cari role atau permission...">

                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-success">
                        <tr>
                            <th width="5%">No</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Dibuat</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="rolePermissionTable">

                        @forelse($rolePermisions as $index => $item)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ $item->role?->name }}
                                </td>

                                <td>
                                    {{ $item->permision?->name }}
                                </td>

                                <td>
                                    {{ $item->created_at->format('d-m-Y') }}
                                </td>

                                <td>

                                    <a href="{{ route('role-permision.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('role-permision.destroy', $item->id) }}"
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
                                <td colspan="5"
                                    class="text-center">
                                    Belum ada data role permission.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</x-app-layout>
