@extends('layouts.app')
@section('title', 'Edit Nilai Praktikum')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Nilai Praktikum</span>
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
                        action="{{ route('practical-values.update', $practicalValue->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-5 mt-4">
                            <select id="practical_id-id" class="form-select @error('practical_id')
                                is-invalid @enderror" name="practical_id">
                                <option value="">Pilih Praktikum</option>
                                @foreach ($practicals as $practical)
                                    <option value="{{ $practical->id }}" @if ($practical->id == $practicalValue->practical_id) selected @endif>{{ $practical->name }}</option>
                                @endforeach
                            </select>
                            <label for="practical_id-id">Praktikum</label>

                            @error('practical_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control @error('value') is-invalid @enderror"
                                id="add-practicalValue-value" placeholder="Kode Inventaris" name="value" aria-label="Kode Inventaris" value="{{ $practicalValue->value }}"/>
                            <label for="add-practicalValue-value">Nilai</label>

                            @error('value')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <a href="{{ route('practical-values.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/practical_values/edit_script.js')
@endpush
