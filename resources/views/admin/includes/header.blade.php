<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/toastr/toastr.min.css')}}">

  <!-- FAVICON ICON -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin_panel/commonarea/dist/img/mini-logo.png')}}" />

  <!-- ============================================================= PLUGINS ================================================================-->

  <!-- JQ-MAP -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- PIGNOSE CALENDER -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/pg-calendar/pignose-calendar.min.css')}}" />
  <!-- METIS-MENU -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/metismenu/css/metisMenu.min.css')}}">
  <!-- ANIMATE CSS -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/animate/animate.min.css')}}">
  <!-- BS DATATABLE -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/datatables/dataTables.bootstrap4.min.css')}}">
  <!-- JQUERRY DATATABLE-->
  <!-- <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/datatables/jquery.dataTables.min.css')}}"> -->
  <!-- SELECT 2 -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/select2/select2.min.css')}}">
  <!-- BS MULTIPLE SELECT -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-multiselect/bootstrap-multiselect.css')}}">
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/multiselect/multi-select.css')}}">
  <!-- TIMEPICKER -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- DATE PICKER -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
  <!-- BS DateTimePicker -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}">
  </link>
  <!-- DATE RANGE PICKER -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- ION-ICONS -->
  <!-- <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/ionicons/ionicons.css')}}"> -->
  <!-- SIMPLE-LINE-ICONS -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/simple-line-icons/css/simple-line-icons.css')}}">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/font-awesome/font-awesome.min.css')}}">
  <!-- TEXT EDITOR -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap3-wysihtml5-npm/dist/css/bootstrap3-wysihtml5.min.css')}}">
  <!-- SUMMERNOTE -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/summernote/summernote.css')}}">

  <!-- Fixed Header  -->
  <!-- <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/dataTables/jquery.dataTables.min.css')}}"> -->
  <!-- CHARTIST -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/chartist/css/chartist.min.css')}}" />
  <!-- <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}" /> -->
  <!-- FORMIFY -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/dist/css/formify.css')}}" />
  <!-- CSS Stylesheet -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/dist/css/custom.css')}}" />

  <!-- <link rel="stylesheet/less" type="text/css" href="{{URL::asset('admin_panel/commonarea/dist/css/clearfix.less')}}" /> -->
  <!-- <script src="{{URL::asset('admin_panel/commonarea/dist/css/clearfix.less')}}"></script> -->
  <!--Toastr -->
  <link rel="stylesheet" href="{{asset('admin_panel/toastr/jquery.toast.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_panel/toastr/toastr.css')}}">


  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 

  @yield('header')

  <style>
    .error {
      color: red;
    }
  </style>

</head>


<body onload="loadFunction()" class="skin-blue sidebar-mini scrollbar" id="style-7" style="height: auto; min-height: 100%;">
  <input type="hidden" value="{{url('/')}}" id="base_url" />
  <div id="preloader">
    <div class="loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
      </svg>
    </div>
  </div>

  
  <div class="wrapper" id="main-wrapper" style="height: auto; min-height: 100%;">