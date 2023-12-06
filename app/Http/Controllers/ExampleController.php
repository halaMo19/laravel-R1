<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\Common;

// use Illuminate\Http\Request;


class ExampleController extends Controller
{
    use Common;
    public function test1(){
        return view("login");
    }

    public function login(){
        return view('login');
    }

    public function received(Request $request){
        $msg = "Your email is: " . $request->email . "<br> and Password is: " . $request->pwd;
        return  $msg;
    }

    public function verify(Request $request){
        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_extension;
        // $path = ' assets/images';
        // $request->image->move($path, $file_name);
        // return 'Uploaded';
        $h = $this->uploadFile($request->image,'assets/images');
        return $h;
    } 
    
    public function Upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }   

    public function showUpload (){
        return view("Upload");
}


}   