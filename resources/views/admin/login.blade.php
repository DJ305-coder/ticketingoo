<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- TOASTER -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/toastr/toastr.min.css')}}">

  <!-- FAVICON ICON -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin_panel/commonarea/dist/img/mini-logo.png')}}" />

  <!-- ============================================================= PLUGINS ================================================================-->

  <!-- JQ-MAP -->
  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- METIS-MENU -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/metismenu/css/metisMenu.min.css')}}">
  <!-- ANIMATE CSS -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/animate/animate.min.css')}}">
  <!-- BS DATATABLE -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/datatables/dataTables.bootstrap4.min.css')}}">
  <!-- JQUERRY DATATABLE-->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/datatables/jquery.dataTables.min.css')}}">
  <!-- SELECT 2 -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/select2/select2.min.css')}}">
  <!-- ION-ICONS -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/ionicons/ionicons.css')}}">
  <!-- SIMPLE-LINE-ICONS -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/simple-line-icons/css/simple-line-icons.css')}}">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/font-awesome/font-awesome.min.css')}}">
  <!-- CSS Stylesheet -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/dist/css/custom.css')}}" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>    

  <style>
    .error{
      color: red;
    }
  </style>
</head>


<body>
  <div class="authentication-bg min-vh-100" id="loginPage">
    <div class="bg-overlay bg-light"></div>
    <div class="container">
      <div class="d-flex flex-column min-vh-100 px-3 pt-4">
        <div class="row justify-content-center my-auto">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card border-0">
              <div class="card-body p-4">
                <!-- logo -->
                <div class="mb-4 text-center">
                  <a href="{{url('/')}}" class="d-block auth-logo">
                    <h3>Admin Login</h3>
                  </a>
                </div>

                <div class="p-2 mt-4">
                  <form action="{{url('admin-login')}}" method="post" id="login_form">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="username">Email</label>
                      <div class="position-relative input-custom-icon">
                        <input type="text" name="email" class="form-control" id="username" placeholder="Enter username">
                        <span class="icon-user"></span>
                      </div>
                    </div>

                    <div class="mb-3">

                      <label class="form-label" for="password-input">Password</label>
                      <div class="position-relative auth-pass-inputgroup input-custom-icon">
                        <span class="icon-lock"></span>
                        <input type="password" name="password" class="form-control pass_word1" id="password-input" placeholder="Enter password">
                        <button type="button" toggle=".pass_word1" class="btn btn-link position-absolute h-100 end-0 top-0 toggle-password" id="password-addon">
                          <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                        </button>
                      </div>
                    </div>

                   

                    <div class="mt-3">
                      <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">Log In</a>
                    </div>
                   
                  </form>
                </div>

              </div>
            </div>

          </div><!-- end col -->
        </div><!-- end row -->

        <!-- <div class="row">
        <div class="col-lg-12">
          <div class="text-center p-4">
            <p>© <script>
                document.write(new Date().getFullYear())
              </script>2022 webadmin. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://1.envato.market/themesdesign" target="_blank">Themesdesign</a></p>
          </div>
        </div>
      </div> -->

      </div>
    </div><!-- end container -->
  </div>

  <script src="{{ asset('commonarea/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
  <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('commonarea/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <script src="{{ asset('js/sweetalert.min.js')}}"></script>  
  <script>
    $(document).ready(function() {
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
      }
      @if(Session::has('error'))
      toastr.error('{{ Session::get('error') }}');
      @elseif(Session::has('success'))
      toastr.success('{{ Session::get('success')}}');
      @endif
    });
  </script>

  <script>
    $(".toggle-password").click(function() {
      //$(this).toggleClass("fa-eye fa-eye-slash");
      console.log("clicked..........")
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>

<script>
$(document).ready(function () {
    $("#login_form").validate({
        rules: {
            email: {
                required: true,
                email : true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "* Please enter email.",
                email : "* Please enter valid email.",
            },
            password: {
                required: "* Please enter password",
            },
        },
        submitHandler: function (form) {
        $(".submit").attr("disabled", true);
        form.submit(); 
    },
    });
});

</script>
</body>