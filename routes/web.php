<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\FamilyTreeController;


Route::get('/', function () {  return view('welcome'); });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/mytree/{id}', [FamilyTreeController::class, 'showTree'])->name('family-tree.mytree');
 
Route::get('/family', [FamilyTreeController::class, 'index'])->name('family-tree.index');
Route::get('/family/create', [FamilyTreeController::class, 'create'])->name('family-tree.create');
Route::get('/family/{id}/edit', [FamilyTreeController::class, 'edit'])->name('family-tree.edit');

Route::get('/family/{id}', [FamilyTreeController::class, 'show'])->name('family-tree.show');
Route::post('/family', [FamilyTreeController::class, 'store'])->name('family-tree.store');
Route::put('/family/{id}', [FamilyTreeController::class, 'update'])->name('family-tree.update');
Route::delete('/family/{id}', [FamilyTreeController::class, 'destroy'])->name('family-tree.destroy');
Route::get('/mytree/{id}', [FamilyTreeController::class, 'showTree'])->name('family-tree.mytree');
Route::get('/mytree1/{id}', [FamilyTreeController::class, 'showTree1'])->name('family-tree.mytree1');
