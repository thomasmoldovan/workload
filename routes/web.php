<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ColaboratorController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route::resource('colaborators', ColaboratorController::class, ['only' => ['index', 'create', 'edit']])->name('index', 'colaborators.index');
    Route::get('/colaborator/edit/{id}', [ColaboratorController::class, 'edit'])->name('colaborator.edit');
    Route::get('/colaborators', [ColaboratorController::class, 'index'])->name('colaborators.index');
    // Route::get('/colaborators', [ColaboratorsController::class, 'index'])->name('dashboard');

    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
