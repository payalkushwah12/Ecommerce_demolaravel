<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_attribute;


class ProductController extends Controller
{
    public function addProducts(){
        $catdata = Category::all();
        return view('create_products',['catdata'=>$catdata]);
    }

    public function postaddProducts(Request $req)
    {
        $validateData = $req->validate(
            [
                'p_name'=>'required',
                'p_price'=>'required',
                'p_quantity'=>'required',
            ],
            [
                'p_name.required'=>'first name is required',
                'p_price.required'=>'last name is required',
                'p_quantity.required'=>'email is required',
            ]);
            
        if($validateData)
        {
            $images = $req->images;
            if(!empty($images))
            {
                $req->p_category;
                Product::create([
                'product_name' => $req->p_name,
                'product_description' => $req->p_description,
                'product_code' => $req->p_code,
                'category_id' => $req->p_category,
                'product_status' => $req->p_status,
                
                ]);
                
                $data = Product::where('product_code',$req->p_code)->get();
                $id = $data[0]->id;
                Product_attribute::create([
                    'product_price' => $req->p_price,
                    'product_quantity' => $req->p_quantity,
                    'product_id'=>$id
                ]);
                $dest=public_path('/uploads');
                foreach($images as $item)
                {
                    $fname="Image-".rand()."-".time().".".$item->extension();
                    if($item->move($dest,$fname))
                    {
                        Product_image::create([
                            'product_image' => $fname,
                            'product_id'=>$id
                        ]);
                    }
                    else
                    {
                        $path=public_path()."uploads/".$fname;
                        unlink($path);
                        return back()->with('errMsg','Image Not Added');
                    }
                }
                return back()->with('success',"Product Added Successfully");
            }
            else
            {
                return back()->with('errMsg','Please Upload Image');
            } 
        }
        else
        {
            return back()->with('errMsg',"Enter Valid Data");
        }
    }


    public function showProducts(){
        $products = DB::select("SELECT
        products.product_name,
        products.product_code,
        products.id,
        products.product_description,
        products.product_status,
        products.category_id,
        categories.category_name,
        product_attributes.product_price,
        product_attributes.product_quantity
        FROM products JOIN categories
        ON products.category_id = categories.id
        JOIN product_attributes
        ON products.id = product_attributes.product_id"); 
         
        return view('show_products',['products'=>$products]);
    }

    //edit products
    public function editProducts($id)
    {
        
        $prodata=Product::where('id',$id)->first();
        $c = $prodata['category_id'];
        $data = Category::where('id',$c)->first();
        $selcat = $data['category_name'];
        //$proimg=Product_image::where('product_id',$id)->first();
        $proattr=Product_attribute::where('product_id',$id)->first();
        $catdata = Category::all();
        return view('edit_products',['catdata'=>$catdata],['prodata'=>$prodata])->with('selcat',$selcat)
        //->with('proimg',$proimg)
        ->with('proattr',$proattr);
    }

    public function updateProducts(Request $req)
    {
        Product::where('id',$req->id)->update([
        'product_name'=>$req->p_name,
        'product_description'=>$req->p_description,
        'category_id'=>$req->p_category,
        'product_status'=>$req->p_status,
        ]);
        Product_attribute::where('product_id',$req->id)->update([
            'product_price'=>$req->p_price,
            'product_quantity'=>$req->p_quantity,
            ]);
        $images = $req->file('images');
        if(!empty($images))
        {
            $dest=public_path('/uploads');
            foreach($images as $item)
            {
                $fname="Image-".rand()."-".time().".".$item->extension();
                if($item->move($dest,$fname))
                {
                    Product_image::create([
                        'product_id'=>$req->id,
                        'product_image'=>$fname,
                        ]);
                }
                else
                {
                    $path=public_path()."uploads/".$fname;
                    unlink($path);
                    return back()->with('errMsg','Image Not Added');
                }
            }
        }
        return redirect('/dashboard/showProducts');
    }


    public function deleteProducts($id){
        $img = Product_image::where('product_id',$id)->get();
        foreach($img as $i)
        {
            $fname = $i['product_image'];
            $path=public_path()."/uploads/".$fname;
            unlink($path);
        }
        Product_image::where('product_id',$id)->delete();
        Product_attribute::where('product_id',$id)->delete();
        $pro=Product::find($id);
        if($pro->delete())
        {
            //unlink($imagePath);
            return back()->with('success','Products deleted');
        }
        else
        {
          return "Products not deleted";
        }
    }

    public function displayProductImages($id)
    {
        $productimages = Product_image::all();
        return view('display_images',['id'=>$id],['productimages'=>$productimages]);
    }
    public function deleteProductImages($id)
    {
        $i = $id;
        Product_image::find($id)->delete();
        return back()->with('success','Product image deleted');
    }
    
    
  
}
