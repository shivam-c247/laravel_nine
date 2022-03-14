<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function show(){
        return view('admin.profile.show');
    }

    public function edit(){
        return view('admin.profile.edit');
    }

    public function update(Request $request){
       // validation check here
       $this->validate($request,[
        'name'=>['required','string'],
        'email'=>['required','string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
       ]);
       // get current login user object
       $profile= Auth::user();
     
       // set input for update in user table
       $profile->name = $request->name;
       $profile->email = $request->email;
       // update input data here
       $result = $profile->save();

       // if successfully update then if cond run otherwise else run
       if($result){
        // here page redirect to show profile page with success message
        return redirect()->route('profile.show')->with('success','your profile has been saved successfully!');       
      }
       else{
        // here page redirect to back request page with error message
        return redirect()->back()->with('error','something wrong please try again!');
       }
    }
}
