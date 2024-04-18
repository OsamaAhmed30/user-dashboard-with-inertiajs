<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('login',[LoginController::class ,'create'])->name('login');
Route::post('login',[LoginController::class ,'store']);
Route::delete('logout',[LoginController::class ,'destroy'])->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return Inertia::render('Home', [
            'name' => "osama",
            'frameworks' => [
                'laravel',
                'vue',
                'inertia'
            ]
        ]);
    });
    
    Route::get('/users', function () {
        $users = User::query()->when(Request::input('search'), function ($query, $search) {
            $query->where('name', 'Like', "%{$search}%");
        })
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
        return Inertia::render('Users/Index', ['users' => $users,'filters'=>Request::only('search'),
        'can'=>[
            'createUser'=>Auth::user()->can('create',User::class)
        ]
    ]);
    });
    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->middleware("can:create,\App\Models\User");
    Route::post('/users/create', function () {
        $request = Request::validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        User::create($request);
        return redirect('/users');
    });
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
    Route::post('/logout', function () {
        dd('log out this user');
    });
});
