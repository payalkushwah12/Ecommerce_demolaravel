<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Contact;
use App\Models\User_address;
use App\Models\User_order;

class UserController extends Controller
{
    //
    public function addUsers()
    {
        $roles = Role::all();
        return view('create_users',['roles'=>$roles]);
    }
    public function postaddUsers(Request $req)
    {
        
        $validateData = $req->validate(
            [
                'f_name'=>'required',
                'l_name'=>'required',
                'email'=>'required|unique:users',
                'password'=>'required',
                'c_password'=>'required',
            ],
            [
                'f_name.required'=>'first name is required',
                'l_name.required'=>'last name is required',
                'email.required'=>'email is required',
                'password.required'=>'password is required',
                'email.unique'=>'email should be unique',
                'c_password.required'=>'Please Confirm Password',
            ]);
        if($validateData)
        {
            if($req->password == $req->c_password)
            {
                $user = User::create([
                    'first_name' => $req->f_name,
                    'last_name' => $req->l_name,
                    'email' => $req->email,
                    'password' => Hash::make($req->password),
                    'status' => $req->status,
                    'role_id' => $req->role
                ]);
            return back()->with('success',"Added Successfully");
            }
            else{
                return back()->with('errMsg',"Password Does not match with confirm one");
            }
        }
        else
        {
            return back()->with('errMsg',"Enter Valid Data");
        }
    }

    public function showUsers(){
        $users = DB::select("SELECT users.id, users.first_name,users.last_name,users.email,users.status, roles.role_name FROM users JOIN roles ON users.role_id = roles.id");
        //$users = User::all();
        return view('show_users',['users'=>$users]);
    }

    public function editUsers($id){
        $users = User::find($id);
        $roles = Role::all();
        return view('edit_users',['users'=>$users],['roles'=>$roles]);
    }

    public function updateUsers(Request $req){
        
        User::where('id',$req->id)->update([
            'first_name'=>$req->f_name,
            'last_name' => $req->l_name,
            'email' => $req->email,
            'status'=>$req->status,
            'role_id'=>$req->role
        ]);
        $users = DB::select("SELECT users.id, users.first_name,users.last_name,users.email,users.status, roles.role_name FROM users JOIN roles ON users.role_id = roles.id");
        return redirect('/dashboard/showUsers')->with('users',$users);
    }

    public function deleteUsers($id){
        User::find($id)->delete();
        $users = DB::select("SELECT users.id, users.first_name,users.last_name,users.email,users.status, roles.role_name FROM users JOIN roles ON users.role_id = roles.id");
        return redirect('/dashboard/showUsers')->with('users',$users);
    }

    public function showQueries()
    {
        $data = Contact::all();
        return view('show_queries',['data'=>$data]);
    }

    public function showUserAddress()
    {
        $userdata = User_Address::all();
        return view('show_user_address',['userdata'=>$userdata]);
    }
    public function showUserOrders()
    {
        $userdata = User_Order::all();
        return view('show_user_orders',['userdata'=>$userdata]);
    }
    public function editOrderStatus($id){
        $order = User_order::find($id);
        return view('edit_order_status',['order'=>$order]);
    }

    public function updateOrderStatus(Request $req)
    {
        User_order::where('id',$req->id)->update([
            'order_status'=>$req->o_status,
        ]);
        return redirect('/dashboard/showUserOrders');
    }

}
