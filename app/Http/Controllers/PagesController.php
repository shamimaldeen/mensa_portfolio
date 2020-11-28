<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function profile()
    {

    	$profile=DB::table('profiles')->get();
    	return view('pages.profile',compact('profile'));

    }




      public function storeprofile(Request $request)
    {
      
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['designation']=$request->designation;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['behance']=$request->behance;
        $data['globe']=$request->globe;
        $data['linkedin']=$request->linkedin;
        $image=$request->file('image');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/profile/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['image']=$image_url;
                $profile=DB::table('profiles')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully profile Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }else{
              $profile=DB::table('profiles')
                          ->insert($data);
                 $notification=array(
                     'messege'=>'Done!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }

    }


     public function Deleteprofile($id)
    {
        $data=DB::table('profiles')->where('id',$id)->first();
        $image=$data->image;
        unlink($image);
        $profile=DB::table('profiles')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully profile Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

    }



       public function Editprofile($id)
    {
         $profile=DB::table('profiles')->where('id',$id)->first();
         return view('pages.edit_profile',compact('profile'));
    }



      public function Updateprofile(Request $request,$id)
    {
        $oldlogo=$request->old_logo;
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['designation']=$request->designation;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['behance']=$request->behance;
        $data['globe']=$request->globe;
        $data['linkedin']=$request->linkedin;
        $image=$request->file('image');
            if ($image) {
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/profile/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['image']=$image_url;
                $profile=DB::table('profiles')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully profile Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('profiles')->with($notification);                      
            }else{
              $profile=DB::table('profiles')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->route('profiles')->with($notification); 
            }
    }


////---------About--------------------


   public function create()
    {
      $about=DB::table('abouts')->get();
      return view('pages.about.create',compact('about'));
    }



     public function store(Request $request)
    {

       $data=array();
        $data['description']=$request->description;
     
        $image=$request->file('image');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/about/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['image']=$image_url;
                $about=DB::table('abouts')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully about Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }else{
              $about=DB::table('abouts')
                          ->insert($data);
                 $notification=array(
                     'messege'=>' Added Done!',
                     'alert-type'=>'success'
                      );
                 return Redirect()->route('all.about')->with($notification);
            }
   
    }




    public function index()
    {
      $about=DB::table('abouts')->get();
        return view('pages.about.index',compact('about'));

    }

      public function Deleteabout($id)
    {
        $data=DB::table('abouts')->where('id',$id)->first();
        $image=$data->image;
        if ($image) {
           unlink($image);
        $about=DB::table('abouts')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully about Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

        }else{

             $about=DB::table('abouts')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully about Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   


        }
      
    }


  public function Editabout($id)
    {
         $about=DB::table('abouts')->where('id',$id)->first();
         return view('pages.about.edit_about',compact('about'));
    }



      public function Updateabout(Request $request,$id)
    {
        $oldlogo=$request->old_logo;
        $data=array();
       
        $data['description']=$request->description;
        $image=$request->file('image');
            if ($image) {
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/about/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['image']=$image_url;
                $about=DB::table('abouts')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully about Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.about')->with($notification);                      
            }else{
              $about=DB::table('abouts')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->route('all.about')->with($notification); 
            }
    }




////---------Resume------------------


   public function resume()
    {
      $resume=DB::table('resumes')->get();
      return view('pages.resume.create',compact('resume'));
    }




     public function storeresume(Request $request)
    {

       $data=array();
        $data['type']=$request->type;
        $data['title']=$request->title;
        $data['institute']=$request->institute;
        $data['description']=$request->description;

        $resume=DB::table('resumes')
                    ->insert($data);
           $notification=array(
               'messege'=>' Successfully Added Done!',
               'alert-type'=>'success'
                );
           return Redirect()->route('all.resume')->with($notification);
      
   
    }

     public function indexresume()
    {
      $resume=DB::table('resumes')->get();
        return view('pages.resume.index',compact('resume'));

    }


     public function Deleteresume($id)
    {
       $resumes=DB::table('resumes')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully resumes Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   


    }

    public function Editresume($id)
    {
         $resume=DB::table('resumes')->where('id',$id)->first();

       // return response()->json($resume);
         return view('pages.resume.edit_resume',compact('resume'));
    }




      public function Updateresume(Request $request,$id)
    {
        
        $data=array();
        $data['type']=$request->type;
        $data['title']=$request->title;
        $data['institute']=$request->institute;
        $data['description']=$request->description;
   

        $resumes=DB::table('resumes')->where('id',$id)->update($data);
           $notification=array(
               'messege'=>'Successfully resume Updated',
               'alert-type'=>'success'
                );
          return Redirect()->route('all.resume')->with($notification); 
            
    }

















    
}
