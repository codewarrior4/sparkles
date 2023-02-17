<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\LaundryItemController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

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


// Auth routes for customer
Route::get('/customer/register', [AuthController::class,'register'])->name('customer.register');
Route::post('/customer/register', [AuthController::class,'store'])->name('customer.store');
Route::get('/customer/login', [AuthController::class,'login'])->name('customer.login');
Route::post('/customer/login', [AuthController::class,'authenticate'])->name('customer.authenticate');
Route::get('/customer/verify/{token}', [AuthController::class,'verify'])->name('customer.verify');
Route::get('/customer/password/reset',[AuthController::class,'resetPassword'])->name('customer.password.reset');
Route::post('/customer/password/reset', [AuthController::class,'sendResetLink'])->name('customer.password.sendResetLink');
Route::get('/customer/reset/{token}', [AuthController::class,'updatePassword'])->name('customer.password.update');
Route::post('/customer/password/update/', [AuthController::class,'savePassword'])->name('customer.password.save');
Route::get('/customer/logout', [AuthController::class,'logout'])->name('customer.logout');

// Customer routes with middleware
Route::group(['middleware' => ['customer']], function () {
    Route::get('/customer', [AuthController::class,'dashboard'])->name('customer.dashboard');
    Route::get('/customer/dashboard', [AuthController::class,'dashboard'])->name('customer.dashboard');
    Route::get('/customer/profile', [AuthController::class,'profile'])->name('customer.profile');
    Route::post('/customer/profile', [AuthController::class,'updateProfile'])->name('customer.updateProfile');
    Route::post('/customer/password', [AuthController::class,'changepassword'])->name('customer.updatePassword');

    // notifications
    Route::get('/customer/notifications', [NotificationsController::class,'index'])->name('customer.notifications');
    Route::get('/customer/notification/{id}', [NotificationsController::class,'show'])->name('customer.notifications.show');
    Route::get('/customer/notifications/clear', [NotificationsController::class,'markAsRead'])->name('customer.notifications.markAsRead');

    // Laundry
    Route::get('/customer/laundry', [LaundryController::class,'laundry'])->name('customer.laundry');
    Route::post('/customer/laundry/store', [LaundryController::class,'store'])->name('customer.laundry.store');
    Route::post('/customer/laundry/update', [LaundryController::class,'update'])->name('customer.laundry.update');
    Route::get('/customer/laundry/delete/{id}',[LaundryController::class,'delete'])->name('customer.delete-laundry');
    Route::get('customer/laundry/history', [LaundryController::class,'laundry_history'])->name('customer.laundry.history');

    Route::get('/customer/laundry/track/', [LaundryController::class,'track'])->name('customer.laundry.track');
    Route::post('/customer/laundry/track', [LaundryController::class,'trackRef'])->name('customer.laundry.trackRef');
    Route::get('/customer/order/{id}', [LaundryController::class,'laundry_summary'])->name('customer.order');


    Route::post('customer/pay', [PaystackController::class, 'redirectToGateway'])->name('customer.pay');
    Route::get('customer/payment/callback', [PaystackController::class, 'handleGatewayCallback']);

    // Packages 
    Route::view('/customer/packages', 'customer.packages')->name('customer.packages');


    // tickets
    Route::get('/customer/ticket/create', [TicketsController::class,'createTicket'])->name('customer.ticket.create');
    Route::post('/customer/ticket/store', [TicketsController::class,'storeTicket'])->name('customer.ticket.store');
    Route::get('/customer/tickets', [TicketsController::class,'tickets'])->name('customer.tickets');
    Route::get('/customer/ticket/{id}', [TicketsController::class,'ticket_summary'])->name('customer.ticket');
    Route::get('/customer/ticket/close/{id}', [TicketsController::class,'closeTicket'])->name('customer.ticket.close');
    Route::get('/customer/ticket/delete/{id}', [TicketsController::class,'deleteTicket'])->name('customer.ticket.delete');

    Route::post('/customer/ticket/reply', [TicketsController::class,'replyTicket'])->name('customer.ticket.reply');;




});


// Auth routes for admin
Route::get('/admin/login', [AuthController::class,'adminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class,'adminAuthenticate'])->name('admin.authenticate');
Route::get('/admin/logout', [AuthController::class,'adminLogout'])->name('admin.logout');

// Admin routes with middleware
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [AuthController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AuthController::class,'adminDashboard'])->name('admin.dashboard');

    // laundry Items
    Route::get('/admin/laundry-items/create', [LaundryItemController::class,'create'])->name('admin.laundry-create');
    Route::get('/admin/laundry-items', [LaundryItemController::class,'index'])->name('admin.laundry-items');
    Route::post('/admin/laundry-items', [LaundryItemController::class,'store'])->name('admin.laundry-items.store');
    Route::get('/admin/laundry-items/{id}/edit', [LaundryItemController::class,'edit'])->name('admin.laundry-items.edit');
    Route::post('/admin/laundry-items/update', [LaundryItemController::class,'update'])->name('admin.laundry-items.update');
    Route::get('/admin/laundry-items/{id}/delete',[LaundryItemController::class,'delete'])->name('admin.delete-laundry-item');


    // orders
    Route::get('/admin/orders', [OrderController::class,'index'])->name('admin.orders');
    Route::get('/admin/order/{id}', [OrderController::class,'show'])->name('admin.order');
    Route::post('/admin/order/update',[OrderController::class,'update'])->name('admin.update-order');

    // customers
    Route::get('/admin/customers', [CustomerController::class,'index'])->name('admin.customers');
    Route::get('/admin/customer/{id}', [CustomerController::class,'show'])->name('admin.customer');
    Route::post('/admin/customer/update',[CustomerController::class,'update'])->name('admin.update-customer');

    // feedback
    Route::get('/admin/feedback', [FeedbackController::class,'index'])->name('admin.feedback');
    Route::get('/admin/feedback/{id}', [FeedbackController::class,'show'])->name('admin.feedback.show');

    // ticket
    Route::get('/admin/tickets', [TicketsController::class,'index'])->name('admin.tickets');
    Route::get('/admin/ticket/{id}', [TicketsController::class,'show'])->name('admin.ticket');
    Route::post('/admin/ticket/update',[TicketsController::class,'update'])->name('admin.update-ticket');




});

