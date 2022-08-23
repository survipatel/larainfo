<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data = ['name'=>"anita",'data'=>"hellonanita"];
        // $user['to']='survipatel2022@gmail.com';
        // Mail::send('mail',$data,fuction($messages) use($user){
        //     $messages->to($user['to']);
        //     $messages->subject('you are successfully registered');
        // });
        // //return view('home');


         $user = User::find(1)->toArray();
        
        Mail::send('mail', $user, function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('You are registered successfully');
        });
        dd('Mail Send Successfully');

    }
}
