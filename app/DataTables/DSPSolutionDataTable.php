<?php

namespace App\DataTables;

use App\Models\DSPSolution;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\ApplicationSolution;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DSPSolutionDataTable extends DataTable
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
        ->editColumn('platforms', function ($item) {
            $platforms = '';
            foreach ($item->platformTypes as $platform) {
                $platforms .= '
                <span class="badge badge-secondary rounded-pill m-1">'.$platform->name.'</span>
                ';
            }
            return $platforms;

        })
        ->editColumn('logo', function ($item) {
            return '<img src="'.$item->logoUrl.'" class="img-fluid" data-fancybox>';
        })
        ->editColumn('description', function ($item) {
            $description = $item->description;
            return '<a id="desc-details-btn" data-toggle="modal" data-target="#descriptionModal" data-description ="'.$description.'">'.Str::limit($item->description, 25, "...").'</a>';
        })
            ->addColumn('action', function($item){
                $disableText = $item->solution_enabled ? "Disable" : "Enable";
                $modify = "
                                    <a href=''
                                        class='edit-api dropdown-item'
                                        data-form-url='".route('admin.digital-platforms.update',$item->id)."'
                                        data-url='".route('admin.digital-platforms.platforms',$item->id)."'
                                        data-api-id='".$item->id."'
                                        data-name='".$item->name."'
                                        data-toggle='modal'
                                        data-target='#editApiModal'>
                                            Edit</a>
                                    <a href='#' data-url='".route('admin.digital-platforms.delete',$item->id)."'
                                        class='delete-api dropdown-item'>
                                            Delete</a>";

                $disable= '<a href="#" data-url="'.route('admin.digital-platforms.disable',$item->id).'"
                                data-status ="'.$disableText.'"
                                class="disable-api dropdown-item">'.$disableText.'</a>';
                $action_btn = $modify . $disable;

                $details ='
                 <a href="'.route('admin.digital-platforms.show',$item->id).'"
                class="job-details dropdown-item">
                View Details</a>';
                return '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            '.$details . $action_btn .'
                                            </div>
                                        </div>
                                    </div>';
            })->rawColumns(['action','logo','platforms','description']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ApplicationSolution $model
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
                    ->setTableId('dspsolutions-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
            Column::make('logo')
            ->name('logo'),
            Column::make('dsp_name')
            ->title('DSP Name'),
            Column::make('name')
                    ->title('Solution Name'),

                Column::make('phone')
                        ->title('Telephone'),

                Column::make('email'),

                Column::make('platforms')
                ->name('platformTypes.name')
                ->title('Platforms'),

                Column::make('description'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60),

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
