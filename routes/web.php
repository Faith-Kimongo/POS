<?php

use Illuminate\Support\Facades\Route;
// use Session;
use App\Products;
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





Route::get('qr-code-g', function () {

  

    \QrCode::size(500)

            ->format('png')

            ->generate('HDTuto.com', public_path('media/images/qrcode.png'));

    

  return view('qrCode');

    

});


Route::get('/', function () {
    return view('welcome');
});

// Client Routes
Route::get('/restaurant/{branch}/{hotel}/{table}', 'ClientController@front');
Route::resource('/client/cart', 'CartController');
Route::get('/category/{id}', 'ClientController@category');
Route::get('/sub/category/{id}', 'ClientController@subcategory');
Route::get('/food-court/{court}/{table}', 'ClientController@court');

Route::get('/food/{name}/{id}', 'ClientController@product');

Route::post('/mpesa/payment', 'MpesaController@customerMpesaSTKPush'); //mpesa payment
Route::post('stk/push', 'MpesaController@stk');

Route::get('smartwaiter/push', 'MpesaController@postsmart');
// confirm
Route::get('/confirm', 'ClientController@confirm');
Route::get('/cart', function () {
        return view('front.cart');
});
Route::get('/orders', function () {
    return view('front.orders');
});

Route::get('/sms/send/','Sms\SmsController@ck');
Auth::routes();

//Management Routes
Route::group(['middleware' =>['auth', 'App\Http\Middleware\ManagementMiddleware']], function()
{

    Route::match(['get', 'post'], '/management/', 'HomeController@management')->name('management.home');
    Route::resource('/management/waiters', 'Management\WaiterController');//Waiters
    Route::resource('/management/tables', 'Management\TableController');//tables
    Route::resource('/management/qrcodes', 'Management\QrController');//tables
    Route::resource('/management/categories', 'Management\CategoryController');//categories
    Route::resource('/management/subcategories', 'Management\SubCategoryController');//sub-categories
    Route::resource('/management/products','Management\ProductController');//Products
    Route::get('/management/product/import','Management\ProductController@import');//import products
    Route::resource('/management/options','Management\OptionController');//Options
    Route::get('/management/products/add/{id}','Management\ProductController@add'); //add products
    Route::get('/management/set/branch/{id}','Management\BranchController@set'); //add products

    Route::resource('/management/branches', 'Management\BranchController');//categories

    

});

//Distributor Routes
Route::group(['middleware' => ['auth','App\Http\Middleware\DistributorMiddleware']], function()
{


Route::match(['get', 'post'], '/distribute/', 'HomeController@distributor');
Route::post('/distributor/beneficiary/new', 'Distributor\BeneficiaryController@store')->name('new.beneficiary');
Route::get('/distributor/beneficiary/', 'Distributor\BeneficiaryController@index')->name('list.beneficiary');
Route::get('/distributor/package/{id}','Distributor\PackageController@package');//specific package
Route::get('/distributor/beneficiary/{id}','Distributor\BeneficiaryController@profile');//specific profile
Route::post('/distributor/package','Distributor\PackageController@issue')->name('issue.package');//specific package
Route::get('/beneficiary/list', 'Distributor\BeneficiaryController@list');//->name('list.beneficiary');
Route::get('/distributor/batch','Distributor\BatchController@index')->name('distributor.home');
Route::get('/distributor/batch/{id}','Distributor\BatchController@single');
Route::post('/distributor/voucher/assign','Distributor\VoucherController@assign')->name('assign.voucher');



// Route::get('users', 'Distributor\BeneficiaryController@index');
// Route::get('users', ['uses'=>'Distributor\BeneficiaryController@index', 'as'=>'users.index']);
// Route::get('users-list', 'Distributor\BeneficiaryController@usersList');

});

//Superadmin routes
Route::group(['middleware' => ['auth','App\Http\Middleware\SuperAdminMiddleware']], function()
{
    Route::match(['get', 'post'], '/Dashboard/', 'HomeController@admin')->name('dashboard.home');
    Route::resource('/admin/hotels', 'Admin\HotelController');
    Route::resource('/admin/court', 'Admin\CourtController');
    Route::resource('/admin/table', 'Admin\TableController');


   
});

//Store Routes
Route::group(['middleware' => ['auth','App\Http\Middleware\StoreMiddleware']], function()
{
    Route::match(['get', 'post'], '/store/', 'Store\StoreController@index')->name('store.home');


    Route::get('/hotel/categories','Store\StoreController@categories');
    Route::get('/hotel/sub/categories/{id}','Store\StoreController@subcategories');
    Route::get('/hotel/sub/products/{id}','Store\StoreController@products');
    Route::get('/hotel/orders/pending','Store\StoreController@pending');
    Route::post('/hotel/orders/update','Store\StoreController@update');
    Route::get('/hotel/orders/recieved','Store\StoreController@received');
    Route::get('/hotel/orders/ready','Store\StoreController@ready');
    Route::get('/hotel/orders/closed','Store\StoreController@closed');
    Route::get('/hotel/tables','Store\StoreController@tables');
    Route::get('/hotel/reports','Store\StoreController@report');
    Route::post('/store/code/redeem','Store\StoreController@redeem')->name('redeem.voucher');
    Route::get('/store/beneficiary/{id}','Store\StoreController@single')->name('single.user');
});


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('json-api', 'ApiController@index');

// fallback url

Route::fallback(function () {
    //
    return view('not_found');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
