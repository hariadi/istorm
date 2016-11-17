<?php

/**
 * All route names are prefixed with 'admin.access'
 */
Route::group([
	'namespace'  => 'Order',
], function() {

	//Route::post('get', 'OrderTableController')->name('order.get');
	/**
	 * Order CRUD
	 */
	Route::resource('orders', 'OrderController');
});
