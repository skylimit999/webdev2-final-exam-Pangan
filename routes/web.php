<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibleStudyController;
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

Route::get('/', [BibleStudyController::class, 'requestForm']);

Route::get('/bible-study-requests', function () {
    return view('bible/request-list');
});

Route::post('/bible-study-requests', [BibleStudyController::class, 'getRequests'])->name('request.list');

Route::get('/bible-study-request-form', [BibleStudyController::class, 'requestForm']);

Route::post('/bible-study-request-form', [BibleStudyController::class, 'addRequest'])->name('request.add');

Route::get('/thank-you/{param}', [BibleStudyController::class, 'thankYou']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
