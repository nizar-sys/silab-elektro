@extends('layouts.app')
@section('title', 'Data Jadwal')

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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Jadwal</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" onsubmit="return false"
                        action="{{ route('schedules.store') }}">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="add-day" placeholder="Masukkan Hari Jadwal..."
                                name="day" aria-label="Masukkan Hari Jadwal..." />
                            <label for="add-day">Hari</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" class="form-control" id="add-hour" placeholder="Masukkan Jam Jadwal..."
                                name="hour" aria-label="Masukkan Jam Jadwal..." />
                            <label for="add-hour">Jam</label>
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
        var urlDeleteUser = "{{ route('schedules.destroy', ':id') }}";
    </script>
    @vite('resources/js/console/schedules/script.js')
@endpush
