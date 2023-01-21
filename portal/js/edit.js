$(document).on("click", ".departmentedit_btn", function () {
    var id = $(this).attr('id');
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditDepartment: "EditDepartment",
            Department_id: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });
});

$(document).on("click", ".offeredit_btn", function () {
    var id = $(this).attr('id');
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditOffer: "EditOffer",
            Offer_id: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });
});

$(document).on("click", ".feesedit_btn", function () {
    var id = $(this).attr('id');
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditFees: "EditFees",
            Fees_id: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });
});

$(document).on("click", ".confirmedit_btn", function () {
    var id = $(this).attr('id');
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditConfirm: "EditConfirm",
            confirm_id: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });
});


$(document).on("click", ".review_btn", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            ReviewModal: "ReviewModal",
            ReviewId: id
        },
        success: function (response) {
            $("#status_form").html(response);
            $(".ReviewModal").modal('show');
        }
    });

});


$(document).on("click", ".facultyedit_btn", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditFaculty: "EditFaculty",
            FacultyId: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });

});

$(document).on("click", ".subjectedit_btn", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditSubject: "EditSubject",
            SubjectId: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });

});

$(document).on("click", ".courseedit_btn", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditCourse: "EditCourse",
            CourseId: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });

});

$(document).on("click", ".classedit_btn", function () {
    let id = $(this).attr("id");
    $.ajax({
        url: "../includes/editModal.php",
        method: "post",
        data: {
            EditClass: "EditClass",
            ClassId: id
        },
        success: function (response) {
            $("#dynamic-modal-content").html(response);
            $(".EditModal").modal('show');
        }
    });

});

