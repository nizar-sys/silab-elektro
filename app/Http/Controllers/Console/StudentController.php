<?php

namespace App\Http\Controllers\Console;

use App\DataTables\StudentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreStudent;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class StudentController extends Controller
{
    public function index(Request $request, StudentDataTable $dataTable)
    {
        return $dataTable
            ->render('console.students.index');
    }

    public function store(RequestStoreStudent $request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->validated();
            $payload['password'] = bcrypt($payload['password']);

            $user = User::create($payload);
            $user->student()->create($payload);

            DB::commit();
            return redirect()->route('students.index')->with('success', 'Penambahan siswa berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah siswa.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $student = Student::findOrFail($id);

            DB::commit();
            return view('console.students.edit', compact('student'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'siswa tidak ditemukan.');
        }
    }

    public function update(RequestStoreStudent $request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $request->validated();

            if($request->filled('password')) {
                $payload['password'] = bcrypt($payload['password']);
            }else{
                unset($payload['password']);
            }

            $student = Student::findOrFail($id);
            $student->update($payload);
            $student->user->update($payload);

            DB::commit();
            return redirect()->route('students.index')->with('success', 'siswa berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah siswa.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Student::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('students.index')->with('success', 'siswa berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus siswa.');
        }
    }
}
