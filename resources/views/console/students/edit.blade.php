@extends('layouts.app')
@section('title', 'Edit Siswa')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Siswa</span>
                </h5>
            </div>

            <div class="card-body">
                <div class="offcanvas-body mx-0 flex-grow-0 h-100 mt-2">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <h4 class="alert-heading d-flex align-items-center">
                                <span class="alert-icon rounded">
                                    <i class="ri-error-warning-line ri-22px"></i>
                                </span>
                                Ada kesalahan!
                            </h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="edit-user pt-0" id="editUserForm" method="POST" onsubmit="return false"
                        action="{{ route('students.update', $student->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ $student->user->id }}">

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('nim')
                                is-invalid
                            @enderror"
                                id="edit-user-nim" placeholder="Masukkan NIM Siswa..." name="nim"
                                aria-label="Masukkan NIM Siswa..." value="{{ old('nim', $student->nim) }}" />
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
                                id="edit-user-name" placeholder="Masukkan Nama Siswa..." name="name"
                                aria-label="Masukkan Nama Siswa..." value="{{ old('name', $student->user->name) }}" />
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
                                id="edit-user-email" placeholder="Masukkan Email Siswa..." name="email"
                                aria-label="Masukkan Email Siswa..." value="{{ old('email', $student->user->email) }}" />
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
                                id="edit-user-cohort" placeholder="Masukkan Angkatan Siswa..." name="cohort"
                                aria-label="Masukkan Angkatan Siswa..." value="{{ old('cohort', $student->cohort) }}" />
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
                                id="edit-user-password" placeholder="Masukkan Kata Sandi Siswa..." name="password"
                                aria-label="Masukkan Kata Sandi Siswa..." value="{{ old('password') }}" />
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
                        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/students/edit_script.js')
@endpush
