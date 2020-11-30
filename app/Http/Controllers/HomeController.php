<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }




     //contact------------------
      public function storecontact(Request $request)
    {
        
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['comment']=$request->comment;
       
       
        $contact=DB::table('contacts')
                  ->insert($data);
         $notification=array(
             'messege'=>' Successfully Done !',
             'alert-type'=>'success'
              );
        $details = [
            
            'name'     =>$request->name,
            'email'      =>$request->email,
            'comment'   =>$request->comment
        ];

        try {
            /*$e = FlattenException::create($exception);

            $handler = new SymfonyExceptionHandler();

            $html = $handler->getHtml($e);
            */
            \Mail::to('shamimaldeen@gmail.com')->send(new \App\Mail\MyTestMail($details));
            //throw new \Exception("failed");
            return redirect('/#success-block-mail')->with($notification); 

        } catch (Exception $e) {
            echo $e->getMessage();
        
        }
       
       

      
    }

    
}
