<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;

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

Route::get('test', function(){
    return 'Welcome to my first route';
});

Route::get ('user/{name}/{age?}',function($name,$age=0){
    $msg = 'the username is : ' . $name;
    if($age > 0){
        $msg .= ' and the age is: '. $age ;
    }
    return $msg;
})->whereIn('name',['Peter','Tony']);

Route::prefix('product')->group(function(){

    Route::get('/',function(){
        return 'Products home page';
    });

    Route::get('laptop',function(){
        return 'Laptop page';
    });

    Route::get('camera',function(){
        return 'Camera page';
    });

    Route::get('projector',function(){
        return 'Projectors page';
    });
});

// Route::fallback(function(){
//     return redirect('/');
// });



// Route::get('login',function(){
//     return view('login');
// });

// Route::post('receive',function(){
//     return 'Data received';
// })->name('receive');

Route::get('login',[ExampleController::class, 'login']);
Route::get('place',[ExampleController::class, 'place']);
Route::get('blog',[ExampleController::class, 'blog']);
Route::get('blog1',[ExampleController::class, 'blog1']);

Route::post('receive',[ExampleController::class, 'received'])->name('receive');

Route::get('test1',[ExampleController::class, 'test1']);

Route::get('session',[ExampleController::class, 'mySession']);


Route::get('showUpload',[ExampleController::class, 'showUpload']);

Route::post('upload',[ExampleController::class, 'upload'])->name('upload');

// Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');

// Route::get('addCar',[CarController::class, 'create']);

Route::get('trashed',[CarController::class, 'trashed']);
Route::get('restoreCar/{id}',[CarController::class, 'restore']);

Route::get('cars', [CarController::class, 'index'])->middleware('verified');

Route::get('deleteCar/{id}', [CarController::class, 'destroy']);

Route::get('carDetails/{id}', [CarController::class, 'show'])->name('carDetails');

Route::get('editCar/{id}', [CarController::class, 'edit']);
Route::put('updateCar/{id}', [CarController::class, 'update'])->name('updateCar');

Route::get('placeIndex',[PlaceController::class, 'index']);
Route::get('addPlace',[PlaceController::class, 'create']);
Route::post('storePlace',[PlaceController::class, 'store'])->name('storePlace');



// ADD PLASE
Route::get('show-place/{id}', [PlaceController::class, 'show'])->name('showPlace');
Route::get('delete-place/{id}', [PlaceController::class, 'delete'])->name('deletePlace');
Route::get('trashed-places', [PlaceController::class, 'getTrashed']);
Route::get('trashed-places', [PlaceController::class, 'getTrashed']);
Route::get('restore-place/{id}', [PlaceController::class, 'restore'])->name('restorePlace');
Route::get('destroy /{id}', [PlaceController::class, 'delete'])->name('deletePlace');;
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// <CONTACT>

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('contact',[ContactController::class, 'contact']);
        Route::post('receiveContact',[ContactController::class, 'receiveContact'])->name('receiveContact');
        Route::get('addCar',[CarController::class, 'create']);
        Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');


    });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('contact-form',[ ContactController::class, 'email'])->name('contact-form');
        Route::post('sbject', [ContactController::class, 'message'])->name('sbject');
        Route::get('cv',function(){
            return view('cv');
        });
    });

    // Route::get('addCar',function(){
    //     return view('addCar');
    // });

    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
        // Route::get('create-contact-us',[ContactUSController::class, 'create']);
        // Route::post('send-message',[ContactUSController::class, 'send'])->name('messageSent');
    
        // Route::get('add-car', [CarController::class, 'create']);
        // Route::post('car-added', [CarController::class, 'store'])->name('car-added');
    });
    
    