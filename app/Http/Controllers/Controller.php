<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function _unversalResponse($data) {
    	return [
    		'status_code' => 200,
    		'data' => $data
    	];
    }

    public function _emptyPayloadData() {
    	return (object)[];
    }
}
