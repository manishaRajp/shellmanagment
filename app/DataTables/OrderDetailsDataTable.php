<?php

namespace App\DataTables;

use App\Models\OrderDetail;
use App\Models\OrderDetails;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDetailsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return
                    '
                     <br><a href="' . route("admin.order-details.show", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                    ';
            })
            ->editColumn('product_id', function ($data) {
                return $data->product->name;
            })
            ->rawColumns(['action','product_id'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OrderDetail $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OrderDetail $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('orderdetails-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id')->data('DT_RowIndex')->orderable(false)->title('Sr.no'),
            Column::make('order_id'),
            Column::make('product_id'),
            // Column::make('quantity'),
            Column::make('price'),
            // Column::make('total_price'),
            // Column::make('discount_price'),
            Column::make('action'),
          
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'OrderDetails_' . date('YmdHis');
    }
}
