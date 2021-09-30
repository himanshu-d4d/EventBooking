<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\admin\Admin;

class AdminController extends Controller
{
    public function login(){
        return view('admin.layouts.login');  
    }
    public function adminlogin(Request $request){
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
                return redirect('/admin');
            }
           }catch(Exception $e){
               return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
          }
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
       $data = $request->all();
        $result = Admin::where('id',$data['id'])
        ->update(['name'=>$data['name'],
        'email'=>$data['email']
     ]);
     return redirect('admin/profile');
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
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
   }   
        
        
        // $imageName = time().'.'.$request->eimage->extension();
        // dd($imageName);
        // $image->move('images', $imageName);
        //return view('admin.profile.edit_image');
     }
   public function logout(){
        Auth::logout();
        return redirect('/admin');
      
   }
}
