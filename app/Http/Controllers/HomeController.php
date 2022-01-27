<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function salesReport(){
        $sales = DB::select(DB::raw('select sum(product_quantity) as total, product_name from user_orders group by product_name'));
        $data = "";
        foreach($sales as $s){
            $data.="['".$s->product_name."',".$s->total."],";
        }
        $arr['pdata']=rtrim($data,",");
        return view('salesreport',$arr);
    }

    public function customerReport(){
        $custR = DB::select(DB::raw('select count(*) as total, role_name as name from users JOIN roles where users.role_id = roles.id group by role_name'));
        $data = "";
        foreach($custR as $s){
            $data.="['".$s->name."',".$s->total."],";
        }
        $arr['udata']=rtrim($data,",");
        return view('Customer_registered_report',$arr);
    }

    public function couponsReport(){
        $notactive = Coupon::select('coupon_status')->where('coupon_status',0)->count();
        $active = Coupon::select('coupon_status')->where('coupon_status',1)->count();
        return view('couponsreport')->with('active',$active)->with('notactive',$notactive);
    }
    
}
