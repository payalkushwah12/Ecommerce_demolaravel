<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function addCoupons(){
        return view('create_coupons');
    }

    public function postaddCoupons(Request $req){
        $validatedData = $req->validate([
            'coupon_code'=>'required|unique:coupons',
            'c_discount'=>'required',
        ],
        [
            'coupon_code.required'=>'Coupon Code is required',
            'coupon_code.unique'=>'Coupon Code should be unique',
            'c_discount.required'=>'Coupon Discount Value is required',
        ]);

        if($validatedData)
        {
            Coupon::create([
            'coupon_code'=>$req->coupon_code,
            'coupon_discount'=>$req->c_discount,
            'coupon_status'=>$req->c_status,
            ]);
            return back()->with('success',"Product Added Successfully");
        }
        else
        {
            return back()->with('errMsg','Enter valid data');
        } 
    } 
    public function showCoupons(){
        $coupons = Coupon::all();
        return view('show_coupons',['coupons'=>$coupons]);
    }

    public function editCoupons($id){
        $coupons = Coupon::find($id);
        return view('edit_coupons',['coupons'=>$coupons]);
    }

    public function updateCoupons(Request $req)
    {
        Coupon::where('id',$req->id)->update([
            'coupon_code'=>$req->c_code,
            'coupon_discount'=>$req->c_discount,
            'coupon_status'=>$req->c_status,
        ]);
        return redirect('/dashboard/showCoupons');
    }
    public function deleteCoupons($id){
        Coupon::where('id',$id)->delete();
        return back()->with('success','Coupon deleted');
    }
}
