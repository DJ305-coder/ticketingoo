@extends('frontend.layout.layout')
@section('header')
    <title>Show Detail</title>
    <style>
        <style>
        .text-voilet {
            color: #020028;
        }

        .bg-voilet {
            background-color: #020028;
        }

        .text-orange {
            color: #E73801;
        }

        .bg-orange {
            background-color: #E73801;
        }

        section {
            background-image: url(cinema-doodle-dark.png);
            background-color: #EDECF2;
        }

        #output {
            width: 50rem !important;
            background-color: #e7e7e7;
            zoom: 120%;
            margin: auto;
            transition: 1s;
        }

        .output-container {
            background-color: #e7e7e7;
            height: 250px;
            /* max-height: 230px; */
            padding: 20px 0px;

            overflow-x: scroll;
            overflow-y: scroll;
            scroll-snap-align: end;
            position: relative;
        }

        .chair {
            cursor: pointer;
            font-size: 8px;
            text-align: center;
            font-weight: bold;
            width: 14px;
            height: 15px;
            background-color: white;
            background-origin: border-box;
            display: inline-block;
            margin: 2px;
            border: 1px solid green;
            /* border-radius: 0px 0px 5px 5px; */
        }

        .zoom {
            position: sticky;
            bottom: 10px;
            left: 10px;
        }

        .zoom-icons:hover {
            color: #E73801;
            cursor: pointer;
            opacity: 0.5;
        }

        #already-booked {
            position: fixed;
            bottom: 5px;
            right: 5px;
            z-index: 2;
            display: none;
        }

        .show-info {
            flex-direction: column;
        }
        .screen{
            width: 200px;
            margin: 0px auto;
            height: 15px;
            text-align: center;
            font-size: 10px;
            background-color: #959595;
            border-radius: 10px 10px 0px 0px;
        }

        @media (min-width: 992px) {
            section {
                display: flex;
            }

            .show-info {
                flex-direction: row;
            }

            .total-box {
                max-width: 30%;
                margin: 10px;
            }

            /* .container{
                background-color: #E73801;
            } */
        }

        /* .alert-dismissible {
            position: fixed;
            bottom: 5px;
            right: 10px;
            display: none;
        } */
    </style>
   
    
@endsection
@section("content")
   
 
<section class="container-fluid py-2">
        <div>
            <div class="container bg-light py-2 d-flex show-info text-center">
                <div class="container px-0">
                    <img src="khatara_banner.jpg" alt="Show_img" class="img-fluid">
                </div>
                <div class="container d-flex flex-column justify-content-center">
                    <div id="show-name" class="display-6 text-center">
                        Khatara
                    </div>
                    <div class="info d-flex flex-wrap justify-content-center">
                        <div class="present mx-2">
                            <b class="label">Presented by - </b> <span class="data">Aapal Ghar</span>
                        </div>
                        <div class="writer-directer mx-2">
                            <b class="label">Writer and Directer - </b> <span class="data">Amol Devidas Salwe</span>
                        </div>
                    </div>
                    <div class="text-center my-2" id="showtiming">
                        <i class="fa fa-clock-o"></i> Saturday, March 25, 2023 9:30 PM
                    </div>
                </div>
            </div>
            <div class="container bg-white">
                <div class="container-fluid output-container" id="output-box">
                    <div id="output" class="p-3">
                        <div class="screen">Screen</div>
                    </div>
                </div>
                <div class="zoom">
                    <i class="fa fa-search-plus mx-1 zoom-icons" onclick="zoomin()"></i>
                    <i class="fa fa-search-minus mx-1 zoom-icons" onclick="zoomout()"></i>
                </div>
                <hr>
                <div class="info d-flex flex-wrap justify-content-center">
                    <div class="m-1">
                        <i class="fa fa-circle" style="color: gray;"></i><span> Already booked</span>
                    </div>
                    <div class="m-1">
                        <i class="fa fa-circle"
                            style="border :2px solid gray; color: white;border-radius: 50%;"></i><span>
                            Available</span>
                    </div>
                    <div class="m-1">
                        <i class="fa fa-circle" style="color: green;"></i><span> Selected</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container bg-light py-2 ml-1 my-0 total-box">
            <div class="display-6 fw-bold text-voilet">
                Tickets
            </div>
            <div class="container mt-2">
                <div id="bookedseats">

                </div>

                <div class="fw-bold text-secondary text-center mb-1 mt-4">
                    Total price : ₹<span id="totalprice">00</span>
                </div>
                <button class="btn btn-danger bg-orange w-100 my-1">
                    Continue
                </button>
            </div>
        </div>
    </section>
@endsection

@section("script")
<script  type="module" src="{{asset('front/js/seating.js')}}"></script>

@endsection