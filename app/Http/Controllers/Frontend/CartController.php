<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Cart;





class CartController extends Controller
{
    // public function addProduct(Request $request){
    //     $product_id = $request->input('product_id');
    //     $product_qty = $request->input('product_qty');
    //     if(Auth::check()){
    //         $prod_check = Product::where('id', $product_id)->first();
    //         if($prod_check){

    //             if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
    //                 return response()->json(['status'=>$prod_check->name.'  Alrea Add to cart']);

    //             }
    //            else {
    //             $cartItem=new Cart();
    //             $cartItem->prod_id =$product_id;
    //             $cartItem->user_id =Auth::id();
    //             $cartItem->prod_qty =$product_qty;
    //             $cartItem->save();
    //             return response()->json(['status'=>$prod_check->name.'Add to cart']);
    //            }
    //         }
    //     }
    //     else response()->json(['status'=>'login in continue']);

    // }
    function addToCart(Request $request){
        if(Auth::check()){
            $cartItem =new Cart;
            $cartItem->user_id=Auth::id();
            $cartItem->prod_id=$request->input('product_id');
            $cartItem->prod_qty=$request->input('product_qty');
            $cartItem->save();
            return redirect('/')->with('status', 'Add to card ');

        }
        else{
            return redirect('login');
        }
    }
    function viewcart(){
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.products.cart', compact('cartitems'));
    }
    function update(Request $request, $id){
        $cartitem = Cart::find($id);
        $cartitem->delete();
        return redirect('cart')->with('status','uspjesno izbrisano');


    }
}
