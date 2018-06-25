<?php

namespace App\Http\Controllers;

use App\Cart;
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

    public function addProductToCart(Request $request, $id)
	{
		$prevCart = $request->session()->get('cart');

		$cart = new Cart($prevCart);

		$product = Product::find($id);

		$cart->addItem($id,$product);
		$request->session()->put('cart', $cart);

		return redirect()->route('allProducts');
	}
}
