var base_url = $('#base_url').val();

var ImgFlag = ($("#old_image").val() != "") ? false : true;
$("#event_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        title: {
            required: true,
            remote: {
                url: base_url + "/admin/event-title-exists",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "post",
                data: {
                    txtpkey: function () {
                        return $("#txtpkey").val();
                    },
                    title: function () {
                        return $("#title").val();
                    },
                },
            },
        },
        date: {
            required: true,
        },
        // blog_by: {
        //     required: true,
        // },
        description: {
            required: true,
        },
       
        event_image: {
            required: ImgFlag,
        }
    },
    messages: {
        title: {
            required: "* Please enter event title.",
            remote: "* This title already exists.",
        },
        date: {
            required: "* Please select a date.",
        },
        // blog_by: {
        //     required: "* Please enter writer name.",
        // },
        description: {
            required: "* Please enter event description.",
        },
        
        event_image: {
            required: "* Please select image."
        }
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});

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


$(function () {
    // var url = "{{url('')}}";
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: base_url + "/admin/event-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "date",
                name: "date",
            },
            {
                data: "title",
                name: "title",
            },
            {
                data: "event_image",
                name: "event_image",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    function reload_table() {
        table.DataTable().ajax.reload(null, false);
    }
});