@extends('admin.layout.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <h4 class="card-title">
                    Event List
                    <span class="pull-right">
                        <button class="btn common-btn btn-success">
                            <a href="{{route('events.create')}}"><i class="fa fa-plus-circle"></i>
                                Add</a>
                        </button>
                    </span>
                </h4>
            </div>
            <div class="col-12 mt-1">
                <div class="card">
                    <div class="card-body" style="min-height: 470px">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th width="7%" style="background: #58748f;color: #fff;text-align: center;">Sr No.</th>
                                        <th width="13%" style="background: #58748f;color: #fff;text-align: center;">Date</th>
                                        <th width="25%" style="background: #58748f;color: #fff;text-align: center;">Event Title</th>
                                        <th width="35%" style="background: #58748f;color: #fff;text-align: center;">Event Image</th>
                                        <th width="20%" style="background: #58748f;color: #fff;text-align: center;">Action</th>
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
<script src="{{asset('admin_panel/js/controller_js/event.js')}}"></script>
<script>
    $(".s_meun").removeClass("active");
    $(".event_active").addClass("active");
</script>

<!-- Delete blog -->
<script>
    $(document).on("click", ".DeleteBtn", function () {
        const event_id = $(this).data("id")
        if (confirm("If you really want to delete event ?")) {
            $.ajax({
                type: 'DELETE',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {event_id: event_id},
                url: "event-delete/" + event_id ,
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
@endsection