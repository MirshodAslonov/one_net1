<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Organ\OrganController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('home');
});


Route::get('page/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('login', [AuthController::class, 'login'])->name('login');

//Route::middleware(['auth'])->group( function () {

    Route::post('users/add', [UserController::class, 'addUser'])->name('addUser');
    Route::post('users/search', [UserController::class, 'userSearch'])->name('userSearch');

    Route::get('branch/list', [BranchController::class, 'list'])->name('listBranch');
    Route::get('add/branch', [BranchController::class, 'addBranchPage'])->name('addBranchPage');
    Route::post('branch/add', [BranchController::class, 'add'])->name('addBranch');
    Route::get('branch/get/{id}', [BranchController::class, 'get'])->name('getBranch');
    Route::put('branch/update/{id}', [BranchController::class, 'update'])->name('updateBranch');
    Route::post('branch/delete/{id}', [BranchController::class, 'delete'])->name('deleteBranch');

    Route::get('organ/list', [OrganController::class, 'list'])->name('listOrgan');
    Route::get('add/organ', [OrganController::class, 'addOrganPage'])->name('addOrganPage');
    Route::post('organ/add', [OrganController::class, 'add'])->name('addOrgan');
    Route::get('organ/get/{id}', [OrganController::class, 'get'])->name('getOrgan');
    Route::put('organ/update/{id}', [OrganController::class, 'update'])->name('updateOrgan');
    Route::post('organ/delete/{id}', [OrganController::class, 'delete'])->name('deleteOrgan');

    Route::get('client/list', [ClientController::class, 'list'])->name('listClient');
    Route::get('add/client', [ClientController::class, 'addClientPage'])->name('addClientPage');
    Route::post('client/add', [ClientController::class, 'add'])->name('addClient');
    Route::get('client/get/{id}', [ClientController::class, 'get'])->name('getClient');
    Route::put('client/update/{id}', [ClientController::class, 'update'])->name('updateClient');
    Route::post('client/delete/{id}', [ClientController::class, 'delete'])->name('deleteClient');
    Route::post('client/check/{mg_ip}', [ClientController::class, 'checkMgIp'])->name('checkMgIp');

    Route::get('exel/download', [ClientController::class, 'exelDownload'])->name('exelDownload');
//});
