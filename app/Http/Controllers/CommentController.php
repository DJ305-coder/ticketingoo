<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    
    public function store(Request $request)
    {
        try{
            $request->validate([
                'comment'=>'required',
                'blog_id'=>'required',
            ]);
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            $comment = Comment::create($input);
            return response()->json(['data' => $comment, 'status'=> 200, 'message'=> 'Comment add successfully done']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }  
    }

    public function reply(Request $request)
    {
        try{
            $request->validate([
                'reply'=>'required',
                'blog_id'=>'required',
                'parent_id'=>'required',
            ]);
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            $input['comment'] = $request->reply;
            $comment = Comment::create($input);
            return response()->json(['data' => $comment, 'status'=> 200, 'message'=> 'reply add successfully done']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }  
    }
}
