<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Lk\AuthController;
use App\Http\Controllers\Lk\LogoutController;
use App\Http\Controllers\Lk\Main\BillPageController;
use App\Http\Controllers\Lk\Main\ClosedDocumentsPage;
use App\Http\Controllers\Lk\Main\MainPageController;
use App\Http\Controllers\Lk\Main\ResultPageController;
use App\Http\Controllers\Lk\Main\ResultShowPage;
use App\Http\Controllers\Lk\RegisterController;
use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index']);
Route::post('/telegram', TelegramController::class);


Route::get('/lk/auth', AuthController::class);
Route::post('/lk/auth', [AuthController::class, 'login'])->name('login');

Route::get('/lk/register', RegisterController::class)->name('register');
Route::post('/lk/register', [RegisterController::class, 'register'])->name('register_user');
Route::get('/lk/await', function () {
    return view('lk.auth.await-auth', [
        'pageInfo' => [
            'title' => 'Ожидание подтверждения',
            'description' => 'Пожалуйста, подождите, пока администратор подтвердит ваш аккаунт.'
        ]
    ]);
})->name('await-auth');


Route::middleware(['check.user.session'])->group(function () {
    Route::get('/lk/main', MainPageController::class);
    Route::get('/lk/bill', BillPageController::class);
    Route::get('/lk/result', ResultPageController::class);
    Route::get('/lk/result/{result_id}', ResultShowPage::class);
    Route::get('/lk/logout', LogoutController::class);
    Route::get('/lk/closed-documents', ClosedDocumentsPage::class);
});
