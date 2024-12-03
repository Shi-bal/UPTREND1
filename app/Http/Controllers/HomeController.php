<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all(); // Fetch all products
        return view('home.userpage', compact('products')); // Pass products to the view
    }
    
    public function viewshoes(){
        $products = Product::all(); // Fetch all products for the shoes page
        return view('home.userpage', compact('products')); // Pass products to the view
    }
    
    

    public function viewcheckout(){
        return view('home.checkout');
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;
    
        if ($usertype == '1') {
            return view('admin.adminDashboard');
        } else {
            // Call the index method to ensure $products are passed to the userpage view
            return $this->index();  // This will call the index method and pass products
        }
    }
    

    public function product_details($id)
    {
        $products = Product::where('id', $id)->get();

        if ($products->isEmpty()) {
            return abort(404, 'No products found in this category');
        }

        return view('home.product_details', compact('products'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
    
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }
    
            $cart = new Cart;
    
            // Save user details
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
    
            // Save product details
            $cart->product_title = $product->title;
            $cart->size = $request->input('size');
            $cart->image1 = $product->image1;  // Assuming the product image is stored in 'image1' field
            $cart->price = $product->discount_price ?? $product->price;
            $cart->product_id = $product->id;
            $cart->quantity = $request->input('quantity', 1);
    
            $cart->save();
    
            return redirect()->route('home.showcart')->with('success', 'Product added to cart');
        } else {
            return redirect()->route('login')->with('error', 'Please log in to add items to the cart.');
        }
    }
    public function show_cart()
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $cart = Cart::where('user_id', $user_id)->get();
    
            return view('home.showcart', compact('cart')); // Passing $cart directly
        } else {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }
    }

    public function remove_cart($id){
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();
    }


    public function add_wishlist(Request $request)
    {
        $productId = $request->input('product_id'); // Get the product ID from the form
        $product = Product::find($productId); // Find the product by ID
    
        if ($product) {
            // Retrieve the wishlist from the session (if it exists), otherwise an empty array
            $wishlist = session()->get('wishlist', []);
    
            // Add the product to the wishlist if it's not already in there
            if (!isset($wishlist[$product->id])) {
                $wishlist[$product->id] = $product;
            }
    
            // Save the updated wishlist back to the session
            session()->put('wishlist', $wishlist);
        }
    
        return redirect()->route('wishlist.view'); // Redirect to the wishlist page
    }
    

    public function view_wishlist()
    {
        if(Auth::id()){
            $wishlist = session()->get('wishlist', []); // Get the wishlist from the session
    
            return view('home.wishlist', compact('wishlist')); // Pass the wishlist data to the view

        }

        else{
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }
        
    }
    
    public function remove_wishlist($id)
{
    // Get the current wishlist from the session
    $wishlist = session()->get('wishlist', []);

    // Check if the product exists in the wishlist
    if (isset($wishlist[$id])) {
        // Remove the product from the wishlist array
        unset($wishlist[$id]);

        // Save the updated wishlist back to the session
        session()->put('wishlist', $wishlist);
    }

    // Redirect back to the wishlist page
    return redirect()->route('wishlist.view');
}


        

    
}