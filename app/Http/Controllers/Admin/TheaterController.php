<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theater;
use DataTables;
class TheaterController extends Controller
{
    public function index()
    {
        try{
            return view('admin.theater.theater');
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }   
    }

    public function data_table(Request $request){
        $data = Theater::latest()->get();
       
        if($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button type="button" data-id="' . $row->id . '" class="btn btn-success EditBtn" title="Edit">Edit</i></button>
                                  <button type="button" data-id="' . $row->id . '" class="btn btn-danger DeleteBtn" title="Delete">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
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
                'theater_name' => 'required',
                'theater_address' => 'required',
                'map_url' => 'required',
            ]);
            $input = $request->except('theater_id');
            if(!empty($request->theater_id)){
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $theater = Theater::where('id',$request->theater_id)->update($input);
                return response()->json(['data' => $theater, 'status'=> 200, 'message'=> 'Theater update successfully done']);
            }else{
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $theater = Theater::create($input);
                return response()->json(['data' => $theater, 'status'=> 200, 'message'=> 'Theater create successfully done']);
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
            $theater = Theater::find($id);
            return $theater;
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
            $theater = Theater::find($id)->delete();
            return response()->json(['data' => $theater, 'status'=> 200, 'message'=> 'Theater delete successfully done']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }
}
