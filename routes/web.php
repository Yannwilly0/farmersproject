<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;

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

Route::prefix('admin')->group(function()
{
    //Auth Routes
    Route::get('/login',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login',[AdminLoginController::class, 'login'])->name('admin.login.submit');
  

    // USERS GET ROUTES
    
    Route::get('/users/utilisateurs/list',[AdminController::class, 'utilisateurs'])->name('admin.users.list');
    Route::get('/users/utilisateurs/new',[AdminController::class, 'add_user'])->name('admin.users.user.add');
    Route::get('/users/utilisateurs/login-details',[AdminController::class, 'user_login_details'])->name('admin.users.user.login');
    Route::get('/users/user/{id}/edit',[AdminController::class, 'edit_user']);
    Route::get('/users/user/{id}/profil',[AdminController::class, 'profil_user']);
    Route::get('/users/user/{id}/update/status',[AdminController::class, 'user_update_status']);


     // ADMINS GET ROUTES
     Route::get('/admins/list',[AdminController::class, 'admins'])->name('admin.admins.list');
     Route::get('/admins/admin/new',[AdminController::class, 'add_admin'])->name('admin.admins.user.add');
     Route::get('/admins/admin/{id}/edit',[AdminController::class, 'edit_admin']);
     Route::get('/admins/admin/{id}/profil',[AdminController::class, 'profil_admin']);
     Route::get('/admins/login-details',[AdminController::class, 'admin_login_details'])->name('admin.admins.user.login');
     Route::get('/admins/admin/{id}/update/status',[AdminController::class, 'admin_update_status']);

     // FARMERS GET ROUTES
     Route::get('/farmers/list',[AdminController::class, 'farmers'])->name('admin.farmers.list');
     Route::get('/farmer/add',[AdminController::class, 'add_farmer'])->name('admin.farmer.add');
     Route::get('/farmer/{id}/edit',[AdminController::class, 'edit_farmer']);
     Route::get('/farmer/{id}/profil',[AdminController::class, 'profil_farmer']);

     // REPORTS GET ROUTES
     Route::get('/farmers/report',[AdminController::class, 'farmers_report'])->name('admin.farmers.report');
     Route::get('/reports/daily/dates',[AdminController::class, 'daily_reports_dates'])->name('admin.reports.daily.dates');
     Route::get('/report/daily/{date}',[AdminController::class, 'daily_reports'])->name('admin.reports.daily');

     //DEMONSTRATIONS DATES
     Route::get('/sales/dates',[AdminController::class, 'sales_dates'])->name('admin.sales.dates');
     Route::get('/sales/{date}',[AdminController::class, 'sales'])->name('admin.sales');


     //ADMIN POST
     Route::post('/admin/registration',[AdminController::class, 'admin_registration'])->name('admin.admins.registration');
     Route::post('/admins/admin/{id}/edit/post',[AdminController::class, 'admin_update_account']);
     //USER POST
     Route::post('/user/registration',[AdminController::class, 'user_registration'])->name('admin.users.registration');
     Route::post('/farmer/{id}/edit/post',[AdminController::class, 'farmer_update_account']);

     //FARMER POST
     Route::post('/farmer/registration/post',[AdminController::class, 'farmer_registration'])->name('admin.farmers.registration');
     Route::post('/admins/admin/{id}/edit/post',[AdminController::class, 'admin_update_account']);

     Route::get('/',[AdminController::class, 'index'])->name('admin.index');
});

Route::get('/',[AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
