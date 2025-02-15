<?php

namespace App\Http\Controllers\Console;

use App\DataTables\AttendanceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreAttendance;
use App\Models\Attendance;
use App\Models\Practical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function index(Request $request, AttendanceDataTable $dataTable)
    {
        $practicals = Practical::distinct()->get();

        return $dataTable
            ->render('console.attendances.index', compact('practicals'));
    }

    public function store(RequestStoreAttendance $request)
    {
        DB::beginTransaction();
        try {
            Attendance::create($request->validated());

            DB::commit();
            return redirect()->route('attendances.index')->with('success', 'Penambahan absensi praktikum berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah absensi praktikum.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $attendance = Attendance::findOrFail($id);
            $practicals = Practical::distinct()->get();

            DB::commit();
            return view('console.attendances.edit', compact('attendance', 'practicals'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'absensi praktikum tidak ditemukan.');
        }
    }

    public function update(RequestStoreAttendance $request, $id)
    {
        DB::beginTransaction();
        try {
            $attendance = Attendance::findOrFail($id);
            $attendance->update($request->validated());

            DB::commit();
            return redirect()->route('attendances.index')->with('success', 'absensi praktikum berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah absensi praktikum.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Attendance::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('attendances.index')->with('success', 'absensi praktikum berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus absensi praktikum.');
        }
    }
}
