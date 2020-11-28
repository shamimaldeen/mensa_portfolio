<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SkillsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }



    public function skills()
    {

    	$skills=DB::table('skills')->get();
    	return view('pages.skills',compact('skills'));

    }



      public function storeskills(Request $request)
    {
      
        $data=array();
        $data['name']=$request->name;
        $data['percentage']=$request->percentage;
       
       
        $skills=DB::table('skills')
                  ->insert($data);
         $notification=array(
             'messege'=>' Added Done Successfully !',
             'alert-type'=>'success'
              );
        return Redirect()->back()->with($notification); 
    }




     public function Deleteskills($id)
    {
        $skills=DB::table('skills')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully Skills Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

    }


      public function Editskills($id)
    {
         $skills=DB::table('skills')->where('id',$id)->first();
         return view('pages.edit_skills',compact('skills'));
    }



     public function Updateskills(Request $request,$id)
    {
      
        $data=array();
        $data['name']=$request->name;
        $data['percentage']=$request->percentage;
       
       
      $skills=DB::table('skills')->where('id',$id)->update($data);
         $notification=array(
             'messege'=>'Update successfully done!',
             'alert-type'=>'success'
              );
        return Redirect()->route('skills')->with($notification); 
    




}

}

