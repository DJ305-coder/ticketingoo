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

    public function blog_detail($id)
    {
        
        try{
            $data['blog'] = Blog::whereId($id)
                            ->with(
                                'user:id,name',
                                'comments.user:id,name',
                                'comments.replies',
                                'comments.replies.user:id,name',
                                'likes'
                            )
                            ->latest()
                            ->first();
            $data['avg'] = Rating::where('blog_id',$id)->avg('rating');
            $data['likes'] = Like::where('blog_id',$id)->count();
            return $data;
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }

    public function add_like(Request $request)
    {
        try{
            $request->validate([
                'blog_id'=>'required',
            ]);
            $input = $request->all();
            $user_check = Like::where(['blog_id' => $request->blog_id, 'user_id' => auth()->user()->id])->first();
            if(!empty($user_check)){
                $user_check->delete();
                return response()->json(['status'=> 200, 'message'=> 'Dislike !']);
            }else{
                $input['user_id'] = auth()->user()->id;
                $input['like'] = 1;
                $like = Like::create($input);
                return response()->json(['data' => $like, 'status'=> 200, 'message'=> 'Liked !']);
            }
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }


    public function event_detail(){
        return view('event_detail');
    }
}
