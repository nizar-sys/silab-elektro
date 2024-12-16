@extends('layouts.app')
@section('title', 'Edit Mata Kuliah')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Mata Kuliah</span>
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
                        action="{{ route('subjects.update', $subject->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('code')
                                is-invalid
                            @enderror"
                                id="edit-user-code" placeholder="Masukkan Kode Mata Kuliah..." name="code" aria-label="Masukkan Kode Mata Kuliah..."
                                value="{{ old('code', $subject->code) }}" />
                            <label for="edit-user-code">Kode Mata Kuliah</label>

                            @error('code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                id="edit-user-name" placeholder="Masukkan Nama Mata Kuliah..." name="name" aria-label="Masukkan Nama Mata Kuliah..."
                                value="{{ old('name', $subject->name) }}" />
                            <label for="edit-user-name">Nama Mata Kuliah</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="number"
                                class="form-control @error('credit')
                                is-invalid
                            @enderror"
                                id="edit-user-credit" placeholder="Masukkan SKS Mata Kuliah..." name="credit" aria-label="Masukkan SKS Mata Kuliah..."
                                value="{{ old('credit', $subject->credit) }}" />
                            <label for="edit-user-credit">SKS Mata Kuliah</label>

                            @error('credit')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <a href="{{ route('subjects.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/subjects/edit_script.js')
@endpush
