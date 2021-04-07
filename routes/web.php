<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\PostComponent;
use App\Http\Livewire\Admin\UserComponent;
use App\Http\Livewire\Admin\StudentComponent;
use App\Http\Livewire\Admin\Students;
Route::get('/', function () {
    return view('welcome');
}); 

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// For User or Customer

Route::middleware(['auth:sanctum','verified'])->group(function(){
	Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

// ForAdmin
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
	Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
	Route::get('/post',PostComponent::class)->name('post.view');
	Route::get('/user',UserComponent::class)->name('user.view');
	// ========Student=========
	Route::get('/students',Students::class)->name('students.view');
	Route::get('/student',StudentComponent::class)->name('student.view');
	Route::get('/student/add',StudentComponent::class)->name('student.add');
	Route::get('/student/edit/{id}',StudentComponent::class)->name('student.edit');
	});