@extends('layouts.app')
@section('title', 'Data Praktikum')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    <strong>Terjadi Kesalahan!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-datatable table-responsive">
                {{ $dataTable->table(['class' => 'datatables-permissions table']) }}
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
                aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Praktikum</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" onsubmit="return false"
                        action="{{ route('practical-items.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="file" accept="image/jpg,image/png,image/jpeg,image/gif,image/webp" class="form-control" id="add-logo" name="logo" aria-label="Masukkan Logo Praktikum..." />
                            <label for="add-logo">Logo</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="add-name" placeholder="Masukkan Nama Praktikum..."
                                name="name" aria-label="Masukkan Nama Praktikum..." />
                            <label for="add-name">Nama</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="add-description" placeholder="Masukkan Deskripsi Praktikum..."
                                name="description" aria-label="Masukkan Deskripsi Praktikum..." />
                            <label for="add-description">Deskripsi</label>
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Batal</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}

    <script>
        var urlDeleteUser = "{{ route('practical-items.destroy', ':id') }}";
    </script>
    @vite('resources/js/console/practical_items/script.js')
@endpush
