<?php

namespace App\Http\Controllers\Console;

use App\DataTables\RoomDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreRoom;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Import DB facade

class RoomController extends Controller
{
    public function index(Request $request, RoomDataTable $dataTable)
    {
        return $dataTable
            ->render('console.rooms.index');
    }

    public function store(RequestStoreRoom $request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->validated();
            $payload['foto'] = handleUpload('foto');

            Room::create($payload);

            DB::commit();
            return redirect()->route('rooms.index')->with('success', 'Penambahan ruangan berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal menambah ruangan.');
        }
    }

    public function edit($id)
    {
        DB::beginTransaction();
        try {
            $room = Room::findOrFail($id);

            DB::commit();
            return view('console.rooms.edit', compact('room'));
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'ruangan tidak ditemukan.');
        }
    }

    public function update(RequestStoreRoom $request, $id)
    {
        DB::beginTransaction();
        try {
            $room = Room::findOrFail($id);
            $payload = $request->validated();

            if ($request->hasFile('foto')) {
                $payload['foto'] = handleUpload('foto', 'uploads', $room->foto);
            }

            $room->update($payload);

            DB::commit();
            return redirect()->route('rooms.index')->with('success', 'ruangan berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal merubah ruangan.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $room = Room::findOrFail($id);
            deleteFileIfExist($room->foto);
            $room->delete();

            DB::commit();
            return redirect()->route('rooms.index')->with('success', 'ruangan berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Log::error($e->getMessage());

            return back()->with('error', 'Gagal hapus ruangan.');
        }
    }
}
