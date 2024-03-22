<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/email/verify', function () {return view('auth.verify-email');})->middleware('auth')->name('verification.notice');

Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

Route::resource('profile',ProfileController::class);
Route::get('/verify_email/{hash}',[ProfileController::class,'VerifyEmail']);

Route::resource('publications',PublicationController::class);
Route::get('/publications/{publication}', [PublicationController::class, 'index'])->name('publication.index');
Route::post('/publications/{publication}/comments', [PublicationController::class, 'storeComment'])->name('comments.store');
//supprimer commentaire
Route::delete('/comments/{comment}',[CommentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/{comment}',[CommentController::class, 'update'])->name('comments.update');

Route::post('publications/{publication}/open', [PublicationController::class, 'open'])->name('publications.open');
Route::post('publications/{publication}/close', [PublicationController::class, 'close'])->name('publications.close');

Route::get('/publication.recherche', [PublicationController::class, 'searchTopic'])->name('publication.recherche');

// ----PARTIE ADMIN

Route::get('/admin/myProfile_admin',[AdminController::class,'profile_admin'])->name('admin.myProfile_admin');
Route::get('/admin/profiles',[AdminController::class,'profiles'])->name('admin.profiles');
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/categories',[AdminController::class,'categories'])->name('admin.categories');
Route::get('/admin/{id}/edit_profile_user',[AdminController::class,'edit_profile_user'])->name('admin.edit_profile_user');
Route::put('/admin/update_profile_user/{id}',[AdminController::class,'update_profile_user'])->name('admin.update_profile_user');
Route::delete('/admin/{publication}',[AdminController::class, 'delete_publication'])->name('admin.delete_publication');
Route::get('/admin/create_user', [AdminController::class, 'create_user'])->name('admin.create_user');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');


Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/categories.recherche', [CategoryController::class, 'searchCategories'])->name('categories.recherche');

Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('store');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/categories/index', [CategoryController::class, 'index'])->name('categories.index');

// Route::get('/categories/show', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorie_id}/publications', [CategoryController::class, 'show'])->name('category.publications');

Route::get('/admin/publications_admin',[AdminController::class,'publications_admin'])->name('admin.publications_admin');



// ----------------------   

Route::get('/',[CategoryController::class,'Home'])->name('homepage');

Route::middleware('guest')->group(function(){
        Route::get('/login',[LoginController::class,'show'])->name('login.show');
        Route::post('/login',[LoginController::class,'login'])->name('login');
});


Route::get('/logout',[LoginController::class,'logout'])->name('login.logout')->middleware('auth');
Route::get('/Settings',[InformationsController::class,'index'])->name('Settings');




// Header + Request

