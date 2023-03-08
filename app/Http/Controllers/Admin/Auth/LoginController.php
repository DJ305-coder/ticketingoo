<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use DB;
use Hash;
use App\Models\Banner;
class LoginController extends Controller
{
    //
    public function index()
    {
        try{
            $total_banners = Banner::where('status','active')->count();
            return view('admin.login');
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }


    public function dashboard_view()
    {
        try{
            $total_banners = Banner::where('status','active')->count();
            return view('admin.dashboard.dashboard',compact('total_banners'));
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    public function admin_login(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            $admin_data = array(
                'email' => $request->get('email'),
                'password' => $request->get('password')
            );
            if (Auth::guard('admin')->attempt($admin_data)) {
                return redirect('/admin/dashboard')->with('success', 'Login successfully!');
            } else {
                return redirect('/admin')->with('error', 'Invalid Login Details!');;
            }
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    //destroy login session data using logout function 
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('success', 'Logout Successfully!');
    }
}
