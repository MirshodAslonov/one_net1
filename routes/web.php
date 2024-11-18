<?php

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
    return view('welcome');
});

Route::get('add', function () {
    return view('user');
})->name('addUserPage');


//Route::get('list/branch', function () {
//    return view('list_branch');
//})->name('listBranchPage');
//
//Route::get('list/organ', function () {
//    return view('list_organ');
//})->name('listOrganPage');
//
//Route::get('list/client', function () {
//    return view('client_list');
//})->name('listClientPage');


Route::get('add/client', function () {
    return view('Client.add');
})->name('addClientPage');

Route::get('add/branch', function () {
    return view('Branch.add');
})->name('addBranchPage');

Route::get('add/organ', function () {
    return view('Organ.add');
})->name('addOrganPage');


//Route::get('get/client', function () {
//    return view('client_get');
//})->name('getClientPage');
//
//Route::get('get/branch', function () {
//    return view('branch_get');
//})->name('getBranchPage');
//
//Route::get('get/organ', function () {
//    return view('organ_get');
//})->name('getOrganPage');

Route::post('users/add', [UserController::class, 'addUser'])->name('addUser');
Route::post('users/search', [UserController::class, 'userSearch'])->name('userSearch');

Route::get('branch/list', [BranchController::class, 'list'])->name('listBranch');
Route::post('branch/add', [BranchController::class, 'add'])->name('addBranch');
Route::get('branch/get/{id}', [BranchController::class, 'get'])->name('getBranch');
Route::put('branch/update/{id}', [BranchController::class, 'update'])->name('updateBranch');
Route::post('branch/delete/{id}', [BranchController::class, 'delete'])->name('deleteBranch');

Route::get('organ/list', [OrganController::class, 'list'])->name('listOrgan');
Route::post('organ/add', [OrganController::class, 'add'])->name('addOrgan');
Route::get('organ/get/{id}', [OrganController::class, 'get'])->name('getOrgan');
Route::put('organ/update/{id}', [OrganController::class, 'update'])->name('updateOrgan');
Route::post('organ/delete/{id}', [OrganController::class, 'delete'])->name('deleteOrgan');

Route::get('client/list', [ClientController::class, 'list'])->name('listClient');
Route::post('client/add', [ClientController::class, 'add'])->name('addClient');
Route::get('client/get/{id}', [ClientController::class, 'get'])->name('getClient');
Route::put('client/update/{id}', [ClientController::class, 'update'])->name('updateClient');
Route::post('client/delete/{id}', [ClientController::class, 'delete'])->name('deleteClient');

