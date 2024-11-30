<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

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
            return view('admin.admin_dashboard');
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


    public function add_cart($id)
    {
        if (Auth::id())
        {
            return redirect()->back();
        }

        else
        {
            return redirect('login');
        }
    }
}
