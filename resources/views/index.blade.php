<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('home.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="{{asset('homepage.js')}}"></script>
  <title>Homepage</title>
  <style>


  </style>
</head>
<body>
    <!-- nav -->
<nav class="navbar navbar-expand-lg bg-voilet" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light navtitle" id="yuu" href="#">Book Theater</a>
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
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/1920x500/?theater" class="d-block w-100" alt="show1 poster">
        <div class="carousel-caption d-none d-md-block">
        <h5>Show 1</h5>
        <p>Imformation about show 1</p>
        <button class="btn btn-danger bg-orange">Book now</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1920x500/?movie" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5>Show 1</h5>
        <p>Imformation about show 1</p>
        <button class="btn btn-danger bg-orange">Book now</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/1920x500/?hero" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5>Show 1</h5>
        <p>Imformation about show 1</p>
        <button class="btn btn-danger bg-orange">Book now</button>
      </div>
    </div>
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
                    <form class="d-flex" role="search">
                        <div class="d-flex container justify-content-center align-items-end pb-1">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                        <div class="sorting-options d-flex m-2 container justify-content-between">
                            <div class="mx-2 p-0">
                                <label for="sort" class="form-label m-0">View shows by date</label>
                                <br>
                                <input class="form-control mx-1" type="date" name="" id="">
                            </div>
                            <div class="mx-2 p-0">
                                <label for="sort" class="form-label m-0">Sort by</label><br>
                                <select name="sort" class="form-select" id="sort">
                                    <option value="popularity">Popularity</option>
                                    <option value="date">Release date</option>
                                    <option value="cost">Cost</option>
                                </select>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center catogories">
                    <button class="nav-link active text" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Shows</button>
                    <button class="nav-link text" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Theaters</button>
                </div>
                
            </div>
            <div class="container-fluid bg-orange m-0" style="width: 100%;height: 2px;"></div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="display-4 text-center my-2 text-light">Available Shows</div>
                <div class="container-fluid d-flex flex-wrap justify-content-center ">
                    <a href="#" class="card-container my-2 mx-2">
                        <img src="https://source.unsplash.com/400x250/?show" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Thor</h5>
                            <p class="card-text mb-0">As the son of Odin (Anthony Hopkins), king of the Norse gods, Thor
                                (Chris
                                Hemsworth) will soon inherit the throne of Asgard from his aging father.</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="#" class="card-container my-2 mx-2">
                        <img src="https://source.unsplash.com/400x250/?show" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Thor</h5>
                            <p class="card-text mb-0">As the son of Odin (Anthony Hopkins), king of the Norse gods, Thor
                                (Chris
                                Hemsworth) will soon inherit the throne of Asgard from his aging father.</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="#" class="card-container my-2 mx-2">
                        <img src="https://source.unsplash.com/400x250/?show" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Thor</h5>
                            <p class="card-text mb-0">As the son of Odin (Anthony Hopkins), king of the Norse gods, Thor
                                (Chris
                                Hemsworth) will soon inherit the throne of Asgard from his aging father.</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="#" class="card-container my-2 mx-2">
                        <img src="https://source.unsplash.com/400x250/?show" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Thor</h5>
                            <p class="card-text mb-0">As the son of Odin (Anthony Hopkins), king of the Norse gods, Thor
                                (Chris
                                Hemsworth) will soon inherit the throne of Asgard from his aging father.</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="#" class="card-container my-2 mx-2">
                        <img src="https://source.unsplash.com/400x250/?show" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Thor</h5>
                            <p class="card-text mb-0">As the son of Odin (Anthony Hopkins), king of the Norse gods, Thor
                                (Chris
                                Hemsworth) will soon inherit the throne of Asgard from his aging father.</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                    <a href="#" class="card-container my-2 mx-2">
                        <img src="https://source.unsplash.com/400x250/?show" class="card-img" alt="...">
                        <div class="bottom-left">
                            <h5 class="card-title">Thor</h5>
                            <p class="card-text mb-0">As the son of Odin (Anthony Hopkins), king of the Norse gods, Thor
                                (Chris
                                Hemsworth) will soon inherit the throne of Asgard from his aging father.</p>
                            <p class=" mt-0"></p><small>Realeased 5 days ago</small></p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                ...
            </div>
        </div>
    </div>
    <footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <p>Book show</p>
      <small class="d-block mb-3 text-muted">© 2017–2022</small>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Cool stuff</a></li>
        <li><a class="link-secondary" href="#">Random feature</a></li>
        <li><a class="link-secondary" href="#">Team feature</a></li>
        <li><a class="link-secondary" href="#">Stuff for developers</a></li>
        <li><a class="link-secondary" href="#">Another one</a></li>
        <li><a class="link-secondary" href="#">Last time</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Resource name</a></li>
        <li><a class="link-secondary" href="#">Resource</a></li>
        <li><a class="link-secondary" href="#">Another resource</a></li>
        <li><a class="link-secondary" href="#">Final resource</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Business</a></li>
        <li><a class="link-secondary" href="#">Education</a></li>
        <li><a class="link-secondary" href="#">Government</a></li>
        <li><a class="link-secondary" href="#">Gaming</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Team</a></li>
        <li><a class="link-secondary" href="#">Locations</a></li>
        <li><a class="link-secondary" href="#">Privacy</a></li>
        <li><a class="link-secondary" href="#">Terms</a></li>
      </ul>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- php artisan serve -->