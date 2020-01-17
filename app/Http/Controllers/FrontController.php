<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use App\Models\Product;
use App\Models\Address;
use App\Models\Category;
use App\Models\Brand;
use App\Models\News;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Customer;





class FrontController extends Controller
{
    public function home()
    {
      $products = Product::all();
      $featured_laptops = Product::where('category_id', 2)->get();
      $featured_cpus = Product::where('category_id', 4)->get();

      $data =
      [
        "featured_products" => $products->random($products->count() < 12 ? $products->count() : 12),
        "featured_products_laptops" => $featured_laptops->random($featured_laptops->count() < 12 ? $featured_laptops->count() : 12),
        "featured_products_cpus" => $featured_cpus->random($featured_cpus->count() < 12 ? $featured_cpus->count() : 12),
        "bestseller_products" => Product::all()->random($products->count() < 12 ? $products->count() : 12),
        "latest_products" => Product::orderBy('created_at', 'desc')->take($products->count() < 12 ? $products->count() : 12)->get(),
        "news" => News::orderBy('created_at', 'desc')->take($products->count() < 4 ? $products->count() : 4)->get()
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

    public function newsDetail(News $news)
    {
      return view('front.newsDetail')->with('news', $news);
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

    public function getOrders(Request $request)
    {
      return view('front.orders');
    }

    public function getOrderDetail($id)
    {
      $order = Order::find($id);
      return view('front.orderDetail')->with('order', $order);
    }

    public function addToCart(Request $request)
    {
      $product = Product::find($request->id);
      Cart::add($product->id, $product->name, $product->price, $request->qty, ["image" => $product->image1]);

      return back();
    }

    public function getCheckout()
    {
      return view('front.checkout');
    }

    public function postCheckout(Request $request)
    {
      $cartCollection = Cart::getContent();

      $conditions = Cart::getConditions();

      $order = new Order();

      $order->status = "Pending";

      $order->customer_id = Auth::id();
      $order->address_id = $request->address;

      /*
      foreach ($conditions as $key => $condition)
      {
        $coupon = Coupon::where("code" ,$condition->getName())->first();
        $order->coupon_id = $coupon->id;
      }
      */


      $order->save();

      Cart::clearCartConditions();

      $total = 0;
      $total_quantity = 0;
      foreach ($cartCollection as $product)
      {
        $order->products()->attach($product->id, ['qty' => $product->quantity]);

        $modifier = Product::find($product->id);
        $modifier->stock = $modifier->stock - $product->quantity;
        $modifier->save();
      }


      Cart::clear();

      return redirect(route('front'));
    }



    public function addressForm(Request $request)
    {
      return view('front.addressForm');
    }

    public function postAddress(Request $request)
    {
      Address::create([
        'address' => $request->address,
        'recipient_name' => $request->recipient_name,
        'phone' => $request->phone,
        'customer_id' => Auth::id(),
        'district_id' => $request->district_id,
        'post_code' => $request->post_code,
      ]);
      return redirect()->back();
    }

    public function postPaymentProof(Request $request, $id)
    {
      $order = Order::find($id);
      if ($files = $request->file('image')) {
          $destinationPath = public_path('images'); // upload path
          $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
          $files->move($destinationPath, $profileImage);
          $proof = asset('images/'.$profileImage);
       }
       else
       {
         Flash::error('Paymentproof not found');

         return redirect(route('orders.index'));
       }
      $order->payment()->update([
        "proof" => $proof,
        "bank_account" => $request->bank_account,
        "payment_date"=> $request->payment_date,
      ]);
      return redirect()->back();
    }


}
