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
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\User_wishlist;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\AdminMail;
use Illuminate\Support\Facades\Mail;


class apiUserController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth:api',['except'=>['login','register']]);
    }
    public function index()
    {
         $data = User::latest()->get();
        return response()->json($data);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'f_name'=>'required|string',
            'l_name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|min:8',
        ]);
        if($validator->fails())
        {
            return response()->json(["errors"=>$validator->errors()]);
              
        }
        else
        {
            $user = User::create([
                'first_name'=>$request->f_name,
                'last_name'=>$request->l_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'status'=> 1,
                'role_id'=> 5,
            ]);
            $details=[
                'email' => $request->email,
                'password' =>$request->password,
            ];
            Mail::to($request->email)->send(new AdminMail($details));
            Mail::to("admin@gmail.com")->send(new AdminMail($details));
            
            return response()->json([
                'message'=>'User Created Successfully',
                'user'=>$user
            ],201);
            
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors());
        }
        else
        {
            if(!$token = auth()->guard('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
            }
            return response()->json(['message'=>"LoggedIn Successfully",'access_token' => $token, "email" => $request->email], 200);
        }
    }

    public function contact(Request $req)
    {
        $validator = Validator::make($req->all(),[
                'name'=>'required',
                'email'=>'required',
                'contact'=>'required',
                'message'=>'required',
            ]);
            if($validator->fails()){
                $err = response()->json($validator->errors());
                return $err;
            }
            else
            {
                $contact = Contact::create([
                    'name'=>$req->name,
                    'email'=>$req->email,
                    'contact'=>$req->contact,
                    'message'=>$req->message,
                ]);
                $msg = response()->json([
                    'message'=>'Message Submitted Successfully',
                    'data' =>$contact
                ],201);
                return $msg;
            }
        }

    public function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60
        ]);
    }

    public function editProfile($id){
        $users = User::where('email',$id)->first();
        return response()->json(['users'=>$users]); 
    }

    public function updateProfile(Request $req)
    {
        User::where('email',$req->id)->update([
            'first_name'=>$req->f_name,
            'last_name' => $req->l_name,
        ]);
        $users = User::where('email',$req->id)->get();
        return response()->json(['message'=>'Profile Updated Successfully','users'=>$users]);
    }

    public function changePassword(Request $req)
    {
       $data = User::where('email',$req->useremail)->get();
       if(Hash::check($req->old_pass, $data[0]->password))
       {
            User::where('email',$req->useremail)->update([
            'password'=>Hash::make($req->new_pass),
            ]);
            return response()->json(['message'=>'Password changed Successfully','data'=>$data]);
        }
        else
       {
        return response()->json(['message'=>'Old Password does not match ']);
       }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'User logout Successfully']);
    }
}


