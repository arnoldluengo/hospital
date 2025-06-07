<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use Illuminate\Http\Request;




Route::get('/', [HomeController::class, 'showAppointmentForm']);

Route::get('/home', [HomeController::class, 'redirect'])->name('home')->middleware('auth','verified');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'redirect'])->name('home');
    Route::get('/add_doctor_view', [AdminController::class, 'addview']);
    Route::post('/upload_doctor', [AdminController::class, 'upload']);
    Route::post('/appointment', [HomeController::class, 'appointment']);
    Route::get('/myappointment', [HomeController::class, 'myappointment']);
    Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);
    Route::get('/showappointment', [AdminController::class, 'showappointment']);
    Route::get('/approved/{id}', [AdminController::class, 'approved']);
    Route::get('/canceled/{id}', [AdminController::class, 'canceled']);
    Route::get('/showdoctor', [AdminController::class, 'showdoctor']);
    Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);
    Route::get('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);
    Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);
    Route::get('/emailview/{id}', [AdminController::class, 'emailview']);
    Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);
    
    // User Management Routes
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    
    // Legacy routes redirecting to named routes
    Route::get('/deleteuser/{id}', function($id) {
        return redirect()->route('admin.users.delete', ['id' => $id]);
    });
    Route::get('/updateuser/{id}', function($id) {
        return redirect()->route('admin.users.edit', ['id' => $id]);
    });
    Route::post('/edituser/{id}', function(Request $request, $id) {
        return redirect()->route('admin.users.update', ['id' => $id]);
    });
    
    // Admin Profile Routes
    Route::get('/admin/profile', [AdminProfileController::class, 'showProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');
});


