$(document).on("click", ".edit_placement", function (e) {
    e.preventDefault();
    let id = $(this).parent().attr("id");
    $.ajax({
        url: "includes/editModal.php",
        method: "post",
        data: {
            EditExp: "EditExp",
            ExpId: id
        },
        success: function (response) {
            $("#editExpbody").html(response);
            $("#editworkexp").modal('show');
        }
    });
});
