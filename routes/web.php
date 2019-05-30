<?php

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

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => ['auth',]],function(){
	Route::get('/','HomeController@getAdmin')->name('admin');
	// Route::group(['prefix' => 'categories'],function(){
	// 	Route::get('/', 'CategoriesController@getlist')->name('admin.categories');
	// 	Route::get('add', 'CategoriesController@getadd')->name('admin.categories.add');
	// 	Route::post('add', 'CategoriesController@postadd');
	// 	Route::get('edit/{id}', 'CategoriesController@getedit')->name('admin.categories.edit');
	// 	Route::post('edit/{id}', 'CategoriesController@postedit');
	// 	Route::get('delete/{id}', 'CategoriesController@getdelete')->name('admin.categories.delete');
	// 	Route::get('Listcontact', 'CategoriesController@getcontact')->name('admin.contact');
	// 	Route::get('contactEdit/{id}', 'CategoriesController@geteditcontact')->name('admin.contact.edit');
	// 	Route::post('contactEdit/{id}', 'CategoriesController@posteditcontact');
	// 	Route::get('DeleteContact/{id}', 'CategoriesController@getdeletecontact')->name('admin.contact.delete');
	// });

	// Route::group(['prefix' => 'producttype'],function(){
	// 	Route::get('/', 'ProductTypeController@getlist')->name('admin.product_type');
	// 	Route::get('add', 'ProductTypeController@getadd')->name('admin.product_type.add');
	// 	Route::post('add', 'ProductTypeController@postadd');
	// 	Route::get('edit/{id}', 'ProductTypeController@getedit')->name('admin.product_type.edit');
	// 	Route::post('edit/{id}', 'ProductTypeController@postedit');
	// 	Route::get('delete/{id}', 'ProductTypeController@getdelete')->name('admin.product_type.delete');
	// });

	// Route::group(['prefix' => 'product'],function(){
	// 	Route::get('/', 'ProductController@getlist')->name('admin.product');
	// 	Route::get('add', 'ProductController@getadd')->name('admin.product.add');
	// 	Route::post('add', 'ProductController@postadd');
	// 	Route::get('edit/{id}', 'ProductController@getedit')->name('admin.product.edit');
	// 	Route::post('edit/{id}', 'ProductController@postedit');
	// 	Route::get('delete/{id}', 'ProductController@getdelete')->name('admin.product.delete');
	// });

	// Route::group(['prefix' => 'order'],function(){
	// 	Route::get('/', 'OrderController@getlist')->name('admin.order');
	// 	Route::get('edit/{id}', 'OrderController@getedit')->name('admin.order.edit');
	// 	Route::post('edit/{id}', 'OrderController@postedit');
	// 	Route::get('delete/{id}', 'OrderController@getdelete')->name('admin.order.delete');
	// });

	Route::group(['prefix' => 'user'],function(){
		Route::get('/', 'UserController@getlist')->name('admin.user');
		Route::get('add', 'UserController@getadd')->name('admin.user.add');
		Route::post('add', 'UserController@postadd');
		Route::get('edit/{id}', 'UserController@getedit')->name('admin.user.edit');
		Route::post('edit/{id}', 'UserController@postedit');
		Route::get('delete/{id}', 'UserController@getdelete')->name('admin.user.delete');
	});

	// Route::group(['prefix' => 'ajax'], function(){
	// 	Route::get('product_type/{id_categories}','AjaxController@getProduct_type');
	// });
});

Route::get('/home', 'HomeController@index')->name('home');
