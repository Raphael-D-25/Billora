<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {

    }

    public function add()
    {
        $products = Product::all();
        return view('Bills.add', compact('products'));
    }
}
