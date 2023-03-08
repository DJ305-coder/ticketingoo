<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;
use Auth;
use Str;
class BlogController extends Controller
{
    
    public function index()
    {
        try{
            return view('user.blog.blogs');
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }   
    }

    public function data_table(Request $request)
    {
        try{
            $data = Blog::where('status','active')
                        ->where('user_id',Auth::user()->id)
                        ->latest()
                        ->get();
            if($request->ajax()) {
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('blog_image', function($row){
                        $image = '<img src="'.url($row->blog_image).'" class="" height="80px" width="80px" />';
                        return !empty($image) ? $image : '-' ;
                    })
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-success EditBtn" title="Edit">Edit</i></button>
                                    <button type="button" data-id="' . $row->id . '" class="btn btn-danger DeleteBtn" title="Delete">Delete</button>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action','blog_image'])
                    ->make(true);
            }
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'blog_title' => 'required',
                'blog_description' => 'required',
            ]);
            $input = $request->except('blog_id');
            if(!empty($request->blog_id)){
                if($request->has('blog_image')){
                    $imageName = time().'.'.$request->blog_image->extension();  
                    $input['blog_image'] = $request->blog_image->storeAs('public/blog_images', $imageName);
                }
                $input['slug_url'] = Str::slug($request->blog_title);
                $input['publish_date'] = $request->filled('publish_date') ? date('Y-m-d', strtotime($request->input('publish_date'))) : NULL;
                $blog = Blog::where('id',$request->blog_id)->update($input);
                return response()->json(['data' => $blog, 'status'=> 200, 'message'=> 'Blog update successfully done']);
            }else{
                if($request->has('blog_image')){
                    $imageName = time().'.'.$request->blog_image->extension();  
                    $input['blog_image'] = $request->blog_image->storeAs('public/blog_images', $imageName);
                }
                $input['user_id'] = Auth::user()->id;
                $input['slug_url'] = Str::slug($request->blog_title);
                $input['publish_date'] = $request->filled('publish_date') ? date('Y-m-d', strtotime($request->input('publish_date'))) : NULL;
                $blog = Blog::create($input);
                return response()->json(['data' => $blog, 'status'=> 200, 'message'=> 'Blog create successfully done']);
            }
    
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $blog = Blog::find($id);
            return $blog;
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $blog = Blog::find($id)->delete();
            return response()->json(['data' => $blog, 'status'=> 200, 'message'=> 'Blog delete successfully done']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }
}
