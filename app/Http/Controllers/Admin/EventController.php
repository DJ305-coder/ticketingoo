<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use DataTables;
use Str;
class EventController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.events.events');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.add-event');
    }

    // This function is for datatable
    public function data_table(Request $request)
    {
        
        
        $events = Event::where('status', '!=', 'delete')
                        ->orderBy('id', 'DESC')
                        // ->select('id','date','title','event_image')
                        ->get();
        // return $events;
        if ($request->ajax()) {
            return DataTables::of($events)
            ->addIndexColumn()
            ->addColumn('date', function ($row){
                return !empty($row->date) ? date('M-d-Y',strtotime($row->date)) : '-';
            })
            ->addColumn('event_image', function($row){
                $image = '<img src="'.url($row->event_image).'" class="" height="80px" width="80px" />';
                return !empty($image) ? $image : '-' ;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="'.url('admin/events/'.$row->id ).'"> <button type="button" data-id="" class="btn btn-primary btn-xs View_button" title="View">View</button></a>
                            <a href="' . url('admin/events/' . $row->id . '/edit') . '"> <button type="button" data-id="' . $row->id . '" class="btn btn-success btn-xs Edit_button" title="Edit">Edit</button></a>
                            <button data-id="' . $row->id . '" class="btn btn-danger btn-xs DeleteBtn" title="Delete">Delete</button>';
                return $actionBtn;
            })
            ->rawColumns(['date','action','event_image'])
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
        //checking server side validation
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required',
        ]);
        $input = $request->all();
        $id = $request->txtpkey;
        $old_data = Event::find($id);
        if(!empty($id)){
            $check_id = Event::where('id','!=',$id)
                    ->where('title','=',$request->title)
                    ->where('status','!=','delete')
                    ->first();
            if(!empty($check_id)){
                return redirect('/admin/events/create')->with('error', 'This title already exists!');
            }else{
                if($request->hasFile('event_image')){
                    $imageName = time().'.'.$request->event_image->extension();  
                    $input['event_image'] = $request->event_image->storeAs('public/event_images', $imageName);
                }
                // slug
                $input['date'] = date('Y-m-d',strtotime($input['date']));
                $input['slug_url'] = Str::slug($input['title']);
                $input['modified_by'] = auth()->guard('admin')->user()->id;
                $input['modified_ip_address'] = $request->ip();
                Event::find($id)->update($input);
                $new_data = Event::find($id);
                return redirect('admin/events')->with('success','Event updated successfully!');
            }

        }else{
            //create blog
            $check_duplicate = Event::where('title', $request->title)
                                        ->where('status','!=','delete')
                                        ->get();
            if(($check_duplicate)->isEmpty()){
                if($request->hasFile('event_image')){
                    $imageName = time().'.'.$request->event_image->extension();  
                    $input['event_image'] = $request->event_image->storeAs('public/event_images', $imageName);
                }

                // slug
                $input['date'] = date('Y-m-d',strtotime($input['date']));
                $input['slug_url'] = Str::slug($input['title']);
                $input['created_by'] = auth()->guard('admin')->user()->id;
                $input['created_ip_address'] = $request->ip();
                $input['status'] = 'active';
                Event::create($input);
                return redirect('admin/events')->with('success','Event added successfully!');
            }else{
                return redirect('admin/events/create')->with('error','This title already exists!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $event = Event::where('id','=',$id)
                    ->select('id','title','date','slug_url','description','event_image')
                    ->first();
      
        return view('admin.events.view-event',compact('event'));
    }

    // This function is to check if blog name already exists or not
    public function event_title_exists(Request $request){

        $title = Event::where('title','=',$request->title)
                ->where('status','!=','delete')
                ->select('title');
                if(!empty($request->txtpkey)){
                    $title = $title->where('id','!=',$request->txtpkey);
                }
                $title = $title->first();

        return !empty($title) ? 'false' : 'true';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::where('id','=',$id)
                    ->select('id','title','date','description','slug_url','event_image')
                    ->first();
        return view('admin.events.add-event', compact('event'));
    }

    public function destroy($id)
    {
        try{
            $event = Event::find($id)->delete();
            return response()->json(['data' => $event, 'status'=> 200, 'message'=> 'Event delete successfully done']);
        }catch(\Exception $e){
            $message = $e->getMessage();
            return response()->json(['Error' => $message]);
        }
    }
   

}
