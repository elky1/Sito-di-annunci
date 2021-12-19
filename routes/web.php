<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\DropzoneController;

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

Route::get('/', [PublicController::class , 'homepage'])->name('homepage');
Route::post('/locale/{locale}', [PublicController::class , 'locale'])->name('locale');

//Rotte annunci
Route::get('/adv/create/', [AdvController::class, 'create'])->name('adv.create');
Route::get('/adv/index',[AdvController::class,'index'])->name('adv.index');
Route::post('/adv/store',[AdvController::class,'store'])->name('adv.store');
Route::get('/adv/show/{adv}' , [AdvController::class,'show'])->name('adv.show');
Route::get('/adv/{category}/advs' , [AdvController::class,'advsByCategory'])->name('public.advs.category');

// Rotte revisori
Route::get('/revisor/home',[RevisorController::class,'index'])->name('revisor.index');
Route::post('/revisor/adv/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/adv/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');

// Rotte search
Route::get('/search',[SearchController::class,'search'])->name('search');

// Rotte Contatti
Route::get('/contact',[ContactController::class, 'contactMe'])->name('contact');
Route::post('/submit-contacts',[ContactController::class, 'contactSubmit'])->name('contact.submit');

// Rotta ImmaginiDropzone
Route::post('/adv/images/upload', [ AdvController::class, 'uploadImage' ])->name('dropzone.store');
Route::delete('/adv/images/remove', [AdvController::class, 'removeImage'])->name('adv.images.remove');
Route::get('/adv/images',[AdvController::class, 'getImages'])->name('adv.images');




