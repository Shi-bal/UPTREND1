<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

       
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data=new Category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message', 'Added Succesfully');
    }

    public function delete_category($id){

        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Deleted Succesfully');
    }

    public function view_product()
    {   
        $category=category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price; // Correcting dis_price to match form name
        $product->category = $request->category;

        // Handle the first image
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $imageName1 = time() . '_1.' . $image1->getClientOriginalExtension();
            $image1->move('product', $imageName1);
            $product->image1 = $imageName1; // Adjust database column name if needed
        }

        // Handle the second image
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $imageName2 = time() . '_2.' . $image2->getClientOriginalExtension();
            $image2->move('product', $imageName2);
            $product->image2 = $imageName2; // Adjust database column name if needed
        }

        // Handle the third image
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $imageName3 = time() . '_3.' . $image3->getClientOriginalExtension();
            $image3->move('product', $imageName3);
            $product->image3 = $imageName3; // Adjust database column name if needed
        }

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        $product=product::all();

        return view('admin.show_product', compact('product'));
    }

}