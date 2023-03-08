<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class RatingController extends Controller
{
    //
    public function add_rating(Request $request){
        try{
            $request->validate([
                'rating'=>'required',
                'blog_id'=>'required',
            ]);
            $input = $request->all();
            $user_check = Rating::where(['blog_id' => $request->blog_id, 'user_id' => auth()->user()->id])->update($input);
            if(!empty($user_check)){
                return response()->json(['status'=> 200, 'message'=> 'Rating gives successfully done.']);
            }
            $input['user_id'] = auth()->user()->id;
            $rating = Rating::create($input);
            return response()->json(['data' => $rating, 'status'=> 200, 'message'=> 'Rating gives successfully done']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }
}
