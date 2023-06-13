<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CategoryController;

use Illuminate\Support\Facadas\File;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
        $products =Product::all();
        return view('admin.product.index',compact('products'));

    }
    public function add(){
        $category = Category::all();
        return view('admin.product.add',compact('category'));
    }
    public function insert(Request $request){
        $products =new Product();
        // if($request ->hasFile('image')){
        //     $file=$request->file('image');
        //     $ext =$file->getClientOriginalExtension();
        //     $filename=time().'.'.$ext;
        //     $file->move('assets/uploads/product'.$filename);
        //     $products->image=$filename;
        // }
        $products->cate_id=$request->input('cate_id');
        $products->name =$request->input('name');
        $products->slug =$request->input('slug');
        $products->small_description =$request->input('small_description');
        $products->description =$request->input('description');
        $products->original_price =$request->input('original_price');
        $products->selling_price =$request->input('selling_price');
        $products->image =$request->input('image');
        $products->tax =$request->input('tax');
        $products->qty =$request->input('qty');
        $products->status =$request->input('status')==TRUE ? '1':'0';
        $products->trending =$request->input('trending')==TRUE ? '1':'0';
        $products->save();
        return redirect('products')->with('status', 'Category added Successfuly');


    }
    public function edit($id){
        $products = Product::find($id);
        return view('admin.product.edit',compact('products'));
    }
    public function update(Request $request , $id){
        $products = Product::find($id);
        // if($request ->hasFile('image')){
        //     $path='assets/updates/products/'.$products->image;
        //     if(File::exists($path)){
        //         File::delete($path);
        //     }
        //     $file=$request->file('image');
        //     $ext =$file->getClientOriginalExtension();
        //     $filename=time().'.'.$ext;
        //     $file->move('assets/uploads/product'.$filename);
        //     $products->image=$filename;
        // }
        $products->name =$request->input('name');
        $products->small_description =$request->input('small_description');
        $products->description =$request->input('description');
        $products->original_price =$request->input('original_price');
        $products->selling_price =$request->input('selling_price');
        $products->image =$request->input('image');

        $products->tax =$request->input('tax');
        $products->qty =$request->input('qty');
        $products->status =$request->input('status')==TRUE ? '1':'0';
        $products->trending =$request->input('trending')==TRUE ? '1':'0';
        $products->update();
        return redirect('products')->with('status', 'Category changes Successfuly');

    }
    public function destroy($id){
        $products =Product::find($id);
        // $path = 'assets/uploads/products/'.$products->image;
        // if(File::exists($path)){
        //     File::delete($path);
        // }
        $products->delete();
        return redirect('products')->with('status', 'izbrisano');
    }
}
