@extends('layouts.app')
@section('title', 'Data Inventaris')

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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Inventaris</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" onsubmit="return false"
                        action="{{ route('inventories.store') }}">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="room-id" class="form-select @error('room_id')
                                is-invalid @enderror" name="room_id">
                                <option value="">Pilih Ruangan</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                            <label for="room-id">Ruangan</label>

                            @error('room_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                id="add-inventory-code" placeholder="Kode Inventaris" name="code" aria-label="Kode Inventaris" />
                            <label for="add-inventory-code">Kode Inventaris</label>

                            @error('code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="add-inventory-name" placeholder="Laptop" name="name" aria-label="Laptop" />
                            <label for="add-inventory-name">Nama Inventaris</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                id="add-inventory-brand" placeholder="Asus" name="brand" aria-label="Asus" />
                            <label for="add-inventory-brand">Merk</label>

                            @error('brand')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="date" class="form-control @error('purchase_date') is-invalid @enderror"
                                id="add-inventory-purchase_date" placeholder="2021-01-01"
                                name="purchase_date" aria-label="2021-01-01" />
                            <label for="add-inventory-purchase_date">Tanggal Pembelian</label>

                            @error('purchase_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="add-inventory-description" placeholder="Deskripsi"
                                name="description" aria-label="Deskripsi"></textarea>
                            <label for="add-inventory-description">Deskripsi</label>

                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                id="add-inventory-quantity" placeholder="10" name="quantity" aria-label="10" />
                            <label for="add-inventory-quantity">Jumlah</label>

                            @error('quantity')
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
        var urlDeleteUser = "{{ route('inventories.destroy', ':id') }}";
    </script>
    @vite('resources/js/console/inventories/script.js')
@endpush
