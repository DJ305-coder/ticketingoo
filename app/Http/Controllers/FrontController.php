<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Rating;
use App\Models\Like;
use App\Models\Banner;
use App\Models\Event;
use Session;
use DB;
class FrontController extends Controller
{
    //
    public function index(Request $request)
    {
        try{
            
            $banners = Banner::latest()->get();
            $events = Event::latest()->get();
            return view('index', compact('banners','events'));
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    public function get_blogs()
    {
        try{
            $blogs = Blog::whereStatus('active')
                        ->where('publish_date', '<=', \Carbon\Carbon::now())
                        ->with(['user'])
                        ->latest()
                        ->get();
            return $blogs;
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    public function event_detail($id)
    {
        
        try{
            $event = Event::whereId($id)->first();
            return view('event_detail',compact('event'));
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    
    // public function event_detail(){
    //     return view('event_detail');
    // }
}
