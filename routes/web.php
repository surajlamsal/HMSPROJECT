<?php

    use App\Http\Controllers\AmenitiesController;
    use App\Http\Controllers\Controller;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\DepartmentController;
    use App\Http\Controllers\EmployeeController;
    use App\Http\Controllers\FloorController;
    use App\Http\Controllers\FullCalenderController;
    use App\Http\Controllers\GuestController;
    use App\Http\Controllers\HallController;
    use App\Http\Controllers\HousekeepingController;
    use App\Http\Controllers\PermissionController;
    use App\Http\Controllers\ReservationController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\RoomController;
    use App\Http\Controllers\RoomtypeController;
    use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\AlertController;
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
    //
////Room type
//    Route::get('roomtype', [RoomtypeController::class, 'index']);//list
//    Route::get('addroomtype', [RoomtypeController::class, 'addroomtype']);//add view
//    Route::post('insertroomtype', [RoomtypeController::class, 'insertroomtype']);//store
//    Route::get('editroomtype/{id}', [RoomtypeController::class, 'editroomtype']);//edit view
//    Route::put('updateroomtype/{id}', [RoomtypeController::class, 'updateroomtype']);//store
//    Route::get('deleteroomtype/{id}', [RoomtypeController::class, 'deleteroomtype']);//store
////Room
//    Route::get('room', [RoomController::class, 'index']);//list
//    Route::get('addroom', [RoomController::class, 'addroom']);//add view
//    Route::post('insertroom', [RoomController::class, 'insertroom']);//store
//    Route::get('editroom/{id}', [RoomController::class, 'editroom']);//edit view
//    Route::put('updateroom/{id}', [RoomController::class, 'updateroom']);//store
//    Route::get('deleteroom/{id}', [RoomController::class, 'deleteroom']);//store
////Shifts
//    Route::get('shift', [ShiftController::class, 'index']);
//    Route::get('addshift', [ShiftController::class, 'addshift']);//add view
//    Route::post('insertshift', [ShiftController::class, 'insertshift']);//store
//    Route::get('editshift/{id}', [ShiftController::class, 'editshift']);//edit view
//    Route::put('updateshift/{id}', [ShiftController::class, 'updateshift']);//store
//    Route::get('deleteshift/{id}', [ShiftController::class, 'deleteshift']);//store
//    Auth::routes();
//    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//for halls
    Auth::routes();
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
//    Route::get('halltype', [HallController::class, 'index']);//list
//    Route::get('addhalltype', [HallController::class, 'addhalltype']);//add view
//    Route::post('inserthalltype', [HallController::class, 'inserthalltype']);//store
//    Route::get('edithalltype/{id}', [HallController::class, 'edithalltype']);//edit view
//    Route::put('updatehalltype/{id}', [HallController::class, 'updatehalltype']);//store
//    Route::get('deletehalltype/{id}', [HallController::class, 'deletehalltype']);//store
//Permission
    Route::get('permission', [PermissionController::class, 'index']);
    Route::get('addpermission', [PermissionController::class, 'addpermission']);//add view
    Route::post('insertpermission', [PermissionController::class, 'insertpermission']);//store
    Route::get('editpermission/{id}', [PermissionController::class, 'editpermission']);//editview
    Route::put('updatepermission/{id}', [PermissionController::class, 'updatepermission']);//store
    Route::get('deletepermission/{id}', [PermissionController::class, 'deletepermission']);//
//Employee
    /*Route::get('employee', [EmployeeController::class, 'index']);//list
    Route::get('addemployee', [EmployeeController::class, 'addemployee']);//add view
    Route::post('insertemployee', [EmployeeController::class, 'insertemployee']);//store
    Route::get('editemployee/{id}', [EmployeeController::class, 'editemployee']);//edit view
    Route::put('updateemployee/{id}', [EmployeeController::class, 'updateemployee']);//store
    Route::get('deleteemployee/{id}', [EmployeeController::class, 'deleteemployee']);//store*/
////for Guests
//    Route::get('guest', [GuestController::class, 'index'])->name('profile');//list
//    Route::get('addguest', [GuestController::class, 'addguest']);//add view
//    Route::post('insertguest', [GuestController::class, 'insertguest']);//store
//    Route::get('editguest/{id}', [GuestController::class, 'editguest']);//edit view
//    Route::put('updateguest/{id}', [GuestController::class, 'updateguest']);//store
//    Route::get('deleteguest/{id}', [GuestController::class, 'deleteguest']);//
//    Route::get('archived', [GuestController::class, 'archive']);//archived-store
//    Route::get('restore/{id}', [GuestController::class, 'restore']);//re-store
//    Route::get('force-delete/{id}', [GuestController::class, 'forceDelete']);//force-delete
////Housekeeping
//    Route::get('housekeeping', [HousekeepingController::class, 'index'])->name('profile');
//    Route::get('addhousekeeping', [HousekeepingController::class, 'addhousekeeping']);//add view
//    Route::post('inserthousekeeping', [HousekeepingController::class, 'inserthousekeeping']);//store
//    Route::get('edithousekeeping/{id}', [HousekeepingController::class, 'edithousekeeping']);//edit view
//    Route::put('updatehousekeeping/{id}', [HousekeepingController::class, 'updatehousekeeping']);//store
//    Route::get('deletehousekeeping/{id}', [HousekeepingController::class, 'deletehousekeeping']);//store
//for Reservation
//    Route::get('reservation', [ReservationController::class, 'index'])->name('profile');//list
//    Route::get('addreservation', [ReservationController::class, 'addreservation']);//add view
//    Route::post('insertreservation', [ReservationController::class, 'insertreservation']);//store
//    Route::get('editreservation/{id}', [ReservationController::class, 'editreservation']);//edit view
//    Route::put('updatereservation/{id}', [ReservationController::class, 'updatereservation']);//store
//    Route::get('deletereservation/{id}', [ReservationController::class, 'deletereservation']);//delete
//    Route::get('fullcalender', [FullCalenderController::class, 'index']);
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
    Route::post('deleteRecord', [Controller::class, 'deleteRecord']);
    Route::post('checkOutThis', [ReservationController::class, 'checkOutThis']);
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/', DashboardController::class);
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
        Route::resource('employee', EmployeeController::class);

    });
