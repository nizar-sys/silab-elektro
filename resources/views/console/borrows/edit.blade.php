@extends('layouts.app')
@section('title', 'Edit Peminjaman')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Peminjaman</span>
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

                    <form class="edit-user pt-0 mt-2" id="editUserForm" method="POST" onsubmit="return false"
                        action="{{ route('borrows.update', $borrow->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="student-id"
                                class="form-select @error('student_id')
                                is-invalid @enderror"
                                name="student_id">
                                <option value="">Pilih Mahasiswa</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" @if ($student->id == $borrow->student_id) selected @endif>{{ $student->user->name }}</option>
                                @endforeach
                            </select>
                            <label for="student-id">Mahasiswa</label>

                            @error('student_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="inventory-id"
                                class="form-select @error('inventory_id')
                                is-invalid @enderror"
                                name="inventory_id">
                                <option value="">Pilih Barang</option>
                                @foreach ($inventories as $inventory)
                                    <option value="{{ $inventory->id }}" @if ($inventory->id == $borrow->inventory_id) selected @endif>{{ $inventory->name }}</option>
                                @endforeach
                            </select>
                            <label for="inventory-id">Barang</label>

                            @error('inventory_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <a href="{{ route('borrows.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/borrows/edit_script.js')
@endpush
