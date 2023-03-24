@extends('frontend.layout.layout')
@section('header')
    <title>Event Detail</title>
    <style>
        .show_img>img {
            width: 100%;
            border-radius: 20px;
        }

        body {
            background-color: #020028;
        }

        .show-container {
            background-color: #EDECF2;
            background-image: url(cinema-doodle-dark.png);
            /* border-bottom: 10px solid #E73801; */
        }

        .cast-card img {
            height: 75px;
            border-radius: 50%;
        }
        .cast-card > b{
            color: white;
        }
        .cast-card > small{
            color: white;
            opacity: 0.7;
        }

        #back-icon {
            color: gray;
            text-decoration: none;
            font-size: 25px;
            display: block;
            color: #E73801;
            margin-right: 10px;
        }
        #back-icon:hover{
            color: gray;
        }

        .cast {
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            width: 90%;
        }
        .description{
            background-color: #605E79;
        }
        #book-btn{
            position: fixed;
            bottom: 5px;
            right:5px;
            background-color: #E73801;
        }
    </style>
@endsection
@section("content")
   
    <div class="container-fluid show-container py-2">
        <a class="fa fa-chevron-circle-left" id="back-icon" href="#"></a>
        <div class="container show_img my-2">
            <img src="{{$event->event_image}}" alt="Show_img">
        </div>
        <div class="container content">
            <div class="display-4" id="show-title">{{$event->title}}</div>
            <hr>
            <div class="info d-flex flex-wrap justify-content-center">
                <div class="present mx-2">
                    <b class="label">Presented by - </b> <span class="data">{{$event->presented_by}}</span>
                </div>
                <div class="writer-directer mx-2">
                    <b class="label">Writer and Directer - </b> <span class="data">{{$event->writer_and_directers}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid description py-3">
        <div class="container text-light">
            <b>Description : </b><br>
            <p>{!! $event->description !!}</p>
        </div>
    </div>

    <!-- <div class="text-center display-6 text-light mt-3">
        Cast
    </div>
    <div class="cast my-2 container d-flex flex-wrap justify-content-center py-2">
        <div class="cast-card text-center m-1">
            <div class="card-image">
                <img src="{{asset('images/user.jfif')}}" alt="">
            </div>
            <b>Harish Bawaskar</b><br>
            <small>Lead Actor</small>
        </div>
        <div class="cast-card text-center m-1">
            <div class="card-image">
                <img src="{{asset('images/user.jfif')}}" alt="">
            </div>
            <b>Harish Bawaskar</b><br>
            <small>Lead Actor</small>
        </div>
        <div class="cast-card text-center m-1">
            <div class="card-image">
                <img src="{{asset('images/user.jfif')}}" alt="">
            </div>
            <b>Harish Bawaskar</b><br>
            <small>Lead Actor</small>
        </div>
        <div class="cast-card text-center m-1">
            <div class="card-image">
                <img src="{{asset('images/user.jfif')}}" alt="">
            </div>
            <b>Harish Bawaskar</b><br>
            <small>Lead Actor</small>
        </div>
        <div class="cast-card text-center m-1">
            <div class="card-image">
                <img src="{{asset('images/user.jfif')}}" alt="">
            </div>
            <b>Harish Bawaskar</b><br>
            <small>Lead Actor</small>
        </div>
    </div> -->
    <button type="button" class="btn btn-lg btn-danger" id="book-btn">Book tickets now</button>

@endsection

@section("script")

@endsection