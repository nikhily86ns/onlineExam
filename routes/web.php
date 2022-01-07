<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------Admin Routes--------------------*/

Route::middleware(['isAdmin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'adminLogin'])->name('admin.dashboard');

    Route::get('/subject', [App\Http\Controllers\QuestionController::class, 'subject'])->name('admin.subject');
    Route::post('/create-subject', [App\Http\Controllers\QuestionController::class, 'createSubject'])->name('admin.createSubject');
    Route::get('/delete-subject/{id}', [App\Http\Controllers\QuestionController::class, 'deleteSubject'])->name('admin.deleteSubject');

    Route::get('/question', [App\Http\Controllers\QuestionController::class, 'paper'])->name('admin.paper');
    Route::post('/create-question', [App\Http\Controllers\QuestionController::class, 'createQuestion'])->name('admin.createQuestion');

    Route::get('/question-paper', [App\Http\Controllers\QuestionController::class, 'question'])->name('admin.question');
    Route::get('/view-question-paper/{id}', [App\Http\Controllers\QuestionController::class, 'viewquestion'])->name('admin.viewquestion');
    Route::delete('/delete-question/{id}', [App\Http\Controllers\QuestionController::class, 'deleteQuestion'])->name('admin.deleteQuestion');
    Route::get('/edit-question/{id}', [App\Http\Controllers\QuestionController::class, 'editQuestion'])->name('admin.editQuestion');
    Route::post('/update-question', [App\Http\Controllers\QuestionController::class, 'updateQuestion'])->name('admin.updateQuestion');

    Route::get('/view-result', [App\Http\Controllers\QuestionController::class, 'viewResult'])->name('admin.viewResult');
    Route::get('/view-result-detail/{id}', [App\Http\Controllers\QuestionController::class, 'viewResultDetail'])->name('admin.viewResultDetail');


});

/*------------------------User Routes--------------------*/

Route::middleware(['auth'])->group(function () {
    
    Route::get('/view-exam', [App\Http\Controllers\FrontEndController::class, 'viewExam'])->name('viewExam');
    Route::get('/join-exam/{id}', [App\Http\Controllers\FrontEndController::class, 'joinExam'])->name('joinExam');
    Route::post('/submit-exam', [App\Http\Controllers\FrontEndController::class, 'submitExam'])->name('submitExam');

});