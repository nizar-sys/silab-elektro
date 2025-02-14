<?php

namespace App\Http\Controllers;

use App\DataTables\Frontend\InventoryDataTable;
use App\DataTables\Frontend\PracticalDataTable;
use App\DataTables\Frontend\MentoringDataTable;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getInventoriesData(InventoryDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getPracticalsData(PracticalDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getMentoringsData(MentoringDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function landingPage(
        InventoryDataTable $inventoryDataTable,
        PracticalDataTable $practicalDataTable,
        MentoringDataTable $mentoringDataTable,
    ) {
        $rooms = Room::all();

        return view('frontend.landing_page', compact(
            'rooms',
            'inventoryDataTable',
            'practicalDataTable',
            'mentoringDataTable',
        ));
    }
}
