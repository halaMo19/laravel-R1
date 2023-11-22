<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ExcarController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
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
// Route::get('test', function(){
//     return 'Welcome to my first route';
// });
// Route::get('user/{name}/{age}', function($name,$age){
//     return 'the user name is:'.$name  .'and age is:' . $age;
// });

// Route::get('user/{name}/{age?}', function($name,$age=0){

//     $msg ='the username is:'.$name;
//     if($age ==0){
//         return $msg;
//     } else{
//         return $msg.'and the age is:'.$age ;
//     }

// }) ->where(['age'=>'[0-9]+']);

// })->whereNumber('age');
// })->whereAlpha('name');
// }) ->where(['age'=>'[0-9]+','name'=>'[a-zA-Z]+']);
// })->whereIn('name',['Nore','ali']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('product')->group(function() {
    
//     Route::get('/', function () {

//         return 'products home page';
//     });

//     Route::get('laptop', function () {

//         return 'laptop page';
//     });
//     Route::get('camera', function () {
//         return 'camera page';
//     });
//     Route::get('projector', function () {
//         return 'projector page';
//     });

// });


Route::get('About', function(){
    return 'HELLO to my first route';
});

Route::get('Contact us', function(){
    return ' HELLO How can we help you?';
});

Route::prefix('Support')->group(function() {
    
        Route::get('/', function () {
    
            return 'Support home page';
        });
    
        Route::get('chat', function () {
    
            return 'chat page';
        });
        Route::get('call', function () {
            return 'call page';
        });
        Route::get('Ticket', function () {
            return 'Ticket page';
        });
    
    });

    
    

    // Route::prefix('Training')->group(function() {
    
    //     Route::get('/', function () {
    
    //         return 'Training home page';
    //     });
    
    //     Route::get('HR', function () {
    
    //         return 'HR page';
    //     });
    //     Route::get('ICT', function () {
    //         return 'ICT page';
    //     });
    //     Route::get('Marketing', function () {
    //         return 'Marketing page';
    //     });
    //     Route::get('Logistics', function () {
    //                 return 'Logistics page';
    //         });
    

    //        Route::fallback( function () {
    //             return redirect('/');

    // });


    Route::get('cv', function () {
        return  view('cv');
});
Route::get('login', function () {
    return  view('login');
});

// Route::get('cv', function () {
//     return  view('cv');
// });
Route::post('receive', function () {
    return  'Data received';
})->name('receive');

Route::get('test1', [ExampleController::class,'test1']);

Route::get('car', function () {
    return  view('car');
});
Route::post('test', function () {
    return  'Data test';
})->name('test1');
Route::get('car', [ExcarController::class,'car']);

// Route::post('addcar', [ExcarController::class,'addcar'])->name('car');
// Route::get('addcar', [CarController::class,'store']);

Route::get('AddNEWS', [NewsController::class,'create']);
Route::post('StoreNEWS', [NewsController::class,'store'])->name('NEWS');

Route::get('AddCAR', [CarController::class,'create']);
Route::post('StoreCAR', [CarController::class, 'store'])->name('car');