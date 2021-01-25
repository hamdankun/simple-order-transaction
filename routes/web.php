<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Http\Controlers\ProductController;
use App\Http\Controlers\OrderController;
use App\Http\Controlers\AdminController;

$router->get('/', function () use ($router) {
    return 'Simple API Order Transaction';
});


$router->group(['prefix' => 'api/v1'], function() use ($router) {

	$router->group(['prefix' => 'product'], function() use ($router) {
		$router->get('/list', 'ProductController@index');
		$router->get('/detail/{id}', 'ProductController@show');
	});

	$router->group(['prefix' => 'customer/order'], function() use ($router) {
		$router->post('/checkout', 'OrderController@checkout');
		$router->post('/payment-confirmation', [OrderController::class, 'paymentConfirmation']);
		$router->post('/detail/{orderNumber}', [OrderController::class ,'detail']);
		$router->post('/shipping-tracking/{orderNumber}', [OrderController::class ,'detail']);
	});

	$router->group(['prefix' => 'admin'], function() use ($router) {

		$router->group(['prefix' => 'auth'], function() use ($router) {
			$router->post('/login', [AuthController::class, 'login']);
		});

		$router->group(['prefix' => 'order'], function() use ($router) {
			$router->get('/list', [AdminController::class, 'orderList']);
			$router->get('/detail/{orderId}', [AdminController::class, 'orderDetail']);
			$router->put('/approve', [AdminController::class , 'approveOrder']);
			$router->put('/cancel', [AdminController::class , 'cancelOrder']);
			$router->put('set-as-shipped', [AdminController::class, 'setAsShipped']);
		});
	});

});