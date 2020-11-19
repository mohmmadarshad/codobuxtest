<?php

use App\Http\Controllers\codobux;
use App\Models\userModel;
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
    $data=userModel::all();
    return view('welcome',[
        'data'=>$data
    ]);
});

// Route::match(['get', 'post'], '/form-submit', )->name('formSubmit');

Route::match(['get', 'post'], 'form-submit', [codobux::class, 'formsubmit'])->name('formSubmit');
Route::match(['get', 'post'], 'form-edit', [codobux::class, 'formEdit'])->name('formEdit');
