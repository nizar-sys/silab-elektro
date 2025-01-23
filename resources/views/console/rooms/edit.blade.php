@extends('layouts.app')
@section('title', 'Edit Ruangan')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Ruangan</span>
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
                        action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('code')
                                is-invalid
                            @enderror"
                                id="edit-user-code" placeholder="Masukkan Kode Ruangan..." name="code" aria-label="Masukkan Kode Ruangan..."
                                value="{{ old('code', $room->code) }}" />
                            <label for="edit-user-code">Kode Ruangan</label>

                            @error('code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="text"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                id="edit-user-name" placeholder="Masukkan Nama Ruangan..." name="name" aria-label="Masukkan Nama Ruangan..."
                                value="{{ old('name', $room->name) }}" />
                            <label for="edit-user-name">Nama Ruangan</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5 mt-2">
                            <input type="url"
                                class="form-control @error('link_stream')
                                is-invalid
                            @enderror"
                                id="edit-user-link_stream" placeholder="Masukkan Link Stream Ruangan..." name="link_stream" aria-label="Masukkan Link Stream Ruangan..."
                                value="{{ old('link_stream', $room->link_stream) }}" />
                            <label for="edit-user-link_stream">Link Stream Ruangan</label>

                            @error('link_stream')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="file" class="form-control" id="add-foto" placeholder="Masukkan Foto Ruangan..."
                                name="foto" aria-label="Masukkan Foto Ruangan..." />
                            <label for="add-foto">Foto Ruangan</label>
                            <small class="text-danger">Jangan upload jika tidak akan mengganti gambar.</small>
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <a href="{{ route('rooms.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/rooms/edit_script.js')
@endpush
