<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');
            Route::resource('categories', 'CategoryController')->except(['show']);
            Route::resource('products', 'ProductController')->except(['show']);
            Route::resource('clients', 'ClientController')->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController');

            Route::resource('orders', 'OrderController');
            Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');

            Route::resource('tass', 'tassController');

            Route::resource('qqqcli', 'qclientcontroller')->except(['show']);

            Route::resource('Contener', 'ContenerController');

            Route::resource('employe', 'employecontroller');

            Route::resource('salary', 'salarycontroller');

            Route::resource('extra', 'extracontroller');

            Route::resource('material', 'materialcontroller');

            Route::resource('shaft', 'shaftcontroller');
            Route::get('/shaft/{order}/materials', 'shaftcontroller@materials')->name('shafts.materials');


            
            Route::resource('sal', 'salcontroller');




           
            Route::resource('users', 'UserController')->except(['show']);












          

        });//end of dashboard routes
    });

