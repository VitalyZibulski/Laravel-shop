<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$products = Product::all();
        return view('allproducts', compact('products'));
    }

    public function addProductToCart()
	{
		return '111111';
	}
}
