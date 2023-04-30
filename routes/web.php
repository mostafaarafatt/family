<?php


use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\AdminsDashboard\AdminDashController;
use App\Http\Controllers\Dashboard\AirFlights\AirFlightController;
use App\Http\Controllers\Dashboard\Alpums\AlpumController;
use App\Http\Controllers\Dashboard\Documents\DocumentController;
use App\Http\Controllers\Dashboard\FamilyMembers\FamilyMemberController;
use App\Http\Controllers\Dashboard\LocaleController;
use App\Http\Controllers\Dashboard\Members\MemberController;
use App\Http\Controllers\Dashboard\News\NewController;
use App\Http\Controllers\Dashboard\Pages\ContactController;
use App\Http\Controllers\Dashboard\Pages\FqaController;
use App\Http\Controllers\Dashboard\Pages\PageController;
use App\Http\Controllers\Dashboard\Reports\ReportController;
use App\Http\Controllers\Dashboard\Roles\RoleController;
use App\Http\Controllers\Dashboard\Setting\SettingController;
use App\Http\Controllers\Dashboard\Users\UserDashboardController;
use App\Http\Controllers\SliderController;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

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

Route::get('locale/{locale}', [LocaleController::class, 'update'])->name('dashboard.locale');

Route::get('/', function () {
    return view('dashboard.auth.adminLogin');
});

Route::controller(AdminController::class)->group(function () {
    Route::post('admin/login', 'adminLogin')->name('save.admin.login');
    Route::get('admin/login', 'login')->name('login');
});

Route::group(['middleware' => ['auth:admin', 'dashboard.locales']], function ($router) {

    Route::controller(AdminController::class)->group(function () {
        Route::get('index', 'index');
        Route::get('signOut',  'signOut');
    });

    Route::controller(PageController::class)->group(function () {
        Route::get('staticpage', 'index')->name('staticpage');
        Route::get('addpage', 'addpage')->name('addpage');
        Route::post('addpagedone', 'addpagedone')->name('addpagedone');
        Route::get('editpage/{id}', 'editpage')->name('editpage');
        Route::post('editpagedone/{id}', 'editpagedone')->name('editpagedone');
    });

    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index')->name('sliders');
        Route::get('addslider', 'addslider')->name('addslider');
        Route::post('storeslider', 'storeslider')->name('storeslider');
        Route::post('deleteslider', 'deleteslider')->name('deleteslider');
        Route::get('updateslider/{id}', 'updateslider')->name('updateslider');
        Route::post('updatesliderdone/{id}', 'updatesliderdone')->name('updatesliderdone');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::resource('contact', ContactController::class);
        Route::post('contact/sendMail', 'sendMail')->name('contact.sendMail');
        Route::post('contact/delete', 'deleteMessage')->name('contact.delete');
    });

    Route::controller(UserDashboardController::class)->group(function () {
        Route::resource('users', UserDashboardController::class);
        Route::post('users/deleteUser', 'deleteUser')->name('user.delete');
        Route::get('users/userActivation/{id}', 'userActivation')->name('user.active');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::resource('roles', RoleController::class);
        Route::post('members/deleteRole', 'deleteRole')->name('roles.delete');
    });

    Route::controller(AdminDashController::class)->group(function () {
        Route::resource('admins', AdminDashController::class);
        Route::post('admins/deleteAdmin', 'deleteAdmin')->name('admins.delete');
        Route::get('admins/adminActivation/{id}', 'adminActivation')->name('admin.active');
    });

    Route::controller(FqaController::class)->group(function () {
        Route::resource('fqapage', FqaController::class);
        Route::post('fqapage/delete', 'deleteFqa')->name('fqapage.delete');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::resource('reports', ReportController::class);
        Route::get('reports/reportActivation/{id}', 'reportActivation')->name('report.active');
        Route::get('reports/reportPubliched/{id}', 'reportPubliched')->name('report.publich');
        Route::post('reports/deleteReport', 'deleteReport')->name('reports.delete');
    });

    Route::controller(DocumentController::class)->group(function () {
        Route::resource('documents', DocumentController::class);
        Route::get('documents/documentActivation/{id}', 'documentActivation')->name('document.active');
        Route::post('reports/deleteDocument', 'deleteDocument')->name('documents.delete');
    });

    Route::controller(FamilyMemberController::class)->group(function () {
        Route::resource('members', FamilyMemberController::class);
        Route::get('members/memberActivation/{id}', 'memberActivation')->name('member.active');
        Route::post('members/deleteMember', 'deleteMember')->name('members.delete');
    });

    Route::controller(AlpumController::class)->group(function () {
        Route::resource('alpums', AlpumController::class);
        Route::get('alpums/alpumActivation/{id}', 'alpumActivation')->name('alpum.active');
        Route::post('alpums/deleteAlpum', 'deleteAlpum')->name('alpums.delete');
        Route::post('alpums/deleteImage', 'deleteImage')->name('alpums.deleteImage');
    });



    Route::controller(SettingController::class)->group(function () {
        Route::get('publicSetting', 'publicSetting')->name('publicSetting');
        Route::get('socialSetting', 'socialSetting')->name('socialSetting');
        Route::get('editPublicSetting', 'editPublicSetting')->name('editPublicSetting');
        Route::post('editPublicSettingDone', 'editPublicSettingDone')->name('editPublicSettingDone');
        Route::post('editSocialSetting', 'editSocialSetting')->name('editSocialSetting');
    });
});
