@extends('layouts.app')
@section('title', 'Edit Jadwal Praktikum')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <div class="card-header border-bottom">
                <h5 class="card-title mb-0">
                    <span class="fw-normal">Edit Jadwal Praktikum</span>
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
                        action="{{ route('practicals.update', $practical->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-5">
                            <select id="user-room"
                                class="form-select @error('room_id')
                                is-invalid
                            @enderror"
                                name="room_id">
                                <option value="">Pilih Ruangan</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" @if (old('room_id', $practical->room_id) == $room->id) selected @endif>
                                        {{ $room->name }}</option>
                                @endforeach
                            </select>
                            <label for="user-room">Ruangan Jadwal Praktikum</label>

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
                                    <option value="{{ $schedule->id }}" @if (old('schedule_id', $practical->schedule_id) == $schedule->id) selected @endif>
                                        {{ $schedule->day }} - {{ $schedule->hour }}</option>
                                @endforeach
                            </select>
                            <label for="user-schedule">Jadwal Jadwal Praktikum</label>

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
                                    <option value="{{ $student->id }}" @if (old('student_id', $practical->student_id) == $student->id) selected @endif>
                                        {{ $student->user->name }} <small>({{ $student->nim }})</small></option>
                                @endforeach
                            </select>
                            <label for="user-student">Siswa Jadwal Praktikum</label>

                            @error('student_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" id="edit-user-name"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                placeholder="Nama Jadwal Praktikum" aria-label="Nama Jadwal Praktikum" name="name"
                                value="{{ old('name', $practical->name) }}" />
                            <label for="edit-user-name">Nama Jadwal Praktikum</label>

                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating form-floating-outline mb-5">
                            <input type="text" id="edit-user-session"
                                class="form-control @error('session')
                                is-invalid
                            @enderror"
                                placeholder="Sesi Jadwal Praktikum" aria-label="Sesi Jadwal Praktikum" name="session"
                                value="{{ old('session', $practical->session) }}" />
                            <label for="edit-user-session">Sesi Jadwal Praktikum</label>

                            @error('session')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Simpan</button>
                        <a href="{{ route('practicals.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/console/practicals/edit_script.js')
@endpush
