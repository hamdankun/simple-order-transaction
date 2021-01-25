<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

	protected $product;

	public function __construct(Product $product) {
		$this->product = $product;
	}

    public function index() {
    	
    	$products = Product::all();

    	return $this->_unversalResponse($products);
    }

    public function show($id) {
    	
    	$product = Product::findOrFail($id);

    	return $this->_unversalResponse($product);
    }
}
