  <!-- JQUERRY -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/jquery/jquery.min.js')}}"></script>

  <!-- MOMENT JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/moment/moment.js')}}"></script>
  <!-- COMMON JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/common/common.min.js')}}"></script>
  <!-- CUSTOM JS -->
  <script src="{{URL::asset('admin_panel/commonarea/dist/js/custom.min.js')}}"></script>
  <!-- SETTINGS -->
  <script src="{{URL::asset('admin_panel/commonarea/dist/js/settings.js')}}"></script>
  <!-- GLEEK -->
  <script src="{{URL::asset('admin_panel/commonarea/dist/js/gleek.js')}}"></script>
  <!-- STYLE-SWITCHER -->
  <script src="{{URL::asset('admin_panel/commonarea/dist/js/styleSwitcher.js')}}"></script>

  <script src="{{URL::asset('admin_panel/commonarea/plugins/pg-calendar/pignose-calendar.min.js')}}"></script>
  <!-- BS DATEPICKER -->
  <!-- <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-datepicker/daterangepicker.js')}}"></script> -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
  <!-- SUMMERNOTE JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/summernote/summernote.min.js')}}"></script>
  <script src="{{URL::asset('admin_panel/commonarea/plugins/summernote/dist/summernote-init.js')}}"></script>
  <!-- CLOCK PICKER -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>

  <!-- BOOTSTRAP JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <!-- METIS-MENU -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <!-- SELECT 2 -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/select2/select2.full.min.js')}}"></script>
  <!-- BS MULTI-SELECT JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
  <script src="{{URL::asset('admin_panel/commonarea/plugins/multiselect/jquery.multi-select.js')}}"></script>
  <!-- BS TIMEPICKER -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  <!-- TEXT_EDITOR JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/wysihtml/wysihtml.min.js')}}"></script>
  <!-- JQ-MAP -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/jqvmap/js/jquery.vmap.min.js')}}"></script>
  <!-- VALIDATE JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/validation/jquery-validate.min.js')}}"></script>
  <script src="{{URL::asset('admin_panel/commonarea/plugins/validation/jquery-validate-init.js')}}"></script>
  <!-- DASHBOARD JS -->
  <script src="{{URL::asset('admin_panel/commonarea/dist/js/dashboard/dashboard-1.js')}}"></script>
  <!-- CHART JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/chartjs/Chart.bundle.min.js')}}"></script>
  <!-- MORRIS CHART -->
  <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/morris/morris.min.js')}}" />
  <!-- CIRCLE_PROGRESS JS -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/circle-progress/circle-progress.min.js')}}"></script>
  <!-- TopoJSON -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/topojson/topojson.min.js')}}"></script>
  <!-- D3 (Data Driven) -->
  <script src="{{URL::asset('admin_panel/commonarea/plugins/d3v3/d3.js')}}"></script>

   <!-- Toastr -->
   <script src="{{asset('admin_panel/toastr/jquery.toast.min.js')}}"></script>
   <script src="{{asset('admin_panel/toastr/toastr.js')}}"></script>
 


  <script src="{{asset('admin_panel/js/common/common.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



  <script>
    $('.sidebar-toggle').on('click', function() {
      $('body').toggleClass('sidebar-collapse')
    })
  </script>

  <script>
    function loadFunction() {
      $('#preloader').hide();
    }
  </script>

  <script>
    var baseUrl = $("#baseUrl").val();
  </script>

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
    function success_toast(title = '', message = '') {
      $.toast({
        heading: title,
        text: message,
        icon: 'success',
        loader: true, // Change it to false to disable loader
        loaderBg: '#9EC600', // To change the background,
        position: "bottom-right"
      });
    }

    function fail_toast(title = '', message = '') {
      $.toast({
        heading: title,
        text: message,
        icon: 'error',
        loader: true, // Change it to false to disable loader
        loaderBg: '#9EC600', // To change the background,
        position: "bottom-right"
      });
    }
  </script>
 