<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use DataTables;

class BannerController extends Controller
{
    
    public function index()
    {
        try{
            return view('admin.banner.banner');
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }   
    }

    public function data_table(Request $request){
        $data = Banner::latest()->get();
       
        if($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('banner_image', function($row){
                    $image = '<img src="'.url($row->banner_image).'" class="" height="80px" width="80px" />';
                    return !empty($image) ? $image : '-' ;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-success EditBtn" title="Edit">Edit</button>
                                  <button type="button" data-id="' . $row->id . '" class="btn btn-danger DeleteBtn" title="Delete">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action','banner_image'])
                ->make(true);
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
                'btn_title' => 'required',
                'btn_url' => 'required',
            ]);
            $input = $request->except('banner_id');
            if(!empty($request->banner_id)){
                if($request->has('banner_image')){
                    $imageName = time().'.'.$request->banner_image->extension();  
                    $input['banner_image'] = $request->banner_image->storeAs('public/banner_images', $imageName);
                }
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $banner = Banner::where('id',$request->banner_id)->update($input);
                return response()->json(['data' => $banner, 'status'=> 200, 'message'=> 'Banner update successfully done']);
            }else{
                if($request->has('banner_image')){
                    $imageName = time().'.'.$request->banner_image->extension();  
                    $input['banner_image'] = $request->banner_image->storeAs('public/banner_images', $imageName);
                }
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $banner = Banner::create($input);
                return response()->json(['data' => $banner, 'status'=> 200, 'message'=> 'Banner create successfully done']);
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
            $banner = Banner::find($id);
            return $banner;
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
            $banner = Banner::find($id)->delete();
            return response()->json(['data' => $banner, 'status'=> 200, 'message'=> 'Banner delete successfully done']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }
}
