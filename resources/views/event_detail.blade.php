<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
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
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-voilet" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light navtitle" id="yuu" href="{{url('')}}"><img src="{{asset('images/logo.png')}}" alt="logo" style="height:50px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fa fa-navicon" style="color:white;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="#">About Us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="#">Contact Us</a>
            </li>
        </ul>
        <hr style="color:white;">
        <div class="social-icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            </div>
        </div>
    </div>
    </nav>
    <div class="container-fluid show-container py-2">
        <a class="fa fa-chevron-circle-left" id="back-icon" href="#"></a>
        <div class="container show_img my-2">
            <img src="{{asset('images/card-7.jpg')}}" alt="Show_img">
        </div>
        <div class="container content">
            <div class="display-4" id="show-title">Khatara</div>
            <hr>
            <div class="info d-flex flex-wrap justify-content-center">
                <div class="present mx-2">
                    <b class="label">Presented by - </b> <span class="data">Aapal Ghar</span>
                </div>
                <div class="writer-directer mx-2">
                    <b class="label">Writer and Directer - </b> <span class="data">Amol Devidas Salwe</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid description py-3">
        <div class="container text-light">
            <b>Description : </b><br>
            <small>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore qui iste praesentium eum distinctio ab
                dicta amet porro inventore pariatur quibusdam ut unde, ex at sit quam dolorum sint repellendus.
            </small>
        </div>
    </div>

    <div class="text-center display-6 text-light mt-3">
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
    </div>
    <button type="button" class="btn btn-lg btn-danger" id="book-btn">Book tickets now</button>


</body>

</html>