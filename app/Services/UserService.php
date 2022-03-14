<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService{

   public function getAll(){
      return User::select('id','name','email','status','created_at','updated_at')->where('is_admin',0)->paginate(5);
   }

   public function find($id){
   	 return User::findOrFail($id);
   }

   public function add(array $data){

      return  User::create([
            'name' => $data['name'], 
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
   }

   public function update(array $data,$id){
      
      $user = $this->find($id);
      
      $user->update($data);
      $user->refresh();
      return $user;
   }


}