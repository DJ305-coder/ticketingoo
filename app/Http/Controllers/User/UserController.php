<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;
use App\Models\Blog;
class UserController extends Controller
{
    //
    public function user_register(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return response()->json(['data' => $user, 'status' => 200, 'message' => 'User register successfully.']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        } 
    }

    public function user_login(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            $user_data = array(
                'email' => $request->get('email'),
                'password' => $request->get('password')
            );
            if (Auth::attempt($user_data)) {
                return redirect('/user/dashboard')->with('success', 'Login successfully!');
            } else {
                return redirect('/')->with('error', 'Invalid Login Details!');
            }
            
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        } 
        
    }


    public function dashboard_view()
    {
        try{
            $user_blogs = Blog::where('user_id',Auth::user()->id)->count();
            return view('user.dashboard.dashboard', compact('user_blogs'));
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        } 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Successfully!');
    }
}
