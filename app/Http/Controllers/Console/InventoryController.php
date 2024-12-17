<?php

namespace App\Http\Controllers\Console;

use App\DataTables\InventoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreInventory;
use App\Models\Inventory;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class InventoryController extends Controller
{
    public function index(Request $request, InventoryDataTable $dataTable)
    {
        $rooms = Room::select('id', 'name')->get();

        return $dataTable
            ->render('console.inventories.index', compact('rooms'));
    }

    public function store(RequestStoreInventory $request)
    {
        DB::beginTransaction();
        try {
            Inventory::create($request->validated());

            DB::commit();
            return redirect()->route('inventories.index')->with('success', 'Penambahan inventaris berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah inventaris.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $inventory = Inventory::findOrFail($id);
            $rooms = Room::select('id', 'name')->get();

            DB::commit();
            return view('console.inventories.edit', compact('inventory', 'rooms'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'inventaris tidak ditemukan.');
        }
    }

    public function update(RequestStoreInventory $request, $id)
    {
        DB::beginTransaction();
        try {
            $inventory = Inventory::findOrFail($id);
            $inventory->update($request->validated());

            DB::commit();
            return redirect()->route('inventories.index')->with('success', 'inventaris berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah inventaris.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Inventory::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('inventories.index')->with('success', 'inventaris berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus inventaris.');
        }
    }
}
