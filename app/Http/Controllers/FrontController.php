<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Customer;

use App\Models\Address;
use App\Models\Province;
use App\Models\ShipmentMethod;
use App\Models\ShippingCost;



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

    public function news(Request $request)
    {
      $news = News::all();

      if($request->has('category_id'))
      {
        $news = $news->where('news_category_id', $request->category_id);
      }

      $newsCategories = NewsCategory::all();

      $data =
      [
        'news' => $news,
        'newsCategories' => $newsCategories
      ];

      return view('front.news')->with($data);
    }

    public function newsDetail(News $news)
    {
      $latestNews = News::orderBy('created_at', 'desc')->take(News::all()->count() < 4 ? News::all()->count() : 4)->get();
      $newsCategories = NewsCategory::all();
      $data =
      [
        'latestNews' => $latestNews,
        'newsCategories' => $newsCategories,
        'news' => $news
      ];
      return view('front.newsDetail')->with($data);
    }

    public function newsPostComment(News $news, Request $request)
    {
      $news->newsComments()->create([
        'content' => $request->content,
        'customer_id' => Auth::id()
      ]);
      return redirect()->back();
    }

    public function category(Request $request)
    {
      $brand_images = array();
      if($request->new_arrivals)
      {
        $data =
        [
          "products" => Product::orderBy('created_at', 'desc')->take(Product::all()->count() < 24 ? Product::all()->count() : 24)->get(),
          "brand_images" => $brand_images,
          "latest_products" => Product::orderBy('created_at', 'desc')->take(Product::all()->count() < 12 ? Product::all()->count() : 12)->get(),
        ];
        return view('front.categoryProducts')->with($data);
      }
      $products = Product::all();
      if($request->has('category_id'))
      {
        $products = $products->whereIn('category_id', $request->category_id);
      }
      if($request->has('brand_id'))
      {
        $products = $products->whereIn('brand_id', $request->brand_id);
        $brand_images = Brand::all()->whereIn('id', $request->brand_id)->pluck('image');
      }

      $data =
      [
        "products" => $products,
        "brand_images" => $brand_images,
        "latest_products" => Product::orderBy('created_at', 'desc')->take(Product::all()->count() < 12 ? Product::all()->count() : 12)->get(),
      ];

      return view('front.categoryProducts')->with($data);
    }

    public function product(Product $product)
    {
      $data = [
        'product' => $product,
        'relateds' => Product::where('category_id', $product->category_id)->orWhere('brand_id', $product->brand_id)->get()
      ];
      return view('front.productDetail')->with($data);
    }

    public function productPostComment(Product $product, Request $request)
    {
      $product->productComments()->create([
        'stars' => $request->stars,
        'content' => $request->content,
        'customer_id' => Auth::id()
      ]);
      return redirect()->back();
    }


    public function getCart(Request $request)
    {
      return view('front.cart');
    }

    public function getOrders(Request $request)
    {
      $orders = Order::where('customer_id', Auth::id());
      return view('front.orders')->with('orders', $orders->get());
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

    public function clearCart(Request $request)
    {
      Cart::clear();

      return back();
    }


    public function getCheckout()
    {
      $shipmentMethods = ShipmentMethod::all();
      $products = Cart::getContent();

      $data = [
        "shipmentMethods" => $shipmentMethods,
        "products" => $products
      ];
      return view('front.checkout')->with($data);
    }

    public function postCheckout(Request $request)
    {
      $cartCollection = Cart::getContent();

      $order = new Order();

      $order->status = "Pending";

      $order->customer_id = Auth::id();
      $order->address_id = $request->address;

      $shippingCost = ShippingCost::where('district_id', $order->address->district_id)->where('shipment_method_id', $request->shipmentMethod)->first();
      $order->shipping_cost_id = $shippingCost->id;
      if($request->filled('coupon'))
      {
        $coupon = Coupon::where("name" ,$request->coupon)->first();
        if(empty($coupon))
        {
          Flash::error('Incorrect coupon code');

          return redirect(route('getCheckout'));
        }
        $order->coupon_id = $coupon->id;
      }

      $order->save();

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

    public function editProfileForm(Request $request)
    {
      $user = Auth::user();
      return view('front.profileForm')->with('user', $user);
    }

    public function postEditProfile(Request $request)
    {

      $this->validate($request, [
        'user_name' => 'string',
        'email' => 'string|email',
        'telephone' => 'string',
        'full_name' => 'string',
      ]);

      $user = Auth::user();

      $user->update([
        'user_name' => $request->user_name,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'full_name' => $request->full_name
      ]);


      return redirect(route('frontProfileEditForm'));
    }

    public function addressList(Request $request)
    {
      return view('front.addressList');
    }


    public function addressForm(Request $request)
    {
      $provinces = Province::all();
      return view('front.addressForm')->with('provinces', $provinces);
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

    public function deleteAddress(Address $address)
    {
      $address->delete();
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

         return redirect(route('getCheckout'));
       }
      $order->payment()->update([
        "proof" => $proof,
        "bank_account" => $request->bank_account,
        "payment_date"=> $request->payment_date,
      ]);
      return redirect()->back();
    }

    public function postConfirmReceive(Request $request, $id)
    {
      $order = Order::find($id);
      $order->update([
        "status" => "Done"
      ]);
      $order->deliveryOrder()->update([
          "status" => "Received"
      ]);
      return redirect()->back();
    }



}
