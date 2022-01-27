<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_attribute;

class CategoryController extends Controller
{
    //
    public function addCategory(){
        return view('create_category');
    }

    public function postaddCategory(Request $req)
    {
        $validateData = $req->validate(
            [
                'category_name'=>'required|unique:categories',
            ],
            [
                'category_name.required'=>'category name is required',
                'category_name.unique'=>'category name should be unique', 
            ]);
        if($validateData)
        {
            Category::create([
                    'category_name' => $req->category_name,
                ]);
            return back()->with('success',"Category Added Successfully");
        }
        else
        {
            return back()->with('errMsg',"Enter Valid Data");
        }
    }

    public function showCategory(){
        $catdata = Category::all();
        return view('show_category',['catdata'=>$catdata]);
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('edit_category',['category'=>$category]);
    }

    public function updateCategory(Request $req)
    {
        Category::where('id',$req->id)->update([
        'category_name'=>$req->category_name,
        ]);
        return redirect('/dashboard/showCategory');
    }

    public function deleteCategory($id){
        
        $data = Product::where('category_id',$id)->get();
        foreach($data as $da)
        {
            $d = $da['id'];
            $p = Product_image::where('product_id',$d)->get();
            $fname = $p[1];
            $path=public_path()."/uploads/".$fname;
            unlink($path); 
            Product_image::where('product_id',$d)->delete();
            Product_attribute::where('product_id',$d)->delete();
        }
        Product::where('category_id',$id)->delete();
        Category::where('id',$id)->delete();
        return back()->with('success','Category deleted');
    }

}
