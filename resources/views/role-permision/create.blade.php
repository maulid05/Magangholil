<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Tambah Role Permission
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Tambah Role Permission
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('role-permision.store') }}"
                    method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Role
                        </label>

                        <select name="id_role"
                            class="form-select"
                            required>

                            <option value="">
                                Pilih Role
                            </option>

                            @foreach($roles as $role)

                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Permission
                        </label>

                        <select name="id_permision"
                            class="form-select"
                            required>

                            <option value="">
                                Pilih Permission
                            </option>

                            @foreach($permisions as $permision)

                                <option value="{{ $permision->id }}">
                                    {{ $permision->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <button type="submit"
                        class="btn btn-success">
                        Simpan
                    </button>

                    <a href="{{ route('role-permision.index') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>
