<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProfileController,
    BudgetController,
    ApplicationController,
    DoctorController,
    ControllerController,
    CommitteeController,
    ManagementController,
    BoardController,
    DashboardController,
    ReportController,
    ArchiveController,
};
use Illuminate\Support\Facades\Auth;
use App\Models\Frontuser;
use App\Http\Controllers\Back\HealthCareController;
use App\Http\Controllers\Front\FrontuserController;

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

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('user.dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

require __DIR__.'/auth.php';

// User 
Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['front'])->name('dashboard');

require __DIR__.'/front_auth.php';


Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')->group(function(){
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('users','UserController');
    Route::resource('posts','PostController');
    Route::resource('dashboards','DashboardController');
    Route::resource('budgets','BudgetController');
    Route::resource('applications','ApplicationController');
    Route::resource('doctorsApplication','DoctorController');
    Route::resource('controllersApplication','ControllerController');
    Route::resource('committeesApplication','CommitteeController');
    Route::resource('managementsApplication','ManagementController');
    Route::resource('boardsApplication','BoardController');
    Route::resource('reports','ReportController');
    Route::resource('archives','ArchiveController');

    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');
});

// user
Route::middleware('front')->group(function () {
    Route::get('/front_profile',[FrontuserController::class,'front_profile'])->name("front_profile");
    Route::post('/store',[FrontuserController::class,'store'])->name("store.front_profile");
});

// application
Route::middleware('front')->group(function () {
    Route::get('/application',[HealthcareController::class,'application'])->name("application");
    Route::get('/treatment',[HealthcareController::class,'treatment'])->name("treatment.application");
    Route::get('/daughterMarriage',[HealthcareController::class,'daughterMarriage'])->name("daughterMarriage.application");
    Route::get('/meritocracy',[HealthcareController::class,'meritocracy'])->name("meritocracy.application");
    Route::get('/deadbody',[HealthcareController::class,'deadbody'])->name("deadbody.application");
    Route::post('/applicationStore/{id}',[HealthcareController::class,'applicationStore'])->name("store.application");
    Route::get('/applicationList',[HealthcareController::class,'applicationList'])->name("applicationList");
    Route::post('/userStore',[HealthcareController::class,'userStore'])->name("store.user");
});

// admin
Route::middleware('auth')->group(function () {
    Route::get('/applications',[ApplicationController::class,'index'])->name("applications");
    Route::get('/applicationsEdit/{id}',[ApplicationController::class,'applicationsEdit'])->name("edit.applications");
    Route::post('/applicationsUpdate/{id}',[ApplicationController::class,'applicationsUpdate'])->name("update.applications");
    Route::post('/r_applicationsUpdate/{id}',[ApplicationController::class,'r_applicationsUpdate'])->name("update.r_applications");
    Route::get('/applicationsReport',[ApplicationController::class,'report'])->name("report.applications");
    Route::get('/applicationsReportView/{id}',[ApplicationController::class,'reportView'])->name("viewReport.applications");
    Route::get('/applicationsFilter', [ApplicationController::class, 'filterData'])->name("filter.applications");
});

// doctor
Route::middleware('auth')->group(function () {
    Route::get('/doctorsApplication',[DoctorController::class,'index'])->name("doctorsApplication");
    Route::get('/doctorsApplicationEdit/{id}',[DoctorController::class,'doctorsApplicationEdit'])->name("edit.doctorsApplication");
    Route::post('/doctorsApplicationUpdate/{id}',[DoctorController::class,'doctorsApplicationUpdate'])->name("update.doctorsApplication");
    Route::post('/r_doctorsApplicationUpdate/{id}',[DoctorController::class,'r_doctorsApplicationUpdate'])->name("update.r_doctorsApplication");
    Route::get('/doctorsApplicationReport',[DoctorController::class,'report'])->name("report.doctorsApplication");
    Route::get('/doctorsReportView/{id}',[DoctorController::class,'reportView'])->name("viewReport.doctorsApplication");
    Route::get('/doctorsApplicationFilter', [DoctorController::class, 'filterData'])->name("filter.doctorsApplication");
});

// controller
Route::middleware('auth')->group(function () {
    Route::get('/controllersApplication',[ControllerController::class,'index'])->name("controllersApplication");
    Route::get('/controllersApplicationEdit/{id}',[ControllerController::class,'controllersApplicationEdit'])->name("edit.controllersApplication");
    Route::post('/controllersApplicationUpdate/{id}',[ControllerController::class,'controllersApplicationUpdate'])->name("update.controllersApplication");
    Route::post('/r_controllersApplicationUpdate/{id}',[ControllerController::class,'r_controllersApplicationUpdate'])->name("update.r_controllersApplication");
    Route::get('/controllersApplicationReport',[ControllerController::class,'report'])->name("report.controllersApplication");
    Route::get('/controllersReportView/{id}',[ControllerController::class,'reportView'])->name("viewReport.controllersApplication");
    Route::get('/controllersApplicationFilter', [ControllerController::class, 'filterData'])->name("filter.controllersApplication");
});

// committee
Route::middleware('auth')->group(function () {
    Route::get('/committeesApplication',[CommitteeController::class,'index'])->name("committeesApplication");
    Route::get('/committeesApplicationEdit/{id}',[CommitteeController::class,'committeesApplicationEdit'])->name("edit.committeesApplication");
    Route::post('/committeesApplicationUpdate/{id}',[CommitteeController::class,'committeesApplicationUpdate'])->name("update.committeesApplication");
    Route::post('/r_committeesApplicationUpdate/{id}',[CommitteeController::class,'r_committeesApplicationUpdate'])->name("update.r_committeesApplication");
    Route::get('/status/{id}',[CommitteeController::class,'status'])->name("status.committeesApplication");
    Route::get('/committeesApplicationReport',[CommitteeController::class,'report'])->name("report.committeesApplication");
    Route::get('/committeesReportView/{id}',[CommitteeController::class,'reportView'])->name("viewReport.committeesApplication");
    Route::get('/committeesApplicationFilter', [CommitteeController::class, 'filterData'])->name("filter.committeesApplication");
});

// management
Route::middleware('auth')->group(function () {
    Route::get('/managementsApplication',[ManagementController::class,'index'])->name("managementsApplication");
    Route::get('/managementsApplicationEdit/{id}',[ManagementController::class,'managementsApplicationEdit'])->name("edit.managementsApplication");
    Route::post('/managementsApplicationUpdate/{id}',[ManagementController::class,'managementsApplicationUpdate'])->name("update.managementsApplication");
    Route::post('/r_managementsApplicationUpdate/{id}',[ManagementController::class,'r_managementsApplicationUpdate'])->name("update.r_managementsApplication");
    Route::post('/managementAmount',[ManagementController::class,'managementAmount'])->name("update.managementAmount");
    Route::get('/managementFilter', [ManagementController::class, 'managementFilter'])->name('managementFilter');
    Route::get('/managementsApplicationReport',[ManagementController::class,'report'])->name("report.managementsApplication");
    Route::get('/managementsReportViews/{id}',[ManagementController::class,'reportView'])->name("viewReport.managementsApplication");
    Route::get('/managementsApplicationFilter', [ManagementController::class, 'filterData'])->name("filter.managementsApplication");
});

// board
Route::middleware('auth')->group(function () {
    Route::get('/boardsApplication',[BoardController::class,'index'])->name("boardsApplication");
    Route::get('/boardsApplicationEdit/{id}',[BoardController::class,'boardsApplicationEdit'])->name("edit.boardsApplication");
    Route::post('/boardsApplicationUpdate/{id}',[BoardController::class,'boardsApplicationUpdate'])->name("update.boardsApplication");
    Route::post('/r_boardsApplicationUpdate/{id}',[BoardController::class,'r_boardsApplicationUpdate'])->name("update.r_boardsApplication");
    Route::post('/boardAmount',[BoardController::class,'boardAmount'])->name("update.boardAmount");
    Route::get('/boardsApplicationReport',[BoardController::class,'report'])->name("report.boardsApplication");
    Route::get('/boardsReportView/{id}',[BoardController::class,'reportView'])->name("viewReport.boardsApplication");
    Route::get('/boardsApplicationFilter', [BoardController::class, 'filterData'])->name("filter.boardsApplication");
});

// budget
Route::middleware('auth')->group(function () {
    Route::get('/budget',[BudgetController::class,'index'])->name("budget");
    Route::post('/budgetStore/{id}',[BudgetController::class,'budgetStore'])->name("store.budget");
    Route::get('/budgetEdit/{id}',[BudgetController::class,'budgetEdit'])->name("edit.budget");
    Route::post('/budgetUpdate/{id}',[BudgetController::class,'budgetUpdate'])->name("update.budget");
});

// report
// Route::middleware('auth')->group(function () {
//     Route::get('/reports',[ReportController::class,'index'])->name("reports");
//     Route::get('/reportsEdit/{id}',[ReportController::class,'reportsEdit'])->name("edit.reports");
//     Route::post('/reportsUpdate/{id}',[ReportController::class,'reportsUpdate'])->name("update.reports");
//     Route::post('/r_reportsUpdate/{id}',[ReportController::class,'r_reportsUpdate'])->name("update.r_reports");
//     Route::get('/filter', [ReportController::class, 'filterData'])->name("filter");
// });

// archive
Route::middleware('auth')->group(function () {
    Route::get('/archives',[ArchiveController::class,'index'])->name("archives");
    Route::post('/archivesStore/{id}',[ArchiveController::class,'archivesStore'])->name("store.archives");
    Route::get('/archivesEdit/{id}',[ArchiveController::class,'archivesEdit'])->name("edit.archives");
    Route::get('/archiveFilter', [ArchiveController::class, 'archiveFilter'])->name("archiveFilter");
});
