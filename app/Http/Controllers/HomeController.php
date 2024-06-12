<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $user=User::where('userType','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','Delivered')->get()->count();
        return view('admin.index',compact('user', 'product', 'order','delivered'));
    }
    public function home(){
        $product=Product::all();
        if(Auth::id()){
        $user = Auth::user();
       $count = Cart::where('user_id', $user->id)->count();
    }
    else{
        $count = '';
    }
        return view('home.index',compact('product','count'));
    }
    public function login_home(){
       $products = Product::all();
       $user = Auth::user();
       $count = Cart::where('user_id', $user->id)->count();
       return view('home.index', compact('products', 'count'));
    }
    public function product_details($id){
        $product = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
           $count = Cart::where('user_id', $user->id)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_details',compact('product','count'));
    }
    public function add_cart($id){
        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $data= new Cart;
        $data->user_id=$user_id;
        $data->product_id=$product_id;
        $data->save();
        toastr()->closeButton()->addSuccess('Product Added to Cart successfully!');
        return redirect( )->back();
    }

    public function mycart(){
        $user = Auth::user();
        $count = Cart::where('user_id', $user->id)->count();
        $cart = Cart::where('user_id', $user->id)->get();
        $value = 0;
    
        foreach($cart as $item) {
            $value += $item->product->price;
        }
    
        return view('home.mycart', compact('count', 'cart', 'value'));
    }
    
   public function confirm_order(Request $request){
    $name=$request->name;
    $address=$request->address;
    $phone=$request->phone;
    $userid=Auth::user()->id;
    $cart=Cart::where('user_id',$userid)->get();

    foreach($cart as $cart){
        $order=new Order;
        $order->name=$name;
        $order->rec_address=$address;
        $order->phone=$phone;
        $order->user_id=$userid;
        $order->product_id=$cart->product_id;
        $order->save();
        

    }
    $cart_remove=Cart::where('user_id',$userid)->get();
    foreach($cart_remove as $remove)
    {
        $data=Cart::find($remove->id);
        $data->delete();
    }
    toastr()->closeButton()->addSuccess('Product Ordered successfully!');
    return redirect()->back();


   }
   public function myorder(){
    $user = Auth::user();
    $count = Cart::where('user_id', $user->id)->get()->count();
    $order=Order::where('user_id', $user->id)->get();
    return view('home.order',compact('count','order'));
   }

   public function stripe($value)
   {
       return view('home.stripe',compact('value'));
   }

   public function stripePost(Request $request,$value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
   
}

