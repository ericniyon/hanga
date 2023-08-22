<?php

namespace App\DataTables;

use App\Models\JobOpportunity;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JobOpportunityDataTable extends DataTable
{
    private $query;

    function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('logo', function ($job) {
                if ($job->logo != null) {
                    return '  <a href="' .$job->getJobOpportunityLogo(). '" target="_blank">
                                                                      <img src="' . $job->getJobOpportunityLogo() . '"
                                                                       class="img-fluid" height="50px" width="50px rounded" alt="no image found">
                                                                 </a>';
                } else {
                    return '<img src="' . asset('assets/media/job-opportunities.png') . '"
                                                                       class="img-fluid" height="50px" width="50px" alt="no image found">';
                }
            })
//            ->editColumn('opportunity_type_id',function ($job){
//                return '<span class=" badge badge-success">'.$job->opportunityType->name.'</span>';
//            })
//            ->editColumn('job_details',function ($job){
//                return '.<p>'.$job->job_details.'</p>';
//            })
//            ->editColumn('attachment',function($job){
//                return '<a href="'.asset('storage/job_opportunities/attachments' .$job->attachment).'"
//                                                    class="badge-pill" download>
//                                                    <button class="btn btn-warning"><i class="la la-download"></i>Download</button></a>';
//            })
            ->editColumn('deadline', function ($job) {
                if ($job->deadline !== null) {
                    return $job->deadline->format('Y-m-d, H:i');
                } else {
                    return "N/A";
                }
            })
            ->editColumn('created_at', function ($job) {
                return $job->created_at->format('Y-m-d,H:i');
                $studyLevels = $job->opportunityStudyLevel->pluck(['name']);
                return $studyLevels;
            })
            ->addColumn('action', function ($job_opportunities) {
                $studyLevels = $job_opportunities->opportunityStudyLevel->pluck(['id']);
                return '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a href="' . route('admin.job.opportunity.details', encryptId($job_opportunities->id)) . '"
                                                class="job-details dropdown-item">
                                                View Details
                                                </a>
                                                 <a href="" data-job-opportunity-id="' . $job_opportunities->id . '"
                                                   class="edit-job-opportunity dropdown-item"
                                                   data-url2="' . route('admin.job.opportunity.updating', [$job_opportunities->id]) . '"
                                                   data-job-opportunity-id="' . $job_opportunities->id . '"
                                                   data-logo="' . $job_opportunities->logo . '"
                                                   data-company-name="' . $job_opportunities->company_name . '"
                                                   data-job-title="' . $job_opportunities->job_title . '"
                                                   data-job-type="' . $job_opportunities->job_type_id . '"
                                                   data-has-grant="' . $job_opportunities->has_grant . '"
                                                   data-study-levels="' . $studyLevels . '"

                                                   data-required-experience="' . $job_opportunities->required_experience . '"
                                                   data-opportunity-type="' . $job_opportunities->opportunity_type_id . '"
                                                   data-availability-type="' . $job_opportunities->availability_type_id . '"
                                                   data-availability-time="' . $job_opportunities->availability_time . '"
                                                   data-deadline="' . $job_opportunities->deadline . '"
                                                   data-expiration-date="' . $job_opportunities->expiration_date . '"
                                                   data-grant="' . $job_opportunities->grant . '"
                                                   data-link="' .$job_opportunities->link. '"
                                                   data-attachment="' . $job_opportunities->attachment . '"

                                                    data-toggle="modal"
                                                    data-target="#editJobOpportunityModal">
                                                    Edit
                                                </a>
                                                <a href="l" data-delete-job-opportunity-id="' . encryptId($job_opportunities->id) . '"
                                                   class="delete-job-opportunity dropdown-item">
                                                     Delete
                                                     </a>
                                            </div>
                                        </div>
                                    </div>';
            })->rawColumns(['action', 'logo', 'opportunity_type_id', 'link', 'deadline', 'created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param JobOpportunity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JobOpportunity $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('jobopportunity-table')
            ->addTableClass('table table-striped- table-hover table-checkable')
            ->columns($this->getColumns())
            ->minifiedAjax()
//                    ->dom('Bfrtip')
            ->orderBy(5, 'desc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title' => '#', 'searchable' => false, 'render' => function () {
                return 'function(data,type,fullData,meta){return meta.settings._iDisplayStart+meta.row+1;}';
            }],
            Column::make('logo'),
            Column::make('company_name')
                ->title('Company'),
//            Column::make('opportunity_type_id')
//            ->title('Opport. Type'),
            Column::make('job_title')
                ->title('Opportunity Name'),
            Column::make('deadline'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


}
