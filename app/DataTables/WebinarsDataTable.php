<?php

namespace App\DataTables;

use App\Models\Webinar;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WebinarsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public $query;
    public function __construct($query)
    {
        $this->query = $query;
    }
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('photo', function ($item) {
                // return '<img src="'.asset((str_replace('public', 'storage',$item->photo))).'" class="img-fluid" data-fancybox>';
                return '<img src="'.$item->getImage().'" class="img-fluid" height="50px" width="50px" alt="no image" data-fancybox>';
            })
            ->editColumn('price', function ($item) {
                $price =$item->is_free ? 'Free':($item->price ? $item->price .' RWF' : 'Free') ;
                return' <span class="text-dark-75 font-weight-bolder d-block font-size-lg">'.$price.'</span>';
            })
            ->editColumn('title', function ($item) {
                $is_expired =$this->is_expired($item);
                if($is_expired){
                    $badge = ' <span class="badge badge-info"> Expired </span>';
                    return $item->title . $badge;
                }
                else {
                    return $item->title;
                }
            })
            ->addColumn('action', function ($item) {
                return '<div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Actions
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="'.route("admin.webinars.show",encryptId($item->id)).'">View Details</a>
                                    <div class="dropdown-divider"></div>
                                    <a class=" dropdown-item"
                                       href="'.route("admin.webinars.edit",encryptId($item->id)).'">
                                        Edit
                                    </a>
                                    <a class=" delete_btn dropdown-item"
                                       href="'.route("admin.webinars.delete",encryptId($item->id)).'">
                                        Delete
                                    </a>
                                </div>
                            </div>';
            })
            ->rawColumns(['action','photo','price','title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Webinar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Webinar $model)
    {
        // return $model->newQuery();
        return $this->query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('webinars-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1);
                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title' => '#', 'searchable' => false, 'render' => function() {
                return 'function(data,type,fullData,meta){return meta.settings._iDisplayStart+meta.row+1;}';
            }],
            Column::make('photo')
                    ->name('photo'),
            Column::make('title')
                ->addClass('text-center'),
            Column::make('type')
                ->addClass('text-center'),
            Column::make('company')
                ->addClass('text-center'),
            Column::make('price')
            ->name('price')
            ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Webinars_' . date('YmdHis');
    }
    protected function is_expired($item){
        $is_expired = false;
        if (now()->gt($item->end_date)) {
            $is_expired = true;
        }
        if($item->otherDates->count())
        {
            $filteredDate = $item->otherDates->filter(function($event){
                if ($event->end_date->gt(now())) {
                    return $event;
                }
            });
            if($filteredDate->count() > 0)
            {
                $is_expired = false;
            }
        }
        return $is_expired;
    }
}
