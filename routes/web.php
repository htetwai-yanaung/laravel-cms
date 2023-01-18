<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('publisher/list', [Controller::class, 'list']);
Route::get('publisher/{id}', [Controller::class, 'publisherDetails']);
Route::get('publisher/store', [Controller::class, 'store']);
Route::get('publisher/update/{id}', [Controller::class, 'update']);
Route::get('publisher/delete/{id}', [Controller::class, 'delete']);


Route::get('book/list', [Controller::class, 'bookList']);
Route::get('book/{id}', [Controller::class, 'bookDetails']);

Route::get('category/create', [Controller::class, 'createCategory']);
Route::post('category/store', [Controller::class, 'storeCategory']);

Route::get('employee/createPage', [EmployeeController::class, 'createPage']);
Route::post('employee/createEmployee', [EmployeeController::class, 'createEmployee']);
Route::get('employee/list', [EmployeeController::class, 'list']);
Route::get('employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('employee/update/{id}', [EmployeeController::class, 'updateEmployee']);
Route::get('employee/delete/{id}', [EmployeeController::class, 'deleteEmployee']);

Route::get('authors', [AuthorController::class, 'getAuthors']);
Route::post('authors', [AuthorController::class, 'storeAuthors']);
Route::get('authors/delete/{id}', [AuthorController::class, 'deleteAuthors']);
Route::get('authors/edit/{id}', [AuthorController::class, 'editAuthors']);
Route::post('authors/update/{id}', [AuthorController::class, 'updateAuthors']);
