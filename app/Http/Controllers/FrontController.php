<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\News;



class FrontController extends Controller
{
    public function home()
    {
      $featured_products = Product::all();
      $featured_laptops = Product::where('category_id', 2)->get();
      $featured_cpus = Product::where('category_id', 4)->get();

      $data =
      [
        "featured_products" => $featured_products->random($featured_products->count() < 12 ? $featured_products->count() : 12),
        "featured_products_laptops" => $featured_laptops->random($featured_laptops->count() < 12 ? $featured_laptops->count() : 12),
        "featured_products_cpus" => $featured_cpus->random($featured_cpus->count() < 12 ? $featured_cpus->count() : 12),
        "bestseller_products" => Product::all()->random(12),
        "latest_products" => Product::orderBy('created_at', 'desc')->take(12)->get(),
        "news" => News::orderBy('created_at', 'desc')->take(4)->get()
      ];
      return view('front.home')->with($data);
    }

    public function contactUs()
    {
      return view('front.contactUs');
    }

    public function news()
    {
      $news = News::all();
      return view('front.news')->with('news', $news);
    }


    public function category(Request $request)
    {
      $products = Product::all();
      if($request->has('category_id'))
      {
        $products = $products->where('category_id', $request->category_id);
      }
      if($request->has('brand_id'))
      {
        $products = $products->where('brand_id', $request->brand_id);
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
