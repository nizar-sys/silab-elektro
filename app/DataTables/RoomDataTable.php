<?php

namespace App\DataTables;

use App\Models\Room;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoomDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', 'console.rooms.action')
            ->editColumn('foto', function ($data) {
                if ($data->foto) {
                    $imageUrl = str_replace('public/', 'storage/', $data->foto);
                    return '
                        <a href="#" data-bs-toggle="modal" data-bs-target="#logoModal' . $data->id . '">
                            <img src="' . asset($imageUrl) . '" style="width:50px; height:50px; border-radius:50%; object-fit:cover;" alt="Image"/>
                        </a>
                        <div class="modal fade" id="logoModal' . $data->id . '" tabindex="-1" aria-labelledby="logoModalLabel' . $data->id . '" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="logoModalLabel' . $data->id . '">' . $data->name . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="' . asset($imageUrl) . '" style="width:100%; height:auto; object-fit:cover;" alt="Logo"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
                return '-';
            })
            ->rawColumns(['action', 'foto']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Room $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        // Konfigurasi DOM untuk DataTables
        $dom = '<"row mx-1"' .
            '<"col-sm-12 col-md-3 mt-5 mt-md-0" l>' .
            '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-4"f>B>>' .
            '>t' .
            '<"row mx-2"' .
            '<"col-sm-12 col-md-6"i>' .
            '<"col-sm-12 col-md-6"p>' .
            '>';

        // Konfigurasi bahasa untuk DataTables
        $language = [
            'sLengthMenu' => 'Tampil _MENU_',
            'search' => '',
            'searchPlaceholder' => 'Cari Ruangan...',
            'paginate' => [
                'next' => '<i class="ri-arrow-right-s-line"></i>',
                'previous' => '<i class="ri-arrow-left-s-line"></i>'
            ],
            'info' => 'Menampilkan _START_ ke _END_ dari _TOTAL_ Ruangan',
        ];

        // Konfigurasi tombol
        $buttons = [
            [
                'text' => '<i class="ri-add-line me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Tambah Ruangan</span>',
                'className' => 'add-new btn btn-primary mb-5 mb-md-0 me-3 waves-effect waves-light',
                'attr' => [
                    'data-bs-toggle' => 'offcanvas',
                    'data-bs-target' => '#offcanvasAddUser'
                ],
                'init' => 'function (api, node, config) {
                    $(node).removeClass("btn-secondary");
                }'
            ],
            [
                'text' => '<i class="ri-refresh-line me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Muat ulang</span>',
                'className' => 'btn btn-secondary mb-5 mb-md-0 waves-effect waves-light',
                'action' => 'function (e, dt, node, config) {
                    dt.ajax.reload();
                    $("#rooms-table_filter input").val("").keyup();
                }'
            ]
        ];

        return $this->builder()
            ->setTableId('rooms-table')
            ->columns($this->getColumns())
            ->parameters([
                'order' => [[0, 'desc']], // Urutan default
                'dom' => $dom, // Struktur DOM
                'language' => $language, // Bahasa
                'buttons' => $buttons, // Tombol
                'responsive' => true, // Responsif
                'autoWidth' => false, // AutoWidth
            ])
            ->ajax([
                'url'  => route('rooms.index'),
                'type' => 'GET',
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('code')->title('Kode Ruangan'),
            Column::make('name')->title('Nama Ruangan'),
            Column::make('link_stream')->title('Link Stream'),
            Column::make('foto')->title('Foto')->orderable(false)->searchable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Aksi')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Room_' . date('YmdHis');
    }
}
