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
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-voilet" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light navtitle" id="yuu" href="#"><img src="images/logo.png" alt="logo"
                    style="height:50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fa fa-navicon" style="color:white;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="#">About Us</a>
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
    <div class="container-fluid bg-orange p-2">
        <div class="display-6 text-center text-light my-2"><b>To contact us,</b>  please fill out the form below </div>
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
                    <label for="exampleInputPassword1" class="form-label">Massage</label>
                    <textarea type="number" class="form-control" id="exampleInputPassword1"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mx-auto d-block bg-voilet">Submit</button>
            </form>

        </div>
    </div>

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <p><img src="images/logo.png" alt="logo" style="height:30px;"></p>
                <small class="d-block mb-3 text-muted text-center">© 2023</small>
            </div>
            <div class="col-6 col-md">
                <h5>Locations</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Pune</a></li>
                    <li><a class="link-secondary" href="#">Mumbai</a></li>
                    <li><a class="link-secondary" href="#">Solapur</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Shows</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Live Shows</a></li>
                    <li><a class="link-secondary" href="#">Plays</a></li>
                    <li><a class="link-secondary" href="#">Music</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">About us</a></li>
                    <li><a class="link-secondary" href="#">Contact us</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>