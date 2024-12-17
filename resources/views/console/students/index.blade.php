@extends('layouts.app')
@section('title', 'Data Siswa')

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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Siswa</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" onsubmit="return false"
                        action="{{ route('students.store') }}">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('nim')
                                is-invalid
                            @enderror"
                                id="edit-user-nim" placeholder="Masukkan NIM Siswa..." name="nim" aria-label="Masukkan NIM Siswa..."
                                value="{{ old('nim') }}" />
                            <label for="edit-user-nim">NIM Siswa</label>

                            @error('nim')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                id="edit-user-name" placeholder="Masukkan Nama Siswa..." name="name" aria-label="Masukkan Nama Siswa..."
                                value="{{ old('name') }}" />
                            <label for="edit-user-name">Nama Siswa</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="email"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                id="edit-user-email" placeholder="Masukkan Email Siswa..." name="email" aria-label="Masukkan Email Siswa..."
                                value="{{ old('email') }}" />
                            <label for="edit-user-email">Email Siswa</label>

                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="number"
                                class="form-control @error('cohort')
                                is-invalid
                            @enderror"
                                id="edit-user-cohort" placeholder="Masukkan Angkatan Siswa..." name="cohort" aria-label="Masukkan Angkatan Siswa..."
                                value="{{ old('cohort') }}" />
                            <label for="edit-user-cohort">Angkatan Siswa</label>

                            @error('cohort')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="password"
                                class="form-control @error('password')
                                is-invalid
                            @enderror"
                                id="edit-user-password" placeholder="Masukkan Kata Sandi Siswa..." name="password" aria-label="Masukkan Kata Sandi Siswa..."
                                value="{{ old('password') }}" />
                            <label for="edit-user-password">Kata Sandi Siswa</label>

                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="password"
                                class="form-control @error('password_confirmation')
                                is-invalid
                            @enderror"
                                id="edit-user-password_confirmation" placeholder="Masukkan Konfirmasi Kata Sandi Siswa..." name="password_confirmation" aria-label="Masukkan Konfirmasi Kata Sandi Siswa..."
                                value="{{ old('password_confirmation') }}" />
                            <label for="edit-user-password_confirmation">Konfirmasi Kata Sandi Siswa</label>

                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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
        var urlDeleteUser = "{{ route('students.destroy', ':id') }}";
    </script>
    @vite('resources/js/console/students/script.js')
@endpush
