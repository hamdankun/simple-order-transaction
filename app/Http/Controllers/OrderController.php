<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }

    public function checkout(Request $request, Order $order) {
    	$this->validate($request, [
            'order.shipping_fee' => 'required',
    		'customer.name' => 'required',
    		'customer.phone' => 'required',
    		'customer.email' => 'required|email',
    		'customer.address' => 'required',
    		'products' => 'required',
    		'products.*.product_id' => 'required|exists:products,id',
    		'products.*.qty' => 'required|not_in:0'
    	]);

    	app('db')->transaction(function() use($request) {
            
            $orderInput = [
                'order_number' => date('YmdHis'),
                'order_date' => date('Y-m-d'),
                'note' => $request->input('order.note'),
                'status' => 'PENDING',
                'total_qty' => 0,
                'sub_total' => 0,
                'shipping_fee' => $request->input('order.shipping_fee'),
                'grand_total' => 0
            ];

            $productInputs = $request->input('products');
            $productMap = [];

            foreach ($productInputs as $productInput) {
                $product = Product::find($productInput['product_id']);
                $orderInput['total_qty'] += $productInput['qty'];
                $orderInput['sub_total'] += $product->price * $productInput['qty'];

                if ($product->stock < $productInput['qty']) {
                    throw new Exception('Stock Offset!');
                }

                $product->stock -= $productInput['qty'];
                $product->save();

                $detail = (new OrderDetail())->fill($productInput);
                $detail->price = $product->price;

                $productArrayMap[] = $detail;
            }

            $orderInput['grand_total'] = $orderInput['sub_total'] + $orderInput['shipping_fee'];

            $createdOrder = $this->order->create($orderInput);
            $createdOrder->details()->saveMany($productArrayMap);
            
    	});

    	return $this->_unversalResponse($this->_emptyPayloadData());
    }
}
