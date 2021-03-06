<?php

use App\Http\Controllers\Admin\CreatorController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AddUserController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\Creator\EventController as CreatorEventController;
use App\Http\Controllers\Creator\GuestController as CreatorGuestController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\User\MyEventController;

use App\Http\Controllers\User\GuestController as UUserController;
use App\Http\Controllers\Auth\ActivationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/', function(){
    return redirect()->route('guest.index');
});
Route::get('activate', [ActivationController::class, 'activate'])->name('activate');

Route::resource('guest', UUserController::class);
//Route::resource('event', EventController::class);
//Route::resource('user', UserController::class);
Route::group([
    'middleware' => 'admin',
    'prefix' =>'admin',
    'as' => 'admin.',
], function() {
//    Route::post('adduser', [AddUserController::class, 'addUser'])->name('adduser');
    Route::post('guest/{id}/approve', [GuestController::class, 'approve'])->name('guest.approve');
    Route::post('guest/{id}/decline', [GuestController::class, 'decline'])->name('guest.decline');
    Route::resource('creator', CreatorController::class);
    Route::resource('user', UserController::class);
    Route::resource('guest', GuestController::class);
    Route::resource('event', AdminEventController::class);
//    Route::resource('event', AdminEventController::class);
});

 Route::group([
     'middleware' => 'creator',
     'prefix' => 'creator',
     'as' => 'creator.',
 ], function() {
     Route::post('guest/{id}/approve', [CreatorGuestController::class, 'approve'])->name('guest.approve');
     Route::post('guest/{id}/decline', [CreatorGuestController::class, 'decline'])->name('guest.decline');
     Route::resource('event', CreatorEventController::class);
     Route::resource('guest', CreatorGuestController::class);
 });

Route::group([
    'middleware' => 'user',
    'prefix' => 'user',
    'as' => 'user.'
], function() {
    Route::resource('guest', UUserController::class);
    Route::resource('myevent', MyEventController::class);
});
// Route::get('/', [EventController::class, 'index']);
// Route::get('/add', [EventController::class, 'create'])->name('addevent');
// Route::post('/store', [EventController::class, 'store'])->name('event_store');
// Route::get('/edit/{event}', [EventController::class, 'edit'])->name('event_edit');
// Route::patch('update/{event}', [EventController::class, 'update'])->name('updateEvent');
// Route::delete('delete/{event}', [EventController::class, 'destroy'])->name('deleteEvent');

// Route::get('/', [StudentController::class, 'index'])->name('index');
// Route::get('/addStudent', [StudentController::class, 'create'])->name('student.create');
// Route::post('/storeStudent', [StudentController::class, 'store'])->name('student.store');
// Route::get('/editstudent/{student}', [StudentController::class, 'edit'])->name('student.edit');
// Route::patch('update/{student}', [StudentController::class, 'update'])->name('student.update');
// Route::delete('delete/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::resource('student', StudentController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


