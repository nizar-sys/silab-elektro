@extends('layouts.app')
@section('title', 'Data Absensi Praktikum')

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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Absensi Praktikum</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" onsubmit="return false"
                        action="{{ route('attendances.store') }}">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="practical-id" class="form-select @error('practical_id')
                                is-invalid @enderror" name="practical_id">
                                <option value="">Pilih Praktikum</option>
                                @foreach ($practicals as $practical)
                                    <option value="{{ $practical->id }}">{{ $practical->student->nim }} {{ $practical->student->user->name }} - {{ $practical->name }}</option>
                                @endforeach
                            </select>
                            <label for="practical-id">Praktikum</label>

                            @error('practical_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Status Absensi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="hadir" value="hadir" checked>
                                <label class="form-check-label" for="hadir">Hadir</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="izin" value="izin">
                                <label class="form-check-label" for="izin">Izin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="sakit" value="sakit">
                                <label class="form-check-label" for="sakit">Sakit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="alpa" value="alpa">
                                <label class="form-check-label" for="alpa">Alpa</label>
                            </div>
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
        var urlDeleteUser = "{{ route('attendances.destroy', ':id') }}";
    </script>
    @vite('resources/js/console/attendances/script.js')
@endpush
