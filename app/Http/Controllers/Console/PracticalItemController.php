<?php

namespace App\Http\Controllers\Console;

use App\DataTables\PracticalItemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStorePracticalItems;
use App\Models\PracticalItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PracticalItemController extends Controller
{
    public function index(Request $request, PracticalItemDataTable $dataTable)
    {
        return $dataTable
            ->render('console.practical_items.index');
    }

    public function store(RequestStorePracticalItems $request)
    {
        DB::beginTransaction();
        try {
            $payloadPracticalItem = $request->validated();

            if ($request->hasFile('logo')) {
                $payloadPracticalItem['logo'] = handleUpload('logo', 'practical_items');
            }

            PracticalItem::create($payloadPracticalItem);

            DB::commit();
            return redirect()->route('practical-items.index')->with('success', 'Penambahan data praktikum berhasil.');
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
            $practicalItem = PracticalItem::findOrFail($id);

            DB::commit();
            return view('console.practical_items.edit', compact('practicalItem'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'data praktikum tidak ditemukan.');
        }
    }

    public function update(RequestStorePracticalItems $request, $id)
    {
        DB::beginTransaction();
        try {
            $payloadPracticalItem = $request->validated();
            $practicalItem = PracticalItem::findOrFail($id);

            if ($request->hasFile('logo')) {
                if ($practicalItem->logo) {
                    deleteFileIfExist($practicalItem->logo);
                }
                $payloadPracticalItem['logo'] = handleUpload('logo', 'practical_items');
            }

            $practicalItem->update($payloadPracticalItem);

            DB::commit();
            return redirect()->route('practical-items.index')->with('success', 'data praktikum berhasil diperbarui.');
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
            $practicalItem = PracticalItem::findOrFail($id);

            if ($practicalItem->logo) {
                deleteFileIfExist($practicalItem->logo);
            }

            $practicalItem->delete();

            DB::commit();
            return redirect()->route('practical-items.index')->with('success', 'data praktikum berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus data praktikum.');
        }
    }
}
