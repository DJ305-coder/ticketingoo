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
                <h4 class="card-title theater-heading">Add Theater</h4>
                <div id="spinner"></div>
                <div class="card">
                    <div class="card-body body-height " style="min-height: 470px;">
                        <div class="basic-form">
                            <form id="theater_form" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Theater Name</label>
                                            <input type="text" name="theater_name" id="theater_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Theater Address</label>
                                            <input type="text" name="theater_address" id="theater_address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Map Url</label>
                                            <input type="text" name="map_url" id="map_url" class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" id="txtpkey" value="">
                        
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="btn btn-pad-submit btn-success m-b-30 m-t-15 f-s-14 p-l-20 p-r-20 m-r-10" type="button" id="theaterSubmit">Submit</button>
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
                <h4 class="card-title">Theater List</h4>
                <div class="card">
                    <div class="card-body body-height " style="min-height: 470px;">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th width="5%">Sr No.</th>
                                        <th width="20%">Theater Name</th>
                                        <th width="20%">Theater Address</th>
                                        <th width="20%">Map Url</th>
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
    $(".theater_active").addClass("active");

</script>

<!-- DataTable , Validation, Preview Image -->
<script>
   
    // DataTable
    $(function () {
        var table = $(".table").DataTable({
            processing: true,
            serverSide: true,
            ajax: "/admin/theater-data-table",
            columns: [
                {
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                },
                {
                    data: "theater_name",
                    name: "theater_name",
                },
                {
                    data: "theater_address",
                    name: "theater_address",
                }, 
                {
                    data: "map_url",
                    name: "map_url",
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
        $("#theater_form").validate({
            ignore: ".note-editor *",
            debug: false,
            rules: {
                theater_name: {
                    required: true,
                },
                theater_address: {
                    required: true,
                },
                map_url: {
                    required: true,
                },
            },
            messages: {
                theater_name: {
                    required: "* Please enter theater name.",
                },
                
                theater_address: {
                    required: "* Please enter theater address.",
                },
                map_url: {
                    required: "* Please enter map url.",
                },
            },
        });
    });

</script>

 <!-- Add & Update blog  -->
<script>
    $(function () {    
        $('#theaterSubmit').on('click', (e) => {
            e.preventDefault();
            if ($("#theater_form").valid()) {
                
                var formData = new FormData();

                let theater_name = $("#theater_name").val();
                let theater_address = $("#theater_address").val();
                let theater_id = $("#txtpkey").val();
                let map_url = $("#map_url").val();
              
                formData.append('theater_name', theater_name);
                formData.append('theater_address', theater_address);
                formData.append('map_url', map_url);
                formData.append('theater_id', theater_id);

                $.ajax({
                    url: "{{url('admin/theaters')}}",
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
                        $('#theater_form').trigger("reset");
                        $('#theaterSubmit').text(' Submit');
                        $('.theater-heading').text(' Add Theater');
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
        const theater_id = $(this).data("id");
        $.ajax({
            type: 'GET',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {theater_id: theater_id},
            url: "theaters/" + theater_id + "/edit",
            success: function (data) {
                console.log(data);
                $('#theater_name').val(data.theater_name);
                $('#theater_address').val(data.theater_address);
                $('#map_url').val(data.map_url);
                $('#txtpkey').val(data.id);
                $('#theaterSubmit').text(' Update')
                $('.theater-heading').text(' Edit Theater');
            },
        });
    });
</script>

<!-- Delete theater -->
<script>
    $(document).on("click", ".DeleteBtn", function () {
        const theater_id = $(this).data("id")
        if (confirm("If you really want to delete theater ?")) {
            $.ajax({
                type: 'DELETE',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {theater_id: theater_id},
                url: "theater/" + theater_id ,
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