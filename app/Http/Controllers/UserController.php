<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(UserService $userService){
         $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
           
           $users = $this->userService->getAll();
           return view('admin.users.index',['users'=> $users]);
        }catch(Exception $ex){
          return back()->with('error',$ex->getMessage());

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation check 
        $input = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        try{
           /**
            * @param array $input
            * save all $request 
            **/ 
           $result = $this->userService->add($input);
           if($result){
            return redirect(route('admin.users.index'))->with('success','user added successfully');
           }else{
            return back()->with('error','user not added!');
           }
        }catch(Exception $ex){
           return back()->with('error',$ex->getMessage());
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
           // get details user's by id
           $user = $this->userService->find($id);
           return view('admin.users.show',['user'=> $user]);
        }catch(Exception $ex){
          return back()->with('error',$ex->getMessage());

        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
           // get details user's by id
           $user = $this->userService->find($id);
           if($user)
           return view('admin.users.edit',['user'=> $user]);
           return back()->with('error','Please Try again');
        }catch(Exception $ex){
          return back()->with('error',$ex->getMessage());

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation check 
        $input = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email'=>['required','string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        try{
             
           /**
            * @param array $input of validated $request
            * @param int $id
            * for user update function
            **/ 
       
            $result = $this->userService->update($input,$id);
            if($result){
               return redirect(route('admin.users.index'))->with('success','User updated successfully'); 
            }else{
             return back()->with('error','User not updated');
            }
           
           
        }catch(Exception $ex){
           return back()->with('error',$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = $this->userService->find($id);
        $result = $user->delete($id);
        if($result){
               return redirect(route('admin.users.index'))->with('success','User deleted successfully'); 
        }else{
             return back()->with('error','User not deleted!');
        }
    }
}
