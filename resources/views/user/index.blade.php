<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Manajemen User
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
                    Daftar User
                </h5>

                <a href="{{ route('user.create') }}"
                    class="btn btn-success">
                    Tambah User
                </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-success">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Dibuat</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>

                            <td>
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('user.destroy', $user->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada data user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

                </table>

            </div>

        </div>

    </div>
</x-app-layout>