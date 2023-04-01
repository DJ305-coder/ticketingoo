@extends('frontend.layout.layout')
@section('header')
    <title>About Us</title>
    <style>
        .bg-voilet {
            background-color: #020028;
        }

        .text-orange {
            color: #E73801;
        }
    </style>
@endsection
@section("content")
    
    <div class="container-fluid p-0">
        <div class="container my-4 mc-auto">
            <img src="images/logo.png" class="d-block mx-auto" alt="">
        </div>
        
        <div class="text-center container">
            <div class="display-6 my-2 fw-bold">About Us</div>

            <p>We have been an established and popular company with an excellent track record for the best customers
                satisfaction. We have never compromised on the quality and the services providing to the customer. We
                believe in
                keeping the customers happy & providing them with service at a very competent price.</p>

        </div>

        <div class="container-fluid p-3 mb-5 bg-voilet">
            <div class="container text-orange">
                <h4>Business Model</h4>
                <p class="card-text text-light">An online ticket booking Platform for entertainment shows & events.
                    Ticketingoo'is owned and operated by
                    Padmavijay Production & Kesarin Art, a company incorporated under the laws of India.
                    Through the Platform, Ticketingoo' shall provide the user, information, pricing, availability and
                    reservations
                    for booking tickets for entertainment shows, workshops, concerts and events listed across various
                    cities in
                    India and globally. Ticketingoo also provides the event organisers with hosting and marketing their
                    events
                    online globally.</p>

                <div>
                </div>
                <div class="display-6 my-2 text-center">
                    Features of Ticketingoo
                </div>

                <ul class="list-group">
                    <li class="list-group-item border-0">
                        <div class="fw-bold text-orange">Easy Hosting</div>
                        <div>You can focus on your show, rest we will provide you with all the facilities.</div>
                    </li>
                    <li class="list-group-item border-0">
                        <div class="fw-bold text-orange">One-Stop Solution For Hosting Online Events</div>
                        <div>You Demand & We Supply Live Streaming and Video on Demand,
                            both options on your finger tips. Ticketingoo is your answer for Hosting any kind of Online
                            events.</div>
                    </li>
                    <li class="list-group-item border-0">
                        <div class="fw-bold text-orange">New Age Ticket Booking Platform</div>
                        <div>We use latest technology to deliver a high-quality and user friendly
                            ticket booking experience.</div>
                    </li>
                    <li class="list-group-item border-0">
                        <div class="fw-bold text-orange">Easy & Fast Payments</div>
                        <div>Integrated Payment Gateway supporting country specific currency
                            payments globally.</div>
                    </li>
                    <li class="list-group-item border-0">
                        <div class="fw-bold text-orange">Global Platform</div>
                        <div>Market your event to the Global Audience with us.</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


@endsection

@section("script")

@endsection