@extends('frontend.layout.layout')
@section('header')
    <title>Contact Us</title>
    <style>
        .bg-voilet {
            background-color: #020028;
        }

        .text-orange {
            color: #E73801;
        }

        .bg-orange {
            background-color: #E73801;
        }
    </style>
@endsection
@section("content")
    
<div class="container-fluid bg-orange p-2">
        <div class="container display-6 text-center text-light my-2"><b>To contact us,</b>  please fill out the form below or visit us at</div>
        <div class="container text-light my-3 text-center"><i class="fa fa-map-marker"></i>
        Honda Vihan Honda Two Wheeler, 1st Floor, B-Type,F.No.103,
        Gut No. 145, Laxmi Residency, Shahapur, Mumbai Nashik
        Highway, Shahapur, Cherpoli, Thane, Maharashtra, 421601
        </div>
        <hr class="container text-light">
        <div class="container bg-light p-4 rounded">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Massege</label>
                    <textarea type="number" class="form-control" id="exampleInputPassword1"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mx-auto d-block bg-voilet">Submit</button>
            </form>

        </div>
    </div>


@endsection

@section("script")

@endsection