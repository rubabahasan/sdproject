<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\PlaceModel;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('hello');
});*/
/*Route::get('/hello',function(){
    return 'Hello World!';
});*/
Route::get('hello', 'hello@index');

Route::get('/hello/{name}', 'Hello@show');

//Route::get('blade', function () { return view('page'); });
/*Route::get('blade', function () {
    return view('page',array('name' => 'The Raven'));
});*/
/*Route::get('blade', function () {
    return view('page',array('name' => 'The Raven','day' => 'Sunday'));
});*/

/*Route::get('blade', function () {
    $drinks = array('Vodka','Gin','Brandy');
    return view('page',array('name' => 'The Raven','day' => 'Friday','drinks' => $drinks));
});
Route::get('/', 'front@index');
Route::get('/products','front@products');
Route::get('/products/details/{id}','front@product_details');
Route::get('/products/categories/{name}','front@product_categories');
Route::get('/products/brands/{name}/{category?}','front@product_brands');

Route::get('/contact-us','front@contact_us');
Route::get('/login','front@login');
Route::get('/logout','front@logout');
Route::get('/cart','front@cart');
Route::get('/checkout','front@checkout');
Route::get('/search/{query}','front@search');*/
Route::get('/blog','front@blog');
Route::get('/blog/post/{id}','front@blog_post');
//Route::get('/blog/write', 'front@blog_write');
Route::get('/blog/write', 'front@dummy');
Route::post('input','front@blog_input');
/*Route::get('/insert', function() {
    App\Category::create(array('name' => 'Music'));
    return 'category added';
});
Route::get('/read', function() {
    $category = new App\Category();
    
    $data = $category->all(array('name','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->name . '
';
    }
});

Route::get('/update', function() {
    $category = App\Category::find(6);
    $category->name = 'HEAVY METAL';
    $category->save();
    
    $data = $category->all(array('name','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->name . '
';
    }
});*/
