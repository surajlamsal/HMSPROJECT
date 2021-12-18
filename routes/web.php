<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\HousekeepingController;
use App\Http\Controllers\ReservationCalendarController;

Auth::routes();
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::name('front.')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/rooms', [FrontController::class, 'rooms'])->name('rooms');
    Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
    Route::get('/gallery', [FrontController::class, 'gallery'])->name('gallery');
    Route::get('/book', [FrontController::class, 'book'])
        ->name('book')
        ->middleware('auth');
    Route::get('/booking/{room}', [FrontController::class, 'booking'])
        ->name('booking')
        ->middleware('auth');
    Route::post('/booking/{room}', [FrontController::class, 'bookNow'])
        ->name('book.now')
        ->middleware('auth');
});

Route::get('/kitchen', [FrontController::class, 'kitchen'])->middleware('auth');
Route::post('/kitchen', [FrontController::class, 'orderKitchen'])->middleware('auth');

Route::get('restore/{id}', [GuestController::class, 'restore']);
Route::get('force-delete/{id}', [GuestController::class, 'forceDelete']); //force-delete
Route::get('/home', [FrontController::class, 'home'])
    ->middleware('auth');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('permission', [PermissionController::class, 'index']);
    Route::get('addpermission', [PermissionController::class, 'addpermission']); //add view
    Route::post('insertpermission', [PermissionController::class, 'insertpermission']); //store
    Route::get('editpermission/{id}', [PermissionController::class, 'editpermission']); //editview
    Route::put('updatepermission/{id}', [PermissionController::class, 'updatepermission']); //store
    Route::get('deletepermission/{id}', [PermissionController::class, 'deletepermission']); //
    Route::get('archived', [GuestController::class, 'archive']); //archived-store
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
    Route::post('reservationcalendarAjax', [ReservationCalendarController::class, 'ajax']);
    Route::get('sendbasicemail', [MailController::class, 'basic_email']);
    Route::get('sendhtmlemail', 'MailController@html_email');
    Route::get('sendattachmentemail', 'MailController@attachment_email');
    Route::post('deleteRecord', [Controller::class, 'deleteRecord']);
    Route::post('checkOutThis', [ReservationController::class, 'checkOutThis']);
    Route::get('admin', [DashboardController::class, 'index']);
    Route::resource('role', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('floor', FloorController::class);
    Route::resource('amenities', AmenitiesController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('room', RoomController::class);
    Route::resource('housekeeping', HousekeepingController::class);
    Route::resource('roomtype', RoomtypeController::class);
    Route::resource('shift', ShiftController::class);
    Route::resource('guest', GuestController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('halltype', HallController::class);
    Route::resource('reservation', ReservationController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::resource('fullcalender', FullCalenderController::class);
    Route::resource('reservationcalendar', ReservationCalendarController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('food', FoodController::class);
    Route::get('foodorders', [FoodOrderController::class, 'index']);
    Route::get('/find-rooms', [ReservationController::class, 'findRooms'])->name('find-room');
});
