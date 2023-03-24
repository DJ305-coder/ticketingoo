@extends('admin.layout.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="card-title">
                    Event List
                    <span class="pull-right">
                        <button class="btn common-btn btn-danger">
                            <a href="{{url('events')}}">
                                <i class="fa fa-arrow-circle-left"></i>
                                Back</a>
                        </button>
                    </span>
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-1">
                <div class="card">
                    <div class="card-body body-height">
                        <div class="basic-form">
                            <form action="{{route('events.store')}}" method="post" id="event_form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <label>Select Theater</label>
                                                    <select class="form-control" name="theater_id" id="theater_id">
                                                        <option value="" selected disabled>Select Theater</option>
                                                        @if ($theaters->isNotEmpty())
                                                            @foreach ($theaters as $theater)
                                                            <option {{!empty($event->theater_id) && $event->theater_id == $theater->id ? 'selected' : ''; }} value="{{$theater->id}}">{{$theater->theater_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="basic-form">
                                                            <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($event->id) ? $event->id : ''}}">
                                                            <div class="form-group">
                                                                <label>Event
                                                                    Title</label>
                                                                <input type="text" name="title" id="title" class="form-control input-flat" value="{{!empty($event->title) ? $event->title : ''}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <label>Event Date</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control mydatepicker" autocomplete="off"  name="date" id="datepicker" placeholder="mm/dd/yyyy"  autocomplete="off" value="{{!empty($event->date) ? $event->date : ''}}" />
                                                    <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                                </div>
                                                <label id="datepicker-error" class="error" for="datepicker"></label>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="basic-form">
                                                    <div class="form-group">
                                                        <label>Presented by</label>
                                                        <input type="text" name="presented_by" id="presented_by" class="form-control input-flat" value="{{!empty($event->presented_by) ? $event->presented_by : ''}}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="lablefnt">Upload Event Image<span style="color: red">*
                                                <span style="color: red;font-size: 11px;">(size 375px X 175px)</span></label>
                                        <input name="event_image" class="form-control valid preview" id="event_image" type="file" accept="image/*" />

                                        <!-- <label id="blog_image-error" class="error" for="blog_image">* Please select image.</label><br> -->
                                        <div>
                                            <img src="{{!empty($event->event_image) ? $event->event_image : asset('admin_panel/commonarea/dist/img/default.png')}}" id="preview_event_image" class="prof-photo mt-10 photo-height-fixed preview_image" width="150" />
                                        </div>
                                        <input type="hidden" name="old_image" id="old_image" value="{{!empty($event->event_image) ?  $event->event_image : ''}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Writer and Directer</label>
                                                <input type="text" name="writer_and_directers" id="writer_and_directers" class="form-control input-flat" value="{{!empty($event->writer_and_directers) ? $event->writer_and_directers : ''}}" />
                                            </div>
                                        </div>
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Select Show Category</label>
                                                <select class="form-control" id="event_type" name="event_type">
                                                    <option value="" disabled selected>Select Show</option>
                                                    <option value="live" {{!empty($event->event_type) && $event->event_type == 'live' ? 'selected' : ''}}>Live</option>
                                                    <option value="plays" {{!empty($event->event_type) && $event->event_type == 'plays' ? 'selected' : ''}} >Plays</option>
                                                    <option value="music" {{!empty($event->event_type) && $event->event_type == 'music' ? 'selected' : ''}}>Music</option>  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 summernote-no-padd">
                                        <div class="">
                                            <div class="card-body">
                                                <label>Description</label>
                                                <textarea name="description" id="description" class="form-control summernote" autocomplete="off" >{{!empty($event->description) ? $event->description : ''}}</textarea>
                                                <label id="description-error" class="error description-error" for="description"></label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <button class="btn submit common-btn button-padd-left btn-success m-b-30 m-t-15 f-s-14 p-l-10 p-r-20 m-r-10" type="submit">
                                        <i class="icon-check"></i> Submit
                                    </button>
                                    <a href="" class="btn common-btn button-padd-left btn-danger m-b-30 m-t-15 f-s-14 p-l-10 p-r-20 m-r-10" type="button">
                                        <i class="icon-close"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('admin_panel/js/controller_js/event.js')}}"></script>
<script>
    $(".s_meun").removeClass("active");
    $(".event_active").addClass("active");
    $('#datepicker').datepicker({
            weekStart: 1,
            autoclose: true,
            todayHighlight: true,
        })

        .on("changeDate", function(selected) {
            $('#datepicker-error').html("");
            $('#datepicker-error').removeClass("error");
            $('#datepicker').removeClass("error");
        });
</script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
        }).on('summernote.keyup', function() {
            var text = $(".summernote").summernote("code").replace(/&nbsp;|<\/?[^>]+(>|$)/g, "").trim();
            //alert(text);
            if (text.length == 0) {
                $('.description-error').show();
            } else {
                $('.description-error').hide();
                // $("#btnForm").removeAttr("disabled");
            }
        });
    });
</script>
@endsection