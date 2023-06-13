<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Categoty;
// use App\Http\Controllers\Admin\File;

use App\Models\Category;
use Illuminate\Support\Facadas\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function add() {
        return view('admin.category.add');
    }
    public function insert(Request $request){
        $category = new Category();
        // if($request ->hasFile('image')){
        //     $file=$request->file('image');
        //     $ext =$file->getClientOriginalExtension();
        //     $filename=time().'.'.$ext;
        //     $file->move('assets/uploads/category'.$filename);
        //     $category->image=$filename;
        // }
        $category->name =$request->input('name');
        $category->slug =$request->input('slug');
        $category->status =$request->input('status')==TRUE ? '1':'0';
        $category->popular =$request->input('popular')==TRUE ? '1':'0';
        $category->image =$request->input('image');
        $category->save();
        return redirect('/dashboard')->with('status', 'Category added Successfuly');

    }
    public function edit($id){
        $category=Category::find($id);
        return view ('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        // if($request->hasFile('image')) {
        //     $path='assets/updates/category/'.$category->image;
        //     if(File::exists($path)){
        //         File::delete($path);
        //     }
        //     $file=$request->file('image');
        //     $ext =$file->getClientOriginalExtension();
        //     $filename=time().'.'.$ext;
        //     $file->move('assets/uploads/category'.$filename);
        //     $category->image=$filename;
        // }
        $category->name =$request->input('name');
        $category->slug =$request->input('slug');
        $category->status =$request->input('status')==TRUE ? '1':'0';
        $category->popular =$request->input('popular')==TRUE ? '1':'0';
        $category->image =$request->input('image');
        $category->update();
        return redirect('categories')->with('status','uspjesno projmenjeno');
    }
    public function destroy($id){
        $category =Category::find($id);
        // if($category->image){
        //     $path ="assets/uploads/category/".$category->image;
        //     if(File::exists($path)){
        //         File::delete($path);
        //     }
        // }
        $category->delete();
        return redirect('categories')->with('status','izbrisano');
    }
}

