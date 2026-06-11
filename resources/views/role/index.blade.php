<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Manajemen Role
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('roles.create') }}"
                class="btn btn-primary">
                Tambah Role
            </a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="mb-0">
                    Data Role
                </h5>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th>Nama</th>
                            <th width="200">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>

                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('roles.destroy', $role->id) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    Data belum tersedia
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</x-app-layout>