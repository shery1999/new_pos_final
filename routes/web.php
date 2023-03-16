<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;

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

// Route::group(['prefix' => 'add'], function () {
//     Route::get('/add_items', function () {
//         return view('views.AddItems');
//     });
//     Route::get('/add_users', function () {
//         return view('views.AddUsers');
//     });
//     Route::get('/add_customer', function () {
//         return view('views.AddCustomer');
//     });
// });



Route::get('/add_items', function () {
    return view('views.AddItems');
});
Route::get('/add_users', function () {
    return view('views.AddUsers');
});
Route::get('/add_customer', function () {
    return view('views.AddCustomer');
});
Route::get('/add_donation', function () {
    return view('views.AddDonation');
});


Route::get('/view_user', function () {
    return view('views.ViewUsers');
});
Route::get('/view_Customers', function () {
    return view('views.ViewCustomers');
});
Route::get('/view_items', function () {
    return view('views.ViewItems');
});

Route::post('/add_customer', [CustomerController::class, 'store']);
Route::post('/add_items',    [ItemController::class, 'store']);
Route::post('/add_user',     [UserController::class, 'store']);
Route::post('/add_donation', [DonationController::class, 'store']);



Route::get('/view_Customers', [CustomerController::class, 'index']);
Route::get('/view_items',    [ItemController::class, 'index']);
Route::get('/view_user',     [UserController::class, 'index']);
Route::get('/view_donation', [DonationController::class, 'index']);


Route::get('/update_customer', function () {
    return view('views.UpdateCustomers');
});

Route::get('/update_customer/{id}', [CustomerController::class, 'index1']);
Route::get('/update_item/{id}',     [ItemController::class, 'index1']);
Route::get('/update_user/{id}',     [UserController::class, 'index1']);

Route::post('/update_customer/{id}', [CustomerController::class, 'update']);
Route::post('/update_item/{id}',     [ItemController::class, 'update']);
Route::post('/update_user/{id}',     [UserController::class, 'update']);

// sale
Route::get('/sale', [CustomerController::class, 'index2']);
Route::get('/sale/{id}', [ItemController::class, 'index2']);
Route::post('/sale/{id}/order', [OrderController::class, 'store'])->name('updateSale');

Route::get('/home1', [ItemController::class, 'index3']);
Route::get('/print_data', [CustomerController::class, 'index4']);

Route::get('/print_order/{id}', [SaleController::class, 'index']);

Route::get('/customers_history/{id}', [CustomerController::class, 'index5']);
Route::get('/view_sales', [SaleController::class, 'index2']);


Route::get('/print', function () {
    return view('views.Print');
});

Route::get('/customers_history', function () {
    return view('views.ViewCustomerHistory');
});

Route::post('/view_Customers', [CustomerController::class, 'UpdateStatus'])->name('view_Customers.post');
Route::post('/view_items', [ItemController::class, 'UpdateStatus'])->name('view_items.post');
Route::get('/view_Customers_table', [ItemController::class, 'index'])->name('view_Customers_table.get');

Route::get('/', [DonationController::class, 'index2']);
