<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\ScanLog\ScanLogHarianIn;
use App\Livewire\ScanLog\ScanLogHarianOut;
use App\Livewire\ScanLog\ScanLogHarianInOut;
use App\Livewire\MyAdmin\Users\Users;
use App\Livewire\MyAdmin\Roles\Roles;
use App\Livewire\MyAdmin\Permissions\Permissions;






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
    return view('welcome');
});

Route::get('/counter', Counter::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('ScanLogHarianIn', ScanLogHarianIn::class)->middleware('auth')->name('ScanLogHarianIn');
Route::get('ScanLogHarianOut', ScanLogHarianOut::class)->middleware('auth')->name('ScanLogHarianOut');
Route::get('ScanLogHarianInOut', ScanLogHarianInOut::class)->middleware('auth')->name('ScanLogHarianInOut');


Route::middleware('auth')->group(function () {
    Route::get('/MyUsers', Users::class)->name('MyUsers');
    Route::get('/MyRoles', Roles::class)->name('MyRoles');
    Route::get('/MyPermissions', Permissions::class)->name('MyPermissions');
});

Route::middleware(['auth', 'verified', 'role:Perawat'])->group(function () {
    Route::get('/MyUsersx', Users::class)->name('MyUsers');
    Route::get('/MyRolesx', Roles::class)->name('MyRoles');
    Route::get('/MyPermissionsx', Permissions::class)->name('MyPermissions');
});



require __DIR__ . '/auth.php';
