<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\User_address;
use App\Models\User_order;
use App\Models\Order_detail;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Coupon;
use App\Models\CMS;
use App\Models\Category;
use App\Models\Configuration;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\User_wishlist;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderMail;
use App\Mail\AdminMail;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    
    public function category()
    {
         $data = Category::latest()->get();
        return response()->json($data);
        //return response(['tasks'=>TaskResource::collection($data)]);
    }
    public function categories($id)
    {
        $list = [];
        $price ='';
        $quantity='';
        $products = Product::where('category_id',$id)->get();
        foreach($products as $pro)
        {
            $listimage = [];
            foreach($pro->product_images as $image){
                $listimage[] = [
                    'image' => asset('uploads/'.$image->product_image)
                ];
            }
            foreach($pro->product_attributes as $attr){
                $price = $attr->product_price;
                $quantity = $attr->product_quantity;
            }
            $list[] = [
                'id' => $pro->id,
                'product_name' => $pro->product_name,
                'product_code' => $pro->product_code,
                'product_id' => $pro->product_id,
                'category_id' => $pro->category_id,
                'product_price' => $price,
                'product_quantity' => $quantity,
                'product_image' => $listimage,
            ];
        }
        return response()->json(['products'=>$list]); 
    }
    public function products()
    {
        $list = [];
        $price ='';
        $quantity='';
        $products = Product::all();
        foreach($products as $pro)
        {
            $listimage = [];
            foreach($pro->product_images as $image){
                $listimage[] = [
                    'image' => asset('uploads/'.$image->product_image)
                ];
            }
            foreach($pro->product_attributes as $attr){
                $price = $attr->product_price;
                $quantity = $attr->product_quantity;
            }
            $list[] = [
                'id' => $pro->id,
                'product_name' => $pro->product_name,
                'product_code' => $pro->product_code,
                'category_id' => $pro->category_id,
                'product_price' => $price,
                'product_quantity' => $quantity,
                'product_image' => $listimage,
            ];
        }
        
        return response()->json(['products'=>$list]);
    }
    public function productdetails($id){
        $list = [];
        $price ='';
        $quantity='';
        $products = Product::where('id',$id)->get();
        foreach($products as $pro)
        {
            $listimage = [];
            foreach($pro->product_images as $image){
                $listimage[] = [
                    'image' => asset('uploads/'.$image->product_image)
                ];
            }
            foreach($pro->product_attributes as $attr){
                $price = $attr->product_price;
                $quantity = $attr->product_quantity;
            }
            $list[] = [
                'id' => $pro->id,
                'product_name' => $pro->product_name,
                'product_code' => $pro->product_code,
                'category_id' => $pro->category_id,
                'product_price' => $price,
                'product_quantity' => $quantity,
                'product_image' => $listimage,
            ];
        }
        return response()->json(['products'=>$list]); 
    }

    public function addWishlist(Request $req){
        $user = User::where('email',$req->email)->get();
        $data = User_wishlist::where('user_email',$user[0]->email)->get();
        $img = Product_image::where('product_id',$req->items['id'])->get();
        if(sizeof($data) == 0)
        {
            User_wishlist::create([
                'product_name'=>$req->items['product_name'],
                'product_code'=>$req->items['product_code'],
                'product_id'=>$req->items['id'],
                'product_price'=>$req->items['product_price'],
                'product_image'=>$img[0]->product_image,
                'user_email'=>$user[0]->email,
            ]);
            return response()->json(['message'=>' Added to Wishlist','d'=>1]); 
        }
        else
        {
            foreach($data as $d)
            {
                if($d->product_id == $req->items['id'])
                {
                    return response()->json(['message'=>'Already Added','d'=>0]);
                }
            }
            User_wishlist::create([
                'product_name'=>$req->items['product_name'],
                'product_code'=>$req->items['product_code'],
                'product_id'=>$req->items['id'],
                'product_price'=>$req->items['product_price'],
                'product_image'=>$img[0]->product_image,
                'user_email'=>$user[0]->email,
                ]);
                    return response()->json(['message'=>'Added to Wishlist','d'=>1]);
        }            
    }
    public function showWishlist($email){
        $user = User::where('email',$email)->get();
        $items = User_wishlist::where('user_email',$user[0]->email)->get();
        return response()->json(['message'=>'Wishlist items','items'=>$items]);
    }
    public function deleteItemWishlist($id){
        User_wishlist::where('id',$id)->delete();
        return response()->json(['message'=>1]);
    }
    public function coupons(){
        $coupons = Coupon::all();
        return response()->json(['coupons'=>$coupons]);
    }
    public function userAddress(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'f_name'=>'required|string',
            'l_name'=>'required|string',
            'email'=>'required|string',
            'postal'=>'required',
            'contact'=>'required',
            'address'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors());
              
        }
        else
        {
            User_address::create([
                'first_name'=>$request->f_name,
                'last_name'=>$request->l_name,
                'user_email'=>$request->uid,
                'postal'=>$request->postal,
                'contact'=> $request->contact,
                'address'=> $request->address,
            ]);
            return response()->json([
                'message'=>'Ordered Successfully',
            ],201);
        }
    }

    public function userOrders(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'p_name'=>'required|string',
            'price'=>'required',
            'image'=>'required',
            'p_id'=>'required',
            'quantity'=>'required',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors());
              
        }
        else
        {
            User_order::create([
                    'product_name'=>$request->p_name,
                    'product_id'=>$request->p_id,
                    'user_email'=>$request->uid,
                    'product_image'=>$request->image,
                    'product_price'=> $request->price,
                    'product_quantity'=> $request->quantity,
                    'coupon_used'=>$request->coupon_c,
                    'coupon_discount'=>$request->coupon_d,
                    'total_amount'=> $request->total, 
                    'order_status'=> "Pending",
                ]);
            $orderid = User_order::orderby('created_at','desc')->first();
            function unique_code($limit)
            {
                return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
            }
            $j = strtoupper(unique_code(8)); 
            $orderdetails = Order_detail::create([
                'order_id'=>"ORDERID".$j ,
                'product_id'=>"PRODUCTID".$j,
                'user_email'=>$request->uid,
                'user_order_id'=> $orderid->id,
                'payment_method'=>$request->paymentmethod,
                'order_status'=> "Pending",
            ]);
            $orderdetails = Order_detail::orderby('created_at','desc')->get();
            $addressdetails = User_address::orderby('created_at','desc')->first();
            $id = $orderdetails[0]->user_email;
            $email = User::where('email',$id)->first();
            $details=[
                'orderid'=> $orderdetails[0]->order_id,
                'product_name'=>$request->p_name,
                'product_price'=> $request->price,
                'product_quantity'=> $request->quantity,
                'total_amount'=> $request->total, 
                'address' =>$addressdetails->address,
                'paymentmethod'=>$request->paymentmethod,
            ];
            Mail::to($request->uid)->send(new OrderMail($details));
            Mail::to("admin@gmail.com")->send(new OrderMail($details));
            
        }
        return response()->json([
                'message'=>'Ordered Successfully',
            ],201);
    }

    public function banners()
    {
           $banners = Banner::all();
            return response()->json(['banners'=>$banners]);
    }
    public function myOrders($email)
    {
        $myorders = User_Order::where('user_email',$email)->get();
        return response()->json(['myorders'=>$myorders]);
    }
    public function cms()
    {
        $cms = CMS::all();
        return response()->json(['cms'=>$cms]);
    }
    public function cmsdetails($id)
    {
        $cms = CMS::where('id',$id)->first();
        return response()->json(['cms'=>$cms]);
    }
    public function configure()
    {
        $configure = Configuration::all();
        return response()->json(['configure'=>$configure]);
    }
    
    
}
