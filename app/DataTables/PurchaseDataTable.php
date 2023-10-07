<?php

namespace App\DataTables;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PurchaseDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if (auth()->user()->role !== 'manager') {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $detailClass = "btn btn-primary";
                $deleteClass = "btn btn-danger";
    
    
                $detailUrl = route('purchase.detail', ['id' => $row->id]);
                $deleteUrl = route('purchase.delete', ['id' => $row->id]);
    
    
                $detailLink = "<a href=\"$detailUrl\" class=\"$detailClass\">detail</a>" ;
                $deleteLink = "<a href=\"$deleteUrl\" class=\"$deleteClass\">delete</a>" ;
                return $detailLink ." ". $deleteLink;
            })
    
            ->addIndexColumn()
            ->setRowId('id');
        }else {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $detailClass = "btn btn-primary";
    
                $detailUrl = route('purchase.detail', ['id' => $row->id]);
    
                $detailLink = "<a href=\"$detailUrl\" class=\"$detailClass\">detail</a>" ;
                return $detailLink;
            })
            ->addIndexColumn()
            ->setRowId('id');
        }


    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Purchase $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('purchase-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('print'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
            return [
                Column::make('DT_RowIndex')
                        ->title('No')
                        ->addClass('text-center')
                        ->orderable(false)
                        ->searchable(false),
                Column::make('number'),
                Column::make('date'),
                Column::computed('action')
                      ->exportable(false)
                      ->printable(false)
                      ->addClass('text-center'),
            ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Purchase_' . date('YmdHis');
    }
}
