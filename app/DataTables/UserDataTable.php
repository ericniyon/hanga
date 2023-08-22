<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{

    public $query;
    public function __construct($query)
    {
        $this->query = $query;
    }
    /**
     * Build DataTables class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('permissions', function ($item) {
                return '<a href="'.route("admin.user.add.permissions",encryptId($item->id)).'">
                    <span class="badge badge-info">'.$item->permissions()->count().'</span>
                </a>';
            })
            ->editColumn('status', function ($item) {
                if($item->is_active){
                    return '<span class="badge badge-success">Active</span>';
                }else{
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->addColumn('action', function ($item) {
                return '<div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Actions
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="'.route("admin.user.add.permissions",encryptId($item->id)).'">Manage Permissions</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="edit-btn dropdown-item "
                                       data-toggle="modal"
                                       data-target="#edit-user-model"
                                       data-name="'.$item->name.'"
                                       data-email="'.$item->email.'"
                                       data-telephone="'.$item->telephone.'"
                                       data-id="'.$item->id.'"
                                       data-is_active="'.$item->is_active.'"
                                       data-job_title="'.$item->job_title.'"
                                       data-url="'.route("admin.users.update",$item->id).'"> Edit</a>
                                    <a class=" delete_btn dropdown-item"
                                       href="'.route("admin.users.profile",encryptId($item->id)).'">
                                        User Profile
                                    </a>
                                </div>
                            </div>';
            })
            ->rawColumns(['action','permissions','status']);
    }


    /**
     * Get query source of dataTable.
     *
     * @param user $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('datadatatable-table')
            ->addTableClass('table table-striped- table-hover table-checkable')
            ->columns($this->getColumns())
            ->minifiedAjax()
//            ->dom('Bfrtip')
            ->orderBy(1,"asc")
            ->parameters([
//                'dom'        => 'Bfrtip',
//                'responsive' => true,
//                "lengthMenu" => [
//                    [10, 25, 50, -1],
//                    ['10 rows', '25 rows', '50 rows', 'Show all']
//                ],
            ]);
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
            Column::make('name'),
            Column::make('email')
                ->addClass('text-center'),
            Column::make('telephone')
                ->addClass('text-center'),
            Column::make('status')
                ->name('is_active')
                ->title("Status")
                ->addClass('text-center'),
            Column::make('job_title')
                ->title('Job Title')
                ->name('job_title'),
            Column::make('permissions')
                ->title("Permissions")
                ->name("permissions.name")
                ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

}
