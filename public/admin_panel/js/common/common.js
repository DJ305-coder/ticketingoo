$(document).on("click", ".change-status", function () {
    var id = $(this).data("id");

    var baseUrl = $("#base_url").val();
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    if (confirm("If you really want to change status ?")) {
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id: id,
                table: table,
                flash: flash,
            },
            url: baseUrl + "/change-status",
            beforeSend: function () {
                $(this).hide();
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #0c0c0c !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $(".table").dataTable();
                oTable.fnDraw(false);
                console.log(data);
                success_toast("Success", data.message);
            },
        });
    }
});

$(document).on("click", ".delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var baseUrl = $("#base_url").val();
    // alert(baseUrl);
    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: baseUrl + "/common-delete",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $(".table").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});

$("#country_id").on("change", function () {
    $("#state_id").html("");
    var countryId = $(this).val();
    var baseUrl = $("#base_url").val();
    if (countryId != "") {
        $.ajax({
            url: baseUrl + "/state-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { countryId: countryId },
            success: function (result) {
                $("#state_id").append(
                    '<option value="" selected disabled>Select State</option>"'
                );
                $.each(result.data, function (key, value) {
                    $("#state_id").append(
                        '<option value="' + value.id + '">' + value.state_name + "</option>"
                    );
                });
            },
        });
    }
});

$("#state_id").on("change", function () {
    $("#city_id").html("");
    var stateId = $(this).val();
    var baseUrl = $("#base_url").val();
    if (stateId != "") {
        $.ajax({
            url: baseUrl + "/city-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { stateId: stateId },
            success: function (result) {
                // alert(result);
                console.log(result);
                $("#city_id").append(
                    '<option value="" selected disabled>Select City</option>"'
                );
                $.each(result.data, function (key, value) {
                    $("#city_id").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.city_name +
                            "</option>"
                    );
                });
            },
        });
    }
});

$("#city_id").on("change", function () {
    $("#area_id").html("");
    var cityId = $(this).val();
    var baseUrl = $("#base_url").val();
    if (cityId != "") {
        $.ajax({
            url: baseUrl + "/area-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { cityId: cityId },
            success: function (result) {
                // alert(result);
                console.log(result);
                $("#area_id").append(
                    '<option value="" selected disabled>Select Area</option>"'
                );
                $.each(result.data, function (key, value) {
                    $("#area_id").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.area_name +
                            "</option>"
                    );
                });
            },
        });
    }
});
