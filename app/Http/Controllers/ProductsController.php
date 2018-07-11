<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::paginate(8);
		return view('allproducts', compact('products'));
	}

	public function addProductToCart(Request $request, $id)
	{
		$prevCart = $request->session()->get('cart');

		$cart = new Cart($prevCart);

		$product = Product::find($id);

		$cart->addItem($id, $product);
		$request->session()->put('cart', $cart);

		return redirect()->route('allProducts');
	}

	public function showCart()
	{
		$cart = Session::get('cart');

		if ($cart) {
			return view('cartproducts', ['cartItems' => $cart]);
		} else {
			return redirect()->route('allProducts');
		}
	}

	public function deleteItemFromCart(Request $request,$id)
	{
		$cart = $request->session()->get("cart");

		if(array_key_exists($id,$cart->items))
		{
			unset($cart->items[$id]);
		}

		$prevCart = $request->session()->get("cart");

		$updatedCart = new Cart($prevCart);
		$updatedCart->updatePriceandQuantity();

		$request->session()->put("cart", $updatedCart);

		return redirect()->route('cartproducts');


	}

	public function menProducts(){
		$products = Product::where('type','mens')->get();

		return view('menProducts', compact('products'));
	}

	public function womenProducts(){
		$products = Product::where('type','womens')->get();

		return view('womenProducts', compact('products'));
	}

}
