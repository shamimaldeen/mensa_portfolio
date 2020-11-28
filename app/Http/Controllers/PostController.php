<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


       public function create()
    {
      $post=DB::table('posts')->get();
      return view('pages.post.create',compact('post'));
    }



     public function store(Request $request)
    {

       $data=array();
        $data['title']=$request->title;
        $data['description']=$request->description;
     
        $image=$request->file('image');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/post/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['image']=$image_url;
                $post=DB::table('posts')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully post Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }else{
              $post=DB::table('posts')
                          ->insert($data);
                 $notification=array(
                     'messege'=>' Added Done!',
                     'alert-type'=>'success'
                      );
                 return Redirect()->route('all.post')->with($notification);
            }
   
    }


     public function index()
    {
      $post=DB::table('posts')->get();
        return view('pages.post.index',compact('post'));

    }


          public function Deletepost($id)
    {
        $data=DB::table('posts')->where('id',$id)->first();
        $image=$data->image;
        if ($image) {
           unlink($image);
        $post=DB::table('posts')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully post Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

        }else{

             $post=DB::table('posts')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully post Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   


        }
      
    }


  public function Editpost($id)
    {
         $post=DB::table('posts')->where('id',$id)->first();
         return view('pages.post.edit_post',compact('post'));
    }


     public function Updatepost(Request $request,$id)
    {
        $oldlogo=$request->old_logo;
        $data=array();
       
        $data['title']=$request->title;
        $data['description']=$request->description;
        $image=$request->file('image');
            if ($image) {
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/post/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['image']=$image_url;
                $post=DB::table('posts')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully post Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.post')->with($notification);                      
            }else{
              $post=DB::table('posts')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->route('all.post')->with($notification); 
            }
    }




}
