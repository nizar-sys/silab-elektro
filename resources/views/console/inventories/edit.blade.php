@extends('layouts.app')
@section('title', 'Edit Inventaris')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Inventaris</span>
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
                        action="{{ route('inventories.update', $inventory->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="room-id" class="form-select @error('room_id')
                                is-invalid @enderror" name="room_id">
                                <option value="">Pilih Ruangan</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" @if ($room->id == $inventory->room_id) selected @endif>{{ $room->name }}</option>
                                @endforeach
                            </select>
                            <label for="room-id">Ruangan</label>

                            @error('room_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                id="add-inventory-code" placeholder="Kode Inventaris" name="code" aria-label="Kode Inventaris" value="{{ $inventory->code }}"/>
                            <label for="add-inventory-code">Kode Inventaris</label>

                            @error('code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="add-inventory-name" placeholder="Laptop" name="name" aria-label="Laptop" value="{{ $inventory->name }}"/>
                            <label for="add-inventory-name">Nama Inventaris</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                id="add-inventory-brand" placeholder="Asus" name="brand" aria-label="Asus" value="{{ $inventory->brand }}"/>
                            <label for="add-inventory-brand">Merk</label>

                            @error('brand')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="date" class="form-control @error('purchase_date') is-invalid @enderror"
                                id="add-inventory-purchase_date" placeholder="2021-01-01"
                                name="purchase_date" aria-label="2021-01-01" value="{{ $inventory->purchase_date }}"/>
                            <label for="add-inventory-purchase_date">Tanggal Pembelian</label>

                            @error('purchase_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="add-inventory-description" placeholder="Deskripsi"
                                name="description" aria-label="Deskripsi">{{ $inventory->description }}</textarea>
                            <label for="add-inventory-description">Deskripsi</label>

                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <a href="{{ route('inventories.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/inventories/edit_script.js')
@endpush
