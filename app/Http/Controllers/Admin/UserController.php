<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use File;

class UserController extends Controller
{
    public function UserList(Request $request, User $user){
        try{
         $records = $user;
         if($request->query('search')){
			$records = $records->where(function($q) use ($request) {
				$q->orWhere('name', 'like', '%'.$request->query('search').'%');
                $q->orWhere('email', 'like', '%'.$request->query('search').'%');
                $q->orWhere('username', 'like', '%'.$request->query('search').'%');
			});
		}
        $users = $records->paginate(10);
             //dd($users);
             return view('admin.users.user_list')->with(compact('users'));
        } catch(Exception $e){
            echo 'Message: ' .$e->getMessage();      }  
       
   } 
   public function UserEdit($id){
    
       try{
           //dd($request->all());
           $users = User::find($id);
            return view('admin.users.user_edit')->with(compact('users'));
       } catch(Exception $e){
        echo 'Message: ' .$e->getMessage();     }  
      
   } 
   public function UserUpdate(Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email,'.$request->id
    ]);
    try{
         $data = $request->all();
            User::where('id',$data['id'])
            ->update(['name'=>$data['name'],
                      'email'=>$data['email']]);
                      return redirect('admin/users');
         
    }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
  }  
   
} 
   public function UserCreate(){
       try{
            return view('admin.users.create_user');                                                             
       }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
       }  
   }
   public function UserStore(Request $request){
       //dd( $request->all());
    $validated = $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users|alpha_dash',
        'email' => 'required|unique:users',
        'password' => 'required',
        'c_password' => 'required|same:password',
        //'image' => 'required', 
 ]);
    try{
        $input = $request->all();
        //dd($input);
         $input['password'] = bcrypt($input['password']);  
         $file = $request->file('image');
          if ($file){
            $imageName = time().'.'.$request->image->extension();  
            // image upload in public/upload folde
              $file->move('images', $imageName);
              $input['image'] = $imageName;
          }
          $user = User::Create($input);
          return redirect('admin/users');                                                     
    }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }  
}
     public function UserDelete($id){
        try{
             $user = User::find($id);
             $imagePath = $user['image'];
             if($imagePath){
                File::delete(public_path("/images/$imagePath"));
               // unlink('image_path');
            }
              $user->delete();
              return redirect('admin/users');
        }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }  
     }
}
