@extends('layouts.app')
@section('title', 'Data Praktikum')

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
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Praktikum</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" onsubmit="return false"
                        action="{{ route('practicals.store') }}">
                        @csrf

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="user-room"
                                class="form-select @error('room_id')
                                is-invalid
                            @enderror"
                                name="room_id">
                                <option value="">Pilih Ruangan</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" @if (old('room_id') == $room->id) selected @endif>
                                        {{ $room->name }}</option>
                                @endforeach
                            </select>
                            <label for="user-room">Ruangan Praktikum</label>

                            @error('room_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="user-schedule"
                                class="form-select @error('schedule_id')
                                is-invalid
                            @enderror"
                                name="schedule_id">
                                <option value="">Pilih Jadwal</option>
                                @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->id }}" @if (old('schedule_id') == $schedule->id) selected @endif>
                                        {{ $schedule->day }} - {{ $schedule->hour }}</option>
                                @endforeach
                            </select>
                            <label for="user-schedule">Jadwal Praktikum</label>

                            @error('schedule_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="user-student"
                                class="form-select @error('student_id')
                                is-invalid
                            @enderror"
                                name="student_id">
                                <option value="">Pilih Siswa</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" @if (old('student_id') == $student->id) selected @endif>
                                        {{ $student->user->name }} <small>({{ $student->nim }})</small></option>
                                @endforeach
                            </select>
                            <label for="user-student">Siswa Praktikum</label>

                            @error('student_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" id="edit-user-name"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                placeholder="Nama Praktikum" aria-label="Nama Praktikum" name="name"
                                value="{{ old('name') }}" />
                            <label for="edit-user-name">Nama Praktikum</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" id="edit-user-session"
                                class="form-control @error('session')
                                is-invalid
                            @enderror"
                                placeholder="Sesi Praktikum" aria-label="Sesi Praktikum" name="session"
                                value="{{ old('session') }}" />
                            <label for="edit-user-session">Sesi Praktikum</label>

                            @error('session')
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
        var urlDeleteUser = "{{ route('practicals.destroy', ':id') }}";
    </script>
    @vite('resources/js/console/practicals/script.js')
@endpush
