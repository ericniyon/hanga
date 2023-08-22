<?php

namespace App\DataTables;

use Illuminate\Support\Str;
use Yajra\DataTables\Html\Column;
use App\Models\ApplicationSolution;
use Yajra\DataTables\Services\DataTable;

class OpenApiDataTable extends DataTable
{
    private $query;
    function __construct($query)
    {
        $this->query=$query;
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->editColumn('api_description', function ($item) {
            $description = $item->api_description;
            return '<a id="desc-details-btn" data-toggle="modal" data-target="#descriptionModal" data-description ="'.$description.'">'.Str::limit($description, 25, "...").'</a>';
        })
            ->editColumn('logo', function ($item) {
                // return '<img src="'.asset((str_replace('public', 'storage',$item->photo))).'" class="img-fluid" data-fancybox>';
                // return '<img src="'.$item->downloadOwnerLogo().'" class="img-fluid" data-fancybox>';
                if($item->logo){
                    return '  <a href="'.$item->logoUrl.'" target="_blank">
                    <img src="'.$item->logoUrl.'"
                     class="img-fluid" height="50px" width="50px" alt="no image found">
                     </a>';
                    }else{
                    return '  <a href="'.asset("images/background.png").'" target="_blank">
                    <img src="'.asset("images/background.png").'"
                     class="img-fluid" height="50px" width="50px" alt="no image found">
                     </a>';
                }
            })
            ->addColumn('action', function($item){
                $disableText = $item->open_api_enabled ? "Disable" : "Enable";
                $modify = '
                        <a href=""
                        class="edit-api dropdown-item"
                        data-url="'.route('admin.open-apis.update',$item->id).'"
                        data-api-id="'.$item->id.'"
                        data-api_name="'.$item->api_name.'"
                        data-link="'.$item->api_link.'"
                        data-owner_logo="'.$item->logo.'"
                        data-ower_name="'.$item->dsp_name.'"
                        data-description="'.$item->api_description.'"

                            data-toggle="modal"
                            data-target="#editApiModal">
                            Edit</a>

                        <a href="#" data-url="'.route('admin.open-apis.delete',encryptId($item->id)).'"
                        class="delete-api dropdown-item">
                            Delete</a>';
                $disable = '
                            <a href="#" data-url="'.route('admin.open-apis.disable',encryptId($item->id)).'"
                                data-status ="'.$disableText.'" class="disable-api dropdown-item">
                                '.$disableText.'</a>';

                $action_btn = $item->application_id ? $modify : $disable;
                return '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a href="'.route('admin.open-apis.show',$item->id).'"
                                                class="job-details dropdown-item">
                                                View Details</a>
                                                '.$action_btn.'
                                            </div>
                                        </div>
                                    </div>';
            })->rawColumns(['action','logo','api_description']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OpenApi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ApplicationSolution $model)
    {
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
                    ->setTableId('openapi-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
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
            Column::make('logo')
                    ->name('logo'),
            Column::make('api_name')
                    ->title('API Name'),
            Column::make('dsp_name')
                    ->title('Owner')
                    ->addClass('text-center'),
            Column::make('api_link')
                    ->title('API Link'),
            Column::make('api_description')
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
        return 'OpenApi_' . date('YmdHis');
    }
}
