<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;

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

// Root page with list of questions

Route::get('/', [PagesController::class, 'indexPage']);

// Single question page

Route::get('/question/{id}', [PagesController::class, 'questionPage']);

// Insert question route

Route::post('/question/add', [QuestionsController::class, 'insertQuestion']);

// Insert answer to a question route

Route::post('/question/{id}/answer', [AnswersController::class, 'insertAnswer']);
