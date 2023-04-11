@extends('frontend.layout.layout')
@section('header')
    <title>Ticket booking - {{$event->title}}</title>
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
            background-image: url({{asset('images/cinema-doodle-dark.png')}});
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
    <!--<form>-->
    <!--  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"-->
    <!--    aria-labelledby="staticBackdropLabel" aria-hidden="true">-->
    <!--    <div class="modal-dialog">-->
    <!--      <div class="modal-content">-->
    <!--        <div class="modal-header">-->
    <!--          <h1 class="modal-title fs-5" id="staticBackdropLabel">User information</h1>-->
    <!--          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
    <!--        </div>-->
    <!--        <div class="modal-body">-->
    <!--          <div class="form-group">-->
    <!--            <label for="firstName">First Name</label>-->
    <!--            <input type="text" class="form-control" id="firstName" name="firstName" maxlength="15" pattern="[A-Za-z]+"-->
    <!--              required>-->
    <!--          </div>-->
    <!--          <div class="form-group">-->
    <!--            <label for="lastName">Last Name</label>-->
    <!--            <input type="text" class="form-control" id="lastName" name="lastName" maxlength="15" pattern="[A-Za-z]+"-->
    <!--              required>-->
    <!--          </div>-->
    <!--          <div class="form-group">-->
    <!--            <label for="email">Email</label>-->
    <!--            <input type="email" class="form-control" id="email" name="email" required>-->
    <!--          </div>-->
    <!--          <div class="form-group">-->
    <!--            <label for="phoneNumber">Phone Number</label>-->
    <!--            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>-->
    <!--          </div>-->
    <!--          <hr>-->
    <!--          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
    <!--          <button type="submit" class="btn btn-primary">Submit</button>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</form>-->
        <div>
            <div class="container bg-light py-2 d-flex show-info text-center">
                <div class="container px-0">
                    <img src="{{asset($event->event_image)}}" alt="Show_img" class="img-fluid">
                </div>
                <div class="container d-flex flex-column justify-content-center">
                    <div id="show-name" class="display-6 text-center fw-bold">
                    <div>{{$event->title}}</div>
                    <div class="fs-6 my-1">{{$event->short_description}}</div>
                    </div>
                    <div class="info d-flex flex-wrap justify-content-center">
                        <div class="present mx-2">
                            <b class="label">Presented by - </b> <span class="data">{{$event->presented_by}}</span>
                        </div>
                        <div class="writer mx-2">
                            <b class="label">Writer - </b> <span class="data">{{$event->writer}}</span>
                        </div>
                        <div class="writer mx-2">
                            <b class="label">Director - </b> <span class="data">{{$event->director}}</span>
                        </div>
                        <div class="text-center" id="showlocation">
                            <i class="fa fa-map-marker"></i>&nbsp;{{$event->location}}
                        </div>
                    </div>
                    <div class="text-center my-2" id="showtiming">
                        <i class="fa fa-clock-o"></i> {{$event->date}}&nbsp; {{$event->event_time}}
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
                <div class="container description">
                    <div class="head fw-bold">Description</div>
                    <div class="content mx-2">
                        {!! $event->description !!}}
                    </div>
                </div>
                <div class="tandc container py-2">
                    <p>
                        <a class="text-dark fw-bold" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                          Terms & Conditions <i class="fa fa-angle-double-down"></i>
                        </a>
                      </p>
                      <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            1. Internet handling fee per ticket may be levied.
                            Please check your total amount before payment.
                            <br>
                            2. In case of event being cancelled/postponed we will refund only the actual value of the ticket you purchased for and not the service fee.
                            <br>
                            3. Use of masks is mandatory at all times and the visitors are required to maintain social distancing norms.
                            <br>
                            4. Owing to the recent conditions surrounding the COVID – 19 pandemic, as a pre-condition to gaining access to the venue (events and theatres) you are required to be fully vaccinated and may be required to display your COVID – 19 certificate at the venue as per the various norms /regulations prevailing in the said State.
                            <br>
                            5. First come first serve seating arrangement.
                        </div>
                      </div>
                </div>
            </div>
            
        </div>
        <div class="container bg-light py-2 ml-1 my-0 total-box">
            <div class="display-6 fw-bold text-voilet bg-light">
                Tickets
            </div>
            <div class="container mt-2">
                <div id="bookedseats">

                </div>
                <div class="text-secondary mb-1 mt-2 mx-2">
                    <div>
                        Ticket price : ₹<span id="total-ticket">00</span>/-
                    </div>
                    <div>
                        Booking charge : ₹<span id="booking-charge">20</span>/-
                    </div>
                    <div>
                        GST <span id="tax-per">18</span>% : ₹<span id="totaltax"> 3.6</span>
                    </div>
                    <div class="fw-bold">
                        Total price : ₹<span id="totalprice"> 00</span>
                    </div>
                </div>
                <!--<button class="btn btn-danger bg-orange w-100 my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">-->
                <!--  continue-->
                <!--</button>-->
                <!--<form id="payment-form" action="{{ url('payment') }}" method="POST">-->
                <!--  @csrf-->
                <!--  <input type="hidden" name="event_id" value="{{ $event->id }}">-->
                <!--  <script src="https://checkout.razorpay.com/v1/checkout.js"-->
                <!--          data-key="{{ env('RAZORPAY_KEY') }}"-->
                <!--          data-amount="1000"-->
                <!--          data-buttontext="Pay 100 INR"-->
                <!--          data-name="John Deo"-->
                <!--          data-email="johndeo@gmail.com"-->
                <!--          data-description="Rozerpay"-->
                <!--          data-prefill.name="John Deo"-->
                <!--          data-prefill.email="johndeo@gmail.com"-->
                <!--          data-theme.color="#ff7529">-->
                <!--  </script>-->
                <!--</form>-->
             
             
                
               <form id="payment-form" action="{{ url('payment') }}" method="POST">
                  @csrf
                  <input type="hidden" name="event_id" value="{{ $event->id }}">
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <button type="button" id="pay-button" class="btn btn-primary bg-orange w-100 my-1">Pay</button>
                </form>
               
            </div>
        </div>
    </section>
@endsection

@section("script")
<!--<script  type="module" src="{{asset('front/js/seating.js')}}"></script>-->

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var payButton = document.getElementById('pay-button');

  payButton.addEventListener('click', function() {
    var amount = document.getElementById('totalprice').innerHTML * 100;
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;

    var options = {
      key: "{{ env('RAZORPAY_KEY') }}",
      amount: amount,
      name: name,
      email: email,
      description: "Rozerpay",
      prefill: {
        name: name,
        email: email
      },
      theme: {
        color: "#ff7529"
      }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
  });
</script>
<script>
    var bookings;
var zoom_count = 110;
var total_cost = 0;
var seats_status = {}
var seat_category;
let seats = 0
let ticketprice=0;
let booking_charges = 20
let tax = 18,total_bill=0,whole_charges=23.6

function setbill(price) {
    total_cost+=price;
    document.getElementById('total-ticket').innerHTML = total_cost;
    document.getElementById('booking-charge').innerHTML = booking_charges;
    document.getElementById('tax-per').innerHTML = tax;
    document.getElementById('totaltax').innerHTML = (booking_charges) / 100 * tax;
    document.getElementById('totalprice').innerHTML = total_cost+whole_charges;
}
var get_price_by_category = (key) => {
    for (var i in seat_category) {
        if (i > key) {
            // console.log(price)
            return price
        }
       var price = seat_category[i]
    }
    return price
}
const add_seat = (btn) => {
    // console.log(btn.id);
    let price = get_price_by_category(btn.id.slice(0, 1))
    console.log(price)
    if (!bookings.includes(btn.id)) {
        if (seats_status[btn.id] === 0) {
            btn.style.backgroundColor = "green";
            btn.style.color = "white";
            const seat_card = document.createElement("div");
            seat_card.innerHTML = showbookedseat(btn.id, price);
            seat_card.id = `${btn.id}_card`;
            // total_cost += price;
            // document.getElementById("totalprice").innerHTML = total_cost;
            document.getElementById("bookedseats").appendChild(seat_card);
            seats_status[btn.id] = 1;
        }
        else {
            btn.style.backgroundColor = "white";
            btn.style.color = "black";
            seats--;
            total_cost -= price;
            document.getElementById("totalprice").innerHTML = total_cost+(seats>0?whole_charges:0);
            document.getElementById('total-ticket').innerHTML = total_cost;
            document.getElementById("bookedseats").removeChild(document.getElementById(`${btn.id}_card`));
            seats_status[btn.id] = 0;
        }

    } else {
        document.getElementById("already-booked").style.display = "block";
        setTimeout(function () { document.getElementById("already-booked").style.display = "none" }, 2000);
        
    }
};

const remove_seat = (btn) => {
    // console.log(btn);
    btn.style.backgroundColor = "white";
    btn.style.color = "black";
    seats--;
    total_cost -= get_price_by_category(btn.id.slice(0, 1));
    document.getElementById("totalprice").innerHTML = total_cost+(seats>0?whole_charges:0);
    document.getElementById('total-ticket').innerHTML = total_cost;
    document.getElementById("bookedseats").removeChild(document.getElementById(`${btn.id}_card`));
    seats_status[btn.id] = 0;

};

const test = () =>{
    alert('tets');
};

const importJSON=(filename)=>{
    return {
    "maharastra_kala_acadamy": {
        "A": [
            5,
            1,
            12,
            1,
            5
        ],
        "B": [
            6,
            1,
            12,
            1,
            6
        ],
        "C": [
            9,
            2,
            12,
            3,
            8
        ],
        "D": [
            8,
            3,
            12,
            3,
            8
        ],
        "E": [
            7,
            4,
            12,
            4,
            8
        ],
        "F": [
            7,
            4,
            12,
            4,
            7
        ],
        "G": [
            4,
            4
        ],
        "H": [
            2,
            2
        ],
        "booking": [
            "A1",
            "A2",
            "A3",
            "B2",
            "C4",
            "D6",
            "F6",
            "A5"
        ],
        "categories": {
            "A": 100,
            "D": 200,
            "F": 300
        }
    },
    "mahakavi_kalidas_kalamandir": {
        "A": [
            3,
            6,
            4
        ],
        "B": [
            4,
            6,
            4
        ],
        "C": [
            4,
            6,
            5
        ],
        "D": [
            5,
            6,
            5
        ],
        "E": [
            5,
            3,
            3,
            5
        ],
        "F": [
            5,
            4,
            3,
            5
        ],
        "G": [
            5,
            4,
            4,
            5
        ],
        "H": [
            5,
            5,
            4,
            5
        ],
        "I": [
            5,
            5,
            5,
            5
        ],
        "J": [
            5,
            6,
            5,
            5
        ],
        "K": [
            5,
            6,
            6,
            5
        ],
        "L": [
            6,
            7,
            6,
            6
        ],
        "M": [
            7,
            7
        ],
        "N": [
            7,
            7
        ],
        "O": [
            8,
            8
        ],
        "P": [
            8,
            9
        ],
        "Q": [
            9,
            9
        ],
        "R": [
            9,
            10
        ],
        "S": [
            8,
            7
        ],
        "T": [
            11
        ],
        "AA": [
            6,
            5,
            4,
            6,
            5
        ],
        "BB": [
            5,
            6,
            4,
            6,
            5
        ],
        "CC": [
            6,
            6,
            4,
            6,
            6
        ],
        "DD": [
            3,
            6,
            5,
            6,
            3
        ],
        "EE": [
            6,
            5,
            6
        ]
    },
    "dadar_ravindra_mini_theater": {
        "A": [
            5,
            1,
            12,
            1,
            5
        ],
        "B": [
            6,
            1,
            12,
            1,
            6
        ],
        "C": [
            9,
            2,
            12,
            2,
            8
        ],
        "D": [
            8,
            3,
            12,
            3,
            8
        ],
        "E": [
            7,
            4,
            12,
            4,
            8
        ],
        "F": [
            7,
            4,
            12,
            4,
            7
        ],
        "G": [
            4,
            4
        ],
        "H": [
            2,
            2
        ],
        "booking": [
            "A1",
            "A2",
            "A3",
            "B2",
            "C4",
            "D6",
            "F6",
            "A5"
        ],
        "categories": {
            "A": 200,
            "D": 200,
            "F": 200
        }
    },
    "dadar_ravindra_natya_mandir": {
        "A": [
            6,
            11,
            6
        ],
        "B": [
            6,
            11,
            6
        ],
        "C": [
            7,
            12,
            7
        ],
        "D": [
            7,
            11,
            7
        ],
        "E": [
            8,
            12,
            8
        ],
        "F": [
            8,
            11,
            8
        ],
        "G": [
            9,
            12,
            9
        ],
        "H": [
            9,
            11,
            9
        ],
        "J": [
            10,
            12,
            10
        ],
        "K": [
            10,
            11,
            10
        ],
        "L": [
            11,
            12,
            11
        ],
        "M": [
            11,
            11,
            11
        ],
        "N": [
            12,
            12,
            12
        ],
        "O": [
            12,
            11,
            12
        ],
        "P": [
            11,
            12,
            11
        ],
        "Q": [
            10,
            11,
            10
        ],
        "R": [
            9,
            12,
            9
        ],
        "S": [
            8,
            11,
            8
        ],
        "T": [
            7,
            12,
            7
        ],
        "U": [
            6,
            11,
            6
        ],
        "V": [
            7,
            12,
            7
        ],
        "W": [
            12,
            12,
            12
        ],
        "X": [
            12,
            12,
            12
        ],
        "Y": [
            11,
            12,
            12
        ],
        "Z": [
            10,
            12,
            10
        ],
        "AA": [
            9,
            12,
            9
        ],
        "BB": [
            8,
            12,
            8
        ],
        "CC": [
            7,
            12,
            7
        ],
        "DD": [
            6,
            12,
            6
        ],
        "EE": [
            7,
            12,
            7
        ],
        "booking": [
            "A1",
            "A2",
            "A3",
            "B2",
            "C4",
            "D6",
            "F6",
            "A5"
        ],
        "categories": {
            "A": 100,
            "D": 200,
            "F": 300
        }
    },
    "dombivali_savitribai_phule": {
        "A": [
            8,
            7
        ],
        "B": [
            5,
            9
        ],
        "C": [
            10,
            9
        ],
        "D": [
            10,
            10
        ],
        "E": [
            11,
            10
        ],
        "F": [
            11,
            11
        ],
        "G": [
            12,
            11
        ],
        "H": [
            8,
            9,
            8
        ],
        "I": [
            9,
            9,
            9
        ],
        "J": [
            9,
            9,
            10
        ],
        "K": [
            10,
            9,
            10
        ],
        "L": [
            9,
            10,
            9
        ],
        "M": [
            10,
            10,
            9
        ],
        "N": [
            9,
            11,
            9
        ],
        "O": [
            9,
            11,
            9
        ],
        "P": [
            9,
            11,
            10
        ],
        "Q": [
            9,
            11,
            10
        ],
        "R": [
            9,
            12,
            9
        ],
        "S": [
            9,
            12,
            9
        ],
        "T": [
            2,
            3,
            4,
            2
        ],
        "booking": [
            "A1",
            "A2",
            "A3",
            "B2",
            "C4",
            "D6",
            "F6",
            "A5"
        ],
        "categories": {
            "A": 100,
            "D": 200,
            "F": 300
        }
    },
    "kalyan_acharya_atre_rangmandir": {
        "A": [
            3,
            4,
            3
        ],
        "B": [
            4,
            7,
            5
        ],
        "C": [
            5,
            7,
            5
        ],
        "D": [
            5,
            7,
            6
        ],
        "E": [
            4,
            7,
            3
        ],
        "F": [
            6,
            7,
            6
        ],
        "G": [
            7,
            6,
            6
        ],
        "H": [
            6,
            7,
            6
        ],
        "I": [
            7,
            6,
            6
        ],
        "J": [
            7,
            7,
            6
        ],
        "K": [
            7,
            7,
            6
        ],
        "L": [
            7,
            7,
            6
        ],
        "M": [
            7,
            7,
            6
        ],
        "N": [
            7,
            7,
            6
        ],
        "O": [
            7,
            7,
            6
        ],
        "P": [
            7,
            7,
            6
        ],
        "Q": [
            7,
            7,
            6
        ],
        "R": [
            7,
            7,
            6
        ],
        "S": [
            7,
            6,
            6
        ],
        "T": [
            6,
            7,
            5
        ],
        "U": [
            6,
            6,
            5
        ],
        "V": [
            5,
            7,
            4
        ],
        "W": [
            5,
            6,
            4
        ],
        "X": [
            1,
            7,
            1
        ],
        "booking": [],
        "categories": {}
    },
    "pimpari_chinchwad_ramkrishna_more": {
        "A": [
            4,
            7,
            4
        ],
        "B": [
            4,
            6,
            4
        ],
        "C": [
            5,
            7,
            5
        ],
        "D": [
            4,
            6,
            4
        ],
        "E": [
            5,
            7,
            5
        ],
        "F": [
            5,
            6,
            5
        ],
        "G": [
            5,
            7,
            5
        ],
        "H": [
            5,
            6,
            5
        ],
        "I": [
            6,
            7,
            6
        ],
        "J": [
            5,
            6,
            5
        ],
        "K": [
            6,
            7,
            6
        ],
        "L": [
            6,
            6,
            6
        ],
        "M": [
            6,
            7,
            6
        ],
        "N": [
            6,
            6,
            6
        ],
        "O": [
            7,
            7,
            7
        ],
        "P": [
            7,
            7,
            7
        ],
        "Q": [
            7,
            7,
            7
        ],
        "R": [
            7,
            6,
            7
        ],
        "S": [
            7,
            7,
            7
        ],
        "T": [
            7,
            6,
            7
        ],
        "U": [
            7,
            6,
            8
        ],
        "V": [
            7,
            7,
            7
        ],
        "W": [
            6
        ],
        "AA": [
            3,
            3
        ],
        "BB": [
            3,
            3
        ],
        "CC": [
            6,
            4,
            4,
            6
        ],
        "DD": [
            5,
            4,
            4,
            5
        ],
        "EE": [
            6,
            5,
            5,
            6
        ],
        "FF": [
            5,
            4,
            4,
            5
        ],
        "GG": [
            6,
            5,
            5,
            6
        ],
        "II": [
            5,
            5,
            5,
            5
        ],
        "JJ": [
            6,
            5,
            5,
            6
        ],
        "KK": [
            5,
            5,
            5,
            5
        ],
        "LL": [
            24
        ],
        "booking": [
            "A1",
            "A2",
            "A3",
            "B2",
            "C4",
            "D6",
            "F6",
            "A5"
        ],
        "categories": {
            "A": 100,
            "D": 200,
            "F": 300
        }
    },
    "thane_ram_ganesh_gadkari": {
        "A": [
            3,
            6,
            2
        ],
        "B": [
            3,
            6,
            3
        ],
        "C": [
            3,
            6,
            3
        ],
        "D": [
            3,
            6,
            3
        ],
        "E": [
            4,
            6,
            4
        ],
        "F": [
            4,
            5,
            4
        ],
        "G": [
            4,
            6,
            5
        ],
        "H": [
            4,
            6,
            4
        ],
        "J": [
            5,
            6,
            5
        ],
        "K": [
            5,
            5,
            5
        ],
        "L": [
            5,
            6,
            6
        ],
        "N": [
            6,
            6,
            5
        ],
        "P": [
            6,
            6,
            6
        ],
        "Q": [
            6,
            6,
            6
        ],
        "R": [
            6,
            6,
            6
        ],
        "S": [
            6,
            6,
            6
        ],
        "T": [
            6,
            6,
            6
        ],
        "U": [
            6,
            6,
            6
        ],
        "V": [
            6,
            6,
            6
        ],
        "W": [
            6,
            6,
            6
        ],
        "X": [
            6,
            6,
            6
        ],
        "Y": [
            5,
            5,
            4
        ],
        "booking": [
            "A1",
            "A2",
            "A3",
            "B2",
            "C4",
            "D6",
            "F6",
            "A5"
        ],
        "categories": {
            "A": 100,
            "D": 200,
            "F": 300
        }
    }
}
}

// const importJSON = (filename) => {
//     var xhr = new XMLHttpRequest();
//     xhr.overrideMimeType("application/json");
//     xhr.open("GET", filename, false);
//     xhr.send();
//     if (xhr.status == 200) {
//         return JSON.parse(xhr.responseText);
//     }
// };

const showbookedseat = (seatno, price) => {
    seats++;
    setbill(price);
    return '<div class="alert alert-info alert-dismissible fade show my-1" role="alert">' +
              '<strong>' + seatno + '</strong>' +
              '<br>' +
              '<small>₹' + price + '</small>' +
              '<button type="button" class="btn-close" onclick="remove_seat(' + seatno + ')" data-bs-dismiss="alert" aria-label="Close"></button>' +
          '</div>';
  };
  
const zoomin = () =>  {
    zoom_count += 20;
    document.getElementById("output").style.zoom = zoom_count + "%";
};
const zoomout = () => {
    zoom_count -= 20;
    document.getElementById("output").style.zoom = zoom_count + "%";
};
const booked_seat = (bookings) => {
    let seat;
    for (var id of bookings) {
        seat = document.getElementById(id);
        seat.style.backgroundColor = "gray";
        seat.style.color = "white";
        seats_status[id] = -1;
    }
}



// import seatingData from './seatingdata_1.json' assert { type: "json" };


function showarrangement(theater_name) {
    let btn, col, row, key, key2, width, counter, seatcounter, divider;
    let bg = "bg-warning";
    // let theater_name = "thane_ram_ganesh_gadkari";
    const theater_obj = importJSON("./seatingdata_1.json");
    // const theater_obj = seatingData;
    
    seat_category = theater_obj[theater_name].categories;
    console.log(seat_category)
    for (var i in theater_obj[theater_name]) {
        if (i in seat_category) {
            divider = document.createElement('div');
            divider.className = "row";
            divider.style.fontSize = "10px";
            divider.innerHTML = `<div class="col"><hr></div>
            <div class="col-auto" style="padding-top:8px">Booking charges ₹${seat_category[i]}/- per seat</div>
            <div class="col"><hr></div>`
            document.getElementById("output").appendChild(divider);
        }
        if (i == 'booking') {
            booked_seat(theater_obj[theater_name][i]);
            bookings = theater_obj[theater_name][i];

            break;
        }
        counter = 1;
        row = document.createElement("div");
        row.className = "d-flex justify-content-center flex-nowrap seat-row";
        // <p class="text-secondary m-1">A</p>
        key = document.createElement("div");
        key.innerHTML = `<b>${i}</b>`;
        key.className = "text-secondary m-1";
        row.appendChild(key);

        width = theater_obj[theater_name][i].reduce(function (total, value) { return total + value });
        // row.style.width= `${(width+2)*15}px`;
        // console.log((width + 2) * 15, width)
        seatcounter = 1;
        for (var j of theater_obj[theater_name][i]) {
            counter++;
            col = document.createElement("div");
            // console.log(theater_obj[theater_name][i].indexOf(j))
            if (counter % 2 == 0) {
                col.className = "";
            }
            else {
                col.className = "px-2";
            }

            for (let k = 0; k < j; k++) {
                const btn = document.createElement("div");
                btn.className = "chair";
                btn.id = i + seatcounter;
                seats_status[i + seatcounter] = 0;
                btn.innerHTML = seatcounter;
                btn.onclick = function() {
                    add_seat(this);
                };
                seatcounter++;
                col.appendChild(btn);
            }
            row.appendChild(col);
        }
        key2 = document.createElement("div");
        key2.innerHTML = `<b>${i}</b>`;
        key2.className = "text-secondary m-1";
        row.appendChild(key2);
        // console.log(row.offsetWidth);
       
        document.getElementById("output").appendChild(row);
    }
    document.getElementById('output-box').style.height = 230;
}


document.addEventListener("DOMContentLoaded", function(event) {
    const theater_name = "{{$event->theater->theater_name}}";
    showarrangement(theater_name);
});
</script>
@endsection