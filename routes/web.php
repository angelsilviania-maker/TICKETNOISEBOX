<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

// Katalog & Detail Publik
Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/event/{event}', [EventController::class, 'show'])->name('events.show');

// Proses Pesanan Tiket (Checkout)
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

// Admin Dashboard & Manajemen Data
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $events = Event::latest()->get();
        $orders = Order::with('orderDetails.event')->latest()->get();
        return view('dashboard', compact('events', 'orders'));
    })->name('dashboard');

    // CRUD Event
    Route::resource('admin/events', EventController::class)->except(['index', 'show']);

    // Update Status Pesanan Tiket
    Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
});

// Profile Bawaan Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';