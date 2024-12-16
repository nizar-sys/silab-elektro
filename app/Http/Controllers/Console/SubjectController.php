<?php

namespace App\Http\Controllers\Console;

use App\DataTables\SubjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class SubjectController extends Controller
{
    public function index(Request $request, SubjectDataTable $dataTable)
    {
        return $dataTable
            ->render('console.subjects.index');
    }

    public function store(RequestStoreSubject $request)
    {
        DB::beginTransaction();
        try {
            Subject::create($request->validated());

            DB::commit();
            return redirect()->route('subjects.index')->with('success', 'Penambahan mata kuliah berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah mata kuliah.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $subject = Subject::findOrFail($id);

            DB::commit();
            return view('console.subjects.edit', compact('subject'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Mata kuliah tidak ditemukan.');
        }
    }

    public function update(RequestStoreSubject $request, $id)
    {
        DB::beginTransaction();
        try {
            $subject = Subject::findOrFail($id);
            $subject->update($request->validated());

            DB::commit();
            return redirect()->route('subjects.index')->with('success', 'Mata kuliah berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah mata kuliah.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Subject::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('subjects.index')->with('success', 'Mata kuliah berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus mata kuliah.');
        }
    }
}
