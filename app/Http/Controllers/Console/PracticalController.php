<?php

namespace App\Http\Controllers\Console;

use App\DataTables\PracticalDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStorePractical;
use App\Models\Practical;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class PracticalController extends Controller
{
    public function index(Request $request, PracticalDataTable $dataTable)
    {
        $rooms = Room::all();
        $schedules = Schedule::all();
        $students = Student::all();

        return $dataTable
            ->render('console.practicals.index', compact('rooms', 'schedules', 'students'));
    }

    public function store(RequestStorePractical $request)
    {
        DB::beginTransaction();
        try {
            Practical::create($request->validated());

            DB::commit();
            return redirect()->route('practicals.index')->with('success', 'Penambahan data praktikum berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah data praktikum.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $rooms = Room::all();
            $schedules = Schedule::all();
            $students = Student::all();
            $practical = Practical::findOrFail($id);

            DB::commit();
            return view('console.practicals.edit', compact('practical', 'rooms', 'schedules', 'students'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'data praktikum tidak ditemukan.');
        }
    }

    public function update(RequestStorePractical $request, $id)
    {
        DB::beginTransaction();
        try {
            $practical = Practical::findOrFail($id);
            $practical->update($request->validated());

            DB::commit();
            return redirect()->route('practicals.index')->with('success', 'data praktikum berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah data praktikum.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Practical::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('practicals.index')->with('success', 'data praktikum berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus data praktikum.');
        }
    }
}
