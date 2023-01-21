$(document).on("click", ".delete_placement", function(e) {
        e.preventDefault();
        let id = $(this).parent().attr("id");
        swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes', 'No'],
                cancel: true,
                dangerMode: true,
            })
            .then((status) => {
                if (!status) {
                    $.ajax({
                        url: "includes/send.php",
                        method: "post",
                        data: {
                            DeleteExp: "DeleteExp",
                            Work_id: id
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Work experience deleted successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                               location.reload();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while deleting work experience.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function() {
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }

                    });
                }
            });

        });
