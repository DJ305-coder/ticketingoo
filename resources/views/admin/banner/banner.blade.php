@extends('admin.layout.layout')
@section('header')
<style>
    .card .body-height {
        min-height: 260px;

    }
</style>

@endsection
@section('content')
<div class="content-body ">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4 ">
                <h4 class="card-title banner-heading">Add Banner</h4>
                <div id="spinner"></div>
                <div class="card">
                    <div class="card-body body-height " style="min-height: 470px;">
                        <div class="basic-form">
                            <form id="banner_form" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Button Title</label>
                                            <input type="text" name="btn_title" id="btn_title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Button Url</label>
                                            <input type="text" name="btn_url" id="btn_url" class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" id="txtpkey" value="">
                        
                                    <div class="col-md-12 form-group ">
                                        <div class="upload_img">
                                            <div class="upload_photo mb-10">
                                                <label>Upload Banner</label>
                                                <input type="file" name="banner_image" id="banner_image" class="form-control preview" accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="photo mt-2">
                                                <img class="file_logo_img  preview_image" src="{{asset('admin_panel/commonarea/dist/img/default.png')}}" alt="Image" width="150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-pad-submit btn-success m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="button" id="bannerSubmit">Submit</button>
                                            <button class="btn btn-pad-submit btn-danger m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="button" id="formClear">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 no-padd-both">
                <h4 class="card-title">Banner List</h4>
                <div class="card">
                    <div class="card-body body-height " style="min-height: 470px;">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th width="5%">Sr No.</th>
                                        <th width="20%">Button Title</th>
                                        <th width="20%">Button Url</th>
                                        <th width="20%">Banner Image</th>
                                        <th width="25%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script>
    $(".s_meun").removeClass("active");
    $(".banner_active").addClass("active");

</script>

<!-- DataTable , Validation, Preview Image -->
<script>
    // image preview
    $(document).ready(() => {
        $(".preview").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    console.log(event.target.result);
                    $(".preview_image").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // DataTable
    $(function () {
        var table = $(".table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "/admin/banner-data-table",
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                },
                {
                    data: "btn_title",
                    name: "btn_title",
                },
                {
                    data: "btn_url",
                    name: "btn_url",
                }, 
                {
                    data: "banner_image",
                    name: "banner_image",
                },  
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ],
        });

    });

    // validations
    $(document).ready(function () {
        $("#banner_form").validate({
            ignore: ".note-editor *",
            debug: false,
            rules: {
                btn_title: {
                    required: true,
                },
                btn_url: {
                    required: true,
                },
                banner_image: {
                    required: function(){
                                return $('#txtpkey').val() !== '' ? false : true;
                            }
                },
            },
            messages: {
                btn_title: {
                    required: "* Please enter button title.",
                },
                btn_url: {
                    required: "* Please enter button url.",
                },
                banner_image: {
                    required: "* Please select banner image.",
                },
            },
        });
    });

</script>

 <!-- Add & Update blog  -->
<script>
    $(function () {    
        $('#bannerSubmit').on('click', (e) => {
            e.preventDefault();
            if ($("#banner_form").valid()) {
                
                var formData = new FormData();

                let btn_title = $("#btn_title").val();
                let banner_id = $("#txtpkey").val();
                let btn_url = $("#btn_url").val();
                var banner_image = $('#banner_image').prop('files')[0];   

                jQuery.isEmptyObject(banner_image) ? console.log('input file empty') :  formData.append('banner_image', banner_image);   
                
                formData.append('btn_title', btn_title);
                formData.append('btn_url', btn_url);
                formData.append('banner_id', banner_id);

                $.ajax({
                    url: "{{url('admin/banners')}}",
                    type: 'POST',
                    contentType: 'multipart/form-data',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    beforeSend: function() {
                        $("#spinner").append('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                    },
                    success: (response) => {
                        console.log(response);
                        if(response.status == 200){
                            success_toast("Success", response.message);
                            $('#example').DataTable().ajax.reload();
                        }
                        $('#banner_form').trigger("reset");
                        $('#bannerSubmit').text(' Submit');
                        $('.banner-heading').text(' Add Banner');
                        $('#txtpkey').val('');
                        $('.preview_image').attr('src', "{{asset('admin_panel/commonarea/dist/img/default.png')}}");
                        $("#spinner").hide();
                    },
                    error: (response) => {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>

<!-- Edit blog -->
<script>
    $(document).on("click", ".EditBtn", function () {
        const banner_id = $(this).data("id");
        $.ajax({
            type: 'GET',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {banner_id: banner_id},
            url: "banners/" + banner_id + "/edit",
            success: function (data) {
                console.log(data);
                $('#btn_title').val(data.btn_title);
                $('#btn_url').val(data.btn_url);
                $('.preview_image').attr('src', data.banner_image);
                $('#txtpkey').val(data.id);
                $('#bannerSubmit').text(' Update')
                $('.banner-heading').text(' Edit Banner');
            },
        });
    });
</script>

<!-- Delete blog -->
<script>
    $(document).on("click", ".DeleteBtn", function () {
        const banner_id = $(this).data("id")
        if (confirm("If you really want to delete banner ?")) {
            $.ajax({
                type: 'DELETE',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {banner_id: banner_id},
                url: "banner/" + banner_id ,
                success: function (data) {
                    console.log(data);
                    if(data.status == 200){
                        success_toast("Success", data.message);
                        $('#example').DataTable().ajax.reload();
                    }
                },
            });
        }
    });
</script>

<!-- Form clear -->
<script>
    $(document).on('click', '#formClear', function(){
        $('#banner_form').trigger("reset");
        $('#txtpkey').val('');
        $('.preview_image').attr('src', "{{asset('admin_panel/commonarea/dist/img/default.png')}}");
    });
</script>
@endsection