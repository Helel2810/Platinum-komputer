<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use App\Models\Product;
use App\Models\Category;


class FrontController extends Controller
{
    public function home()
    {
      return view('front.home');
    }

    public function category(Request $request)
    {
      $products = Product::all();
      if($request->has('category_id'))
      {
        $products = $products->where('category_id', $request->category_id);
      }
      return view('front.categoryProducts')->with('products', $products);
    }

    public function product(Product $product)
    {
      $data = [
        'product' => $product,
        'relateds' => Product::where('category_id', $product->category_id)->orWhere('brand_id', $product->brand_id)->get()
      ];
      return view('front.productDetail')->with($data);
    }

    public function getCart(Request $request)
    {
      return view('front.cart');
    }


    public function addToCart(Request $request)
    {
      $product = Product::find($request->id);
      Cart::add($product->id, $product->name, $product->price, $request->qty, ["image" => $product->image1]);

      return back();
    }

}
