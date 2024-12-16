@extends('layouts.app')
@section('title', 'Data Mata Kuliah')

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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Mata Kuliah</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" onsubmit="return false"
                        action="{{ route('subjects.store') }}">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="add-code" placeholder="Masukkan Kode Mata Kuliah..."
                                name="code" aria-label="Masukkan Kode Mata Kuliah..." />
                            <label for="add-code">Kode</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="add-name" placeholder="Masukkan Nama Mata Kuliah..."
                                name="name" aria-label="Masukkan Nama Mata Kuliah..." />
                            <label for="add-name">Nama</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="number" class="form-control" id="add-sks" placeholder="Masukkan SKS Mata Kuliah..."
                                name="credit" aria-label="Masukkan SKS Mata Kuliah..." />
                            <label for="add-sks">SKS</label>
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
        var urlDeleteUser = "{{ route('subjects.destroy', ':id') }}";
    </script>
    @vite('resources/js/console/subjects/script.js')
@endpush
