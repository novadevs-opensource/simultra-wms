<?php

// Setup Routes
Route::group(['middleware' => ['web', 'auth']], function(){
    
    Route::get('/setup', '\Novadevs\Simultra\Base\Http\Controllers\SetupController@index')->name('setup.setup');

    Route::resource('/setup/company', '\Novadevs\Simultra\Base\Http\Controllers\BaseCompanyController', [
        'as' => 'setup'
    ])->except(
        [
            'index', 
            'destroy'
        ]
    );

    Route::get('lang/{locale}', '\Novadevs\Simultra\Base\Http\Controllers\SetupController@selectLanguage')->name('lang');
    Route::get('setup/quest/{mode}', '\Novadevs\Simultra\Base\Http\Controllers\SetupController@quest')->name('quest');
    Route::get('setup/default', '\Novadevs\Simultra\Base\Http\Controllers\SetupController@resetDefault')->name('default');

    // Route::get('reports', '\Novadevs\Simultra\Base\Http\Controllers\ReportController@index')->name('report');
    // Route::get('reports/{report}', '\Novadevs\Simultra\Base\Http\Controllers\ReportController@show')->name('report.show');

 
    Route::get('/setup/modules', '\Novadevs\Simultra\Base\Http\Controllers\ModulesController@index')->name('setup.modules');
    Route::put('/setup/modules/{module}', '\Novadevs\Simultra\Base\Http\Controllers\ModulesController@update')->name('setup.modules.update');
 
    Route::get('/setup/menus', function(){
        return view('setup.setup-menus');
    })->name('setup.menus');

    Route::get('/setup/display', function(){
        return view('setup.setup-display');
    })->name('setup.display');    

    // # SIMULTRA CUSTOM
    
    // Mail
    Route::get('messaging/sent', '\Novadevs\Simultra\Base\Http\Controllers\MailController@sent')->name('messaging.sent');
    Route::resource('messaging', '\Novadevs\Simultra\Base\Http\Controllers\MailController');

    // Warehouse
    Route::get('/warehouse/home', '\Novadevs\Simultra\Base\Http\Controllers\WarehouseController@home')->name('warehouse.warehouse');
    Route::resource('warehouse', '\Novadevs\Simultra\Base\Http\Controllers\WarehouseController');
    
    // Product
    Route::resource('product', '\Novadevs\Simultra\Base\Http\Controllers\ProductController');

    // AJAX
    Route::get('product-location/{product_id}', '\Novadevs\Simultra\Base\Http\Controllers\StockMoveController@_productLocations')->name('product-location');
    Route::get('product-label-report/{product_id}', '\Novadevs\Simultra\Base\Http\Controllers\ProductController@_productLabelReport')->name('product-label-report');

    // Location
    Route::resource('location', '\Novadevs\Simultra\Base\Http\Controllers\LocationController');

    // WhTool
    Route::resource('whtool', '\Novadevs\Simultra\Base\Http\Controllers\WhToolController');

    // StockMove
    Route::resource('stockmove', '\Novadevs\Simultra\Base\Http\Controllers\StockMoveController');

    // Transfer
    Route::resource('transfer', '\Novadevs\Simultra\Base\Http\Controllers\TransferController');

    // Partner
    Route::resource('partner', '\Novadevs\Simultra\Base\Http\Controllers\PartnerController');

    // Documents
    Route::get('documentation', '\Novadevs\Simultra\Base\Http\Controllers\DocumentationController@index')->name('documentation');

    // Reports
    Route::resource('report', '\Novadevs\Simultra\Base\Http\Controllers\ReportController');
});

?>