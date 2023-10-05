<?php

namespace App\DataTables;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InventoriesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $editClass = "btn btn-primary";
                $deleteClass = "btn btn-danger";


                $editUrl = route('inventory.edit', ['id' => $row->id]);
                $deleteUrl = route('inventory.delete', ['id' => $row->id]);


                $editLink = "<a href=\"$editUrl\" class=\"$editClass\">edit</a>" ;
                $deleteLink = "<a href=\"$deleteUrl\" class=\"$deleteClass\" onclick=\"return showDeleteConfirmation()\">delete</a>";
                return $editLink . $deleteLink;
            })
            ->addColumn('price',function($row){
                return "Rp." . number_format($row->price);
            })
            ->addIndexColumn()

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Inventory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('inventories-table')
                    ->columns($this->getColumns())
                    ->parameters([
                        'buttons'=> ['export', 'print','excel'],
                    ])
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('print')
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
            Column::make('code')
            ->exportable(true)
                    ->addClass('text-center'),
            Column::make('name')
                    ->addClass('text-center'),
            Column::make('price')
                    ->addClass('text-center'),
            Column::make('stock')
                    ->addClass('text-center'),
            Column::make('action')
                    ->addClass('text-center')
                    ->searchable(false)
                    ->orderable(false)
                    ->exportRender(function(){return 'Inactive';})
                    ->exportable(false)
                    ->printable(false)
                   
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Inventories_' . date('YmdHis');
    }

    
}
