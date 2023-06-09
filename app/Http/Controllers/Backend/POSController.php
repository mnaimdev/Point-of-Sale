<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class POSController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $customers = Customer::all();

        return view('backend.pos.index', [
            'products' => $products,
            'customers' => $customers,
        ]);
    }
}
