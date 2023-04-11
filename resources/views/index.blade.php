@extends('frontend.layout.layout')
@section('header')
    <title>Homepage</title>
@endsection
@section("content")
    <!-- ============== slider-area-start ============== -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if($banners->count() > 0 && $banners->isNotEmpty())
            @foreach($banners as $banner)
            <div class="carousel-item carousel-item-md active">
            <img src="{{$banner->banner_image}}" class="d-block w-100" alt="show1 poster">
                <div class="carousel-caption d-none d-md-block">
                <a href="{{$banner->btn_url}}" class="btn btn-danger bg-orange">{{$banner->btn_title}}</a>
            </div>
            </div>
            @endforeach
            @else

            @endif
        
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-fluid bg-voilet shows-cards pb-3 px-0">
        <nav class="container-fluid w-100 bg-light m-0">
            <div class="container-fluid nav nav-tabs d-flex" id="nav-tab" role="tablist" style="border-bottom: 0px;">
              <div class="container-fluid controls p-2">
                <form class="d-flex flex-wrap justify-content-center align-items-end" role="search">
                  <div class="col-12 col-md-8 d-flex justify-content-center align-items-end pb-1">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                  </div>
                </form>
              </div>
               
                <div class="d-flex justify-content-center catogories">
                    <button class="nav-link active text" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Live Shows</button>
                    <button class="nav-link text" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Plays</button>
                        <button class="nav-link text" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Music</button>
                        <!-- <button class="nav-link text" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Pune</button>
                        <button class="nav-link text" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Mumbai</button>
                        <button class="nav-link text" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Solapur</button> -->
                </div>
                
            </div>
            <div class="container-fluid bg-orange m-0" style="width: 100%;height: 2px;"></div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="display-4 text-center my-2 text-light">Available Shows</div>
                <div class="container-fluid d-flex flex-wrap justify-content-center ">
                    @foreach($events as $event)
                    <a href="{{url('show-detail')}}/{{$event->id}}" class="card-container my-2 mx-2">
                        <img src="{{$event->event_image}}" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">{{$event->title}}</h5>
                            <p class="card-text mb-0">
                                {!! Str::limit($event->description, str_word_count($event->description), '...') !!}
                            </p>

                            @php
                                $eventDate = \Carbon\Carbon::parse($event->date);
                                $now = \Carbon\Carbon::now();
                                $daysRemaining = $now->diffInDays($eventDate);
                            @endphp

                            <p class=" mt-0"></p><small>Realeased {{ $daysRemaining }} days ago</small></p>
                        </div>
                    </a>
                    @endforeach
                    
                    <!-- <a href="{{url('event-detail')}}" class="card-container my-2 mx-2">
                        <img src="{{asset('images/card-1.jpg')}}" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">To Rajhans Ek</h5>
                            <p class="card-text mb-0"> Presented by S.N.F. and Sapan</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="{{url('event-detail')}}" class="card-container my-2 mx-2">
                        <img src="{{asset('images/card-2.jpg')}}" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Dastan A Ramji</h5>
                            <p class="card-text mb-0">Presented by - Neha Kulkani and Akshay Shimpi</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="{{url('event-detail')}}" class="card-container my-2 mx-2">
                        <img src="{{asset('images/card-3.jpg')}}" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Dastan A Ramji</h5>
                            <p class="card-text mb-0">Presentred by - Department of Performing Arts Central University of Jharkhand</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="{{url('event-detail')}}" class="card-container my-2 mx-2">
                        <img src="{{asset('images/card-4.jpg')}}" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Laharon ke Ranjhan</h5>
                            <p class="card-text mb-0">Presentred by - Department of Performing Arts Central University of Jharkhand</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    
                    <a href="{{url('event-detail')}}" class="card-container my-2 mx-2">
                        <img src="{{asset('images/card-6.jpg')}}" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">National Vsant Natyostav 2023</h5>
                            <p class="card-text mb-0">Presentred by - Department of Performing Arts Central University of Jharkhand</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a> -->
                </div>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                ...
            </div>
        </div>
    </div>


@endsection

@section("script")

@endsection