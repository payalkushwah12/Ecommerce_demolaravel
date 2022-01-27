<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    public function addConfigure(){
        return view('create_configure');
    }

    public function postaddConfigure(Request $req){
        $validatedData = $req->validate([
            'admin_email'=>'required',
            'n_email'=>'required',
            'contact'=>'required|min:10|max:10',
        ],
        [
            'admin_email.required'=>'Admin email is required',
            'n_email.required'=>'Notification Email is required',
            'contact.required'=>'Contact no. is required',
        ]);

        if($validatedData)
        {
            Configuration::create([
            'admin_email'=>$req->admin_email,
            'notification_email'=>$req->n_email,
            'contact_no'=>$req->contact,
            ]);
            return back()->with('success',"Configuration Added Successfully");
        }
        else
        {
            return back()->with('errMsg','Enter valid data');
        } 
    } 
    public function showConfigure(){
        $configure = Configuration::all();
        return view('show_configure',['configure'=>$configure]);
    }

    public function editConfigure($id){
        $configure = Configuration::find($id);
        return view('edit_configure',['configure'=>$configure]);
    }

    public function updateConfigure(Request $req)
    {
        Configuration::where('id',$req->id)->update([
            'admin_email'=>$req->admin_email,
            'notification_email'=>$req->n_email,
            'contact_no'=>$req->contact,
        ]);
        return redirect('/dashboard/showConfigure');
    }
}
