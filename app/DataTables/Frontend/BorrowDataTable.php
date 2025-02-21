<?php

namespace App\DataTables\Frontend;

use App\Models\Borrow;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BorrowDataTable extends DataTable
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
            ->editColumn('status', function ($borrow) {
                switch ($borrow->status) {
                    case 'pending':
                        return '<span class="badge bg-warning">Pending</span>';
                        break;
                    case 'borrowed':
                        return '<span class="badge bg-success">Dipinjam</span>';
                        break;
                    case 'rejected':
                        return '<span class="badge bg-danger">Ditolak</span>';
                        break;
                    case 'returned':
                        return '<span class="badge bg-info">Dikembalikan</span>';
                        break;
                    default:
                        return '<span class="badge bg-secondary">Tidak diketahui</span>';
                        break;
                }
            })
            ->editColumn('returned_date', function ($borrow) {
                if (!$borrow->returned_date) {
                    return 'Belum dikembalikan';
                }

                return $borrow->returned_date;
            })
            ->rawColumns(['status']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Borrow $model): QueryBuilder
    {
        return $model->newQuery()->with('inventory', 'student.user');
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
            'searchPlaceholder' => 'Cari Peminjaman...',
            'paginate' => [
                'next' => '<i class="ri-arrow-right-s-line"></i>',
                'previous' => '<i class="ri-arrow-left-s-line"></i>'
            ],
            'info' => 'Menampilkan _START_ ke _END_ dari _TOTAL_ Peminjaman',
        ];

        // Konfigurasi tombol
        $buttons = [
            [
                'text' => '<i class="ri-refresh-line me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Muat ulang</span>',
                'className' => 'btn btn-sm btn-secondary mb-md-0 waves-effect waves-light',
                'action' => 'function (e, dt, node, config) {
                    dt.ajax.reload();
                    $("#inventories-table_filter input").val("").keyup();
                }'
            ]
        ];

        return $this->builder()
            ->setTableId('borrows-table')
            ->columns($this->getColumns())
            ->parameters([
                'order' => [[0, 'desc']], // Urutan default
                'dom' => $dom, // Struktur DOM
                'language' => $language, // Bahasa
                'buttons' => $buttons, // Tombol
                'responsive' => false, // Responsif
                'autoWidth' => false, // AutoWidth
            ])
            ->ajax([
                'url'  => route('data.borrows'),
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
            Column::make('inventory.name')->title('Nama Barang'),
            Column::make('amount')->title('Jumlah Pinjam'),
            Column::make('student.user.name')->title('Peminjam'),
            Column::make('borrow_date')->title('Tanggal Pinjam'),
            Column::make('return_date')->title('Tanggal Kembali'),
            Column::make('returned_date')->title('Tanggal Dikembalikan'),
            Column::make('status')->title('Status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Borrow_' . date('YmdHis');
    }
}
