<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\PasswordForgotController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscriptionController;
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
    return view('welcome');
});
Route::get('/Dashbord', function (){ return view('Dashbord');})->name('Dashbord');
Route::get('/Ressources', function (){ return view('Ressources');})->name('Ressources');

Route::get('/Management', [ManagementController::class, 'index'])->name('Management');
Route::delete('/delete-user/{userId}', [UserController::class, 'deleteUser']);
// routes/web.php
// routes/web.php



Route::post('/create-role', [RoleController::class, 'createRole']);
Route::post('/get-role-permissions', [RoleController::class, 'getRolePermissions']);
Route::post('/assignrole', [RoleController::class, 'assignrole']);


Route::get('/Workspace', [WorkspaceController::class, 'index'])->name('Workspace');


// photo
Route::post('/upload', [PhotoController::class, 'store'])->name('photos.store');
// pdf
Route::get('/send-pdf-email', [PDFController::class, 'generatePDFAndSendEmail']);
// routes/web.php
// routes/web.php

use App\Http\Controllers\EmailController;

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send-email');


Route::get('/send-pdf', [PDFController::class, 'sendPDFEmail'])->name('sendPdfEmail');


Route::get('/generate-pdf-and-send-email', [PDFController::class, 'generatePDFAndSendEmail']);


Route::get('/send-test-email', function () {
    Mail::raw('Test email content', function ($message) {
        $message->to('imadbpro63@gmail.com');
        $message->subject('Test Email');
    });

    return 'Test email sent!';
});

// register 
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Handle Registration Form Submission
Route::post('/register/create', [AuthController::class, 'create'])->name('store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('storelog');

// pass

Route::get('/forgot-password', [PasswordForgotController::class, 'showForgotForm'])->name('password.request');

// Handle the forgot password form submission
Route::post('/forgetpasspost', [PasswordForgotController::class, 'sendResetLink'])->name('forgetpasspost');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');

// Handle the password reset form submission
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');



// sanctum 
Route::middleware('auth:sanctum')->group(function () {
    // Your Sanctum-protected routes
    Route::get('/register-user', [UserController::class, 'registerUser']);
    Route::get('/check-roles-permissions', [UserController::class, 'checkRolesAndPermissions']);
});


// routes/web.php



Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
