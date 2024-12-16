<?php

namespace App\Http\Controllers\Console;

use App\DataTables\ScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreSchedule;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class ScheduleController extends Controller
{
    public function index(Request $request, ScheduleDataTable $dataTable)
    {
        return $dataTable
            ->render('console.schedules.index');
    }

    public function store(RequestStoreSchedule $request)
    {
        DB::beginTransaction();
        try {
            Schedule::create($request->validated());

            DB::commit();
            return redirect()->route('schedules.index')->with('success', 'Penambahan jadwal berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah jadwal.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $schedule = Schedule::findOrFail($id);

            DB::commit();
            return view('console.schedules.edit', compact('schedule'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'jadwal tidak ditemukan.');
        }
    }

    public function update(RequestStoreSchedule $request, $id)
    {
        DB::beginTransaction();
        try {
            $schedule = Schedule::findOrFail($id);
            $schedule->update($request->validated());

            DB::commit();
            return redirect()->route('schedules.index')->with('success', 'jadwal berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah jadwal.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Schedule::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('schedules.index')->with('success', 'jadwal berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus jadwal.');
        }
    }
}
