<div class="container">
    <div class="row">
        @if(!empty($blogs[0]))
        <div class="col-md-6">
            <div class="card">
                <img  class="card-img" src="{{Storage::url($blogs[0]->blog_image)}}" class="card-img-top" alt="...">
                <div class="card-img-overlay text-white">
                    <h5 class="card-title"></h5>
                    <div class="card-footer view-blog text-center" data-id="{{$blogs[0]->id}}" data-toggle="modal" data-target="#myModal">                   
                        <strong> {{$blogs[0]->blog_title}}</strong> 
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!empty($blogs[1]))
        <div class="col-md-3">
            <div class="card">
                <img  class="card-img" src="{{Storage::url($blogs[1]->blog_image)}}" class="card-img-top" alt="...">
                <div class="card-img-overlay text-white">
                    <h5 class="card-title"></h5>
                    <div class="card-footer view-blog text-center" data-id="{{$blogs[1]->id}}" data-toggle="modal" data-target="#myModal">                   
                        <strong> {{$blogs[1]->blog_title}}</strong> 
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!empty($blogs[2]))
        <div class="col-md-3">
            <div class="card">
                <img  class="card-img" src="{{Storage::url($blogs[2]->blog_image)}}" class="card-img-top" alt="...">
                <div class="card-img-overlay text-white">
                    <h5 class="card-title"></h5>
                    <div class="card-footer view-blog text-center"  data-id="{{$blogs[2]->id}}" data-toggle="modal" data-target="#myModal">                   
                        <strong> {{$blogs[2]->blog_title}}</strong> 
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        @if(!empty($blogs[3]))
        <div class="col-md-3">
            <div class="card">
                <img  class="card-img" src="{{Storage::url($blogs[3]->blog_image)}}" class="card-img-top" alt="...">
                <div class="card-img-overlay text-white">
                    <h5 class="card-title"></h5>
                    <div class="card-footer view-blog text-center" data-id="{{$blogs[3]->id}}" data-toggle="modal" data-target="#myModal">                   
                        <strong> {{$blogs[3]->blog_title}}</strong> 
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(!empty($blogs[4]))
        <div class="col-md-9">
            <div class="card">
                <img  class="card-img" src="{{Storage::url($blogs[4]->blog_image)}}" class="card-img-top" alt="...">
                <div class="card-img-overlay text-white">
                    <h5 class="card-title"></h5>
                    <div class="card-footer view-blog text-center" data-id="{{$blogs[4]->id}}" data-toggle="modal" data-target="#myModal">                   
                        <strong> {{$blogs[4]->blog_title}}</strong> 
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
        
    <div class="d-flex">
        <div class="mx-auto">
            {!! $blogs->links() !!}
        </div>
    </div>

</div>