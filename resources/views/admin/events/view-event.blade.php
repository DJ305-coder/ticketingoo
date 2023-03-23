@extends('admin.layout.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <h4 class="card-title">
                    Blog View
                    <span class="pull-right">
                        <button class="btn common-btn btn-danger">
                            <a href="{{ url('/blogs') }}"><i class="fa fa-arrow-circle-left"></i>
                                Back</a>
                        </button>
                    </span>
                </h4>
            </div>
            <div class="col-12 mt-1">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="basic-form">
                                                <form>
                                                    <div class="form-group">
                                                        <h6 class="d-inline">
                                                            Blog Title
                                                        </h6>
                                                        <p>
                                                            {{ !empty($blog->title) ? $blog->title : '' }}
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <h6 class="d-inline">
                                                                    Date
                                                                </h6>
                                                                <p>
                                                                    {{ !empty($blog->date) ? date('M-d-Y', strtotime($blog->date)) : '' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <h6 class="d-inline">
                                                                    Blog By
                                                                </h6>
                                                                <p>
                                                                    {{ !empty($blog->blog_by) ? $blog->blog_by : '' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <h6 class="d-inline">
                                                                Slug URL
                                                            </h6>
                                                            <p>
                                                                {{ !empty($blog->slug_url) ? $blog->slug_url : '' }}
                                                            </p>
                                                        </div>
                                                    </div> -->
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <h6 class="d-inline">
                                                                    Description
                                                                </h6>
                                                                <div>
                                                                    {!! !empty($blog->description) ? $blog->description : '' !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <h6 class="d-inline">
                                                                    Meta
                                                                    Title
                                                                </h6>
                                                                <p>
                                                                    {{ !empty($blog->meta_title) ? $blog->meta_title : '' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <h6 class="d-inline">
                                                                    Meta
                                                                    Keyword
                                                                </h6>
                                                                <p>
                                                                    {{ !empty($blog->meta_keywords) ? $blog->meta_keywords : '' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <h6 class="d-inline">
                                                                    Meta Description
                                                                </h6>
                                                                <p>
                                                                    {{ !empty($blog->meta_description) ? $blog->meta_description : '' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row challenges">
                                                                <div class="col-sm-3 ">

                                                                    <div class="challenges-box card-view">
                                                                        <h5 class="d-inline"> {{ !empty($blog->like) ? $blog->like : 0 }}</h5>
                                                                        <p> <i class="fa fa-heart"></i>
                                                                            Likes</p>

                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3 ">

                                                                    <div class="challenges-box card-view">
                                                                        <h5 class="d-inline">{{ !empty($blog->views) ? $blog->views : 0 }}</h5>
                                                                        <p> <i class="fa fa-eye"></i>
                                                                            View</p>
 
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">

                                                                    <div class="challenges-box card-view">
                                                                        <h5 class="d-inline">{{count($comments)}}</h5>
                                                                        <p><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                                                                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                                                                                </path>
                                                                            </svg>
                                                                            Comments</p>


                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">

                                                                    <div class="challenges-box card-view">
                                                                        <h5 class="d-inline">{{ !empty($blog->views) ? $blog->views : 0 }}</h5>
                                                                        <p> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                                                                <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z">
                                                                                </path>
                                                                            </svg>
                                                                            Share</p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">

                                            <label>Blog Image</label>
                                            <div class="photo border-modal">
                                                <img src="{{ !empty($blog->blog_image) ? $blog->blog_image : asset('admin_panel/commonarea/dist/img/default.png') }}" class="prof-photo photo-height-fixed-modal" width="100%" />
                                                <a class="remove-photo" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i>View</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body comment-box-modal-body">
                                <div class="basic-form">
                                    @include('admin.includes.comment-modal')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <section>
        <div class="modal fade img-modal-box" id="myModal" role="dialog" style="display: none">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body modal_img">
                        <button type="button" class="close" data-dismiss="modal">
                            ×
                        </button>

                        <img src="{{ !empty($blog->blog_image) ? $blog->blog_image : asset('admin_panel/commonarea/dist/img/default.png') }}" />
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>



<!-- Button trigger modal -->
@endsection
@section('script')
<script>
    $(".s_meun").removeClass("active");
    $(".blogs_active").addClass("active");
    $(".cms_active ul").addClass("in");
</script>
<script>
    $(".show_button").click(function() {
        var id = $(this).data('id');
        var text = $(this).find("span").text();
        console.log("text...", text)
        if (text === "Show Replies") {
            $(this).find("i").removeClass("icon-arrow-up")
            $(this).find("i").addClass("icon-arrow-down")
            $(this).find("span").html("Hide Replies")
            $(".comment-replay-list").css('display', 'block')
        } else if (text === "Hide Replies") {
            $(this).find("i").removeClass("icon-arrow-down")
            $(this).find("i").addClass("icon-arrow-up")
            $(this).find("span").html("Show Replies")
            $(".comment-replay-list").css('display', 'none')
        }
    });

    // $(".show-hide-reply-btn").click(function() {
    //     var text = $(this).find("span").text();
    //     console.log("text...", text)

    //     if (text === "Show Replies") {
    //         $(this).find("i").removeClass("icon-arrow-up")
    //         $(this).find("i").addClass("icon-arrow-down")
    //         $(this).find("span").html("Hide Replies")
    //         $(".comment-replay-list").css('display', 'block')
    //     } else if (text === "Hide Replies") {
    //         $(this).find("i").removeClass("icon-arrow-down")
    //         $(this).find("i").addClass("icon-arrow-up")
    //         $(this).find("span").html("Show Replies")
    //         $(".comment-replay-list").css('display', 'none')
    //     }
    // })


    setInterval(function() {
        console.log("window.innerHeight...", window.innerHeight)
        if ($(".comment-box-modal-body").height() > window.innerHeight - 150) {

            $(".comment-box-modal-body").addClass("cmt-ht-more")
        }
    }, 100)
</script>

<script>
    $(document).on("click", ".commentDelete", function() {
        var id = $(this).data("id");
        var sub_comment_id = $(this).data('sub_comment_id');
        var baseUrl = $("#base_url").val();
        if (confirm("Do you really want to delete this comment ?")) {
            $.ajax({
                type: "post",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    id: id,
                    sub_comment_id: sub_comment_id
                },
                url: baseUrl + "/comment-delete",
                success: function(data) {
                    console.log('comment delete successfully done');
                    console.log(data);
                    window.location.reload()
                },
            });
        }
    });
</script>
@endsection