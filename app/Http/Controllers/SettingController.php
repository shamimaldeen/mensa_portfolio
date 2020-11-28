<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SettingController extends Controller
{    


  public function __construct()
    {
        $this->middleware('auth');
    }


    public function settings()
    {

    	$settings=DB::table('settings')->get();
    	return view('pages.settings',compact('settings'));

    }


      
      public function storesettings(Request $request)
    {
      
        $data=array();
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['web']=$request->web;
        $image=$request->file('banner');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/banner/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['banner']=$image_url;
                $settings=DB::table('settings')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully settings Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }else{
              $settings=DB::table('settings')
                          ->insert($data);
                 $notification=array(
                     'messege'=>'Successfully added done!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }

    }


     public function Deletesettings($id)
    {
        $data=DB::table('settings')->where('id',$id)->first();
        $banner=$data->banner;
        unlink($banner);
        $settings=DB::table('settings')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully settings Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

    }




       public function Editsettings($id)
    {
         $settings=DB::table('settings')->where('id',$id)->first();
         return view('pages.edit_settings',compact('settings'));
    }



      public function Updatesettings(Request $request,$id)
    {
        $oldlogo=$request->old_logo;
        $data=array();
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['web']=$request->web;
        $image=$request->file('banner');
            if ($image) {
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/banner/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['banner']=$image_url;
                $settings=DB::table('settings')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully settings Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('settings')->with($notification);                      
            }else{
              $settings=DB::table('settings')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->route('settings')->with($notification); 
            }
    }





  

 


}
