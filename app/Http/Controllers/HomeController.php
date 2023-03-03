<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //


    public function login(Request $request){

        // dd($request->all());


        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
       if( Auth::attempt(['email' => $email, 'password' => $password])){

        return redirect()->intended('email-template');
       }else{

        return redirect()->to('login')
        ->withErrors(trans('auth.failed'));
       }

    }

    public function emailTemplate(){
        // dd(auth()->user());
        return view('pages.emailTemplate');
    }




    public function createTemplate(Request $request){

        
        if($request->emailTemp){

            EmailTemplate::create([

                'user_id' => $request->userID,
                'emailTemp' => $request->emailTemp,
            ]);

        
        }
        return  redirect()->back()->with('success',"Email Template has been created");
       
    }
    
    
    public function emailTemplateList(Request $request){


            $emailTemps = EmailTemplate::where('user_id', auth()->user()->id)->get();
            

           
           
            return view('pages.temp-list', compact('emailTemps'));
        
       
    }

}
