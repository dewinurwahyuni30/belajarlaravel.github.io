<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\classController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\extracurricularController;
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
    return view('home');
})->middleware('auth');
Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'authenticating'])->middleware('guest');
Route::get('/logout',[AuthController::class,'logout'])->middleware(['auth']);

Route::get('/students',[studentController::class,'index'])->middleware('auth');


Route::get('/student/{id}',[studentController::class,'show'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/student-add',[studentController::class,'create'])->middleware(['auth','must-admin-or-teacher']);
Route::post('/student',[studentController::class,'store'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/student-edit/{id}',[studentController::class,'edit'])->middleware(['auth','must-admin-or-teacher']);
Route::put('/student/{id}',[studentController::class,'update'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/student-delete/{id}',[studentController::class,'delete'])->middleware(['auth','must-admin']);
Route::delete('/student-destroy/{id}',[studentController::class,'destroy'])->middleware(['auth','must-admin']);
Route::get('/student-deleted',[studentController::class,'deletedstudent'])->middleware(['auth','must-admin']);
Route::get('/student/{id}/restore',[studentController::class,'restore'])->middleware(['auth','must-admin']);


Route::get('/class',[classController::class,'index'])->middleware('auth');
Route::get('/class-detail/{id}',[classController::class,'show'])->middleware('auth');
Route::get('/class-edit/{id}',[classController::class,'edit'])->middleware(['auth','must-admin-or-teacher']);
Route::put('/class/{id}',[classController::class,'update'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/class-add',[classController::class,'create'])->middleware('auth');
Route::post('/class',[classController::class,'store'])->middleware('auth');
Route::get('/class-delete/{id}',[classController::class,'delete'])->middleware(['auth','must-admin']);
Route::delete('/class-destroy/{id}',[classController::class,'destroy'])->middleware(['auth','must-admin']);
Route::get('/class-deleted',[classController::class,'deletedclass'])->middleware(['auth','must-admin']);
Route::get('/class/{id}/restore',[classController::class,'restore'])->middleware(['auth','must-admin']);


Route::get('/extracurricular',[extracurricularController::class,'index'])->middleware('auth');
Route::get('/ekskul-detail/{id}',[extracurricularController::class,'show'])->middleware('auth');
Route::get('/ekskul-add',[extracurricularController::class,'create'])->middleware('auth');
Route::post('/extracurricular',[extracurricularController::class,'store'])->middleware('auth');

Route::get('/teacher',[teacherController::class,'index'])->middleware('auth');
Route::get('/teacher-detail/{id}',[teacherController::class,'show'])->middleware('auth');
Route::get('/teacher-add',[teacherController::class,'create'])->middleware('auth');
Route::post('/teacher',[teacherController::class,'store'])->middleware('auth');

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/about',function(){
//     return 9* 9;
// });

// Route::get('/contact',function(){
//     return view('contact',['name' => 'deway belajar','phone' => '089............ ']); 
// });
// // Route::view('/contact','contact',['name' => 'deway belajar','phone' => '089............ ']);
// // Route::redirect('/contact','/contact-us');
// Route::get('/product',function(){
//     return 'product';
// });
// // Route::get('/product/{id}',function($id){
// //     return 'ini adalah product dengan id ' . $id;
// // });
// Route::get('/product/{id}',function($id){
//     return view('product.detail',['id' => $id]);
// });

// Route::get('administrator/profil-admin',function(){
//     return 'profil admin';
// });
// Route::get('administrator/about-admin',function(){
//     return 'about admin';
// });
// Route::get('administrator/contact-admin',function(){
//     return 'contact admin';
// });

// Route::get('administrator/profil-admin2',function(){
//     return 'profil admin';
// });
// Route::get('administrator/about-admin2',function(){
//     return 'about admin';
// });
// Route::get('administrator/contact-admin2',function(){
//     return 'contact admin';
// });

// Route::prefix('disini')->group(function () {
//     Route::get('/profil-admin',function(){
//         return 'profil admin';
//     });
//     Route::get('/about-admin',function(){
//         return 'about admin';
//     });
//     Route::get('/contact-admin',function(){
//         return 'contact admin';
//     });
    
//     Route::get('/profil-admin2',function(){
//         return 'profil admin';
//     });
//     Route::get('/about-admin2',function(){
//         return 'about admin';
//     });
//     Route::get('/contact-admin2',function(){
//         return 'contact admin';
//     });
// });
