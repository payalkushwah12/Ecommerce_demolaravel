<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;

class CmsController extends Controller
{
    public function addCms(){
        return view('create_cms');
    }

    public function postaddCms(Request $req)
    {
        $validateData = $req->validate(
            [
                'title'=>'required',
                'content'=>'required'
            ],
            [
                'title.required'=>'title is required',
                'content.required'=>'content is required', 
            ]);
        if($validateData)
        {
            CMS::create([
                    'title' => $req->title,
                    'content' => $req->content,
                ]);
            return back()->with('success',"CMS Added Successfully");
        }
        else
        {
            return back()->with('errMsg',"Enter Valid Data");
        }
    }

    public function showCms(){
        $cmsdata = CMS::all();
        return view('show_cms',['cmsdata'=>$cmsdata]);
    }

    public function editCms($id){
        $cms = CMS::find($id);
        return view('edit_cms',['cms'=>$cms]);
    }

    public function updateCms(Request $req)
    {
        CMS::where('id',$req->id)->update([
            'title' => $req->title,
            'content' => $req->content,
        ]);
        return redirect('/dashboard/showCms');
    }

    public function deleteCms($id){
        CMS::where('id',$id)->delete();
        return back()->with('success','CMS Content deleted');
    }
}
