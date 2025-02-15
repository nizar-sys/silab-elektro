<?php

namespace App\Http\Controllers;

use App\DataTables\Frontend\AttendanceDataTable;
use App\DataTables\Frontend\BorrowDataTable;
use App\DataTables\Frontend\InventoryDataTable;
use App\DataTables\Frontend\PracticalDataTable;
use App\DataTables\Frontend\MentoringDataTable;
use App\DataTables\Frontend\ModuleDataTable;
use App\DataTables\Frontend\PracticalDataDataTable;
use App\DataTables\Frontend\PracticalScheduleDataTable;
use App\DataTables\Frontend\TopicDataTable;
use App\DataTables\Frontend\PracticalValueDataTable;
use App\Models\PracticalItem;
use App\Models\Room;

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

    public function getBorrowsData(BorrowDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getTopicsData(TopicDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getPracticalValuesData(PracticalValueDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getPracticalSchedulesData(PracticalScheduleDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getPracticalDatasData(PracticalDataDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getModulesData(ModuleDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function getAttendancesData(AttendanceDataTable $dataTable)
    {
        return $dataTable->render('frontend.landing_page');
    }

    public function landingPage(
        InventoryDataTable $inventoryDataTable,
        PracticalDataTable $practicalDataTable,
        MentoringDataTable $mentoringDataTable,
        BorrowDataTable $borrowDataTable,
        TopicDataTable $topicDataTable,
        PracticalValueDataTable $practicalValueDataTable,
        PracticalScheduleDataTable $practicalScheduleDataTable,
        PracticalDataDataTable $practicalDataDataTable,
        ModuleDataTable $moduleDataTable,
        AttendanceDataTable $attendanceDataTable,
    ) {
        $rooms = Room::all();
        $practicalItems = PracticalItem::all();

        return view('frontend.landing_page', compact(
            'rooms',
            'practicalItems',
            'inventoryDataTable',
            'practicalDataTable',
            'mentoringDataTable',
            'borrowDataTable',
            'topicDataTable',
            'practicalValueDataTable',
            'practicalScheduleDataTable',
            'practicalDataDataTable',
            'moduleDataTable',
            'attendanceDataTable',
        ));
    }
}
