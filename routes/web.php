<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('event.index');
});
Route::get('activate', [ActivationController::class, 'activate'])->name('activate');
Route::resource('event', EventController::class);
Route::resource('user', UserController::class);
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
