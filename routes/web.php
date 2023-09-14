<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\MessageAdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Teacher;
use App\Models\User;

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

Route::get('/', function () {
    return view('dashboard.index', ['blogs' => Blog::latest()->paginate(3)]);
});

Route::get('/classes', function(){
    return view('dashboard.classes', [
        'title' => 'Our Classes!'
    ]);
});
Route::get('/teachers', function(){
    return view('dashboard.teachers', [
        'title' => 'Our Teachers!',
        'teachers' => Teacher::all()
    ]);
});

Route::get('/gallery', function(){
    return view('dashboard.gallery', [
        'title' => 'Gallery!',
        'images' => Blog::latest()->get()
    ]);
});

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{blog}', [BlogController::class, 'showsingle']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [MessageController::class, 'store'])->middleware('isUser');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

Route::post('logout', [LoginController::class, 'logout']);

Route::get('/admin', function(){
    return view('admin.index', [
        'title' => 'Home',
        'dataTeacher' => Teacher::count(),
        'dataUser' => User::count(),
        'dataBlog' => Blog::count(),
        'dataMessage' => Message::count(),


    ]);
})->middleware('auth');

Route::resource('/admin/contact', AdminMessageController::class);

Route::resource('/admin/teacher', TeacherController::class);

Route::resource('/admin/blog', AdminBlogController::class);

Route::resource('/admin/user', UserController::class);

Route::get('/admin/checkSlug', [AdminBlogController::class, 'checkSlug']);

Route::get('/downloadpdf', [UserController::class, 'print']);

