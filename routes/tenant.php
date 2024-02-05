<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Tenancy\TaskController;
use App\Http\Controllers\Tenancy\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

    Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    
    ])->group(function () {
        Route::get('/', function () {
            /*
            $user = tenancy()->central(function(){
                return User::first();
                //dd($user);
            });
            return $user;
            */
            return view('tenancy.welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('tenancy.dashboard');
        })->name('dashboard');

        Route::resource('tasks', TaskController::class);
        Route::resource('posts', PostController::class);

    });

    Route::get('/file/{path}', function($path) {

        return response()->file(Storage::path($path));

    })->where('path', '.*')->name('file');

    require __DIR__ . '/auth.php';
});
