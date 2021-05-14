<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Gestion\StudentsListController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Formatteur\FormatteurController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Students\LessonController;
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
    return view('admin.index');
})->name('dashboard');

Route::get('/formatteur/logout', [FormatteurController::class, 'Logout'])->name('formatteur.logout');

Route::get('/eleve/logout', [StudentController::class, 'Logout'])->name('student.logout');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::get('dashboard', [DashboardController::class, 'index']); 


Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('users.view');
    Route::get('/add', [UserController::class, 'AddUser'])->name('users.add');
    Route::post('/store', [UserController::class, 'StoreUser'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'EditUser'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UpdateUser'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'DeleteUser'])->name('users.delete');
});

Route::prefix('adminProfile')->group(function(){
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});

Route::prefix('gestion')->group(function(){
    Route::get('eleves/list/view', [StudentsListController::class, 'ViewStudent'])->name('students.list.view');
    Route::get('eleves/list/add', [StudentsListController::class, 'AddStudent'])->name('students.list.add');
    Route::post('eleves/list/store', [StudentsListController::class, 'StoreStudent'])->name('students.list.store');
    Route::get('eleves/list/edit{id}', [StudentsListController::class, 'EditStudent'])->name('students.list.edit');
    Route::post('eleves/list/update/{id}', [StudentsListController::class, 'UpdateStudent'])->name('students.list.update');
    Route::get('eleves/list/delete/{id}', [StudentsListController::class, 'DeleteStudent'])->name('students.list.delete');
});


