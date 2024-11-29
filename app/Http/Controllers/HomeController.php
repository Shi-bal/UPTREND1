<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $product = Product::all(); // Fetch all products
        return view('home.userpage', compact('product')); // Pass products to the view
    }
    
    public function viewshoes(){
        $product = Product::all(); // Fetch all products for the shoes page
        return view('home.userpage', compact('product')); // Pass products to the view
    }
    

    public function viewcheckout(){
        return view('home.checkout');
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('home.userpage');
        }
    }
}
