<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Organ\OrganController;
use App\Http\Controllers\ProblemClientController;
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


Route::get('page/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ["auth:web"]], function () {

    Route::get('/', function () { return view('home'); })->name('homePage');
    Route::group(['middleware' => ["admin"]], function () {

        Route::get('user/list', [UserController::class, 'list'])->name('listUser');
        Route::get('add/user', [UserController::class, 'addUserPage'])->name('addUserPage');
        Route::post('user/add', [UserController::class, 'add'])->name('addUser');
        Route::get('user/get/{id}', [UserController::class, 'get'])->name('getUser');
        Route::put('user/update/{id}', [UserController::class, 'update'])->name('updateUser');
        Route::post('user/delete/{id}', [UserController::class, 'delete'])->name('deleteUser');

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
    });

    Route::get('client/list', [ClientController::class, 'list'])->name('listClient');
    Route::get('add/client', [ClientController::class, 'addClientPage'])->name('addClientPage');
    Route::post('client/add', [ClientController::class, 'add'])->name('addClient');
    Route::get('client/get/{id}', [ClientController::class, 'get'])->name('getClient');
    Route::put('client/update/{id}', [ClientController::class, 'update'])->name('updateClient');
    Route::post('client/delete/{id}', [ClientController::class, 'delete'])->name('deleteClient');
    Route::post('client/check/{mg_ip}', [ClientController::class, 'checkMgIp'])->name('checkMgIp');
    Route::get('exel/download', [ClientController::class, 'exelDownload'])->name('exelDownload');

    Route::get('problem/client/list', [ProblemClientController::class, 'list'])->name('listProblemClient');
    Route::get('problem/add/client/{client_id}', [ProblemClientController::class, 'addProblemClientPage'])->name('addProblemClientPage');
    Route::post('problem/client/add', [ProblemClientController::class, 'add'])->name('addProblemClient');
    Route::get('problem/client/get/{id}', [ProblemClientController::class, 'get'])->name('getProblemClient');
    Route::post('problem/client/update/{id}', [ProblemClientController::class, 'update'])->name('updateProblemClient');
    Route::post('problem/client/delete/{id}', [ProblemClientController::class, 'delete'])->name('deleteProblemClient');

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
