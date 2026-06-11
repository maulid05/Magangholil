<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">
            Tambah Permission
        </h2>
    </x-slot>

    <div class="container mt-4">

        <div class="card shadow">

            <div class="card-header">
                <h5 class="mb-0">
                    Form Tambah Permission
                </h5>
            </div>

            <div class="card-body">

                <form action="{{ route('permision.store') }}"
                    method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Permission
                        </label>

                        <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required>

                    </div>
                    <div class="mb-3">

                        <label class="form-label">
                            Route
                        </label>

                        <input type="text"
                            name="route"
                            class="form-control"
                            value="{{ old('route') }}"
                            required>

                    </div>

                    <button type="submit"
                        class="btn btn-success">
                        Simpan
                    </button>

                    <a href="{{ route('permision.index') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>
</x-app-layout>
