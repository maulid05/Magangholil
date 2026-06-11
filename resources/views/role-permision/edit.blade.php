<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Edit Role Permission
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Edit Role Permission
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('role-permision.update', $rolePermision->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Role
                        </label>

                        <select name="id_role"
                            class="form-select"
                            required>

                            @foreach($roles as $role)

                                <option value="{{ $role->id }}"
                                    {{ $rolePermision->id_role == $role->id ? 'selected' : '' }}>
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

                            @foreach($permisions as $permision)

                                <option value="{{ $permision->id }}"
                                    {{ $rolePermision->id_permision == $permision->id ? 'selected' : '' }}>
                                    {{ $permision->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <button type="submit"
                        class="btn btn-primary">
                        Update
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
