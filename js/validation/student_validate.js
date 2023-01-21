jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z," .,"]+$/i.test(value);
}, "Letters and spaces only please");
jQuery.validator.addMethod("alphabets", function (value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");
$(document).ready(function () {
    (function ($) {
        "use strict";
        $("#register_student_btn").click(function (e) {
            $('#register_student_form').validate({
                rules: {
                    student_name: {
                        required: true,
                        lettersonly: true
                    },
                    blood: {
                        required: true
                    },
                    dob: {
                        required: true
                    },
                    aadharNo: {
                        required: true,
                        digits: true,
                        minlength: 12,
                        maxlength: 12
                    },
                    gender: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                    studentReligion: {
                        required: true
                    },
                    studentCaste: {
                        required: true
                    },
                    studentEmail: {
                        required: true,
                        email: true
                    },
                    studentPhone: {
                        required: true,
                        digits: true,
                        maxlength: 13,
                        minlength: 10
                    },
                    studentCurrentAddress: {
                        required: true
                    },
                    studentPermanentAddress: {
                        required: true
                    },
                    pincode: {
                        required: true,
                        digits: true,
                        maxlength: 6,
                        minlength: 6
                    },
                    district: {
                        required: true,
                        lettersonly: true
                    },
                    state: {
                        required: true,
                        lettersonly: true
                    },
                    city: {
                        required: true,
                        lettersonly: true
                    },
                    tenthSchool: {
                        required: true,
                        lettersonly: true
                    },
                    tenthBoard: {
                        required: true
                    },
                    tenthPercentage: {
                        required: true,
                        number: true
                    },
                    tenthPassingYear: {
                        required: true,
                        number: true,
                        maxlength: 4,
                        minlength: 4
                    },
                    twelfthSchool: {
                        lettersonly: true,
                        required: true
                    },
                    twelfthBoard: {
                        required: true
                    },
                    twelfthPercentage: {
                        required: true,
                        number: true
                    },
                    twelfthPassingYear: {
                        required: true,
                        digits: true,
                        maxlength: 4,
                        minlength: 4
                    },
                    diplomaCollege: {
                        required: true,
                        lettersonly: true
                    },
                    diplomaDept: {
                        required: true,
                        lettersonly: true
                    },
                    diplomaGrade: {
                        required: true,
                        number: true
                    },
                    diplomaPassingYear: {
                        required: true,
                        digits: true,
                        maxlength: 4,
                        minlength: 4
                    },
                    userCAP: {
                        required: true
                    },
                    capfile: {
                        required: true
                    },
                    userDepartment: {
                        required: true
                    },
                    admissionYear: {
                        required: true,
                        digits: true,
                        minlength: 4,
                        maxlength: 4
                    },
                    admissionTo: {
                        required: true
                    },
                    studentMotherName: {
                        required: true,
                        alphabets: true
                    },
                    studentMotherEmail: {
                        required: true,
                        email: true
                    },
                    studentMotherProfession: {
                        required: true,
                        alphabets: true
                    },
                    studentMotherPhone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 13
                    },
                    studentFatherName: {
                        required: true,
                        alphabets: true
                    },
                    studentFatherEmail: {
                        required: true,
                        email: true
                    },
                    studentFatherProfession: {
                        required: true,
                        alphabets: true
                    },
                    studentFatherPhone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 13
                    },
                    studentGuardianName: {
                        required: true,
                        alphabets: true
                    },
                    studentGuardianEmail: {
                        required: true,
                        email: true
                    },
                    studentGuardianProfession: {
                        required: true,
                        alphabets: true
                    },
                    studentGuardianPhone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 13
                    },
                    passportPhoto: {
                        required: true,
                        extension: "png|jpe?g"
                    },
                    birthCertificate: {
                        required: true,
                        extension: "pdf"
                    },
                    aadharCardfile: {
                        required: true,
                        extension: "pdf"
                    },
                    panCardfile: {
                        required: true,
                        extension: "pdf"
                    },
                    casteCertificate: {
                        required: true,
                        extension: "pdf"
                    },
                    incomeCertificate: {
                        required: true,
                        extension: "pdf"
                    },
                    tenthMarksheet: {
                        required: true,
                        extension: "pdf"
                    },
                    tenthLeavingCertificate: {
                        required: true,
                        extension: "pdf"
                    },
                    twelfthMarksheet: {
                        required: true,
                        extension: "pdf"
                    },
                    twelfthLeavingMarksheet: {
                        required: true,
                        extension: "pdf"
                    },
                    diplomaMarksheet: {
                        required: true,
                        extension: "pdf"
                    },
                    diplomaLeavingCertificate: {
                        required: true,
                        extension: "pdf"
                    },
                    antiRaggingAffidavite: {
                        required: true,
                        extension: "pdf"
                    },
                    enrollmentno:{
                        required: true
                    },
                    student_password:{
                        required:true,
                    },
                    confirm_password:{
                        required:true,
                        equalTo:student_password
                    }
                },
                messages: {
                    student_name: {
                        required: "Please provide your name"
                    },
                    blood: {
                        required: "Please select blood group"
                    },
                    dob: {
                        required: "Please select dob"
                    },
                    aadharNo: {
                        required: "Please provide aadhar number",
                        digits: "Incorrect aadhar number",
                        minlength: "Incorrect aadhar number",
                        maxlength: "Incorrect aadhar number"
                    },
                    gender: {
                        required: "Please select gender"
                    },
                    status: {
                        required: "Please select status"
                    },
                    studentReligion: {
                        required: "Please select religion"
                    },
                    studentCaste: {
                        required: "Please select caste"
                    },
                    studentEmail: {
                        required: "Please provide email",
                        email: "Incorrect email id"
                    },
                    studentPhone: {
                        required: "Please provide phone number",
                        digits: "Incorrect phone number",
                        minlength: "Incorrect phone number",
                        maxlength: "Incorrect phone number"
                    },
                    studentCurrentAddress: {
                        required: "Please provide current address"
                    },
                    studentPermanentAddress: {
                        required: "Please provide permanent address"
                    },
                    pincode: {
                        required: "Please provide pincode",
                        digits: "Incorrect pincode",
                        minlength: "Incorrect pincode",
                        maxlength: "Incorrect pincode"
                    },
                    district: {
                        required: "Please provide district"
                    },
                    state: {
                        required: "Please provide state"
                    },
                    city: {
                        required: "Please provide city"
                    },
                    tenthSchool: {
                        required: "Please provide school name",
                        lettersonly: "Please provide valid school name"
                    },
                    tenthBoard: {
                        required: "Please select board"
                    },
                    tenthPercentage: {
                        required: "Please provide school percentage",
                        number: "Please provide valid percentage"
                    },
                    tenthPassingYear: {
                        required: "Please provide tenth passing year",
                        digits: "Please provide valid year",
                        minlength: "Please provide valid year",
                        maxlength: "Please provide valid year"
                    },
                    twelfthSchool: {
                        lettersonly: "Please provide valid school",
                        required: "Please provide twelfth school"
                    },
                    twelfthBoard: {
                        required: "Please provide twelfth board"
                    },
                    twelfthPercentage: {
                        required: "Please provide twelfth percentage",
                        number: "Please provide valid percentage"
                    },
                    twelfthPassingYear: {
                        required: "Please provide twelfth passing year",
                        digits: "Please provide valid year",
                        minlength: "Please provide valid year",
                        maxlength: "Please provide valid year"
                    },
                    diplomaCollege: {
                        required: "Please provide diploma college name",
                        lettersonly: "Please provide valid name"
                    },
                    diplomaDept: {
                        required: "Please provide diploma college department",
                        lettersonly: "Please provide valid department"
                    },
                    diplomaGrade: {
                        required: "Please provide diploma college grade",
                        number: "Please provide valid grade"
                    },
                    diplomaPassingYear: {
                        required: "Please provide diploma college passing year",
                        digits: "Please provide valid year",
                        minlength: "Please provide valid year",
                        maxlength: "Please provide valid year"
                    },
                    userCAP: {
                        required: "Please provide CAP Application ID"
                    },
                    capfile: {
                        required: "Please upload CAP Application File"
                    },
                    userDepartment: {
                        required: "Please select department you wish to join"
                    },
                    admissionYear: {
                        required: "Please provide admission year",
                        digits: "Please enter valid year",
                        minlength: "Please enter valid year",
                        maxlength: "Please enter valid year"
                    },
                    admissionTo: {
                        required: "Please select admission year."
                    },
                    studentMotherName: {
                        required: "Please provide mother's name",
                        alphabets: "Please provide valid name"
                    },
                    studentMotherEmail: {
                        required: "Please provide mother's email",
                        email: "Please provide valid email"
                    },
                    studentMotherProfession: {
                        required: "Please provide mother's profession",
                        alphabets: "Please provide valid profession"
                    },
                    studentMotherPhone: {
                        required: "Please provide mother's phone number",
                        digits: "Please provide valid phone number",
                        minlength: "Please provide valid phone number",
                        maxlength: "Please provide valid phone number"
                    },
                    studentFatherName: {
                        required: "Please provide father's name",
                        alphabets: "Please provide valid name"
                    },
                    studentFatherEmail: {
                        required: "Please provide father's email",
                        email: "Please provide valid email"
                    },
                    studentFatherProfession: {
                        required: "Please provide father's profession",
                        alphabets: "Please provide valid profession"
                    },
                    studentFatherPhone: {
                        required: "Please provide father's phone number",
                        digits: "Please provide valid phone number",
                        minlength: "Please provide valid phone number",
                        maxlength: "Please provide valid phone number"
                    },
                    studentGuardianName: {
                        required: "Please provide guardian's name",
                        alphabets: "Please provide valid name"
                    },
                    studentGuardianEmail: {
                        required: "Please provide guardian's email",
                        email: "Please provide valid email"
                    },
                    studentGuardianProfession: {
                        required: "Please provide guardian's profession",
                        alphabets: "Please provide valid profession"
                    },
                    studentGuardianPhone: {
                        required: "Please provide guardian's phone number",
                        digits: "Please provide valid phone number",
                        minlength: "Please provide valid phone number",
                        maxlength: "Please provide valid phone number"
                    },
                    passportPhoto: {
                        required: "Please upload your passport photo",
                        extension: "Please upload in JPEG Format"
                    },
                    birthCertificate: {
                        required: "Please upload your birth certificate",
                        extension: "Please upload in PDF Format"
                    },
                    aadharCardfile: {
                        required: "Please upload your aadhar card",
                        extension: "Please upload in PDF Format"
                    },
                    panCardfile: {
                        required: "Please upload your pan card",
                        extension: "Please upload in PDF Format"
                    },
                    casteCertificate: {
                        required: "Please upload your caste certificate",
                        extension: "Please upload in PDF Format"
                    },
                    incomeCertificate: {
                        required: "Please upload your income certificate",
                        extension: "Please upload in PDF Format"
                    },
                    tenthMarksheet: {
                        required: "Please upload your tenth marksheet",
                        extension: "Please upload in PDF Format"
                    },
                    tenthLeavingCertificate: {
                        required: "Please upload your tenth leaving certificate",
                        extension: "Please upload in PDF Format"
                    },
                    twelfthMarksheet: {
                        required: "Please upload your twelfth marksheet",
                        extension: "Please upload in PDF Format"
                    },
                    twelfthLeavingMarksheet: {
                        required: "Please upload your twelfth leaving marksheet",
                        extension: "Please upload in PDF Format"
                    },
                    diplomaMarksheet: {
                        required: "Please upload your diploma marksheet",
                        extension: "Please upload in PDF Format"
                    },
                    diplomaLeavingCertificate: {
                        required: "Please upload your diploma leaving certificate",
                        extension: "Please upload in PDF Format"
                    },
                    antiRaggingAffidavite: {
                        required: "Please upload your anti-ragging affidavite",
                        extension: "Please upload in PDF Format"
                    },
                    enrollmentno:{
                        required: "Please provide enrollment no"
                    },
                    student_password:{
                        required:"Please provide password",
                    },
                    confirm_password:{
                        required:"Please provide password",
                        equalTo:"Password do not match"
                    }

                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "includes/registration.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Student Registered successfully added.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                var validator = $("#register_student_form").validate();
                                validator.resetForm();
                                location.href="student-processing.php";
                            }
                            if (response == "error") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while registering student.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#register_student_form").validate();
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
        $("#add_workexp_btn").click(function (e) {
            $('#addworkexp_form').validate({
                rules: {
                    exp_type: {
                        required: true
                    },
                    company_logo: {
                        required: true,
                        extension: "png|jpe?g"
                    },
                    company_name: {
                        required: true,
                        lettersonly: true
                    },
                    company_description: {
                        required: true
                    },
                    company_link: {
                        required: true
                    },
                    company_contact: {
                        required: true
                    },
                    company_role: {
                        required: true
                    },
                    company_pay: {
                        required: true
                    },
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    work_description: {
                        required: true
                    },
                    technology_description: {
                        required: true
                    },
                    offer_letter: {
                        required: true,
                        extension: 'pdf'
                    },
                    work_letter: {
                        required: true,
                        extension: 'pdf'
                    }
                },
                messages: {
                    exp_type: {
                        required: "Please select an experience type."
                    },
                    company_logo: {
                        required: "Please upload company logo.",
                        extension: 'Only jpeg and png files are accepted.'
                    },
                    company_name: {
                        required: "Please provide company name.",
                        lettersonly: true
                    },
                    company_description: {
                        required: "Please provide company description."
                    },
                    company_link: {
                        required: "Please provide company link."
                    },
                    company_contact: {
                        required: "Please provide company contact."
                    },
                    company_role: {
                        required: "Please provide experience role."
                    },
                    company_pay: {
                        required: "Please provide company pay."
                    },
                    start_date: {
                        required: "Please provide start date."
                    },
                    end_date: {
                        required: "Please provide end date."
                    },
                    work_description: {
                        required: "Please provide work description."
                    },
                    technology_description: {
                        required: "Please provide technology description."
                    },
                    offer_letter: {
                        required: "Please upload offer letter.",
                        extension: 'pdf'
                    },
                    work_letter: {
                        required: "Please upload experience letter.",
                        extension: 'pdf'
                    }

                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "includes/send.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Student registered successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                var validator = $("#addworkexp_form").validate();
                                validator.resetForm();
                                $("#addworkexp").modal('hide');
                            }
                            if (response == "error") {
                                $("#addworkexp").modal('hide');
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while registering student.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#addworkexp_form").validate();
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
        $(document).on('click', '#edit_workexp_btn', function (e) {
            $('#editworkexp_form').validate({
                rules: {
                    exp_type: {
                        required: true
                    },
                    company_logo: {
                        extension: "png|jpe?g"
                    },
                    company_name: {
                        required: true,
                        lettersonly: true
                    },
                    company_description: {
                        required: true
                    },
                    company_link: {
                        required: true
                    },
                    company_contact: {
                        required: true
                    },
                    company_role: {
                        required: true
                    },
                    company_pay: {
                        required: true
                    },
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    work_description: {
                        required: true
                    },
                    technology_description: {
                        required: true
                    },
                    offer_letter: {
                        extension: 'pdf'
                    },
                    work_letter: {
                        extension: 'pdf'
                    }
                },
                messages: {
                    exp_type: {
                        required: "Please select an experience type."
                    },
                    company_logo: {
                        extension: 'Only jpeg and png files are accepted.'
                    },
                    company_name: {
                        required: "Please provide company name.",
                        lettersonly: true
                    },
                    company_description: {
                        required: "Please provide company description."
                    },
                    company_link: {
                        required: "Please provide company link."
                    },
                    company_contact: {
                        required: "Please provide company contact."
                    },
                    company_role: {
                        required: "Please provide experience role."
                    },
                    company_pay: {
                        required: "Please provide company pay."
                    },
                    start_date: {
                        required: "Please provide start date."
                    },
                    end_date: {
                        required: "Please provide end date."
                    },
                    work_description: {
                        required: "Please provide work description."
                    },
                    technology_description: {
                        required: "Please provide technology description."
                    },
                    offer_letter: {
                        extension: 'pdf'
                    },
                    work_letter: {
                        extension: 'pdf'
                    }

                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "includes/send.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'Work experience updated successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                var validator = $("#editworkexp_form").validate();
                                validator.resetForm();
                                $("#editworkexp").modal('hide');
                                location.reload();
                            }
                            if (response == "error") {
                                $("#editworkexp").modal('hide');
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error while updating work experience.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#editworkexp_form").validate();
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
        $("#register_otp_btn").click(function (e) {
            $('#register_verify_form').validate({
                rules: {
                    unique_id: {
                        required: true
                    },
                    email_id: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    unique_id: {
                        required: "Please provide unique id/enrollment no."
                    },
                    email_id: {
                        required: "Please provide email.",
                        email: "Please provide valid email."
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "includes/mail.php",
                        beforeSend: function () {
                            $("#register_otp_btn").attr("disabled", "disabled");
                            $("#register_otp_btn").html("Sending OTP..");
                        },
                        success: function (response) {
                            console.log(response);
                            if (response === "success") {
                                let time = 60;
                                $("#resend_otp").html('Resend Otp in ' + time + ' seconds');
                                $("#register_otp_btn").hide();
                                $("#unique_id").attr("disabled", "disabled");
                                $("#email_id").attr("disabled", "disabled");
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'OTP Sent successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                $("#resend_otp").addClass('disable_a_href');
                                let myInterval = setInterval(function () {
                                    $("#resend_otp").html('Resend Otp in ' + time-- + ' seconds');
                                    if (time == 0) {
                                        $("#resend_otp").html('Resend Otp');
                                        clearInterval(myInterval);
                                        $("#resend_otp").removeClass('disable_a_href');
                                    }
                                }, 1000);
                                $("#register_verify_otp").removeClass("hide_box");
                            }
                            if (response === "error") {
                                $("#register_otp_btn").html("Send OTP");
                                $("#register_otp_btn").removeAttr("disabled");
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Student has not registered with college.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                            if (response === "errorOtp") {
                                $("#register_otp_btn").html("Send OTP");
                                $("#register_otp_btn").removeAttr("disabled");
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'Error generating OTP.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#register_verify_form").validate();
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
        $("#resend_otp").click(function (e) {
            e.preventDefault();
            let unique_id = $("#unique_id").val();
            let email_id = $("#email_id").val();
            let link = $("#resend_otp");
            $.ajax({
                type: "POST",
                data: {
                    unique_id: unique_id,
                    email_id: email_id,
                    register_otp_btn: "register_otp_btn"
                },
                url: "includes/mail.php",
                beforeSend: function () {
                    $(link).addClass('disable_a_href');
                    $(link).html("Sending OTP..");
                },
                success: function (response) {
                    if (response === "success") {
                        let time = 60;
                        $("#resend_otp").html('Resend Otp in ' + time + ' seconds');
                        $.notify({
                            icon: 'glyphicon glyphicon-ok',
                            title: '<strong>Success!</strong>',
                            message: 'OTP Sent successfully.'
                        }, {
                            type: 'success',
                            delay: 5000
                        });
                        let myInterval = setInterval(function () {
                            $(link).html('Resend Otp in ' + time-- + ' seconds');
                            if (time == 0) {
                                $(link).html('Resend Otp');
                                clearInterval(myInterval);
                                $(link).removeClass('disable_a_href');
                            }
                        }, 1000);
                    }
                    if (response === "error") {
                        $(link).html("Send OTP");
                        $(link).removeClass('disable_a_href');
                        $.notify({
                            icon: 'glyphicon glyphicon-ok',
                            title: '<strong>Error!</strong>',
                            message: 'Student has not registered with college.'
                        }, {
                            type: 'danger',
                            delay: 5000
                        });
                    }
                    if (response === "errorOtp") {
                        $(link).html("Send OTP");
                        $(link).removeClass('disable_a_href');
                        $.notify({
                            icon: 'glyphicon glyphicon-ok',
                            title: '<strong>Error!</strong>',
                            message: 'Error generating OTP.'
                        }, {
                            type: 'danger',
                            delay: 5000
                        });
                    }
                },
                error: function () {
                    swal({
                        title: "Error",
                        text: "Error Sending Request!",
                        type: "error"
                    });
                }
            });
        });
        $("#otp_check_btn").click(function (e) {
            $('#register_verify_otp').validate({
                rules: {
                    otp: {
                        required: true,
                        digits: true,
                        minlength: 6,
                        maxlength: 6
                    }

                },
                messages: {
                    otp: {
                        required: "Please provide OTP",
                        digits: "Please provide valid OTP",
                        minlength: "Please provide valid OTP",
                        maxlength: "Please provide valid OTP"
                    }
                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "includes/mail.php",
                        beforeSend: function () {
                            $("#otp_check_btn").attr("disabled", "disabled");
                            $("#otp_check_btn").html("Checking OTP..");
                        },
                        success: function (response) {
                            console.log(response);
                            if (response === "success") {
                                $("#otp_check_btn").html("Proceeding to Admission..");
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Success!</strong>',
                                    message: 'OTP confirmed successfully.'
                                }, {
                                    type: 'success',
                                    delay: 5000
                                });
                                setInterval(function(){
                                    location.href='student-registration-form.php';
                                },2000);  
                            }
                            if (response === "error") {
                                $("#otp_check_btn").removeAttr("disabled");
                                $("#otp_check_btn").html("Proceed to Admission");
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'OTP is invalid.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                            if (response === "timeError") {
                                $("#otp_check_btn").removeAttr("disabled");
                                $("#otp_check_btn").html("Proceed to Admission");
                                $.notify({
                                    icon: 'glyphicon glyphicon-ok',
                                    title: '<strong>Error!</strong>',
                                    message: 'OTP has expired.'
                                }, {
                                    type: 'danger',
                                    delay: 5000
                                });
                            }
                        },
                        error: function () {
                            var validator = $("#register_verify_form").validate();
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
        $("#login_student_btn").click(function (e) {
            $('#student_login').validate({
                rules: {
                    unique_id: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    unique_id: {
                        required: "Please enter unique id."
                    },
                    password: {
                        required: "Please enter password."
                    }

                },
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: "POST",
                        data: $(form).serialize(),
                        url: "includes/send.php",
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                var validator = $("#student_login").validate();
                                validator.resetForm();
                                location.href="student-processing.php"
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
                            var validator = $("#student_login").validate();
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
