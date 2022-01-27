<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BannerController;
use App\Models\User;
use App\Models\Banner;


class BannerController extends Controller
{
    //
    public function addBanners(){
        return view('create_banners');
    }
    public function postaddBanners(Request $req){

        $validateData = $req->validate(
            [
                'b_title'=>'required',
                'b_description'=>'required',
            ],
            [
                'b_title.required'=>'Banner title is required',
                'b_description.required'=>'Banner Description is required',
            ]);
        if($validateData)
        {
            $images = $req->images;
            if(!empty($images))
            {
                $dest=public_path('/uploads');
                foreach($images as $item)
                {
                    $fname="Image-".rand()."-".time().".".$item->extension();
                    if($item->move($dest,$fname))
                    {
                        $user = Banner::create([
                            'banner_title'=>$req->b_title,
                            'banner_description'=>$req->b_description,
                            'banner_image'=>$fname
                            ]);
                    }
                    else
                    {
                        $path=public_path()."uploads/".$fname;
                        unlink($path);
                    }
                }
                return back()->with('success',"Banner Added Successfully");
            }
            else
            {
                return back()->with('errMsg','Please Upload Banner Image');
            } 
        }
        else
        {
            return back()->with('errMsg','Enter data');
        }
    }

    public function showBanners(){
        $banners = Banner::all();
        return view('show_banners',['banners'=>$banners]);
    }

    public function editBanners($id){
        $banners = Banner::find($id);
        return view('edit_banners',['banners'=>$banners]);
    }

    public function updateBanners(Request $req){
        $banners = Banner::all();
        $image = $req->image;
            if(!empty($image))
            {
                $dest=public_path('/uploads');
                    $fname="Image-".rand()."-".time().".".$image->extension();
                    if($image->move($dest,$fname))
                    {
                        Banner::where('id',$req->id)->update([
                            'banner_title'=>$req->b_title,
                            'banner_description' => $req->b_description,
                            'banner_image'=>$fname
                            ]);
                    }
                    else
                    {
                        $path=public_path()."uploads/".$fname;
                        unlink($path);
                        return back()->with('errMsg','Upload Error');
                    }
                return redirect('/dashboard/showBanners')->with('banners',$banners);
            }
            else
            {
                Banner::where('id',$req->id)->update([
                    'banner_title'=>$req->b_title,
                    'banner_description' => $req->b_description,
                ]);
                return redirect('/dashboard/showBanners')->with('banners',$banners);
            } 
    }

    public function deleteBanners($id){
        Banner::find($id)->delete();
        $banners = Banner::all();
        return redirect('/dashboard/showBanners')->with('banners',$banners);
    }
}
