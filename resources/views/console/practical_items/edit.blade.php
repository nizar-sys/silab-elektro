@extends('layouts.app')
@section('title', 'Edit Data Praktikum')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Data Praktikum</span>
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

                    <form class="edit-user pt-0 mt-3" id="editUserForm" method="POST" onsubmit="return false"
                        action="{{ route('practical-items.update', $practicalItem->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="file" accept="image/jpg,image/png,image/jpeg,image/gif,image/webp" class="form-control" id="add-logo" name="logo" aria-label="Masukkan Logo Praktikum..." />
                            <label for="add-logo">Logo</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                id="edit-user-name" placeholder="Masukkan Hari Data Praktikum..." name="name" aria-label="Masukkan Hari Data Praktikum..."
                                value="{{ old('name', $practicalItem->name) }}" />
                            <label for="edit-user-name">Hari Data Praktikum</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('description')
                                is-invalid
                            @enderror"
                                id="edit-user-description" placeholder="Masukkan Deskripsi Data Praktikum..." name="description" aria-label="Masukkan Deskripsi Data Praktikum..."
                                value="{{ old('description', $practicalItem->description) }}" />
                            <label for="edit-user-description">Deskripsi Data Praktikum</label>

                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <a href="{{ route('practical-items.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/practical_items/edit_script.js')
@endpush
