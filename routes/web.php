<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\Gestion\CourseController;
use App\Http\Controllers\Backend\Gestion\StudentsListController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Formatteur\FormatteurController;
use App\Http\Controllers\Formatteur\FormatteurProfileController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Students\StudentProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if(Auth::check()) {
        return redirect('dashboard');
    } else {
        return view('auth.login');
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/formatteur/logout', [FormatteurController::class, 'Logout'])->name('formatteur.logout');

Route::get('/eleve/logout', [StudentController::class, 'Logout'])->name('student.logout');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('users.view');
    Route::get('/add', [UserController::class, 'AddUser'])->name('users.add');
    Route::post('/store', [UserController::class, 'StoreUser'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'EditUser'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UpdateUser'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'DeleteUser'])->name('users.delete');
});

Route::prefix('adminProfile')->group(function(){
    Route::get('/view', [AdminProfileController::class, 'AdminProfileView'])->name('adminprofile.view');
    Route::get('/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('adminprofile.edit');
    Route::post('/store', [AdminProfileController::class, 'AdminProfileStore'])->name('adminprofile.store');
    Route::get('/password/view', [AdminProfileController::class, 'AdminPasswordView'])->name('adminpassword.view');
    Route::post('/password/update', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('adminpassword.update');
});

Route::prefix('gestion')->group(function(){
    Route::get('cours/view', [CourseController::class, 'CourseView'])->name('admincourse.view');
    Route::get('cours/add', [CourseController::class, 'AddCourse'])->name('admincourse.add');
    Route::post('cours/store', [CourseController::class, 'StoreCourse'])->name('admincourse.store');
    Route::get('cours/edit/{id}', [CourseController::class, 'EditCourse'])->name('admincourse.edit');
    Route::post('cours/update/{id}', [CourseController::class, 'UpdateCourse'])->name('admincourse.update');
    Route::get('cours/delete/{id}', [CourseController::class, 'DeleteCourse'])->name('admincourse.delete');
});

Route::prefix('formatteurProfile')->group(function(){
    Route::get('/view', [FormatteurProfileController::class, 'FormatteurProfileView'])->name('formatteurprofile.view');
    Route::get('/edit', [FormatteurProfileController::class, 'FormatteurProfileEdit'])->name('formatteurprofile.edit');
    Route::post('/store', [FormatteurProfileController::class, 'FormatteurProfileStore'])->name('formatteurprofile.store');
    Route::get('/password/view', [FormatteurProfileController::class, 'FormatteurPasswordView'])->name('formatteurpassword.view');
    Route::post('/password/update', [FormatteurProfileController::class, 'FormatteurPasswordUpdate'])->name('formatteurpassword.update');
});

Route::prefix('eleveProfile')->group(function(){
    Route::get('/view', [StudentProfileController::class, 'StudentProfileView'])->name('studentprofile.view');
    Route::get('/edit', [StudentProfileController::class, 'StudentProfileEdit'])->name('studentprofile.edit');
    Route::post('/store', [StudentProfileController::class, 'StudentProfileStore'])->name('studentprofile.store');
    Route::get('/password/view', [StudentProfileController::class, 'StudentPasswordView'])->name('studentpassword.view');
    Route::post('/password/update', [StudentProfileController::class, 'StudentPasswordUpdate'])->name('studentpassword.update');
});


