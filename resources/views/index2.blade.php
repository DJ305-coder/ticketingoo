<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Home</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.min.css')}}">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
      <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>

      <!-- validation JS -->
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

      <!-- DATE PICKER -->
      <link rel="stylesheet" href="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
      <script src="{{URL::asset('admin_panel/commonarea/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{asset('admin_panel/toastr/jquery.toast.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin_panel/toastr/toastr.css')}}">

      <link rel="stylesheet" href="{{asset('front/index.css')}}">

      <script src="{{asset('admin_panel/toastr/jquery.toast.min.js')}}"></script>
      <script src="{{asset('admin_panel/toastr/toastr.js')}}"></script>
   
      
   </head>
   <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li>
            </ul>
            
            <span class="navbar-text">
               @guest
                  <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#loginModal">Login</button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#registerModal">Register</button>  
               @endguest
               @auth
                  <a href="{{url('/user/dashboard')}}" target="_blank"><button type="button" class="btn btn-info">Dashboard</button></a>
               @endauth
            </span>
         </div>
      </nav>

      <!-- Blog heading -->
      <div class="d-flex mb-3 mt-3">
         <div class="mx-auto">
            <h1>Blogs</h1>
         </div>
      </div>
         
      <!-- filter and search  -->
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <form>
                  <div class="form-group col-xs-9">
                     <input class="form-control" type="text" id="search" placeholder="Search" />
                  </div>
               </form>
            </div>
            <div class="col-md-3">
               <form>
                  <div class="form-group">
                     <select class="form-control" id="order-filter">
                        <option value="desc" selected>Select Order</option>
                        <option value="desc">Latest</option>
                        <option value="asc">Oldest</option>
                     </select>
                  </div>
               </form>
            </div>
            <div class="col-md-3">
               <form>
                  <div class="form-group">
                  <div class="input-group">
                     <input type="text" class="form-control mydatepicker" autocomplete="off"  name="publish_date" id="datepicker" placeholder="Filter By Date"  autocomplete="off" value="" />
                     <span class="input-group-append"><span class="input-group-text">Date</span></span>
                  </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   
      <!-- Blog Section -->
      <div id="blogs_list">
         @include('blog_data')
      </div>

      <!-- Login modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header border-bottom-0">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-title mb-5 text-center">
                     <h3><strong>Login</strong></h3>
                  </div>
                  <div class="d-flex flex-column text-center">
                     <form action="{{route('user-login')}}" method="post" id="loginForm">
                        @csrf 
                        <div class="form-group">
                           <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter email address.">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control" id="login_password" name="password" placeholder="Your password">
                        </div>
                        <button type="submit"  class="btn btn-info btn-block btn-round">Login</button>
                     </form>
                  </div>
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <div class="signup-section">Not a member yet? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#registerModal" class="text-info">Register</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Register modal -->
      <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header border-bottom-0">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="form-title mb-5 text-center">
                     <h3><strong>Register</strong></h3>
                  </div>
                  <div class="d-flex flex-column text-center">
                     <form id="registerForm">
                        <div class="form-group">
                           <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                           <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter confirm password">
                        </div>
                        <button type="button" class="btn btn-info btn-block btn-round" id="registerBtn">Register</button>
                     </form>
                  </div>
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <div class="signup-section">Already register? <a href="#a" data-dismiss="modal"  data-toggle="modal" data-target="#loginModal" class="text-info"> Sign Up</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Blog detail Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog"  style="max-width: 65%;">
            
         <div class="modal-content">
            <span class="spinner-loader" style="display:none"> <i class="fa fa-spinner fa-spin" style="font-size:54px"></i></span>
            <div class="modal-header">
               <h3 class="modal-title" id="myModalLabel">Blog Detail</h3>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
               <div class="modal-body">
                  <div class="body-message">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12 blogInfo mb-3 p-0">
                              <span><i class="fa fa-calendar" aria-hidden="true"></i></span><span class="ml-1" id="publishDate"></span>
                              <span class="ml-2"><i class="fa fa-user" aria-hidden="true"></i></span><span class="ml-1" id="blogBy"></span>
                           </div>
                        </div>
                     </div>
                     <h5 id="blogTitle"></h5>
                     <img src="" alt="" id="blogImage" class="blog-image">
      
                     <p id="blogDescription"></p>

                  </div>

                  <!-- like and rating -->
                  <div class="star-rating" >
                     <input type="radio" class="submit_star" id="5-stars" name="rating" value="5" />
                     <label for="5-stars" class="star">&#9733;</label>
                     <input type="radio" class="submit_star" id="4-stars" name="rating" value="4" />
                     <label for="4-stars" class="star">&#9733;</label>
                     <input type="radio" class="submit_star" id="3-stars" name="rating" value="3" />
                     <label for="3-stars" class="star">&#9733;</label>
                     <input type="radio" class="submit_star" id="2-stars" name="rating" value="2" />
                     <label for="2-stars" class="star">&#9733;</label>
                     <input type="radio" class="submit_star" id="1-star" name="rating" value="1" />
                     <label for="1-star" class="star">&#9733;</label>
                  </div>

                     <h5 class="font-weight-bold">
                     Comments :
                     </h5>
                  <hr>
                  <!-- Comment section  -->

                     <div class="comment-listing">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="comments">
                                    <!-- <div class="comment">
                                       <div class="flex-grow-1 ms-2 ms-sm-3">
                                          <div class="comment-meta mt-3 d-flex align-items-baseline">
                                             <h6 class="me-2 font-weight-bold"> Datta Jadhav </h6>
                                             <span class="ml-1"> -  2d ago</span>
                                          </div>
                                          <div class="comment-body"> earchers at Google’s robotics arm, Google Research, and Everyday Robots have come up with a way to help robots learn from each other an </div>
                                          <div class="reply-comment">
                                             <button class="btn btn-warning reply-btn text-white" style="font-size:14px">Reply <i class="fa fa-reply"></i></button>
                                             <div class="form-section" >
                                                <form class="reply-form" style="display:none">
                                                   <div class="form-group">
                                                      <textarea name="reply" id="reply" class="reply-cmnt"></textarea>
                                                   </div>
                                                   <button type="button" id="replySubmitBtn" class="btn btn-primary">Submit</button>
                                                   <button type="button" id="replyCancelBtn" class="btn btn-dangery">Cancel</button>
                                                </form>
                                             </div>
                                          </div>

                                          <div class="comment-replies bg-light p-3 mt-3 rounded">
                                             <h6 class="comment-replies-title mb-4 text-muted text-uppercase"> 2 replies</h6>
                                             <div class="reply25 mb-4">
                                                <div class="flex-grow-1 ms-2 ms-sm-3 mb-3">
                                                   <div class="reply-meta d-flex align-items-baseline">
                                                      <h6 class="mb-0 me-2">Datta Jadhav</h6>
                                                      <span class="ml-1"> -  2d ago</span>
                                                   </div>
                                                   <div class="reply-body"> officers would keep a tight eye on hi</div>
                                                </div>
                                                <div class="flex-grow-1 ms-2 ms-sm-3 mb-3">
                                                   <div class="reply-meta d-flex align-items-baseline">
                                                      <h6 class="mb-0 me-2">Vishal</h6>
                                                      <span class="ml-1"> -  2d ago</span>
                                                   </div>
                                                   <div class="reply-body"> would keep a tight eye on him as he cleaned Musk’s office</div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div> -->
                              
                                 </div>
                              </div>
                           </div>
                           <div class="row mt-3">
                              <div class="col-md-12">
                                 <form id="commentForm">
                                       <div class="form-group">
                                          <textarea name="comment" id="comment" placeholder="Enter comment here...." class="form-control" rows="5"></textarea>
                                          <label for="comment" class="error comment-error"></label>
                                          <input type="hidden" id="blog_id" value="" />
                                       </div>
                                       <div class="form-group">
                                          @guest
                                             <button type="button" class="btn btn-success text-white" id="aCkfC">Comment</button>
                                          @endguest
                                          @auth 
                                             <button type="button" class="btn btn-success text-white" id="commentBtn">Comment</button>
                                          @endauth
                                       </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                   
             
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>



   <!-- Search and filter with blogs-->
   <script>
      $('#datepicker').datepicker({
         weekStart: 1,
         autoclose: true,
         todayHighlight: true,
      })
   </script>   

   <script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          getMoreBlogs(page);
        });
        $('#search').on('keyup', function() {
          $value = $(this).val();
          getMoreBlogs(1);
        });

        $('#order-filter').on('change', function() {
          getMoreBlogs();
        });

        $("#datepicker").on('change', function(event) {
            event.preventDefault();
            getMoreBlogs();
         });

    });
    function getMoreBlogs(page) {
      var search = $('#search').val();
      var order = $("#order-filter option:selected").val();
      var date = $('#datepicker').val();
      $.ajax({
        type: "GET",
        data: {
          'search_query':search,
          'order' : order,
          'date' : date,
        },
        url: "{{ url('/') }}" + "?page=" + page,
        success:function(data) {
          $('#blogs_list').html(data);
        }
      });
    }
   </script>

   <!-- get blog detail -->
   <script>
      $(document).on('click','.view-blog', function(){
            const blog_id =  $(this).data('id');
            $('#blog_id').val('');
            $.ajax({
               type: 'GET',
               headers: {
                  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               },
               url: "blog-detail/" + blog_id,
               beforeSend: function(){
                  $('.spinner-loader').css('display','block');
                  $('.modal-body').hide();
               },
               success: function (data) {

                     setTimeout(function () {
                        $('.spinner-loader').css('display','none');
                        $('.modal-body').show();
                     }, 1500);
                     
                     $('#blogTitle').text(data.blog_title);
                     $('#blogImage').attr('src',data.blog_image);
                     $('#blogDescription').text(data.blog_description);
                     $('#blogDescription').text(data.blog_description);
                     $('#publishDate').text(data.publish_date);
                     $('#blog_id').val(data.id);

                     $.each(data.comments, function (i) {
                        var replyForm = '<div class="form-section'+data.comments[i].id+'" style="display:none">'+
                                             '<form class="reply-form">'+
                                                '<div class="form-group">'+
                                                   '<textarea name="reply" placeholder="Enter reply here..." id="reply'+data.comments[i].id+'" class="reply-cmnt"></textarea>'+
                                                   '<input type="hidden" id="parent_id" value="">'+
                                                '</div>'+
                                                '<button type="button" class="btn replyBtn btn-primary">Submit</button>'+
                                             '</form>'+
                                          '</div>';

                        var cmtDiv = '';

                 
                        if( data.comments[i].replies && data.comments[i].replies.length > 0){ 
                           cmtDiv ="<div class='comment-replies bg-light p-3 mt-3 rounded'>"+
                                          "<h6 class='comment-replies-title mb-4 text-muted text-uppercase'> "+data.comments[i].replies.length + " replies</h6>" +
                                          "<div class='reply"+data.comments[i].id+" mb-4'>" + 

                                          "</div>"
                                       "</div>";
                        }
                        
                        var comment ="<div class='comment'> " +
                                       "<div class='flex-grow-1 ms-2 ms-sm-3'> " +
                                          "<div class='comment-meta mt-3 d-flex align-items-baseline'>"+
                                             "<h5 class='me-2 font-weight-bold'> "+ data.comments[i].user.name +" </h5> <span class='ml-1'> -  "+data.comments[i].created_at+"</span>" + 
                                          "</div>" +
                                          "<div class='comment-body'> "+ data.comments[i].comment +" </div>"+                     
                                          "<div class='reply-comment'>" +
                                             "<button class='btn btn-warning reply-btn text-white' id='replyBtn"+data.comments[i].id+"' style='font-size:14px' data-parentId='"+data.comments[i].id+"'>Reply <i class='fa fa-reply'></i></button>" +
                                             replyForm +
                                          "</div>" +
                                         cmtDiv
                                          +
                                       "</div>"+
                                    "</div>";
                     
                        $('.comments').append(comment); 
                        

                        if(data.comments[i].replies !== null && data.comments[i].replies.length > 0){
                           // var replyDiv = 'test ';
                           $.each(data.comments[i].replies, function (key, val) {
                           
                              console.log(val.parent_id)
                              var replyDiv = "<div class='flex-grow-1 ms-2 ms-sm-3 mb-3'> " + 
                                       "<div class='reply-meta d-flex align-items-baseline'>" + 
                                          " <h6 class='mb-0 me-2 font-weight-bold'>"+ val.user.name +"</h6> " + "<span class='ml-1'> -  "+ val.created_at +"</span>" +
                                       "</div>" +
                                       "<div class='reply-body'> " +
                                          val.comment +
                                       "</div>" +
                                 "</div>";
                                 
                              $('.reply' + val.parent_id).append(replyDiv);
                              
                     
                           }); 
                        }
                     });

                     
                     $(document).on('click', '.reply-btn' , function(){
                        var id = $(this).attr("data-parentid")
                        if($('.form-section'+id).css('display') == 'none'){
                           $('.form-section'+id).css('display','block');
                        }else{
                           $('.form-section'+id).css('display','none');
                        }
                     });

                     var name = '';
                     jQuery.isEmptyObject(data.user) ? name = 'Admin' : name = data.user.name ;
                     $('#blogBy').text(name);
                  },
               });
            })
   </script>

   <!-- Login validation  -->
   <script>
      $(document).ready(function () {
         $("#loginForm").validate({
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

   <!-- Register validation  -->
   <script>
      $(document).ready(function () {
         $("#registerForm").validate({
               rules: {
                  name: {
                     required: true,
                  },
                  email: {
                     required: true,
                     email : true,
                  },
                  password: {
                     required: true,
                     minlength: 5,
                  },
                  confirm_password: {
                     minlength: 5,
                     equalTo: "#password"
                  }
               },
               messages: {
                  name: {
                     required: "* Please enter name.",
                  },
                  email: {
                     required: "* Please enter email.",
                  },
                  password: {
                     required: "* Please enter password.",
                  },
                  
               },
         });
      });
   </script>

   <!-- Register Form Submit -->
   <script>
      $(function () {    
         $('#registerBtn').on('click', (e) => {
               e.preventDefault();
               if ($("#registerForm").valid()) {
                  var formData = new FormData();

                  let name = $("#name").val();
                  let email = $("#email").val();
                  let password = $("#password").val();
                  let confirm_password = $("#confirm_password").val();

                  formData.append('name', name);
                  formData.append('email', email);
                  formData.append('password', password);
                  formData.append('confirm_password', confirm_password);
                  
                  $.ajax({
                     url: "{{route('user-register')}}",
                     type: 'POST',
                     contentType: 'multipart/form-data',
                     headers: {
                           "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                     },
                     cache: false,
                     contentType: false,
                     processData: false,
                     data: formData,
                     success: (response) => {
                        console.log(response);
                        if(response.status == 200){
                           $.toast({
                              heading: 'Success',
                              text: response.message,
                              icon: 'success',
                              loader: true, // Change it to false to disable loader
                              loaderBg: '#9EC600', // To change the background,
                              position: "bottom-right"
                           });
                           $('#registerModal').modal('hide');
                        }
                     },
                     error: (response) => {
                           console.log(response);
                     }
                  });
               }
         });
      });
   </script>
   
   <!-- comment add  -->
   <script>
      $(document).on('click', '#commentBtn', function(){

         $("#commentForm").validate({
            rules: {
               comment: {
                  required: true,
               },
            },
            messages: {
               comment: {
                  required: "* Please enter comment.",
               }, 
            }  
         });

         if($("#commentForm").valid()) {
            var formData = new FormData();
            var comment = $('#comment').val();
            let blog_id = $('#blog_id').val();

            formData.append('comment', comment);
            formData.append('blog_id', blog_id);
   
            $.ajax({
               url: "{{route('add-comment')}}",
               type: 'POST',
               contentType: 'multipart/form-data',
               headers: {
                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               },
               cache: false,
               contentType: false,
               processData: false,
               data: formData,
               success: (response) => {
                  console.log(response);
                  if(response.status == 200){
                     var name = '{{ auth()->user() ? auth()->user()->name : '';}}';
                    
                     var comment =  "<div class='comment'> " +
                                       "<div class='flex-grow-1 ms-2 ms-sm-3'> " +
                                          "<div class='comment-meta mt-3 d-flex align-items-baseline'>"+
                                             "<h6 class='me-2 font-weight-bold'> "+ name +" </h6>"+  "<span class='ml-1'> -  "+ response.data.created_at +"</span>" + 
                                          "</div>" +
                                          "<div class='comment-body'> "+ response.data.comment +" </div>"+                     
                                          "<div class='reply-comment'>" +
                                             "<button class='btn btn-warning reply-btn text-white' style='font-size:14px' data-toggle='modal' data-target='#replyModal'>Reply <i class='fa fa-reply'></i></button>" +
                                          "</div>"+
                                          //   +replies+ 
                                       "</div>"+
                                    "</div>";
                     
                     
                     $('.comments').append(comment);    
                     $.toast({
                        heading: 'Success',
                        text: response.message,
                        icon: 'success',
                        loader: true, // Change it to false to disable loader
                        loaderBg: '#9EC600', // To change the background,
                        position: "bottom-right"
                     });
                  }
                 
                  $('#comment').val('');
                  $('#blog_id').val('');
                  
               },
               error: (response) => {
                     console.log(response);
               }
            });
         }
      })
   </script>
  
   <!-- auth check for comment -->
   <script>
      $(document).on('click', '#aCkfC', function(){
         $('.comment-error').text('* Please first login.');
      })
   </script>

   <script>
      $(document).on('click', '.reply-btn', function(){
        var parentId = $(this).attr("data-parentId");
        $('#parent_id').val(parentId);
      })
   </script>

   <!-- reply to comment  -->
   <script>
      $(document).on('click', '.replyBtn', function(){
         $(".reply-form").validate({
            rules: {
               reply: {
                  required: true,
               },
            },
            messages: {
               reply: {
                  required: "* Please enter reply.",
               }, 
            }  
         });

         if($(".reply-form").valid()) {
            var formData = new FormData();

            let blog_id = $('#blog_id').val();
            let parent_id = $('#parent_id').val();
            var reply = $('#reply'+parent_id).val();
            
            formData.append('reply', reply);
            formData.append('blog_id', blog_id);
            formData.append('parent_id', parent_id);
   
            $.ajax({
               url: "{{route('comment-reply')}}",
               type: 'POST',
               contentType: 'multipart/form-data',
               headers: {
                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               },
               cache: false,
               contentType: false,
               processData: false,
               data: formData,
               success: (response) => {
                  console.log(response);
                  if(response.status == 200){
                    
                     $.toast({
                        heading: 'Success',
                        text: response.message,
                        icon: 'success',
                        loader: true, // Change it to false to disable loader
                        loaderBg: '#9EC600', // To change the background,
                        position: "bottom-right"
                     });

                     var user_name = '{{ auth()->user() ? auth()->user()->name : '';}}';
                     $('.reply'+parent_id).append('<div class="flex-grow-1 ms-2 ms-sm-3 mb-3"><div class="reply-meta d-flex align-items-baseline"><h6 class="mb-0 me-2 font-weight-bold">'+ user_name +'</h6><span class="ml-1"> -  '+ response.data.created_at +'</span></div><div class="reply-body">'+ response.data.comment +'</div></div>');
                  
                     var str = $('.reply'+parent_id).prev().text();
                     count = parseInt(str.split(" ")[1]) + 1 ;
                     $('.reply'+parent_id).prev().text(count + ' REPLIES');
                  
                  }

                  $('#reply'+parent_id).val('');
                  $('#blog_id').val('');
                  $('#parent_id').val('');
                  $('.form-section'+parent_id).css('display','none');

               },
               error: (response) => {
                     console.log(response);
               }
            });
         }
      })
   </script>

   <!-- rataing  -->
   <script>
      $(document).on('click', '.submit_star', function(){
        var rating = $(this).val();
        let blog_id = $('#blog_id').val();
      
         $.ajax({
            type: 'POST',
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), },
            url: '/add-rating',
            data: {rating:rating, blog_id:blog_id},
            success: function(response) { 
               console.log(response); 
            }
         });

    });
   </script>


   </body>
</html>