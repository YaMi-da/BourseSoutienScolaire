<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\Gestion\CommentsController;
use App\Http\Controllers\Backend\Gestion\CourseController;
use App\Http\Controllers\Backend\Gestion\CourseUserController;
use App\Http\Controllers\Backend\Gestion\ItemsController;
use App\Http\Controllers\Backend\Gestion\MatieresController;
use App\Http\Controllers\Backend\Gestion\NiveauxController;
use App\Http\Controllers\Backend\Gestion\StudentsListController;
use App\Http\Controllers\Backend\Gestion\ViewsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Formatteur\CoursFormatteurController;
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
    Route::get('cours/details/{id}', [CourseController::class, 'ShowCours'])->name('showcoursadmin.view');
    Route::get('cours/view', [CourseController::class, 'CourseView'])->name('admincourse.view');
    Route::get('cours/add', [CourseController::class, 'AddCourse'])->name('admincourse.add');
    Route::post('cours/store', [CourseController::class, 'StoreCourse'])->name('admincourse.store');
    Route::get('cours/edit/{id}', [CourseController::class, 'EditCourse'])->name('admincourse.edit');
    Route::post('cours/update/{id}', [CourseController::class, 'UpdateCourse'])->name('admincourse.update');
    Route::get('cours/delete/{id}', [CourseController::class, 'DeleteCourse'])->name('admincourse.delete');

    Route::get('commentaires/view', [CommentsController::class, 'CommentView'])->name('admincomment.view');
    Route::get('commentaires/add', [CommentsController::class, 'AddComment'])->name('admincomment.add');
    Route::post('commentaires/store', [CommentsController::class, 'StoreComment'])->name('admincomment.store');
    Route::get('commentaires/edit/{id}', [CommentsController::class, 'EditComment'])->name('admincomment.edit');
    Route::post('commentaires/update/{id}', [CommentsController::class, 'UpdateComment'])->name('admincomment.update');
    Route::get('commentaires/delete/{id}', [CommentsController::class, 'DeleteComment'])->name('admincomment.delete');

    Route::get('inscriptions/view', [CourseUserController::class, 'CourseUserView'])->name('admincourseuser.view');
    Route::get('inscriptions/add', [CourseUserController::class, 'AddCourseUser'])->name('admincourseuser.add');
    Route::post('inscriptions/store', [CourseUserController::class, 'StoreCourseUser'])->name('admincourseuser.store');
    Route::get('inscriptions/edit/{id}', [CourseUserController::class, 'EditCourseUser'])->name('admincourseuser.edit');
    Route::post('inscriptions/update/{id}', [CourseUserController::class, 'UpdateCourseUser'])->name('admincourseuser.update');
    Route::get('inscriptions/delete/{id}', [CourseUserController::class, 'DeleteCourseUser'])->name('admincourseuser.delete');

    Route::get('elements/view', [ItemsController::class, 'ItemsView'])->name('adminitem.view');
    Route::get('elements/add', [ItemsController::class, 'AddItems'])->name('adminitem.add');
    Route::post('elements/store', [ItemsController::class, 'StoreItems'])->name('adminitem.store');
    Route::get('elements/edit/{id}', [ItemsController::class, 'EditItems'])->name('adminitem.edit');
    Route::post('elements/update/{id}', [ItemsController::class, 'UpdateItems'])->name('adminitem.update');
    Route::get('elements/delete/{id}', [ItemsController::class, 'DeleteItems'])->name('adminitem.delete');

    Route::get('vues/view', [ViewsController::class, 'ViewViews'])->name('adminview.view');
    Route::get('vues/add', [ViewsController::class, 'AddViews'])->name('adminview.add');
    Route::post('vues/store', [ViewsController::class, 'StoreViews'])->name('adminview.store');
    Route::get('vues/edit/{id}', [ViewsController::class, 'EditViews'])->name('adminview.edit');
    Route::post('vues/update/{id}', [ViewsController::class, 'UpdateViews'])->name('adminview.update');
    Route::get('vues/delete/{id}', [ViewsController::class, 'DeleteViews'])->name('adminview.delete');

    Route::get('matieres/view', [MatieresController::class, 'ViewMatiere'])->name('adminmatiere.view');
    Route::get('matieres/add', [MatieresController::class, 'AddMatiere'])->name('adminmatiere.add');
    Route::post('matieres/store', [MatieresController::class, 'StoreMatiere'])->name('adminmatiere.store');
    Route::get('matieres/edit/{id}', [MatieresController::class, 'EditMatiere'])->name('adminmatiere.edit');
    Route::post('matieres/update/{id}', [MatieresController::class, 'UpdateMatiere'])->name('adminmatiere.update');
    Route::get('matieres/delete/{id}', [MatieresController::class, 'DeleteMatiere'])->name('adminmatiere.delete');

    Route::get('niveaux/view', [NiveauxController::class, 'ViewNiveau'])->name('adminniveau.view');
    Route::get('niveaux/add', [NiveauxController::class, 'AddNiveau'])->name('adminniveau.add');
    Route::post('niveaux/store', [NiveauxController::class, 'StoreNiveau'])->name('adminniveau.store');
    Route::get('niveaux/edit/{id}', [NiveauxController::class, 'EditNiveau'])->name('adminniveau.edit');
    Route::post('niveaux/update/{id}', [NiveauxController::class, 'UpdateNiveau'])->name('adminniveau.update');
    Route::get('niveaux/delete/{id}', [NiveauxController::class, 'DeleteNiveau'])->name('adminniveau.delete');
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

Route::prefix('coursFormatteur')->group(function(){
    Route::get('touslescours/view', [CourseController::class, 'CourseView2'])->name('touslescoursformatteur.view');
    Route::get('details/{id}', [CourseController::class, 'ShowCours2'])->name('showcoursformatteur.view');
    Route::get('mescours/view/{id}', [CoursFormatteurController::class, 'MesCoursView'])->name('coursformatteur.view');
    Route::get('mescours/add', [CoursFormatteurController::class, 'AddMesCours'])->name('coursformatteur.add');
    Route::post('mescours/store/{id}', [CoursFormatteurController::class, 'StoreMesCours'])->name('coursformatteur.store');
    Route::get('mescours/edit/{id}', [CoursFormatteurController::class, 'EditMesCours'])->name('coursformatteur.edit');
    Route::post('mescours/update/{id}', [CoursFormatteurController::class, 'UpdateMesCours'])->name('coursformatteur.update');
    Route::get('mescours/delete/{id}', [CoursFormatteurController::class, 'DeleteMesCours'])->name('coursformatteur.delete');
});


