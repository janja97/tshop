<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Category;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Models\Product;

class frontendController extends Controller
{
    public function index(){
        $tranding_category=Category::where('popular','1')->take(15)->get();
        $featured_products =Product::where('trending','1')->take(15)->get();

        return view('frontend.index',compact('featured_products','tranding_category'));
    }
    public function category(){
        $category =Category::where('status','1')->get();
        return view('frontend.category', compact('category'));
    }
    public function viewcategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category= Category::where('slug',$slug)->first();
            $products= Product::where('cate_id',$category->id)->where('status','1')->get();
            return view('frontend.products.index', compact('category','products'));
        }
        else {
            return redirecr('/')->with('status','sllug ne postoji');
        }
    }
    public function productview($cate_slug, $prod_slug){
        if(Category::where('slug',$cate_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){
                $products =Product::where('slug',$prod_slug)->first();
                return view('frontend.products.view', compact('products'));
            }
            else{
                return redirect('/')->with('status','greska');
            }

        }
        else{
            return redirect('/')->with('status','greska');
        }


    }
    public function prodview($prod_slug){
        if(Product::where('slug',$prod_slug)->exists()){
            $products =Product::where('slug',$prod_slug)->first();
            return view('frontend.products.view', compact('products'));
        }
        else{
            return redirect('/')->with('status','greska');
        }
    }

}

