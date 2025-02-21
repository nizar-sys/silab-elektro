<?php

namespace App\Http\Controllers\Console;

use App\DataTables\BorrowDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreBorrow;
use App\Models\Inventory;
use App\Models\Borrow;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class BorrowController extends Controller
{
    public function index(Request $request, BorrowDataTable $dataTable)
    {
        $inventories = Inventory::distinct()->get();
        $students = Student::distinct()->get();

        return $dataTable
            ->render('console.borrows.index', compact('inventories', 'students'));
    }

    public function store(RequestStoreBorrow $request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->validated();

            $now = Carbon::now();
            $payload['borrow_date'] = $now->format('Y-m-d');
            $payload['return_date'] = $now->addDays(7)->format('Y-m-d');

            Borrow::create($payload);

            DB::commit();
            return redirect()->route('borrows.index')->with('success', 'Penambahan peminjaman berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah peminjaman.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $borrow = Borrow::findOrFail($id);
            $inventories = Inventory::distinct()->get();
            $students = Student::distinct()->get();


            DB::commit();
            return view('console.borrows.edit', compact('borrow', 'inventories', 'students'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'peminjaman tidak ditemukan.');
        }
    }

    public function update(RequestStoreBorrow $request, $id)
    {
        DB::beginTransaction();
        try {
            $borrow = Borrow::findOrFail($id);
            $borrow->update($request->validated());

            DB::commit();
            return redirect()->route('borrows.index')->with('success', 'peminjaman berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah peminjaman.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Borrow::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('borrows.index')->with('success', 'peminjaman berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus peminjaman.');
        }
    }

    public function handleAction(Request $request, Borrow $borrow)
    {
        $status = $request->status;
        $payload = [
            'status' => $status,
        ];

        if ($status === 'returned') {
            $payload['returned_date'] = Carbon::now()->format('Y-m-d');

            $inventory = Inventory::findOrFail($borrow->inventory_id);
            $inventory->increment('quantity', $borrow->amount);
            $inventory->save();
        }

        if ($status === 'rejected') {
            $payload['returned_date'] = null;
        }

        if ($status === 'borrowed') {
            $inventory = Inventory::findOrFail($borrow->inventory_id);
            if ($inventory->quantity < $borrow->amount) {
                return redirect()->back()->with('error', 'Stock barang tidak mencukupi!');
            }
            $payload['borrow_date'] = Carbon::now()->format('Y-m-d');
            $payload['return_date'] = Carbon::now()->addDays(7)->format('Y-m-d');

            $inventory->decrement('quantity', $borrow->amount);
            $inventory->save();
        }

        $borrow->update($payload);

        return redirect()->back()->with('status', 'Action performed successfully!');
    }
}
