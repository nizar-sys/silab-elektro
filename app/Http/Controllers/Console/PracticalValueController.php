<?php

namespace App\Http\Controllers\Console;

use App\DataTables\PracticalValueDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStorePracticalValue;
use App\Models\Practical;
use App\Models\PracticalValue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class PracticalValueController extends Controller
{
    public function index(Request $request, PracticalValueDataTable $dataTable)
    {
        $practicals = Practical::distinct()->get();

        return $dataTable
            ->render('console.practical_values.index', compact('practicals'));
    }

    public function store(RequestStorePracticalValue $request)
    {
        DB::beginTransaction();
        try {
            PracticalValue::create($request->validated());

            DB::commit();
            return redirect()->route('practical-values.index')->with('success', 'Penambahan nilai praktikum berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah nilai praktikum.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $practicalValue = PracticalValue::findOrFail($id);
            $practicals = Practical::distinct()->get();

            DB::commit();
            return view('console.practical_values.edit', compact('practicalValue', 'practicals'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'nilai praktikum tidak ditemukan.');
        }
    }

    public function update(RequestStorePracticalValue $request, $id)
    {
        DB::beginTransaction();
        try {
            $practicalValue = PracticalValue::findOrFail($id);
            $practicalValue->update($request->validated());

            DB::commit();
            return redirect()->route('practical-values.index')->with('success', 'nilai praktikum berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah nilai praktikum.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            PracticalValue::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('practical-values.index')->with('success', 'nilai praktikum berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus nilai praktikum.');
        }
    }
}
