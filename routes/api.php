<?php

use App\Http\Controllers\Api\chiama;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('projects', [chiama::class, 'index']);
Route::get('projects/{slug}', [chiama::class, 'show']);