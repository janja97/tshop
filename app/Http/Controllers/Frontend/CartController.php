<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Buy;




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
            // $cartItem->ime = $request->input('ime') !== null ? $request->input('ime') : '';
            $cartItem->ime = $request->input('ime') ?? '';
            $cartItem->prezime = $request->input('prezime') ?? '';
            $cartItem->adresa = $request->input('address') ?? '';
            $cartItem->grad = $request->input('grad') ?? '';
            $cartItem->email = $request->input('email') ?? '';
            $cartItem->telefon = $request->input('phone') ? $request->input('phone') : '';

            $cartItem->kupljen = false;
            $cartItem->total_price = '0';

            // $totalPrice = $request->input('product_qty');

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
    public function checkout(Request $request)
    {
        $ime = $request->input('ime');
        $prezime = $request->input('prezime');
        $adresa = $request->input('address');
        $grad = $request->input('grad');
        $email = $request->input('email');
        $telefon = $request->input('phone');
        $totalPrice = 0;
        $cartitems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitems as $cartitem) {
            // Dohvatite cijenu proizvoda iz modela Product, pretpostavljajući da postoji odgovarajući model
            $product = Product::find($cartitem->prod_id);
            if ($product) {
                $totalPrice += $product->price * $cartitem->prod_qty;
            }
        }
        foreach ($cartitems as $cartitem) {
            $buy = new Buy();
            $buy->user_id = Auth::id();
            $buy->prod_id = $cartitem->prod_id;
            $buy->prod_qty = $cartitem->prod_qty;
            $buy->ime = $ime;
            $buy->prezime = $prezime;
            $buy->adresa = $adresa;
            $buy->grad = $grad;
            $buy->email = $email;
            $buy->telefon = $telefon;
            $buy->total_price = $totalPrice;
            $buy->save();
        }


    // Brisanje podataka iz izvorne tablice
    Cart::where('user_id', Auth::id())->delete();

        // Ovdje možete dodati logiku za slanje potvrde e-pošte, generiranje naloga itd.


        return redirect()->back()->with('success', 'Uspješno ste izvršili kupnju!');
    }



}
