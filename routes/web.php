<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CatalogueController;
use App\Http\Livewire\Registration;
use App\Http\Controllers\Auth\LoginController as AuthAdmin;;



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

// HealthCheck Routes
Route::get('/health-check', function(){
    $health = [
        'status' => "Healthy :)",
        'timestamp' => date("Y-m-d H:i:s"),
    ];
    return response()->json($health, 200);
})->name('health-check');

// Get tested Vue JS
Route::get('/my-vue{any}', function(){
    return view('layouts.app-vue');
})->name('vue-test')->where('any', '.*');

// Authentication Routes
// Auth::routes();
// Route::get('/login-admin', [AuthAdmin::class, 'attemptLogin'])->name('login');;


// Home and Root Routes
// Route::get('/', 'HomeController@index')->name('root');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

// Routes for User Management
Route::group(['namespace' => 'UserManagement'], function () {

    Route::group(['prefix' => 'users',], function () {
        Route::get('/', 'UserController@index')->name('show.user');
        Route::post('/', 'UserController@store')->name('store.user');
        Route::get('/edit/{id}', 'UserController@edit')->name('edit.user');
        Route::get('/get/{id}', 'UserController@show')->name('get.user');
        Route::put('/update/{id}', 'UserController@update')->name('update.user');
        Route::get('/datatable', 'UserController@anyData')->name('show.user-datatable');
        Route::post('/user-role', 'UserController@giveRoleToUser')->name('store.user-role');
        Route::get('/list', 'UserController@list')->name('list.user');
        Route::delete('delete/{id}', 'UserController@destroy')->name('destroy.user');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'RoleAndPermissionController@index')->name('show.role')->middleware('permission:ROLES_AND_PERMISSIONS');
        Route::post('/', 'RoleAndPermissionController@store')->name('store.role');
        Route::get('/list', 'RoleAndPermissionController@list')->name('list.role');
        Route::get('/datatable', 'RoleAndPermissionController@anyData')->name('show.role-datatable');
        Route::put('/{id}', 'RoleAndPermissionController@update')->name('update.role');
        Route::delete('/{id}', 'RoleAndPermissionController@destroy')->name('destroy.role');
    });

    Route::group(['prefix' => 'permission',], function () {
        Route::get('/', 'RoleAndPermissionController@getPermission')->name('list.permission');
        Route::get('/role/{id}', 'RoleAndPermissionController@getPermissionByRole')->name('list.permissions-by-role');
        Route::post('/role', 'RoleAndPermissionController@givePermissionToRole')->name('store.permission-role');
        Route::put('/revoke/{id}', 'RoleAndPermissionController@revokePermissionFromRole')->name('revoke.permission');
    });
});

// Content Management System
Route::group(['namespace' => 'ContentManagementSystem', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'service-menu',], function () {
        Route::get('/', 'ServiceMenuController@index')->name('list.servicemenu')->middleware('permission:SERVICE_MENU');
        Route::get('/list', 'ServiceMenuController@list')->name('select2.servicemenu')->middleware('permission:PRODUCT');
        Route::get('/datatable', 'ServiceMenuController@anyData')->name('datatable.servicemenu')->middleware('permission:SERVICE_MENU');
        Route::get('/{id}', 'ServiceMenuController@show')->name('get.servicemenu')->middleware('permission:SERVICE_MENU');
        Route::post('/', 'ServiceMenuController@store')->name('store.servicemenu')->middleware('permission:ADD_SERVICE_MENU');
        Route::put('/{id}', 'ServiceMenuController@update')->name('update.servicemenu')->middleware('permission:UPDATE_SERVICE_MENU');
        Route::delete('/{id}', 'ServiceMenuController@destroy')->name('destroy.servicemenu')->middleware('permission:DELETE_SERVICE_MENU');
    });

    Route::group(['prefix' => 'backoffice/product', 'middleware' => ['auth']], function () {
        Route::get('/{serviceMenuID}/list', 'ProductController@index')->name('list.product')->middleware('permission:PRODUCT');
        Route::get('/list', 'ProductController@list')->name('select2.product')->middleware('permission:PRODUCT');
        Route::get('/{serviceMenuID}/datatable', 'ProductController@anyData')->name('datatable.product')->middleware('permission:PRODUCT');
        Route::get('/{id}', 'ProductController@show')->name('get.product')->middleware('permission:PRODUCT');
        Route::post('/', 'ProductController@store')->name('store.product')->middleware('permission:ADD_PRODUCT');
        Route::put('/{id}', 'ProductController@update')->name('update.product')->middleware('permission:UPDATE_PRODUCT');
        Route::delete('/{id}', 'ProductController@destroy')->name('destroy.product')->middleware('permission:DELETE_PRODUCT');
    });

    Route::group(['prefix' => 'backoffice/home', 'middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@index')->name('list.home')->middleware('permission:HOME');
        Route::get('/datatable', 'HomeController@anyData')->name('datatable.home')->middleware('permission:HOME');
        Route::get('/{id}', 'HomeController@show')->name('get.home')->middleware('permission:HOME');
        Route::post('/', 'HomeController@store')->name('store.home')->middleware('permission:ADD_HOME');
        Route::put('/{id}', 'HomeController@update')->name('update.home')->middleware('permission:UPDATE_HOME');
        Route::delete('/{id}', 'HomeController@destroy')->name('destroy.home')->middleware('permission:DELETE_HOME');
    });

    Route::group(['prefix' => 'backoffice/sub-home', 'middleware' => ['auth']], function () {
        Route::get('/{moduleHome}/list', 'SubHomeController@index')->name('list.subhome');
        Route::get('/{moduelHome}/datatable', 'SubHomeController@anyData')->name('datatable.subhome');
        Route::get('/{id}', 'SubHomeController@show')->name('get.subhome');
        Route::get('/{id}/detail', 'SubHomeController@detail')->name('detail.subhome')->middleware('permission:DETAIL_SUB_HOME');
        Route::post('/', 'SubHomeController@store')->name('store.subhome');
        Route::put('/{id}', 'SubHomeController@update')->name('update.subhome');
        Route::delete('/{id}', 'SubHomeController@destroy')->name('destroy.subhome');
    });

    Route::group(['prefix' => 'backoffice/transaction', 'middleware' => ['auth']], function () {
        Route::get('/', 'TransactionController@index')->name('list.transaction')->middleware('permission:TRANSACTION');
        Route::get('/datatable', 'TransactionController@anyData')->name('datatable.transaction')->middleware('permission:TRANSACTION');
        Route::get('/{id}', 'TransactionController@show')->name('get.transaction')->middleware('permission:TRANSACTION');
        Route::post('/', 'TransactionController@store')->name('store.transaction')->middleware('permission:ADD_TRANSACTION');
        Route::put('/{id}', 'TransactionController@update')->name('update.transaction')->middleware('permission:UPDATE_TRANSACTION');
        Route::delete('/{id}', 'TransactionController@cancel')->name('cancel.transaction')->middleware('permission:CANCEL_TRANSACTION');
    });

    Route::group(['prefix' => 'backoffice/category', 'middleware' => ['auth']], function () {
        Route::get('/', 'CategoryController@index')->name('list.category')->middleware('permission:CATEGORY');
        Route::get('/list', 'CategoryController@list')->name('select2.category')->middleware('permission:CATEGORY');
        Route::get('/datatable', 'CategoryController@anyData')->name('datatable.category')->middleware('permission:CATEGORY');
        Route::get('/{id}', 'CategoryController@show')->name('get.category')->middleware('permission:CATEGORY');
        Route::post('/', 'CategoryController@store')->name('store.category')->middleware('permission:ADD_CATEGORY');
        Route::put('/{id}', 'CategoryController@update')->name('update.category')->middleware('permission:UPDATE_CATEGORY');
        Route::delete('/{id}', 'CategoryController@destroy')->name('destroy.category')->middleware('permission:DELETE_CATEGORY');
    });
});

// Homepage Sobat Bangun
Route::get('/', [HomeController::class, 'index'])->name('home');;
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);
Route::get('/blog/{url}', [BlogController::class, 'detail']);

// Authentication
Route::get('/user/login', [AuthController::class, 'index'])  ;
Route::get('/user/registration', [AuthController::class, 'registration']);
Route::get('/user/forgot_password', [AuthController::class, 'forgot_password']);   
Route::get('/login2', [AuthController::class, 'index'])  ;
// Route::get('/registration', [AuthController::class, 'registration']);
// Route::post('/registration', [AuthController::class, 'save_registration']);
Route::get('/forgot_password', [AuthController::class, 'forgot_password']);
Route::middleware(['auth:sanctum', 'verified','customers_check'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/registration', [Registration::class, 'render']);

Route::get('/registration', function () {
    return view('frontend.register');
});
Route::get('/kami-kerjakan', function () {
    return view('frontend.kamikerjakan');
});


Route::get('/account_settings', function () {
    return view('frontend.account-settings');
});

Route::get('/custom_design/{id_service}/{id_product}', function ($id_service,$id_product) {
    return view('frontend.custom-design',["id_service"=>$id_service,"id_product"=>$id_product]);
});

Route::get('/dasboard_customers', function () {
    return view('frontend.dashboard');
})->name('dasboard_customers');;
Route::get('/catalogue/{code}', function ($code) {
    if ($code == "bangun_rumah") {
        return view('frontend.bangun_rumah',["code" => $code]);
    } else {

    }
    return view('frontend.catalogue',["code" => $code]);
});

// Route::get('catalogue/{code}', [CatalogueController::class, 'index'])->name('home.catalogue');

// Route::group(['middleware'=>'guest'], function () {
//     Route::livewire('/login', 'login')->name('login');
//     Route::livewire('/register', 'register');
// });