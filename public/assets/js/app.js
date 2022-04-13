$(function () {
    $("#batch-gen-form").submit((e) => {
        e.preventDefault();
        alert("this will generate the keys in batch");
        return;
    });

    $("#one-key-form-btn").click((e) => {
        e.preventDefault();

        var request = $.ajax({
            url: "/get-key",
            method: "GET",
        });

        request.done(function (data) {
            $("#product-key").val(data);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Cannot get key, Something went wrong!");
        });

        $("#one-key-form-div").toggle();
        return;
    });

    $("#one-key-form").submit((e) => {
        e.preventDefault();

        var _token = $("#csrf_genkey").val();
        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var email = $("#email").val();
        var productKey = $("#product-key").val();

        if (!productKey || productKey === undefined || productKey === "") {
            alert("Product key is required");
            return;
        }

        var formData = {
            _token,
            name,
            mobile,
            email,
            productKey,
        };

        console.log(formData);

        var request = $.ajax({
            url: "/keygen",
            method: "POST",
            data: formData,
        });

        request.done(function (data) {
            alert("Key generated");
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Something went wrong try again!");
        });

        return;
    });

    $("#batch-key-form").submit((e) => {
        e.preventDefault();

        var _token = $("#batch_csrf_genkey").val();
        var batchNumber = $("#batchname").val();
        var batchCount = $("#batchcount").val();

        if (!batchNumber || batchNumber === undefined || batchNumber === "") {
            alert("Batch number is required");
            return;
        }

        if (!batchCount || batchCount === undefined || batchCount === null) {
            alert("Key count is required");
            return;
        }

        var formData = {
            _token,
            batchNumber,
            batchCount,
        };

        var request = $.ajax({
            url: "/batch-keygen",
            method: "POST",
            data: formData,
        });

        request.done(function (data) {
            alert("Keys generated");
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Something went wrong try again!");
        });

        return;
    });

    $("#filter-select").on("change", function () {
        $("#filter-form").submit();
        return;
    });

    $("#dashboard-nav-btn").click((e) => {
        e.preventDefault();
        $(location).attr("href", "/key-management");
        return;
    });
});
