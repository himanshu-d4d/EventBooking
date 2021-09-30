<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use Validator;
use Exception;
use Password;
use DB;
use File;

class apis extends Controller
{
//////////// User Rgistrasion ////////////////

    public function register(Request $request){
     
        $validator = Validator::make($request->all(),[
               'name' => 'required',
               'username' => 'required|unique:users|alpha_dash',
               'email' => 'required|email',
               'password' => 'required',
               'c_password' => 'required|same:password',
               //'image' => 'required', 
        ]);
        if ($validator->fails()) {
          return response()->json($validator->errors(),HTTP_UNAUTHORIZED,);
        }
      try{
          $input = $request->all();
          if (User::where('email', $input['email'])->first()){
              return response()->json(['status' => 'error', 'message' =>'Email Already Exits'],HTTP_NOT_FOUND,);
            }
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
        //   dd($user);
          $responseArry = [];
          
          $responseArry['token'] = $user->createToken('myapp')->accessToken;
          //$user['remember_token'] = $responseArry['token'];

        //   dd($responseArry);
          $responseArry['code'] = HTTP_OK;
          $responseArry['name'] = $user->name;
          $responseArry['email'] = $user->email;
          $responseArry['image'] = $user->image;
          return response()->json(['status' => 'success', 'message' =>'Register Successfully','data'=>$responseArry],  HTTP_OK,);
          //return response()->json($responseArry,HTTP_CREATED,);
        }catch(Exception $e){
          return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
        }
         

    }

/////////// User Login //////////////

    public function login(Request $request){
      try{
        if(Auth::attempt(['email' =>$request->email,'password' =>$request->password ] )|| Auth::attempt(['username' =>$request->username,'password' =>$request->password])){
          $user = Auth::user();
          $responseArry = [];
          $responseArry['code'] = HTTP_OK;
          $responseArry['token'] = $user->createToken('myapp')->accessToken;
          $responseArry['name'] = $user->name;
          $responseArry['email'] = $user->email;
          $responseArry['image'] = $user->image;
          return response()->json(['status' => 'success', 'message' =>'Login Successfully','data'=>$responseArry],  HTTP_OK,);
        }else{
          return response()->json(['status' => 'error', 'message' =>'Invalid Email or Password'], HTTP_NOT_FOUND,);
   
        } 
   }catch(Exception $e){
       return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
  }
        
}

   //////user details api////////
      public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['status' => 'success', 'message' =>$user],HTTP_OK,); 
    } 
    //////// User Profile Update////////

    public function update(Request $request,$id){
      try{
          $user = Auth::user();
          $data = $request->all();
          //return response()->json(['success' => $user], '200');
          $oldimage = $user['image']; 
         //dd($oldimage);
          $image = $request->file('image');
          $imageName = time().'.'.$request->image->extension(); 
          if($imageName){
            $data['image'] = $imageName;
          }else{
            $data['image'] ="";
          }
          $image->move('images', $imageName);
          File::delete(public_path("images/$oldimage")); 
          $data['image'] = $imageName;
          $UpdateUser = User::where('id', $data['id'])
          ->update(['name' => $data['name'],
          'email' => $data['email'],
          'image' => $imageName,]);
          // dd($user);
          return response()->json(['status' => 'success', 'message' =>' Update Successfully'],HTTP_OK,);
      }catch(Exception $e){
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
   }
        
     
    }
////////////// Password Reset Token ///////////////

    public function resetToken(Request $request){
     
          $validator = Validator::make($request->all(),[ 
            'email' => 'required|email',
        ]);
        if ($validator->fails())
        {
        return response()->json($validator->errors(),HTTP_NOT_FOUND,);
        }
    try{
         $input = $request->all();
      //dd( $input);
         if (User::where('email', $input['email'])->first()) {
           $token=time();
            $data = DB::table('users')
              ->where('email',$input['email'])
              ->update(['reset_token' => $token]);
            return response()->json(['status' => 'success', 'message' =>' Token Generate Successfully','token' => $token],HTTP_OK,); 
         }else{
          return response()->json(['status' => 'error', 'message' =>'email not exits'],HTTP_NOT_FOUND,); 
        }
    }catch(Exception $e){
      return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
 }
     
 }
/////////////////Password Reset ///////////////

      public function passwordReset(Request $request){

        //$input['password'] = bcrypt($input['password']);
        $validator = Validator::make($request->all(),[
          'token' => 'required',
          'password' => 'required',
          'c_password' => 'required|same:password',

   ]);
   if ($validator->fails())
   {
   return response()->json($validator->errors(),HTTP_UNAUTHORIZED,);
   }
       try{
          $input = $request->all();
          if (User::where('reset_token', $input['token'])->first()) {
            $password = bcrypt($input['password']);
            //dd($password);
            $data = DB::table('users')
          ->where('reset_token',$input['token'])
          ->update(['password' => $password,'reset_token'=>""]);
          return response()->json(['status' => 'success', 'message' =>'Password Change Successfully'],HTTP_OK,);
      }else{
        return response()->json(['status' => 'error', 'message' =>'Email Does Not Exits'],HTTP_NOT_FOUND,);
       }
     }catch(Exception $e){
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
  }
}
///////// User Logout Api///////////
      public function logout(Request $request){
     try{
          if (Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();

            return response()->json(['status' => 'success', 'message' =>'Logout Successfully'],HTTP_OK,);
          }else {
            return response()->json(['status' => 'error', 'message' =>'Not Logout'],HTTP_SERVER_ERROR,);
          }
      }catch(Exception $e){
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
     }
        
  }
      
      /////////// Reset User Password/////////
      public function resetPassword(Request $request){  
        $user = Auth::user();
        $validator = Validator::make($request->all(),[ 
          'oldPassword' => 'required',
          'new_password' => 'required',
          'confirm_password' => 'required|same:new_password',
      ]);
      if ($validator->fails())
      {
      return response()->json($validator->errors(),202);
      }
      try{
          $request->all();
          $password = $user['password'];
          //dd($oldpassword);
          if (\Hash::check($request->oldPassword , $password )) {
            $newpassword = bcrypt($request->new_password);
            //dd( $newpassword);
            $data = DB::table('users')
            ->where('password',$password)
            ->update(['password' => $newpassword]);
            return response()->json(['status' => 'success', 'message' =>'Password Change Successfully'],HTTP_OK,);
        }else{
          return response()->json(['status' => 'error', 'message' =>'Incorrect Password'],HTTP_NOT_FOUND,);
        }
      }catch(Exception $e){
        return response()->json(['status' => 'error', 'message' =>$e->getMessage()],HTTP_BED_REQUESTED,);
     }  
    } 
    public function registration(){
      return view('admin.layouts.registration');
    }   
}  