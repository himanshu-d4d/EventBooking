<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use File;
use Validator;
use App\Models\admin\Admin;

class AdminController extends Controller
{
    public function login(){
        return view('admin.layouts.login');  
    }
    public function adminlogin(Request $request){
      $validated = $request->validate([
        'email' => 'required|',
        'password' => 'required',
    ]);
        try{
            $user = $request->all();
            // dd($user);
            $userdata = array(
                'email' => $user['email'],
                'password' =>$user['password'],
            );
            // dd($userdata);
            if(Auth::guard('admin')->attempt($userdata)){
                   return redirect('admin/dashboard');
            }else{
                return redirect('/admin')->with('error','Email OR Password Does Not Match');
            }
           }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();          }
    }
    public function dashboard(){
        if (!Auth::check()) {
            return redirect('/admin'); // redirect to your specific page which is public for all
       }
            return view('admin/dashboard');
        
    }
    public function AdminProfile(){
        //dd($adminData);
       return view('admin.profile.admin_profile');
    }
    public function Profile(){
         //dd($adminData);
        return view('admin.profile.Edit_profile');
     }
     public function EditProfile(Request $request){
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
    ]);
      try{
        $data = $request->all();
        $result = Admin::where('id',$data['id'])
        ->update(['name'=>$data['name'],
        'email'=>$data['email']
     ]);
     return redirect('admin/profile');
      }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();   } 
      
    }
    public function AdminImage(){
        return view('admin.profile.edit_image');
     }
     public function editAdminImage(Request $request){
       try{
          $data = $request->all();
            $OldImage =  $data['old_image'];
            $image = $request->file('image');
            $imageName = time().'.'.$request->image->extension();
            $image->move('images', $imageName);
            File::delete(public_path("images/$OldImage"));
            $result = Admin::where('id', $data['id'])
            ->update(['image'=>$imageName]);
         return redirect('admin/profile');
       }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();   }   
     }
   public function ResetPassword(Request $request){
    return view('admin.profile.password_reset');
   }  
   public function ResetAdminPassword(Request $request){
       $admin = Auth::user();
    $validated = $request->validate([
        'old_password' => 'required',
        'password' => 'required',
       'c_password' => 'required|same:password', 
    ]);
      
   try{
       $data = $request->all();
      // dd($data);
        if (\Hash::check($request->old_password , $admin['password'] )) {
            $newpassword = bcrypt($data['password']); 
            //dd($newpassword);
         $result = Admin::where('id',$data['id'])
                ->update(['password'=>$newpassword]);
                return redirect('admin/reset-password')->with("success", "Password Reset Successfully !!");
      }else{
        return redirect('admin/reset-password')->with("error", "Old Password does not match");
      }
   } catch(Exception $e){
    echo 'Message: ' .$e->getMessage();   }
} 
   public function logout(){
        Auth::logout();
        return redirect('/admin');
      
   }
}
