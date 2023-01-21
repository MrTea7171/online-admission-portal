jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z," .,"]+$/i.test(value);
}, "Letters and spaces only please");
jQuery.validator.addMethod("alphabets", function (value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

$(document).ready(function () {
    (function ($) {
        "use strict";
        $("#addDepartment_btn").click(function (e) {
            $('#addDepartment_form').validate({
                rules: {
                    department_name: {
                        required: true
                    },
                    department_code: {
                        required: true,
                        digits:true
                    },
                    department_short: {
                        required: true
                    }
                },
                messages: {
                    department_name: {
                        required: "Please Enter Department Name"
                    },
                    department_code: {
                        required: "Please Enter Department Code",
                        digits:"Please Enter In Digits"
                    },
                    department_short: {
                        required: "Please Enter Department Short"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Department added successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#department_table').DataTable().ajax.reload();
                                var validator = $("#addDepartment_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new department.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addDepartment_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#editDepartment_btn", function (e) {
            $('#editDepartment_form').validate({
                rules: {
                    editDepartment: {
                        required: true
                    },
                    department_code: {
                        required: true,
                        digits:true
                    },
                    department_short: {
                        required: true
                    }
                },
                messages: {
                    editDepartment: {
                        required: "Please Provide Department Name"
                    },
                    department_code: {
                        required: "Please Enter Department Code",
                        digits:"Please Enter In Digits"
                    },
                    department_short: {
                        required: "Please Enter Department Short"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Department updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#department_table').DataTable().ajax.reload();
                                var validator = $("#editDepartment_form").validate();
                                validator.resetForm();
                                $(".EditModal").modal('hide');
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating department.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                                $(".EditModal").modal('hide');
                            }
                        },
                        error: function () {
                            var validator = $("#editDepartment_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#addCpoOffers_btn").click(function (e) {
            $('#addCpoOffersform').validate({
                rules: {
                    cpo_logo: {
                        required: true,
                        extension: 'png|jpe?g'
                    },
                    cpo_name: {
                        required: true
                    },
                    cpo_description: {
                        required: true
                    },
                    cpo_role: {
                        required: true
                    },
                    cpo_salary: {
                        required: true
                    },
                    cpo_link: {
                        required: true
                    },
                    cpo_ldate: {
                        required: true
                    }
                },
                messages: {
                    cpo_logo: {
                        required: "Please provide company logo.",
                        extension: "Please upload file in jpeg/png only."
                    },
                    cpo_name: {
                        required: "Please provide company name."
                    },
                    cpo_description: {
                        required: "Please provide company description."
                    },
                    cpo_role: {
                        required: "Please provide offer role."
                    },
                    cpo_salary: {
                        required: "Please provide offer salary."
                    },
                    cpo_link: {
                        required: "Please provide link to apply."
                    },
                    cpo_ldate: {
                        required: "Please provide last date to apply."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Placement offer added successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#placement_offers_table').DataTable().ajax.reload();
                                var validator = $("#addCpoOffersform").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new placement offer.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addCpoOffersform").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#editCpoOffers_btn", function (e) {
            $('#editCpoOffersform').validate({
                rules: {
                    cpo_logo: {
                        extension: 'png|jpe?g'
                    },
                    cpo_name: {
                        required: true
                    },
                    cpo_description: {
                        required: true
                    },
                    cpo_role: {
                        required: true
                    },
                    cpo_salary: {
                        required: true
                    },
                    cpo_link: {
                        required: true
                    },
                    cpo_ldate: {
                        required: true
                    }
                },
                messages: {
                    cpo_logo: {
                        extension: "Please upload file in jpeg/png only."
                    },
                    cpo_name: {
                        required: "Please provide company name."
                    },
                    cpo_description: {
                        required: "Please provide company description."
                    },
                    cpo_role: {
                        required: "Please provide offer role."
                    },
                    cpo_salary: {
                        required: "Please provide offer salary."
                    },
                    cpo_link: {
                        required: "Please provide link to apply."
                    },
                    cpo_ldate: {
                        required: "Please provide last date to apply."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Placement offer updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#placement_offers_table').DataTable().ajax.reload();
                                var validator = $("#addCpoOffersform").validate();
                                validator.resetForm();
                                $(".EditModal").modal('hide');
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating placement offer.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                                $(".EditModal").modal('hide');
                            }
                        },
                        error: function () {
                            var validator = $("#addCpoOffersform").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#confirmedStudentSheet_btn").click(function (e) {
            $('#addConfirmedStudentSheet_form').validate({
                rules: {
                    confirmedStudentSheet: {
                        required: true,
                        extension: "xlsx"
                    }
                },
                messages: {
                    confirmedStudentSheet: {
                        required: "Please provide students sheet.",
                        extension: "Please upload valid file."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/excel_import.php",
                        success: function (response) {
                            if (response == 1) {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Students added successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#confirmedStudent_table').DataTable().ajax.reload();
                                var validator = $("#addConfirmedStudentSheet_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new students.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addConfirmedStudentSheet_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#confirmedStudent_btn").click(function (e) {
            $('#addConfirmedStudent_form').validate({
                rules: {
                    confirmedStudentName: {
                        required: true,
                        lettersonly: true
                    },
                    confirmedStudentEmail: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    confirmedStudentName: {
                        required: "Please provide student name.",
                        lettersonly: "Please provide valid student name."
                    },
                    confirmedStudentEmail: {
                        required: "Please provide student email.",
                        email: "Please provide valid student email."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Student added successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#confirmedStudent_table').DataTable().ajax.reload();
                                var validator = $("#addConfirmedStudent_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new student.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addConfirmedStudent_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#editConfirm_btn", function (e) {
            $('#editConfirm_form').validate({
                rules: {
                    editStudentName: {
                        required: true,
                        lettersonly: true
                    },
                    editStudentEmail: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    editStudentName: {
                        required: "Please provide student name.",
                        lettersonly: "Please provide valid student name."
                    },
                    editStudentEmail: {
                        required: "Please provide student email.",
                        email: "Please provide valid student email."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Student updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#confirmedStudent_table').DataTable().ajax.reload();
                                var validator = $("#editConfirm_form").validate();
                                validator.resetForm();
                                $(".EditModal").modal('hide');
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating student.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                                $(".EditModal").modal('hide');
                            }
                        },
                        error: function () {
                            var validator = $("#editConfirm_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#review_submit", function (e) {
            $('#review_form').validate({
                rules: {
                    admission_status: {
                        required: true
                    }
                },
                messages: {
                    admission_status: {
                        required: "Please select a status."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Student Status has been updated.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#registered_students_table').DataTable().ajax.reload();
                                var validator = $("#review_form").validate();
                                validator.resetForm();
                                $(".ReviewModal").modal('hide');
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating Student status.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                                $(".ReviewModal").modal('hide');
                            }
                        },
                        error: function () {
                            var validator = $("#review_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#addFeeDetailsBtn").click(function (e) {
            $('#addFeeDeatils_Form').validate({
                rules: {
                    batch: {
                        required: true
                    },
                    year: {
                        required: true
                    },
                    caste: {
                        required: true
                    },
                    tution_fees: {
                        digits: true
                    },
                    development_fees: {
                        digits: true
                    },
                    other_fees: {
                        digits: true
                    },
                    caution_money: {
                        digits: true
                    },
                    enrollment_fees: {
                        digits: true
                    },
                    form_fees: {
                        digits: true
                    },
                    sports_fees: {
                        digits: true
                    },
                    cultural_fees: {
                        digits: true
                    },
                    relief_fund: {
                        digits: true
                    },
                    gymkhana_fees: {
                        digits: true
                    },
                    e_charges: {
                        digits: true
                    },
                    yuvia_fees: {
                        digits: true
                    },
                    others: {
                        digits: true
                    }
                },
                messages: {
                    batch: {
                        required: "Please provide input"
                    },
                    year: {
                        required: "Please provide input"
                    },
                    caste: {
                        required: "Please provide input"
                    },
                    tution_fees: {
                        digits: "Please provide valid input"
                    },
                    development_fees: {
                        digits: "Please provide valid input"
                    },
                    other_fees: {
                        digits: "Please provide valid input"
                    },
                    caution_money: {
                        digits: "Please provide valid input"
                    },
                    enrollment_fees: {
                        digits: "Please provide valid input"
                    },
                    form_fees: {
                        digits: "Please provide valid input"
                    },
                    sports_fees: {
                        digits: "Please provide valid input"
                    },
                    cultural_fees: {
                        digits: "Please provide valid input"
                    },
                    relief_fund: {
                        digits: "Please provide valid input"
                    },
                    gymkhana_fees: {
                        digits: "Please provide valid input"
                    },
                    e_charges: {
                        digits: "Please provide valid input"
                    },
                    yuvia_fees: {
                        digits: "Please provide valid input"
                    },
                    others: {
                        digits: "Please provide valid input"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) 
                        {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Fee Details added successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#feesdetail_table').DataTable().ajax.reload();
                                var validator = $("#addFeeDeatils_Form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new details.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addFeeDeatils_Form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#editFee_btn",function (e) {
            $('#editFees_form').validate({
                rules: {
                    batch: {
                        required: true
                    },
                    year: {
                        required: true
                    },
                    caste: {
                        required: true
                    },
                    tution_fees: {
                        digits: true
                    },
                    development_fees: {
                        digits: true
                    },
                    other_fees: {
                        digits: true
                    },
                    caution_money: {
                        digits: true
                    },
                    enrollment_fees: {
                        digits: true
                    },
                    form_fees: {
                        digits: true
                    },
                    sports_fees: {
                        digits: true
                    },
                    cultural_fees: {
                        digits: true
                    },
                    relief_fund: {
                        digits: true
                    },
                    gymkhana_fees: {
                        digits: true
                    },
                    e_charges: {
                        digits: true
                    },
                    yuvia_fees: {
                        digits: true
                    },
                    others: {
                        digits: true
                    }
                },
                messages: {
                    batch: {
                        required: "Please provide input"
                    },
                    year: {
                        required: "Please provide input"
                    },
                    caste: {
                        required: "Please provide input"
                    },
                    tution_fees: {
                        digits: "Please provide valid input"
                    },
                    development_fees: {
                        digits: "Please provide valid input"
                    },
                    other_fees: {
                        digits: "Please provide valid input"
                    },
                    caution_money: {
                        digits: "Please provide valid input"
                    },
                    enrollment_fees: {
                        digits: "Please provide valid input"
                    },
                    form_fees: {
                        digits: "Please provide valid input"
                    },
                    sports_fees: {
                        digits: "Please provide valid input"
                    },
                    cultural_fees: {
                        digits: "Please provide valid input"
                    },
                    relief_fund: {
                        digits: "Please provide valid input"
                    },
                    gymkhana_fees: {
                        digits: "Please provide valid input"
                    },
                    e_charges: {
                        digits: "Please provide valid input"
                    },
                    yuvia_fees: {
                        digits: "Please provide valid input"
                    },
                    others: {
                        digits: "Please provide valid input"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) 
                        {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Fee Details updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#feesdetail_table').DataTable().ajax.reload();
                                var validator = $("#addFeeDeatils_Form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating fee details.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#editFees_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#addFaculty_btn").click(function (e) {
            $('#addFaculty_form').validate({
                rules: {
                    faculty_name: {
                        required: true,
                        lettersonly:true
                    },
                    faculty_email: {
                        required: true,
                        email:true
                    },
                    faculty_password: {
                        required: true
                    },
                    faculty_branch: {
                        required: true
                    },
                    faculty_phone: {
                        required: true,
                        digits:true,
                        maxlength:10,
                        minlength:10
                    }
                },
                messages: {
                    faculty_name: {
                        required: "Please provide faculty name"
                    },
                    faculty_email: {
                        required: "Please provide faculty email",
                        email:"Please provide valid email"
                    },
                    faculty_password: {
                        required: "Please provide faculty password"
                    },
                    faculty_branch: {
                        required: "Please provide faculty branch"
                    },
                    faculty_phone: {
                        required: "Please provide faculty phone",
                        digits:"Please provide valid number",
                        maxlength:"Please provide valid number",
                        minlength:"Please provide valid number"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Faculty added successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#faculty_table').DataTable().ajax.reload();
                                var validator = $("#addFaculty_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new faculty.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addFaculty_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#edit_facultybtn",function (e) {
            $('#edit_facultyform').validate({
                rules: {
                    faculty_name: {
                        required: true,
                        lettersonly:true
                    },
                    faculty_email: {
                        required: true,
                        email:true
                    },
                    faculty_branch: {
                        required: true
                    },
                    faculty_phone: {
                        required: true,
                        digits:true,
                        maxlength:10,
                        minlength:10
                    }
                },
                messages: {
                    faculty_name: {
                        required: "Please provide faculty name"
                    },
                    faculty_email: {
                        required: "Please provide faculty email",
                        email:"Please provide valid email"
                    },
                    faculty_branch: {
                        required: "Please provide faculty branch"
                    },
                    faculty_phone: {
                        required: "Please provide faculty phone",
                        digits:"Please provide valid number",
                        maxlength:"Please provide valid number",
                        minlength:"Please provide valid number"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Faculty updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#faculty_table').DataTable().ajax.reload();
                                var validator = $("#edit_facultyform").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating faculty.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#edit_facultyform").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#addSubject_btn").click(function (e) {
            $('#addSubject_form').validate({
                rules: {
                    subject_name: {
                        required: true,
                        lettersonly:true
                    },
                    subject_branch: {
                        required: true
                    }
                },
                messages: {
                    subject_name: {
                        required: "Please provide subject name"
                    },
                    subject_branch: {
                        required: "Please provide subject branch"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Subject added successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#subject_table').DataTable().ajax.reload();
                                var validator = $("#addSubject_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new subject.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addSubject_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#edit_subjectbtn",function (e) {
            $('#edit_subjectform').validate({
                rules: {
                    subject_name: {
                        required: true,
                        lettersonly:true
                    },
                    subject_branch: {
                        required: true
                    }
                },
                messages: {
                    subject_name: {
                        required: "Please provide subject name"
                    },
                    subject_branch: {
                        required: "Please provide subject branch"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Subject updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $(".EditModal").modal('hide');
                                $('#subject_table').DataTable().ajax.reload();
                                var validator = $("#edit_subjectform").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating subject.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#edit_subjectform").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#addCourse_btn").click(function (e) {
            $('#addCourse_form').validate({
                rules: {
                    course_class:{
                        required:true
                    },
                    course_faculty:{
                        required:true
                    },
                    course_subject:{
                        required:true
                    }
                },
                messages: {
                    course_class:{
                        required: "Please provide class"
                    },
                    course_faculty:{
                        required: "Please provide faculty"
                    },
                    course_subject:{
                        required: "Please provide subject"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: 'Course created successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#course_table').DataTable().ajax.reload();
                                var validator = $("#addCourse_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new course.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addCourse_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#edit_coursebtn",function (e) {
            $('#edit_courseform').validate({
                rules: {
                    course_class:{
                        required:true
                    },
                    course_faculty:{
                        required:true
                    },
                    course_subject:{
                        required:true
                    }
                },
                messages: {
                    course_class:{
                        required: "Please provide class"
                    },
                    course_faculty:{
                        required: "Please provide faculty"
                    },
                    course_subject:{
                        required: "Please provide subject"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Course updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $(".EditModal").modal('hide');
                                $('#course_table').DataTable().ajax.reload();
                                var validator = $("#edit_courseform").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating course.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#edit_courseform").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#login_faculty_btn").click(function (e) {
            $('#faculty_login').validate({
                rules: {
                    email_id: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email_id: {
                        required: "Please enter email id."
                    },
                    password: {
                        required: "Please enter password."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/send.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                var validator = $("#faculty_login").validate();
                                validator.resetForm();
                                location.href="faculty-profile.php";
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Invalid Username/Password.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#faculty_login").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#addClasses_btn").click(function (e) {
            $('#addClasses_form').validate({
                rules: {
                    class_branch:{
                        required:true
                    },
                    class_batch:{
                        required:true
                    },
                    class_year:{
                        required:true
                    },
                    class_sem:{
                        required:true
                    }
                },
                messages: {
                    class_branch:{
                        required: "Please provide branch"
                    },
                    class_batch:{
                        required: "Please provide batch"
                    },
                    class_year:{
                        required: "Please provide year"
                    },
                    class_sem:{
                        required: "Please provide sem"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: 'Class created successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#class_table').DataTable().ajax.reload();
                                var validator = $("#addClasses_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new class.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addClasses_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#edit_classbtn",function (e) {
            $('#edit_classform').validate({
                rules: {
                    class_branch:{
                        required:true
                    },
                    class_batch:{
                        required:true
                    },
                    class_year:{
                        required:true
                    },
                    class_sem:{
                        required:true
                    }
                },
                messages: {
                    class_branch:{
                        required: "Please provide branch"
                    },
                    class_batch:{
                        required: "Please provide batch"
                    },
                    class_year:{
                        required: "Please provide year"
                    },
                    class_sem:{
                        required: "Please provide sem"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/edit.php",
                        success: function (response) {
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Class updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $(".EditModal").modal('hide');
                                $('#class_table').DataTable().ajax.reload();
                                var validator = $("#edit_classform").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating class.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#edit_classform").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $(document).on("click", "#student_attendance_btn",function (e) {
            $('#student_attendance_form').validate({
                rules: {
                    course_list:{
                        required:true
                    },
                    date_attended:{
                        required:true
                    },
                    start_time:{
                        required:true
                    },
                    end_time:{
                        required:true
                    }
                },
                messages: {
                    course_list:{
                        required: "Please select course"
                    },
                    date_attended:{
                        required: "Please provide date"
                    },
                    start_time:{
                        required: "Please provide time"
                    },
                    end_time:{
                        required: "Please provide time"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/add.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: 'Class created successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $('#class_table').DataTable().ajax.reload();
                                var validator = $("#addClasses_form").validate();
                                validator.resetForm();
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while adding new class.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addClasses_form").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
        $("#login_admin_btn").click(function (e) {
            $('#admin_login').validate({
                rules: {
                    email_id: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email_id: {
                        required: "Please enter email id."
                    },
                    password: {
                        required: "Please enter password."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "../includes/send.php",
                        success: function (response) {
                            if (response == "success") {
                                var validator = $("#admin_login").validate();
                                validator.resetForm();
                                location.href="departments.php";
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Invalid Username/Password.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#admin_login").validate();
                            validator.resetForm();
                            swal({
                                title: "Error",
                                text: "Error Sending Request!",
                                type: "error"
                            });
                        }
                    })
                }
            })
        })
    })(jQuery)
});
