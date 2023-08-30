<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\AuditingController;
use App\Http\Controllers\AvailabilityTypeController;
use App\Http\Controllers\BaseImportController;
use App\Http\Controllers\Client\Auth\UpdateInformationController;
use App\Http\Controllers\Client\ConnectionController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Frontend\AffiliationsController;
use App\Http\Controllers\Frontend\DigitalPlatformsController;
use App\Http\Controllers\Frontend\JobsController;
use App\Http\Controllers\Frontend\MyNetworksController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\WebinarsController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\LevelofStudyController;
use App\Http\Controllers\OpportunityTypeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportSourceController;
use App\Http\Controllers\SystemParameterController;
use App\Http\Controllers\SystemReportController;
use App\Models\Webinar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\OpenApiController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Client\MsmeController;
use App\Http\Controllers\DSPSolutionController;
use App\Http\Controllers\JobOpportunityController;
use App\Http\Controllers\Client\ProjectsController;
use App\Http\Controllers\Client\SolutionsController;
use App\Http\Controllers\Client\TrainingsController;
use App\Http\Controllers\RegistrationTypeController;
use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\ExperienceController;
use App\Http\Controllers\Frontend\MyMessagesController;
use App\Http\Controllers\ApplicationAssigmentController;
use App\Http\Controllers\Client\Auth\RegisterController;
use App\Http\Controllers\Client\IworkerBranchController;
use App\Http\Middleware\EnsureClientHasRegistrationType;
use App\Http\Controllers\ApplicationFlowHistoryController;
use App\Http\Controllers\chamberMembership;
use App\Http\Controllers\Client\DSPRegistrationController;
use App\Http\Controllers\Client\IworkerEmployeesController;
use App\Http\Controllers\Client\CertificationAwardsController;
use App\Http\Controllers\Client\IworkerRegistrationController;
use App\Http\Livewire\Frontend\TranningApplication;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\StartupController;
use App\Http\Controllers\ClusterMembership;
use App\Http\Controllers\Discount\DiscountController;
use App\Http\Controllers\ICTChamberMemberShip;
use App\Http\Controllers\MemberShip;
use App\Http\Controllers\MembershipLevels;
use App\Http\Controllers\ServiceBenefits;
use App\Http\Controllers\StrategicOriantation;
use App\Http\Controllers\v2\AffiliatesController;
use App\Http\Controllers\v2\AggregatorsController;
use App\Http\Controllers\MembershiPackegs\Packeges;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Promotion;
use App\Http\Controllers\Testing\TestingController;
use App\Http\Livewire\Frontend\Applicants;
use App\Http\Livewire\Select2Dropdown;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get("/send-redis",function (){
//   event(new \App\Events\TestEvent((\auth('client')->user())));
//   return "ok";
//});
Route::get('/', [HomepageController::class, 'index']);
Route::get('/setlocale/{lang}', [HomepageController::class, 'setLang'])->name('setLang')->middleware('web');

Route::get('storage/{filename}', function ($filename) {
    $path = 'public/job_opportunities/logo/';

    $fullPath = $path . $filename;
    return Storage::download($fullPath);
})->name("get.image.path");

// download one pager pdf
Route::get('generate-pdf/{id}', [PDFController::class, 'downloadOnePager'])->name('onepager.download');

Route::get('storage/webinars/{id}', function ($id) {
    $b = Webinar::query()->find($id);

    //    if (!File::exists($path)) {
    //        abort(404);
    //    }


    //$fullPath = $path . $filename;

    return Storage::download($b->photo);
})->name("get.image.webinars.path");


Route::get('storage-1/partner/{filename}', function ($filename) {
    $path = 'public/partners/logo/';

    //    if (!File::exists($path)) {
    //        abort(404);
    //    }


    $fullPath = $path . $filename;

    return Storage::download($fullPath);
})->name("get.partner.img.path");
Route::get('storage/solution/logo/{filename}', [DSPSolutionController::class, 'downloadLogo'])->name('get.solution.logo.path');
Route::get('storage/attachment/{filename}', [JobOpportunityController::class, 'downloadAttachment'])->name('get.job.attachment.path');
Route::get('storage/webinar/attachments/{webinar}', [WebinarController::class, 'downloadAttachment'])->name('get.webinars.attachment.path');
Route::get('storage/open-api/{api}', [OpenApiController::class, 'downloadLogo'])->name('get.api.owner_logo.path');
Route::get('/districts/{province}', [DataController::class, 'getDistricts']);
Route::get('/sectors/{district}', [DataController::class, 'getSectors']);
Route::get('/cells/{sector}', [DataController::class, 'getCells']);
Route::get('/villages/{cell}', [DataController::class, 'getVillages']);

Route::post('/multiple-districts', [DataController::class, 'getMultipleDistricts'])->name("getMultipleDistricts");
Route::post('/multiple-sectors', [DataController::class, 'getMultipleSectors'])->name("getMultipleSectors");
Route::post('/multiple-cells', [DataController::class, 'getMultipleCells'])->name("getMultipleCells");
Route::post('/multiple-villages', [DataController::class, 'getMultipleVillages'])->name("getMultipleVillages");
Route::post('/get-dedicated/services-business', [DataController::class, 'getDedicatedServicesAndBusiness'])->name("getDedicatedServicesAndBusiness");

Route::get('/dsp-download-file/{id}', [DSPRegistrationController::class, 'downloadAttachment'])->name('dsp.download.file');
Route::get('/msme-download-file/{id}', [MsmeController::class, 'downloadAttachment'])->name('msme.download.file');


Route::prefix('admin')->middleware(['auth', 'lang_en'])->name('admin.')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // route for admin dashboard chart
    Route::get('dashboard-chart', [App\Http\Controllers\HomeController::class, 'chartData'])->name('dashboard.chartData');

    Route::get("trainning/applications", TranningApplication::class)->name("trainning.applications");
    Route::get("/applicats", Applicants::class)->name("trainning.applicats");
    //application routes
    Route::get("all-applications", [ApplicationController::class, "index"])->name("all.applications");
    Route::get("pending-applications", [ApplicationController::class, "pendingApplications"])->name("pending.applications");
    Route::get("assigned-applications", [ApplicationController::class, "assignedApplications"])->name("assigned.applications");
    Route::get("application/{application}/details", [ApplicationController::class, "details"])->name("application.details");
    Route::get("applications/my-tasks", [ApplicationController::class, "myTasks"])->name("applications.my.tasks");
    Route::post("assign-application", [ApplicationAssigmentController::class, "store"])->name("assign.multiple.application");
    Route::post("application/{application}/store-review", [ApplicationFlowHistoryController::class, "store"])->name("store.application.review");
    //clients routes

    Route::get("/ihuzo/members/{client}/destroy", [\App\Http\Controllers\ClientController::class, 'destroy'])->name("clients.destroy");
    Route::get("/ihuzo/members/{client}/change-status/{status}", [\App\Http\Controllers\ClientController::class, 'changeStatus'])->name("clients.change.status");
    Route::get("/ihuzo/client/list", [\App\Http\Controllers\ClientController::class, 'clientList'])->name("clients.list");

    // membership routes and packeges
    Route::get("membership/packeges", [Packeges::class, "index"])->name("membership.packeges");
    Route::get("membership/plan", [Packeges::class, "plan"])->name("membership.plans");
    Route::get("membership/plan/{id}", [Packeges::class, "delete_plan"])->name("membership.plans.delete");
    Route::post("edit/plan/{id}", [Packeges::class, "edit_plan"])->name("membership.plans.edit");
    Route::get("membership/packeges/create", [Packeges::class, "create"])->name("membership.packeges.create");
    Route::get("membership/packeges/delete/{id}", [Packeges::class, "delete"])->name("membership.packeges.delete");
    Route::post("membership/packeges/edit/{id}", [Packeges::class, "edit_packege"])->name("membership.packeges.edit");
    Route::post("packege/packeges/save", [Packeges::class, "savePackege"])->name("membership.packeges.save");

    // promotions
    Route::get("promotion/packeges", [Promotion::class, "index"])->name("membership.promotions");
    Route::post("promotion/packeges/save", [Promotion::class, "savePromotion"])->name("membership.promotion.save");
    Route::post("promotion/packeges/edit/{id}", [Promotion::class, "edit"])->name("promotion.packeges.edit");
    Route::get("promotion/packeges/delete/{id}", [Promotion::class, "delete"])->name("promotion.promotion.delete");

    // Route::get("membership/plan/{id}", [Packeges::class, "delete_plan"])->name("membership.plans.delete");
    // Route::post("edit/plan/{id}", [Packeges::class, "edit_plan"])->name("membership.plans.edit");
    // Route::get("membership/packeges/create", [Packeges::class, "create"])->name("membership.packeges.create");
    // Route::get("membership/packeges/delete/{id}", [Packeges::class, "delete"])->name("membership.packeges.delete");








    Route::get("membership", [MemberShip::class, "ictChamber"])->name("what.is.ictchamber");



    Route::get("membership-list", [MemberShip::class, "AllMembers"])->name("all.memberships");
    Route::get("membership-show/{id}", [MemberShip::class, "showMember"])->name("membership_application.show");

    Route::get("delete/member/{id}", [MemberShip::class, "deleteChamber"])->name("membership.delete");

    Route::get("create/membership", [MemberShip::class, "newIctChamber"])->name("what.is.ictchamber.create");
    Route::post("save/membership", [MemberShip::class, "saveIctChamber"])->name("what.is.ictchamber.save");
    Route::get("delete/membership/{id}", [MemberShip::class, "deleteIctChamber"])->name("what.is.ictchamber.delete");

    Route::get("edit/membership/{id}", [MemberShip::class, "editIctChamber"])->name("what.is.ictchamber.edit");

    Route::get("edit/chamber/{id}", [MemberShip::class, "editChamber"])->name("membership.edit");
    Route::post("update/membership/{id}", [MemberShip::class, "updateIctChamber"])->name("what.is.ictchamber.update");




    Route::get("ict/chamber/membership", [ICTChamberMemberShip::class, "ictChamber"])->name("what.is.ictchambermembership");
    Route::get("create/ICTChamberMemberShip", [ICTChamberMemberShip::class, "newIctChamber"])->name("what.is.ictchambermembership.create");
    Route::post("save/ICTChamberMemberShip", [ICTChamberMemberShip::class, "saveIctChamber"])->name("what.is.ictchambermembership.save");
    Route::get("delete/ICTChamberMemberShip/{id}", [ICTChamberMemberShip::class, "deleteIctChamber"])->name("what.is.ictchambermembership.delete");
    Route::get("edit/ICTChamberMemberShip/{id}", [ICTChamberMemberShip::class, "editIctChamber"])->name("what.is.ictchambermembership.edit");
    Route::post("update/ICTChamberMemberShip/{id}", [ICTChamberMemberShip::class, "updateIctChamber"])->name("what.is.ictchambermembership.update");


    Route::get("cluster/association", [ClusterMembership::class, "index"])->name("cluster.association");
    Route::get("crete/cluster/association", [ClusterMembership::class, "create"])->name("cluster.association.create");
    Route::get("delete/cluster/association/{id}", [ClusterMembership::class, "delete"])->name("cluster.association.delete");
    Route::get("edit/cluster/association/{id}", [ClusterMembership::class, "edit"])->name("cluster.association.edit");
    Route::post("save/cluster/association", [ClusterMembership::class, "save"])->name("cluster.association.save");



    Route::get("strategic/strategic", [StrategicOriantation::class, "index"])->name("strategic.strategic");
    Route::get("crete/strategic/strategic", [StrategicOriantation::class, "create"])->name("strategic.strategic.create");
    Route::post("save/strategic/strategic", [StrategicOriantation::class, "save"])->name("strategic.strategic.save");
    Route::get("delete/strategic/{id}", [StrategicOriantation::class, "delete"])->name("strategic.delete");
    Route::get("edit/strategic/{id}", [StrategicOriantation::class, "edit"])->name("strategic.edit");



    Route::get("benefit/benefit", [ServiceBenefits::class, "index"])->name("benefit.benefit");
    Route::get("crete/benefit/benefit", [ServiceBenefits::class, "create"])->name("benefit.benefit.create");
    Route::post("save/benefit/benefit", [ServiceBenefits::class, "save"])->name("benefit.benefit.save");
    Route::get("benefites/benefit/{id}", [ServiceBenefits::class, "delete"])->name("benefites.delete");
    Route::get("edit/benefit/{id}", [ServiceBenefits::class, "edit"])->name("benefites.edit");




    Route::get("membership_level/membership_level", [MembershipLevels::class, "index"])->name("membership_level.membership_level");
    Route::get("crete/membership_level/membership_level", [MembershipLevels::class, "create"])->name("membership_level.membership_level.create");
    Route::post("save/membership_level/membership_level", [MembershipLevels::class, "save"])->name("membership_level.membership_level.save");
    Route::post("save/membership_level/plan", [MembershipLevels::class, "savePlan"])->name("membership_level.membership_level.save_plan");

    Route::get("edit/MemberShipLevels/{id}", [MembershipLevels::class, "editLevel"])->name("membershiplevel.edit");
    Route::post("update/MemberShipLevels/{id}", [MembershipLevels::class, "updateLevel"])->name("membershiplevel.update");

    Route::get("packege/delete/plan/{id}", [MembershipLevels::class, "deletePlan"])->name("plan.delete");




    Route::get("/all-ihuzo/members", [ClientController::class, 'index'])->name("clients.index");
    Route::get("/ihuzo/members/{application}/details", [ClientController::class, 'show'])->name("clients.details");
    Route::get("/ihuzo/members/{client}/change-status/{status}", [ClientController::class, 'changeStatus'])->name("clients.change.status");
    Route::get("/ihuzo/members/search.client", [ClientController::class, 'searchClient'])->name("clients.search.client");
    Route::post("/ihuzo/members/{client}/change-client", [ClientController::class, 'changeClient'])->name("change.client");


    // webinars
    Route::resource('digital-platforms', App\Http\Controllers\DSPSolutionController::class);
    Route::get('/digital-platforms/delete/{id}', [App\Http\Controllers\DSPSolutionController::class, 'delete'])->name('digital-platforms.delete');
    Route::get('/digital-platforms/{id}/platforms', [App\Http\Controllers\DSPSolutionController::class, 'platforms'])->name('digital-platforms.platforms');
    Route::resource('webinars', App\Http\Controllers\WebinarController::class);
    Route::get('/webinars/delete/{id}', [App\Http\Controllers\WebinarController::class, 'delete'])->name('webinars.delete');
    Route::get('/digital-platforms/disable/{id}', [App\Http\Controllers\DSPSolutionController::class, 'disable'])->name('digital-platforms.disable');

    //reporting routes
    Route::get('/report/create', [ReportController::class, 'index'])->name('general.reporting.index');
    Route::get('/report/general/generated', [ReportController::class, 'generatedReport'])->name('general.reporting.generated');

    //custom report controller
    Route::get("/report-source/list", [ReportSourceController::class, "index"])->name("report.source.index");
    Route::post("/report-source/store", [ReportSourceController::class, "store"])->name("report.source.store");
    Route::post("/report-source/{reportSource}/update", [ReportSourceController::class, "update"])->name("report.source.update");
    Route::get("/report-source/{reportSource}/destroy", [ReportSourceController::class, "destroy"])->name("report.source.destroy");

    Route::get("/report/list", [SystemReportController::class, 'index'])->name("report.list");
    Route::get("/construct/report", [SystemReportController::class, "generateReportView"])->name("construct.reports");
    Route::get("/generate/report", [SystemReportController::class, "generateReport"])->name("generate.report");
    Route::get("/create/report-view", [SystemReportController::class, "viewCreateReport"])->name("create.report.view");
    Route::get("/create/report-view/{systemReport}", [SystemReportController::class, "editReport"])->name("edit.report.view");
    Route::post("/create/report", [SystemReportController::class, "createReport"])->name("create.report");
    Route::post("/update/report/{report}", [SystemReportController::class, "updateReport"])->name("update.report");
    Route::get("/destroy/report/{report}", [SystemReportController::class, "destroyReport"])->name("destroy.report");

    // client feedback
    Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.index');


    // impact links
    Route::get('impact', [App\Http\Livewire\Admin\ImpactsPage::class, '__invoke'])->name('impact.content');
    Route::get('impact/new', [App\Http\Livewire\Admin\CreateImpacts::class, '__invoke'])->name('impact.create');
    Route::get('resorces/category', [App\Http\Livewire\Admin\CreateResourcesCategory::class, '__invoke'])->name('resources.category');
    Route::get('resorces', [App\Http\Livewire\Admin\CreateResources::class, '__invoke'])->name('resources.index');
    Route::get('resorces/new', [App\Http\Livewire\Admin\NewResource::class, '__invoke'])->name('resources.create');


    // resources
    Route::post('/save/resource', [App\Http\Controllers\Frontend\Resources\SaveResource::class, 'store'])->name('save.resource');
    Route::put('/update/resource/{id}', [App\Http\Controllers\Frontend\Resources\SaveResource::class, 'update'])->name('update.resource');
    Route::get('/show/resource/{id}', [App\Http\Controllers\Frontend\Resources\SaveResource::class, 'show'])->name('show.resource');

    // our partners
    Route::get('/our-partners', [App\Http\Controllers\Frontend\Partners\SavePartners::class, 'index'])->name('our.partners');
    Route::get('/edit-partners/{id}', [App\Http\Controllers\Frontend\Partners\SavePartners::class, 'show'])->name('show.partners');
    Route::put('/update-partners/{id}', [App\Http\Controllers\Frontend\Partners\SavePartners::class, 'update'])->name('update.partners');
    Route::post('/save-partners', [App\Http\Controllers\Frontend\Partners\SavePartners::class, 'store'])->name('save.partner');

    // advocacy and complaints
    Route::get('/advocaies', [App\Http\Controllers\AdvocacyController::class, 'index'])->name('list.advocacy.intersts');


    Route::post('/my-access', [AccessController::class, 'index'])->name('saving_access');  //tobe developed
    Route::post('/my-access-market', [AccessController::class, 'market'])->name('saving_accessmarket');  //tobe developed
    Route::post('/my-capacity_builiding', [AccessController::class, 'capbuiliding'])->name('capacity_builiding');  //tobe developed


    //    audits routes
    Route::group(['prefix' => 'system-history'], function () {
        Route::get('/audits', [AuditingController::class, 'index'])->name('audits.index');
        Route::get('/audits-from/{start}/to/{end}', [AuditingController::class, 'customAudits'])->name('custom.audits');
    });


    Route::prefix('user-management')->group(function () {
        //permission routes
        Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
        Route::post('/permissions/update/{permission_id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
        Route::post('/permissions/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
        //
        Route::get('/permissions/add-permission-to-user/{user_id}', [App\Http\Controllers\PermissionController::class, 'addPermissionToUser'])->name('user.add.permissions');
        Route::post('/permissions/add-permissions-to-user/store', [App\Http\Controllers\PermissionController::class, 'storePermissionToUser'])->name('permissions_to_user.store');
        //users routes
        Route::get("/users", [App\Http\Controllers\UserController::class, 'index'])->name("users.index");
        Route::post("/users/store", [App\Http\Controllers\UserController::class, 'store'])->name("users.store");
        Route::post("/users/bulky/upload", [App\Http\Controllers\UserController::class, 'uploadExcel'])->name("users.bulky.upload");
        Route::post("/users/update/{user_id}", [App\Http\Controllers\UserController::class, 'update'])->name("users.update");
        Route::get("/users/profile/{user_id}", [App\Http\Controllers\UserController::class, 'userProfile'])->name("users.profile");
        //Profile URL
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('update.profile');
        Route::get('/users/change-password', [App\Http\Controllers\ProfileController::class, 'changePasswordForm'])->name('user.change.password');
        Route::post('/users/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('user.update.password');
    });

    Route::prefix('system-settings')->group(function () {
        //service
        Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.create');
        Route::post('/services/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
        Route::post('/services/edit', [App\Http\Controllers\ServiceController::class, 'update'])->name('service.edit');
        Route::get('/services/delete/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.delete');

        //business sector
        Route::get('/business_sectors', [App\Http\Controllers\BusinessSectorController::class, 'index'])->name('business.sector.create');
        Route::post('/business_sectors/store', [App\Http\Controllers\BusinessSectorController::class, 'store'])->name('business.sector.store');
        Route::post('/business_sectors/edit', [App\Http\Controllers\BusinessSectorController::class, 'update'])->name('business.sector.edit');
        Route::get('/business_sectors/delete/{id}', [App\Http\Controllers\BusinessSectorController::class, 'destroy'])->name('business.sector.delete');

        //registration type
        Route::get('/registration_type', [App\Http\Controllers\RegistrationTypeController::class, 'index'])->name('registration.type.create');
        Route::post('/registration_type/store', [App\Http\Controllers\RegistrationTypeController::class, 'store'])->name('registration.type.store');
        Route::post('/registration_type/edit', [App\Http\Controllers\RegistrationTypeController::class, 'update'])->name('registration.type.edit');
        Route::get('/registration_type/delete/{id}', [App\Http\Controllers\RegistrationTypeController::class, 'destroy'])->name('registration.type.delete');

        //company category
        Route::get('/company_category', [App\Http\Controllers\CompanyCategoryController::class, 'index'])->name('company.category.create');
        Route::post('/company_category/store', [App\Http\Controllers\CompanyCategoryController::class, 'store'])->name('company.category.store');
        Route::post('/company_category/edit', [App\Http\Controllers\CompanyCategoryController::class, 'update'])->name('company.category.edit');
        Route::get('/company_category/delete/{id}', [App\Http\Controllers\CompanyCategoryController::class, 'destroy'])->name('company.category.delete');

        //platform type
        Route::get('/platform_type', [App\Http\Controllers\PlatformTypeController::class, 'index'])->name('platform.type.create');
        Route::post('/platform_type/store', [App\Http\Controllers\PlatformTypeController::class, 'store'])->name('platform.type.store');
        Route::post('/platform_type/edit', [App\Http\Controllers\PlatformTypeController::class, 'update'])->name('platform.type.edit');
        Route::get('/platform_type/delete/{id}', [App\Http\Controllers\PlatformTypeController::class, 'destroy'])->name('platform.type.delete');
        //I worker categories
        Route::get('/i_worker_category', [App\Http\Controllers\IworkerCategoryController::class, 'index'])->name('i.worker.category.create');
        Route::post('/i_worker_category/store', [App\Http\Controllers\IworkerCategoryController::class, 'store'])->name('i.worker.category.store');
        Route::post('/i_worker_category/edit', [App\Http\Controllers\IworkerCategoryController::class, 'update'])->name('i.worker.category.edit');
        Route::get('/i_worker_category/delete/{id}', [App\Http\Controllers\IworkerCategoryController::class, 'destroy'])->name('i.worker.category.delete');
        //level_of_study
        Route::get('/level_of_study', [App\Http\Controllers\LevelofStudyController::class, 'index'])->name('level.of.study.create');
        Route::post('/level_of_study/store', [App\Http\Controllers\LevelofStudyController::class, 'store'])->name('level.of.study.store');
        Route::post('/level_of_study/edit', [App\Http\Controllers\LevelofStudyController::class, 'update'])->name('level.of.study.edit');
        Route::get('/level_of_study/delete/{id}', [App\Http\Controllers\LevelofStudyController::class, 'destroy'])->name('level.of.study.delete');

        //Add Fields of study to Level of study
        Route::get('level-of-study/{id}/field-of-study', [LevelofStudyController::class, 'addFieldsOfStudyToLevelOfStudy'])->name('add.fields-of-study.to.level-of-study');
        Route::post('level-of-study/field-of-study', [LevelofStudyController::class, 'storeFieldsOfStudyToLevelOfStudy'])->name('fields-of-study.to.level-of-study.store');
        Route::post('level-of-study/field-of-study/update', [LevelofStudyController::class, 'updateFieldOfStudyToLevelOfStudy'])->name('fields-of-study.to.level-of-study.update');
        Route::get('level-of-study/field-of-study/{id}/destroy', [LevelofStudyController::class, 'destroyFieldOfStudyFromLevelOfStudy'])->name('fields-of-study.to.level-of-study.destroy');
        //i_worker_software_skills
        Route::get('/i_worker_software_skills', [App\Http\Controllers\IworkerSoftSkillController::class, 'index'])->name('i.worker.software.skills.create');
        Route::post('/i_worker_software_skills/store', [App\Http\Controllers\IworkerSoftSkillController::class, 'store'])->name('i.worker.software.skills.store');
        Route::post('/i_worker_software_skills/edit', [App\Http\Controllers\IworkerSoftSkillController::class, 'update'])->name('i.worker.software.skills.edit');
        Route::get('/i_worker_software_skills/delete/{id}', [App\Http\Controllers\IworkerSoftSkillController::class, 'destroy'])->name('i.worker.software.skills.delete');
        //payment_method
        Route::get('/payment_method', [App\Http\Controllers\PaymentMethodController::class, 'index'])->name('payment.method.create');
        Route::post('/payment_method/store', [App\Http\Controllers\PaymentMethodController::class, 'store'])->name('payment.method.store');
        Route::post('/payment_method/edit', [App\Http\Controllers\PaymentMethodController::class, 'update'])->name('payment.method.edit');
        Route::get('/payment_method/delete/{id}', [App\Http\Controllers\PaymentMethodController::class, 'destroy'])->name('payment.method.delete');
        //digital platform
        Route::get('/digital_platform', [App\Http\Controllers\DigitalPlatformController::class, 'index'])->name('digital.platform.create');
        Route::post('/digital_platform/store', [App\Http\Controllers\DigitalPlatformController::class, 'store'])->name('digital.platform.store');
        Route::post('/digital_platform/edit', [App\Http\Controllers\DigitalPlatformController::class, 'update'])->name('digital.platform.edit');
        Route::get('/digital_platform/delete/{id}', [App\Http\Controllers\DigitalPlatformController::class, 'destroy'])->name('digital.platform.delete');
        //income range
        Route::get('/income_range', [App\Http\Controllers\IncomeRangeController::class, 'index'])->name('income.range.create');
        Route::post('/income_range/store', [App\Http\Controllers\IncomeRangeController::class, 'store'])->name('income.range.store');
        Route::post('/income_range/edit', [App\Http\Controllers\IncomeRangeController::class, 'update'])->name('income.range.edit');
        Route::get('/income_range/delete/{id}', [App\Http\Controllers\IncomeRangeController::class, 'destroy'])->name('income.range.delete');
        //credit source
        Route::get('/credit_source', [App\Http\Controllers\CreditSourceController::class, 'index'])->name('credit.source.create');
        Route::post('/credit_source/store', [App\Http\Controllers\CreditSourceController::class, 'store'])->name('credit.source.store');
        Route::post('/credit_source/edit', [App\Http\Controllers\CreditSourceController::class, 'update'])->name('credit.source.edit');
        Route::get('/credit_source/delete/{id}', [App\Http\Controllers\CreditSourceController::class, 'destroy'])->name('credit.source.delete');

        //Job Type CRUD
        Route::get('job-type', [JobTypeController::class, 'index'])->name('job-type.index');
        Route::post('job-type/{id}/update', [JobTypeController::class, 'update'])->name('job-type.update');
        Route::post('job-type/store', [JobTypeController::class, 'store'])->name('job-type.store');
        Route::get('job-type/{id}/delete', [JobTypeController::class, 'destroy'])->name('job-type.destroy');

        //Opportunity Type CRUD
        Route::get('opportunity-type', [OpportunityTypeController::class, 'index'])->name('opportunity-type.index');
        Route::post('opportunity-type/{id}/update', [OpportunityTypeController::class, 'update'])->name('opportunity-type.update');
        Route::post('opportunity-type/store', [OpportunityTypeController::class, 'store'])->name('opportunity-type.store');
        Route::get('opportunity-type/{id}/delete', [OpportunityTypeController::class, 'destroy'])->name('opportunity-type.destroy');

        //Availability Type Controller
        Route::get('availability-type', [AvailabilityTypeController::class, 'index'])->name('availability-type.index');
        Route::post('availability-type/{id}/update', [AvailabilityTypeController::class, 'update'])->name('availability-type.update');
        Route::post('availability-type/store', [AvailabilityTypeController::class, 'store'])->name('availability-type.store');
        Route::get('availability-type/{id}/delete', [AvailabilityTypeController::class, 'destroy'])->name('availability-type.destroy');

        //Add business sectors to registration services
        Route::get('/add-business-sector-to/{id}/registration-type', [
            RegistrationTypeController::class,
            'addBusinessSectorsToRegistrationType'
        ])->name('registration_type.add.business_sector');
        Route::post('/add-business-sector-to/{id}/registration-type', [
            RegistrationTypeController::class,
            'storeBusinessSectorsToRegistrationType'
        ])->name('business_sectors_to_registration_type.store');
        //Add services to registration services
        Route::get('/add-services-to/{id}/registration-type', [
            RegistrationTypeController::class,
            'addServicesToRegistrationType'
        ])->name('registration_type.add.service');
        Route::post('/add-services-to/{id}/registration-type', [
            RegistrationTypeController::class,
            'storeServicesToRegistrationType'
        ])->name('services_to_registration_type.store');
        //Add company category to registration services
        Route::get('/add-company-category-to/{id}/registration-type', [
            RegistrationTypeController::class,
            'addCompanyCategoryToRegistrationType'
        ])->name('registration.type.add.company.category');
        Route::post('/add-company-category-to/{id}/registration-type', [
            RegistrationTypeController::class,
            'storeCompanyCategoryToRegistrationType'
        ])->name('company.category.to.registration.type.store');

        //System parameters
        Route::get('system-parameters', [SystemParameterController::class, 'index'])->name('system_parameter.index');
        Route::post('system-parameters/{parameter}/update', [SystemParameterController::class, 'update'])->name('system_parameter.update');

        //physical-disability
        Route::get('/physical-disabilities', [App\Http\Controllers\PhysicalDisabilityController::class, 'index'])->name('physical.disability.create');
        Route::post('/physical-disability/store', [App\Http\Controllers\PhysicalDisabilityController::class, 'store'])->name('physical.disability.store');
        Route::post('/physical-disability/edit', [App\Http\Controllers\PhysicalDisabilityController::class, 'update'])->name('physical.disability.edit');
        Route::get('/physical-disability/delete/{id}', [App\Http\Controllers\PhysicalDisabilityController::class, 'destroy'])->name('physical.disability.delete');

        //Field Of Studies
        Route::get('/field-of-studies', [App\Http\Controllers\FieldOfStudyController::class, 'index'])->name('field.of.study.create');
        Route::post('/field-of-study/store', [App\Http\Controllers\FieldOfStudyController::class, 'store'])->name('field.of.study.store');
        Route::post('/field-of-study/edit', [App\Http\Controllers\FieldOfStudyController::class, 'update'])->name('field.of.study.edit');
        Route::get('/field-of-study/delete/{id}', [App\Http\Controllers\FieldOfStudyController::class, 'destroy'])->name('field.of.study.delete');

        //Field Of Studies
        Route::get('/specialities', [App\Http\Controllers\SpecialtyController::class, 'index'])->name('specialities.create');
        Route::post('/specialities/store', [App\Http\Controllers\SpecialtyController::class, 'store'])->name('specialities.store');
        Route::post('/specialities/edit', [App\Http\Controllers\SpecialtyController::class, 'update'])->name('specialities.edit');
        Route::get('/specialities/delete/{id}', [App\Http\Controllers\SpecialtyController::class, 'destroy'])->name('specialities.delete');
    });

    //Partners
    Route::get('/partner', [App\Http\Controllers\PartnerController::class, 'index'])->name('partner.create');
    Route::post('/partner/store', [App\Http\Controllers\PartnerController::class, 'store'])->name('partner.store');
    Route::post('/partner/edit', [App\Http\Controllers\PartnerController::class, 'update'])->name('partner.edit');
    Route::get('/partner/delete/{id}', [App\Http\Controllers\PartnerController::class, 'destroy'])->name('partner.delete');
    //News
    Route::get('/news', [App\Http\Controllers\NewsInterest::class, 'index'])->name('news.interest');
    Route::post('/news/store', [App\Http\Controllers\NewsInterest::class, 'store'])->name('news.store');
    // Route::post('/partner/edit', [App\Http\Controllers\PartnerController::class, 'update'])->name('partner.edit');
    // Route::get('/partner/delete/{id}', [App\Http\Controllers\PartnerController::class, 'destroy'])->name('partner.delete');


    // home tabs content routes
    Route::get('/list-content', [App\Http\Controllers\ContentController::class, 'index'])->name('tabs.contents');
    Route::get('/new-content', [App\Http\Controllers\ContentController::class, 'create'])->name('create.content');
    Route::post('/save-content', [App\Http\Controllers\ContentController::class, 'store'])->name('content.store');
    Route::get('/delete-content/{id}', [App\Http\Controllers\ContentController::class, 'delete'])->name('content.delete');
    Route::get('/edit-content/{id}', [App\Http\Controllers\ContentController::class, 'edit'])->name('content.edit');
    Route::post('/update-content/{id}', [App\Http\Controllers\ContentController::class, 'update'])->name('content.update');




    // home google content routes
    Route::get('/list-google', [App\Http\Controllers\GoogleController::class, 'index'])->name('google.googles');
    Route::get('/new-google', [App\Http\Controllers\GoogleController::class, 'create'])->name('create.google');
    Route::post('/save-google', [App\Http\Controllers\GoogleController::class, 'store'])->name('google.store');
    Route::get('/delete-google/{id}', [App\Http\Controllers\GoogleController::class, 'delete'])->name('google.delete');
    Route::get('/edit-google/{id}', [App\Http\Controllers\GoogleController::class, 'edit'])->name('google.edit');
    Route::post('/update-google/{id}', [App\Http\Controllers\GoogleController::class, 'update'])->name('google.update');




    //Back end Job Opportunities

    Route::get('/job-opportunities', [JobOpportunityController::class, 'listOfJobOpportunities'])->name('job.opportunities.index');
    Route::post('/job-opportunities', [JobOpportunityController::class, 'storeJobOpportunity'])->name('job.opportunity.store');
    Route::post('/job-opportunities/update', [JobOpportunityController::class, 'updateJobOpportunity'])->name('job.opportunity.update');
    Route::get('/job-opportunities/{id}/destroy', [JobOpportunityController::class, 'destroyJobOpportunity'])->name('job.opportunity.destroy');
    Route::get('/job-opportunities/{id}/details', [JobOpportunityController::class, 'jobOpportunityDetails'])->name('job.opportunity.details');
    Route::get('/job-opportunities/{id}/updating', [JobOpportunityController::class, 'jobOpportunityUpdate'])->name('job.opportunity.updating');

    // Open APIs
    Route::resource('open-apis', App\Http\Controllers\OpenApiController::class);
    Route::get('/open-apis/delete/{id}', [App\Http\Controllers\OpenApiController::class, 'delete'])->name('open-apis.delete');
    Route::get('/open-apis/disable/{id}', [App\Http\Controllers\OpenApiController::class, 'disable'])->name('open-apis.disable');

    //reporting routes
    Route::get('report/generate-general/index', [ReportController::class, 'index'])->name("general.reporting.index");
});
Auth::routes();


Route::prefix('client')->name('client.')->namespace('Client')->group(function () {
    //    Route::auth();
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    // route to login & signup with ebid
    Route::get('/login-with-ebid', [LoginController::class, 'loginWithEbid'])->name('login.with.ebid');
    Route::post('/signUp-with-ebid', [LoginController::class, 'signUpWithEbid'])->name('signUp.with.ebid');

    // route to login & signup with ihuzo============================================================================
    Route::get('/login-with-ihuzo', [TestingController::class, 'loginWithihuzo'])->name('login.with.ihuzo');
    Route::get('/signUp-with-ihuzo', [TestingController::class, 'signUpWithihuzo'])->name('signUp.with.ihuzo');
    // route to login & signup with ihuzo============================================================================


    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


    Route::get('/register-id-number', [RegisterController::class, 'showCheckIdNumberForm'])->name('showCheckIdNumberForm');
    Route::get('/registration-check-id-number', [RegisterController::class, 'checkIdNumber'])->name('checkIdNumber');

    Route::get('/otp-verification', [RegisterController::class, 'otpForm'])->name('otp.form');
    Route::post('/otp-verification', [RegisterController::class, 'otpVerify'])->name('otp.verify');
    Route::get('/otp-resend', [RegisterController::class, 'resendOtp'])->name('otp.resent');

    Route::get('/change/password/{token}/form', [RegisterController::class, 'changePassword'])->name('change.password');
    Route::post('/change-password', [RegisterController::class, 'savePassword'])->name('change.password.store');


    Route::get('/password/reset', [LoginController::class, 'password'])->name('password.request');
    Route::post('/password/email', [LoginController::class, 'sendPasswordReset'])->name('password.email');
    Route::get('/password/reset/{token}', [LoginController::class, 'reset'])->name('password.reset');


    Route::get('/details/{slug}', [HomeController::class, 'details'])->name('details');
    Route::get('/get-client-rating/request/{client}/{page}', [ConnectionController::class, "getRating"])->name("get.client.rating");


    // ict chamber membeership protected  routes


    // ict chamber memberships
    Route::get('/ict-chember-membership', [chamberMembership::class, 'chamberMembership'])->name('chamber.membership');

    Route::post('/save/ict-chember-membership', [chamberMembership::class, 'saveChamberMembership'])->name('save.chamber.membership');



    Route::group(['middleware' => 'client'], function () {

        Route::post('/send/message', [ChatController::class, 'sendMessage'])->name("send.message");
        Route::get('/mark/received/{message}', [ChatController::class, 'markReceived'])->name("mark.received.message");
        Route::get('/toggle/sound/{sound}', [ChatController::class, 'toggleSound'])->name("toggle.sound.notification");
        Route::get('/block/user/{client}/{status}', [ChatController::class, 'blockUser'])->name("toggle.user.block");
        Route::post('/mark/multiple/received', [ChatController::class, 'markMultipleMessage'])->name("mark.multiple.received");
        Route::get('/load/more/message/{client}/{page}', [ChatController::class, 'loadMore'])->name("load.more.message");
        Route::get('/chat/load/more/{page}', [MyMessagesController::class, 'loadMore'])->name("load.more.chats");

        Route::get('/choose-registration-type', [HomeController::class, 'registrationType'])->name('choose.registration.type');
        Route::get('/apply-now', [HomeController::class, 'startApplication'])->name('apply.now');

        Route::group(['middleware' => EnsureClientHasRegistrationType::class], function () {
            Route::get('/home', [HomeController::class, 'home'])->name('home');
            Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
            Route::get('/messages', [HomeController::class, 'messages'])->name('messages');
            Route::get('/reset-registration', [HomeController::class, 'resetRegistration'])->name('reset.registration');
            Route::post('/send-connection/request/{client}', [ConnectionController::class, "store"])->name("send.connection.request");
            Route::post('/post-rating/request/{client}', [ConnectionController::class, "makeRating"])->name("post.rating.request");

            Route::post('/dsp/{id}/ratings/store', [\App\Http\Controllers\v2\DigitalPlatformsController::class, "storeRate"])->name("dp.rating.store");

            Route::get('/review-connection/{connection}/request/{choice}', [ConnectionController::class, "reviewConnectionRequest"])->name("review.connection.request");

            // news and blogs
            Route::post('/news', [\App\Http\Livewire\V2\NewsTabs::class,  '__invoke'])->name('news');
            Route::get('/news', [\App\Http\Livewire\V2\NewsTabs::class,  '__invoke'])->name('news');
            Route::get('/news/detail/{detailId}', [\App\Http\Livewire\V2\NewsTabs::class,  '__invoke'])->name('news-details');



            Route::get('/news/edit/{newsId}', [\App\Http\Livewire\V2\NewsTabs::class,  '__invoke'])->name('news-detail');
            // Route::get('news', )

            Route::get('/resources', [App\Http\Livewire\V2\ResourcesTab::class, '__invoke'])->name('resources');
            Route::get('/services', [App\Http\Livewire\V2\ServicesTab::class, '__invoke'])->name('services');  //tobe developed
            Route::get('/my/memberships', [App\Http\Livewire\V2\MembershipTab::class, '__invoke'])->name('my_membership');  //tobe developed
            Route::get('/resources/single/{id}', [App\Http\Livewire\V2\SingleResource::class, '__invoke'])->name('single.resource');
            Route::get('/packege/single/{id}', [App\Http\Controllers\Membership\Packege::class, 'details'])->name('single.packege');


            Route::get('/advocacy', [App\Http\Livewire\V2\Advocacy::class, '__invoke'])->name('my_advocacy');  //tobe developed
            Route::get('/advocacy/review/{id}', [App\Http\Livewire\V2\Advocacies\AdvocacyReview::class, '__invoke'])->name('advocacy_review');

            Route::get('/my-services', [App\Http\Livewire\V2\MyServices::class, '__invoke'])->name('my_services');  //tobe developed


            //tobe developed
            // memberships opportunities
            Route::get('/membership/opportunities', [App\Http\Livewire\V2\MembershipOpportunity::class, '__invoke'])->name('my_opportunities');
            Route::get('/my-gigs', [App\Http\Livewire\V2\MyGigs::class, '__invoke'])->name('my_gigs');




            //tobe developed
            // Affiliates & Aggregation
            // invitaion link
            Route::get('/affiliate/invitation/{affiliator}/{group}/join', [AffiliatesController::class, 'join'])->name('invitaion.join');
            // Route::get('/affiliate/invitation/{affiliator}/{group}/join',[AffiliatesController::class,'join'])->middleware('signed')->name('invitaion.join');

            // advocacy and complains
            Route::get('/advocacy/complains', [App\Http\Livewire\V2\AdvocacyComplains\AdvocacyComplains::class, '__invoke'])->name('advocacy.complains');
            Route::get('/tracker/complains', [App\Http\Livewire\V2\AdvocacyComplains\Tabs\ResponseTracker::class, '__invoke'])->name('response.tracker');
        });


        Route::get('/company/edit-field-interest', [DSPRegistrationController::class, 'editCompanyInterests'])->name('company.edit.interest');
        Route::get('/company/edit-address', [DSPRegistrationController::class, 'editCompanyAddress'])->name('company.edit.address');
        Route::get('/company/edit-service-product', [DSPRegistrationController::class, 'editCompanyService'])->name('company.edit.service-product');


        Route::post('/dsp/update-business/identification/{model}', [DSPRegistrationController::class, 'updateeIdentification'])->name('dsp.update.business.identification');





        Route::get('/complains/{document}', [App\Http\Livewire\V2\Admin\Advocacy\Document::class, '__invoke'])->name('complaint.document');

        Route::get('/dsp-application', [DSPRegistrationController::class, 'index'])->name('dsp.application.form');
        Route::post('/dsp-application', [DSPRegistrationController::class, 'store'])->name('dsp.application.save');
        Route::post('/dsp/edit-address/{model}', [DSPRegistrationController::class, 'saveAddress'])->name('dsp.edit.address.company');
        Route::post('/dsp/edit-representative/{model}', [DSPRegistrationController::class, 'saveRepresentative'])->name('dsp.edit.representative');
        Route::post('/dsp/edit-business/identification/{model}', [DSPRegistrationController::class, 'saveIdentification'])->name('dsp.edit.business.identification');
        Route::get('/application/{application}/dsp-details', [DSPRegistrationController::class, 'details'])->name('dsp.application.details');

        Route::post('/completed-projects-save', [ProjectsController::class, 'store'])->name('projects.store');
        Route::post('/certification-awards-save', [CertificationAwardsController::class, 'store'])->name('awards.store');
        Route::get('/certification-awards/{id}/delete', [CertificationAwardsController::class, 'destroy'])->name('awards.destroy');
        Route::get('/completed-projects/{projectId}/delete', [ProjectsController::class, 'destroy'])->name('projects.destroy');

        Route::post('/app-solutions-save', [SolutionsController::class, 'store'])->name('solutions.store');
        Route::get('/app-solutions/{solutionId}/edit', [SolutionsController::class, 'edit'])->name('solutions.edit');
        Route::get('/app-solutions/{solutionId}/delete', [SolutionsController::class, 'destroy'])->name('solutions.destroy');

        // STARTUPS 
        Route::get('/register-msme', [StartupController::class, 'index'])->name('startup.application.form');
        Route::post('/startups-register-application', [StartupController::class, 'store'])->name('startup.application.save');
        Route::post('/member-save-startup', [StartupController::class, 'saveStartupTeam'])->name('team.member.store.startup');
        Route::post('/member-save-publication', [StartupController::class, 'savePublicationTeam'])->name('team.member.store.publication');
        Route::post('/solution-save-startup', [StartupController::class, 'saveSolutions'])->name('solution.save.startup');

        Route::get('/register-startup', [MsmeController::class, 'index'])->name('msme.application.form');
        Route::post('/msme-register-application', [MsmeController::class, 'store'])->name('msme.application.save');
        Route::post('/app-solutions-save-msme', [SolutionsController::class, 'saveMsme'])->name('solutions.store.msme');
        Route::get('/application/{application}/msme-details', [MsmeController::class, 'details'])->name('msme.application.details');
        Route::post('/msme-details/{application}/update-company-info', [MsmeController::class, 'updateCompanyAddress'])->name('msme.update.company.address');
        Route::post('/msme-details/{application}/update-representative-info', [MsmeController::class, 'updateRepresentativeDetails'])->name('msme.update.representative.details');
        Route::post('/msme-details/{application}/update-biz-identification', [MsmeController::class, 'updateBizIdetification'])->name('msme.update.business.identification');

        Route::get('/iworker-application', [IworkerRegistrationController::class, 'index'])->name('iworker.application.form');
        Route::post('/iworker-application', [IworkerRegistrationController::class, 'store'])->name('iworker.application.save');
        Route::get('/iworker/{id}/download', [IworkerRegistrationController::class, 'downloadAttachment'])->name('iworker.download.docs');
        Route::get('/application/{application}/iworker-details', [IworkerRegistrationController::class, 'details'])->name('iworker.application.details');

        Route::post('/iworker-trainings', [TrainingsController::class, 'store'])->name('trainings.store');
        Route::get('/iworker-trainings/{id}/download', [TrainingsController::class, 'downloadDocument'])->name('trainings.download.document');
        Route::get('/iworker-trainings/{id}/delete', [TrainingsController::class, 'destroy'])->name('trainings.destroy');

        Route::post('/iworker-experiences', [ExperienceController::class, 'store'])->name('experience.store');
        Route::post('/iworker-branches', [IworkerBranchController::class, 'store'])->name('branches.store');
        Route::get('/iworker-experiences/{id}/destroy', [ExperienceController::class, 'destroy'])->name('iworker.experience.destroy');

        Route::get('/iworker-branches/{id}/destroy', [IworkerBranchController::class, 'destroy'])->name('iworker.branches.destroy');
        Route::post('/iworker-employees', [IworkerEmployeesController::class, 'store'])->name('employees.store');
        Route::get('/iworker-employees/{id}/download', [IworkerEmployeesController::class, 'downloadDocument'])->name('employees.download.document');
        Route::get('/iworker-employees/{id}/delete', [IworkerEmployeesController::class, 'destroy'])->name('iworker.employees.destroy');

        Route::post('/iworker-affiliations', [AffiliationsController::class, 'store'])->name('affiliations.store');
        Route::get('/iworker-affiliations/{id}/delete', [AffiliationsController::class, 'destroy'])->name('affiliations.destroy');

        Route::post('/iworker/{id}/update-information', [IworkerRegistrationController::class, 'updateInformation'])->name('iworker.update.information');
        Route::post('/iworker/{id}/update-more-details', [IworkerRegistrationController::class, 'updateMoreDetails'])->name('iworker.update.more.details');
        Route::post('/iworker/{id}/update-company-representative', [IworkerRegistrationController::class, 'updateCompanyRepresentative'])
            ->name('iworker.update.company.representative');


        Route::post('/update-profile-picture', [UpdateInformationController::class, 'updateProfile'])->name('update.profile');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/my/networks', [MyNetworksController::class, 'index'])->name('my.networks');


        // affiliates & aggregators routes
        Route::get('/my/affiliates', [AffiliatesController::class, 'index'])->name('affiliates.index');
        Route::get('/my/affiliates/{id}', [AffiliatesController::class, 'groupIndex'])->name('affiliates.index.goup');
        Route::get('/my/affiliates/group-member/{id}', [AffiliatesController::class, 'viewGroupMembers'])->name('affiliates.goup.members');
        Route::get('/my/affiliate-requests', [AffiliatesController::class, 'requests'])->name('affiliates.requests');
        Route::get('/my/aggregators', [AffiliatesController::class, 'aggregators'])->name('aggregators.index');
        // Route::get('/aggregators', [AggregatorsController::class, 'index'])->name('aggregators.index');
        Route::get('/my/aggregator-requests', [AggregatorsController::class, 'requests'])->name('aggregators.requests');
        Route::get('/my/groups', [AggregatorsController::class, 'cohortIndex'])->name('cohorts.index');
        Route::post('/my/groups', [AggregatorsController::class, 'storeCohort'])->name('cohorts.store');
        Route::delete('/my/groups/{cohort}', [AggregatorsController::class, 'deleteCohort'])->name('cohorts.delete');
        Route::post('/broadcast/send', [AggregatorsController::class, 'sendBroadcast'])->name('broadcast.send');
        Route::get('/my/invitation-links', [AggregatorsController::class, 'invitationIndex'])->name('invitations.index');
        Route::post('/invitation-links/create', [AggregatorsController::class, 'invitationStore'])->name('invitations.store');
        Route::post('/aggregator/attach', [AggregatorsController::class, 'aggregates'])->name('aggregator.attach');
        Route::get('/aggregator/approve-request/{id}', [AggregatorsController::class, 'approveAggregates'])->name('aggregator.approve');
        Route::get('/aggregator/deny-rquest/{id}', [AggregatorsController::class, 'denyAggregates'])->name('aggregator.deny');
        Route::post('/affiliate/attach', [AffiliatesController::class, 'store'])->name('affiliates.attach');
        Route::get('/affiliate/{id}/approve', [AffiliatesController::class, 'approve'])->name('affiliates.approve');
        Route::get('/affiliate/{id}/deny', [AffiliatesController::class, 'deny'])->name('affiliates.deny');
        // joins
        Route::get('/affiliate/{id}/approve-join', [AffiliatesController::class, 'approveJoin'])->name('affiliates.invitation.approve');
        Route::get('/affiliate/{id}/deny-join', [AffiliatesController::class, 'denyJoin'])->name('affiliates.invitation.deny');
        // End of affiliates routes



        Route::get('/my/profile/viewers', [MyNetworksController::class, 'profileViewer'])->name('profile.viewers');
        Route::get('/my/messages', [MyMessagesController::class, 'index'])->name('my.messages');

        Route::get('/job-opportunities', [JobsController::class, 'listOpportunities'])->name('opportunities.list');
        Route::post('/create/job/job-opportunity', [JobsController::class, 'storeJobOpportunity'])->name('store.job.opportunity');
        Route::get('/job-opportunities/{job_id}/details', [JobsController::class, 'opportunityDetails'])->name('opportunities.details');


        Route::get('/request-verification', [HomeController::class, 'verification'])->name('verification');
        Route::get('/my-employees', [HomeController::class, 'myEmployees'])->name('my.employees');
    });
});

Route::get('/webinars', [WebinarsController::class, 'index'])->name('webinars.index');
Route::get('/webinars/{webinar}/details', [WebinarsController::class, 'details'])->name('webinars.details');


Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.index');
Route::get('/jobs/details/{job_id}', [JobsController::class, 'details'])->name('jobs.details');
Route::get('/discount/details/{discount_id}', [DiscountController::class, 'details'])->name('discount.details');

Route::get('/search', [SearchController::class, 'searchView'])->name('view.search');
Route::get('/data/search/result', [SearchController::class, 'getSearchResult'])->name('view.search.get.result');


Route::get('/digital-platforms', [DigitalPlatformsController::class, 'index'])->name('dp.index');
Route::get('/open-apis', [HomeController::class, 'openApis'])->name('open.apis');
Route::get('/about-ihuzo', [HomeController::class, 'about'])->name('about');

Route::get('/search-employers', [SearchController::class, 'getEmployers'])->name('search.employers');
Route::post('feedback', [FeedbackController::class, 'store'])->name('save.feedback');


Route::group(['middleware' => ['auth', 'can:Migrate data']], function () {
    Route::get('import-data', [BaseImportController::class, 'index']);
    Route::post('import-data', [BaseImportController::class, 'import'])->name('import.excel.data');
});
Route::get('/field-of-study/{level}/get', [HomeController::class, 'fieldOfStudy']);


Route::get('/drop', Select2Dropdown::class);
