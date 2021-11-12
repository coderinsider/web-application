<?php
use App\Http\Controllers;
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


Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function(){
    Route::get('/dashboard','AdminDashBoardController@admindashboard_mm')->name('admindashboard_mm');
    Route::get('/users-list','AdminDashBoardController@adminuserslist_mm');
    Route::get('/users-list/new','AdminDashBoardController@adminusernew_mm')->name('adminusernew_mm');
    Route::get('/users-list/edit/{id}','AdminDashBoardController@adminuseredit_mm')->name('adminuseredit_mm');
    Route::get('/adsbanner', 'AdminDashBoardController@adsbanner')->name('adsbanner');
    Route::get('/adsbanner/new', 'AdminDashBoardController@adsbannernew')->name('adsbannernew');

    Route::get('/couponcards', 'AdminDashBoardController@couponcards')->name('couponcards');
    Route::get('/couponcards/new', 'AdminDashBoardController@couponcardsnew')->name('couponcardsnew');
    Route::post('/couponcards/new', 'AdminDashBoardController@couponcardsnew')->name('couponcardsnewcreate');
    Route::get('/couponcards/edit/{id}', 'AdminDashBoardController@couponcardsedit')->name('couponcardsedit');
    Route::post('/couponcards/new/{id}', 'AdminDashBoardController@couponcardsedit')->name('couponcardseditcreate');
    Route::post('/couponcards/delete/{id}', 'AdminDashBoardController@couponcardsdelete')->name('couponcardsdelete');

    Route::get('/productcategory', 'AdminDashBoardController@productcategory')->name('productcategory');
    Route::get('/productcategory/new', 'AdminDashBoardController@productcategorynew')->name('productcategorynew');
    Route::post('/productcategory/new', 'AdminDashBoardController@productcategorynew')->name('productcategorynewcreate');
    Route::get('/productcategory/edit/{id}', 'AdminDashBoardController@productcategoryedit')->name('productcategoryedit');
    Route::post('/productcategory/edit/{id}', 'AdminDashBoardController@productcategoryedit')->name('productcategoryeditcreate');
    Route::post('/productcategory/delete/{id}', 'AdminDashBoardController@productcategorydelete')->name('productcategorydelete');

    Route::get('/product-sec-category', 'AdminDashBoardController@productseccategory')->name('productseccategory');
    Route::get('/product-sec-category/new', 'AdminDashBoardController@productseccategorynew')->name('productseccategorynew');
    Route::post('/product-sec-category/new', 'AdminDashBoardController@productseccategorynew')->name('productseccategorynewcreate');
    Route::get('/product-sec-category/edit/{id}', 'AdminDashBoardController@productseccategoryedit')->name('productseccategoryedit');
    Route::post('/product-sec-category/edit/{id}', 'AdminDashBoardController@productseccategoryedit')->name('productseccategoryeditcreate');
    Route::post('/product-sec-category/delete/{id}', 'AdminDashBoardController@productseccategorydelete')->name('productseccategorydelete');

    Route::get('/product-thi-category', 'AdminDashBoardController@productthicategory')->name('productthicategory');
    Route::get('/product-thi-category/new', 'AdminDashBoardController@productthicategorynew')->name('productthicategorynew');
    Route::post('/product-thi-category/new', 'AdminDashBoardController@productthicategorynew')->name('productthicategorynewcreate');
    Route::get('/product-thi-category/edit/{id}', 'AdminDashBoardController@productthicategoryedit')->name('productthicategoryedit');
    Route::post('/product-thi-category/edit/{id}', 'AdminDashBoardController@productthicategoryedit')->name('productthicategoryeditcreate');
    Route::post('/product-thi-category/delete/{id}', 'AdminDashBoardController@productthicategorydelete')->name('productthicategorydelete');

    Route::get('/productitem', 'AdminDashBoardController@productitem')->name('productitem');
    Route::get('/productitem/new', 'AdminDashBoardController@productitemnew')->name('productitemnew');
    Route::post('/productitem/new', 'AdminDashBoardController@productitemnew')->name('productitemnewcreate');
    Route::get('/productitem/edit/{id}', 'AdminDashBoardController@productitemedit')->name('productitemedit');
    Route::post('/productitem/edit/{id}', 'AdminDashBoardController@productitemedit')->name('productitemeditcreate');
    Route::post('/productitem/delete/{id}', 'AdminDashBoardController@productitemdelete')->name('productitemdelete');
});


Route::group(['prefix' => '/betterhr', 'middleware' => 'auth'], function(){
    Route::get('/userlists', 'UsersController@userlists');
    Route::post('/userlist/create', 'UsersController@usercreate');
    Route::post('/userlist/edit/{id}', 'UsersController@useredit');
    Route::get('/userlist/currentuser/{id}', 'UsersController@currentuser');
    Route::post('/userlist/delete/{id}', 'UsersController@deleteItem');
    Route::get('/useraccount/status/{id}', 'UsersController@accountstatus');
    Route::post('/useraccount/filterresults', 'UsersController@filterresults');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
