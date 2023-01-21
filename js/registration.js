function value_none(element_box) {
    $(element_box).attr("value", "Not Provided");
}

function value_empty(element_box) {
    $(element_box).val("");
}

function file_void(element_box) {
    $(element_box).removeAttr("value");
    $(element_box).attr("type", "file");
}

function file_empty(element_box) {
    $(element_box).attr("type", "text");
    $(element_box).attr("value", "Not Required");
}
$(document).ready(function () {
    
    //Personal Details-----------------------------
    
//    $("#dob").datepicker();

    $("#studentCaste").change(function () {
        let option = $(this).val();
        if (option == "Open") {
            $(".casteField").each(function () {
                $(this).hide();
                value_none($(this).find("file_none"));
            });
        } else {
            $(".casteField").each(function () {
                $(this).show();
                value_empty($(this).find("file_empty"));
            });
        }

    });

    //Academic Details-----------------------------

    $(".academic_checkbox").change(function () {
        let i = 0;
        $(".academic_checkbox").each(function () {
            if (this.checked) {
                i++;
            }
        });
        if (i == 0) {
            $("#academic_checkbox_error").show();
            $("#register_student_btn").attr("disabled", true);
        } else {
            $("#academic_checkbox_error").hide();
            $("#register_student_btn").attr("disabled", false);
        }
    });

    //Twelfth Std Checkbox
    $("#student_twelfth").click(function () {
        if (this.checked) {
            $(".twelfth_field").each(function () {
                $(this).show();
                value_empty($(this).find("input[type='text']"));
                value_empty($(this).find("select"));
                value_empty($(this).find("file_empty"));
            });
        } else {
            $(".twelfth_field").each(function () {
                $(this).hide();
                value_none($(this).find("input[type='text']"));
                value_none($(this).find("select"));
                value_none($(this).find("file_none"));
            });
        }
    });

    //Diploma Checkbox
    $("#student_diploma").click(function () {
        if (this.checked) {
            $(".diploma_field").each(function () {
                $(this).show();
                value_empty($(this).find("input[type='text']"));
                value_empty($(this).find("file_empty"));
            });
        } else {
            $(".diploma_field").each(function () {
                $(this).hide();
                value_none($(this).find("input[type='text']"));
                value_none($(this).find("file_none"));
            });
        }
    });

    //Addmission Details-------------------------

    //Online Addmission Checkbox
    $("#online_addmission").click(function () {
        if (this.checked) {
            $(".online_field").each(function () {
                $(this).show();
                value_empty($(this).find("input[type='text']"));
                value_empty($(this).find("file_empty"));
            });
        }
    });

    $("#offline_addmission").click(function () {
        if (this.checked) {
            $(".online_field").each(function () {
                $(this).hide();
                value_none($(this).find("input[type='text']"));
                value_none($(this).find("file_none"));
            });
        }
    });
    


    //Parents Details------------------------

    $(".parents_checkbox").change(function () {
        let i = 0;
        $(".parents_checkbox").each(function () {
            if (this.checked) {
                i++;
            }
        });
        if (i == 0) {
            $("#parents_checkbox_error").show();
            $("#register_student_btn").attr("disabled", true);
        } else {
            $("#parents_checkbox_error").hide();
            $("#register_student_btn").attr("disabled", false);
        }
    });

    //Mother Checkbox
    $("#parent_mother").click(function () {
        if (this.checked) {
            $(".mother_details").each(function () {
                $(this).show();
                value_empty($(this).find("input[type='text']"));
            });
        } else {
            $(".mother_details").each(function () {
                $(this).hide();
                value_none($(this).find("input[type='text']"));
            });
        }
    });

    //Father Checkbox
    $("#parent_father").click(function () {
        if (this.checked) {
            $(".father_details").each(function () {
                $(this).show();
                value_empty($(this).find("input[type='text']"));
            });
        } else {
            $(".father_details").each(function () {
                $(this).hide();
                value_none($(this).find("input[type='text']"));
            });
        }
    });

    //Gaurdian Checkbox
    $("#parent_guardian").click(function () {
        if (this.checked) {
            $(".guardian_details").each(function () {
                $(this).show();
                value_empty($(this).find("input[type='text']"));
            });
        } else {
            $(".guardian_details").each(function () {
                $(this).hide();
                value_none($(this).find("input[type='text']"));
            });
        }
    });
});