<?php

use App\Http\Controllers\Auth\AuthController;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\RevenueController as AdminRevenueController;
use App\Http\Controllers\DebtController as AdminDebtController;

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

Route::get('/login', [AuthController::class, 'login_page'])->name('login');
Route::post('/login', [AuthController::class, 'login_progress'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');

    Route::resource('users', AdminUserController::class);

    Route::resource('revenue', AdminRevenueController::class);
    Route::post('revenue/search', [AdminRevenueController::class, 'search_user'])->name('revenue.search');
    Route::get('revenue_month', [AdminRevenueController::class, 'page_month'])->name('revenue.month');
    Route::post('revenue_month', [AdminRevenueController::class, 'search_month'])->name('revenue.month');

    Route::resource('debt', AdminDebtController::class);
    Route::get('price/{debt_id}/{user_id}', [AdminDebtController::class, 'price_page'])->name('debt.price');
    Route::post('price/{debt_id}/{user_id}', [AdminDebtController::class, 'price_progress'])->name('debt.price');
    Route::get('debts/{user_id}', [AdminDebtController::class, 'debts_history'])->name('debts.history');

    Route::get('settings', function () {
        return view('admin.settings');
    })->name('settings');

    Route::get('backup', function () {
        $backup = new \App\Classes\Backup();
        $mysqlBackup = $backup->mysql([
            'host' => env('DB_HOST'),
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'dbname' => env('DB_DATABASE'),
            'file' => __DIR__ . '/../storage/app/public/backup.sql'
        ]);
        if ($mysqlBackup) {
            $transacion = new Transaction();
            $transacion->admin_id = auth('admin')->user()->id;
            $transacion->description = "Veritabanı yedeği indirildi.";
            $transacion->save();

            return \Illuminate\Support\Facades\Storage::download('public/backup.sql');
        }
    })->name('backup');

    Route::get('excel/1', [\App\Http\Controllers\Admin\ExcelController::class, 'aidat'])->name('excel.aidat');
    Route::get('excel/2', [\App\Http\Controllers\Admin\ExcelController::class, 'borc'])->name('excel.borc');

    Route::get('transactions', [AdminHomeController::class, 'transactions'])->name('transactions');
});
