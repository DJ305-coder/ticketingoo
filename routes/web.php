<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TheaterController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\FrontController;

use Illuminate\Http\Request;

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


// admin route

Route::get('/admin', [LoginController::class, 'index']);
Route::post('admin-login', [LoginController::class, 'admin_login']);
Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
   Route::get('/dashboard',[LoginController::class,'dashboard_view']);
   // Banner
   Route::resource('banners', BannerController::class);
   Route::delete('banner/{id}', [BannerController::class,'destroy'])->name('banner.destroy');
   Route::get('banner-data-table', [BannerController::class, 'data_table']);

   // Theater 
   Route::resource('theaters', TheaterController::class);
   Route::delete('theater/{id}', [TheaterController::class,'destroy'])->name('theater.destroy');
   Route::get('theater-data-table', [TheaterController::class, 'data_table']);

   Route::resource('events', EventController::class, [
      'only' => ['index', 'store', 'create', 'show', 'edit']
   ]);
   Route::get('event-data-table', [EventController::class, 'data_table']);
   Route::post('/event-title-exists', [EventController::class, 'event_title_exists']);
   Route::get('event/{id}', [EventController::class, 'show']);
   Route::delete('event-delete/{id}', [EventController::class,'destroy'])->name('event.destroy');


   Route::get('logout', [LoginController::class, 'logout']);
});


// front-end route
Route::get('/event-detail/{id}',[FrontController::class,'event_detail']);


Route::get('/',[FrontController::class,'index'])->name('/');
Route::get('/all-blogs', [FrontController::class,'get_blogs']);
Route::get('/blog-detail/{id}', [FrontController::class,'blog_detail']);

Route::get('/get-more-blogs',[FrontController::class, 'index']);
Route::post('/add-like',[FrontController::class, 'add_like'])->name('add-like');;
Route::post('/add-comment',[CommentController::class, 'store'])->name('add-comment');
Route::post('/comment-reply',[CommentController::class, 'reply'])->name('comment-reply');

Route::post('/add-rating',[RatingController::class,'add_rating']);

Route::get('test', function(Request $request){
   // session()->forget(['blog_id','user_id','user']);

   return $request->session()->all();
});







// webiste routes


Route::view('/about-us','about_us');
Route::view('/contact-us','contact_us');

