<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LogController;

use http\Client\Response;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;






Route::get('/signup', function () {
    return view('homepage');
});

Route::post('/signup', [App\Http\Controllers\SignupController::class, 'submit']);




Route::get('/are',[HelloController::class,'index']);
Route::get('/show',[HelloController::class,'query']);
//Route::get('/user',[HelloController::class,'getData']);
Route::view("/get",'homepage');
Route::post("/user",[HelloController::class,'postData']);
//Route::view("login","homepage");

//Route::get('/about',[UserController::class,'about']);
//Route::get('/home',[UserController::class,'HomePage']);

//Route::get('/createuser',[HelloController::class,'create_user']);

//Route::get('/create-form', 'YourControllerName@create');
//
//
Route::get('/create-form',[HelloController::class,'create'])->name('create-form');
Route::post('/create-form', [HelloController::class,'submit'])->name('submit-form');
//Route::post('/submit', [HelloController::class,'submit'])->name('submit');

//Route::view("/submit",'welcome');

Route::get('/form',function (){
   return view('welcome');
}

);
Route::post('/form', [HelloController::class,'submit'])->name('submit-form');


//
//Route::get('/showTable',function (){
//    return view('homepage');
//}


Route::get('showTable', [\App\Http\Controllers\YajraController::class,'ajax'])->name('ajax');


Route::get('/log', [\App\Http\Controllers\LogController::class,'log'])->name('show.login');
Route::get('/logout', [\App\Http\Controllers\LogController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/login', [\App\Http\Controllers\LogController::class,'authenticate'])->name('login');
Route::post('/registration', [\App\Http\Controllers\LogController::class,'registration'])->name('registration');
Route::get('/dashboard', [\App\Http\Controllers\LogController::class,'dashboard'])->name('dashboard')->middleware('auth');
//    ->middleware('auth');

//Route::get('/admin/{id}/delete', [\App\Http\Controllers\EditController::class,'edit'])->name('admin.edit');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/practice', [App\Http\Controllers\LogController::class, 'practice'])->name('practice');


Route::get('/sub', [FileController::class, 'set'])->name('file_submit');
Route::post('/file', [FileController::class, 'file'])->name('file');

Route::get('/upload',function (){
    return view('upload');
});

Route::post('/upload', [FileController::class, 'upload'])->name('upload');
Route::get('/yajra', [FileController::class, 'ajax'])->name('ajax');

//Route::get('/show', [FileController::class, 'show'])->name('show');
//Route::get('/download-log-files', function () {
//    $file = storage_path('app/log-files.csv');
//    $headers = array(
//        'Content-Type' => 'text/csv',
//    );
//
//    return Response::download($file, 'logfiles.csv', $headers);
//});

