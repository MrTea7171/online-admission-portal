$(document).ready(function () {
    
    //Registered Students Table
    if ($('#registered_students_table').length > 0) {
        var departments_table = $('#registered_students_table').DataTable({
            dom: 'PlBfrtip',
            "ajax": {
                "url": "../showAjax/showRegisteredStudents.php",
                "type": "POST"
            },
            "columns": [{
                    data: "student_no"
                    },
                {
                    data: "student_name"
                    },
                {
                    data: "student_email"
                    },
                {
                    data: "student_phone"
                    },
                {
                    data: "student_addmission_mode"
                    },
                {
                    data: "student_caste"
                    },
                {
                    data: "student_addmission_status"
                    },
                {
                    data: "student_buttons"
                    }
                ],
            columnDefs: [{
                    targets: '_all',
                    className: 'text-center',

                    },
                {
                    searchPanes: {
                        show: true,
                        initCollapsed: true
                    },
                    targets: 1
                    }
                ],
            buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [':visible:not(.notexport)']
                    }
                    },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [':visible:not(.notexport)']
                    }
                    },
                {
                    extend: 'colvis'
                    }
                ],


        });
    }
    
    //Department Table
    if($("#department_table").length > 0)
    {
        var departments_table = $('#department_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showDepartments.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "department_no"
                    },
                    {
                        data: "department_name"
                    },
                    {
                        data: "department_code"
                    },
                    {
                        data: "department_short"
                    },
                    {
                        data: "department_actions"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                        targets: 1
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    //Placement Offers Table
    if($("#placement_offers_table").length > 0)
    {
        var placement_table = $('#placement_offers_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showPlacementOffers.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "offer_no"
                    },
                    {
                        data: "company_logo"
                    },
                    {
                        data: "company_name"
                    },
                    {
                        data: "company_description"
                    },
                    {
                        data: "role"
                    },
                    {
                        data: "salary"
                    },
                    {
                        data: "link"
                    },
                    {
                        data: "last_date"
                    },
                    {
                        data: "offer_buttons"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                        targets: [2,4,7]
                    },
                    {
                        searchPanes: {
                            show: false,
                        },
                        targets: [0,1,3,5,6]
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#student_intership_table").length > 0)
    {
        var confirmedStudent_table = $('#student_intership_table').DataTable({
                dom: 'lBfrtip',
                "ajax": {
                    "url": "../showAjax/showStudentInternships.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "work_no"
                    },
                    {
                        data: "student_name"
                    },
                    {
                        data: "company_logo"
                    },
                    {
                        data: "company_name"
                    },
                    {
                        data: "company_description"
                    },
                    {
                        data: "role"
                    },
                    {
                        data: "start_date"
                    },
                    {
                        data: "last_date"
                    },
                    {
                        data: "offer_buttons"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            hide: true
                        },
                       targets: '_all',
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#student_placement_table").length > 0)
    {
        var confirmedStudent_table = $('#student_placement_table').DataTable({
                dom: 'lBfrtip',
                "ajax": {
                    "url": "../showAjax/showStudentPlacements.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "work_no"
                    },
                    {
                        data: "student_name"
                    },
                    {
                        data: "company_logo"
                    },
                    {
                        data: "company_name"
                    },
                    {
                        data: "company_description"
                    },
                    {
                        data: "role"
                    },
                    {
                        data: "start_date"
                    },
                    {
                        data: "last_date"
                    },
                    {
                        data: "offer_buttons"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            hide: true
                        },
                       targets: '_all',
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#confirmedStudent_table").length > 0)
    {
        var confirmedStudent_table = $('#confirmedStudent_table').DataTable({
                dom: 'lBfrtip',
                "ajax": {
                    "url": "../showAjax/showConfirmedStudents.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "confirm_no"
                    },
                    {
                        data: "student_name"
                    },
                    {
                        data: "cap_id"
                    },
                    {
                        data: "enrollment_id"
                    },
                    {
                        data: "email_id"
                    },
                    {
                        data: "confirmed_actions"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            hide: true
                        },
                       targets: '_all',
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#feesdetail_table").length > 0)
    {
        var confirmedStudent_table = $('#feesdetail_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showFees.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "fee_no"
                    },
                    {
                        data: "batch"
                    },
                    {
                        data: "year"
                    },
                    {
                        data: "caste"
                    },
                    {
                        data: "total_fees"
                    },
                    {
                        data: "fee_actions"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                       targets:[1,2,3],
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#faculty_table").length > 0)
    {
        var confirmedStudent_table = $('#faculty_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showFaculty.php",
                    "type": "POST"
                },
                "columns": [
                    {
                        data: "faculty_no"
                    },
                    {
                        data: "faculty_name"
                    },
                    {
                        data: "faculty_email"
                    },
                    {
                        data: "faculty_branch"
                    },
                    {
                        data: "faculty_phone"
                    },
                    {
                        data: "faculty_roles"
                    },
                    {
                        data: "faculty_actions"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                       targets:[3,5],
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#subject_table").length > 0)
    {
        var confirmedStudent_table = $('#subject_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showSubjects.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "subject_no"
                    },
                    {
                        data: "subject_name"
                    },
                    {
                        data: "subject_branch"
                    },
                    {
                        data: "subject_actions"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                       targets:[2],
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#class_table").length > 0)
    {
        var confirmedStudent_table = $('#class_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showClasses.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "class_no"
                    },
                    {
                        data: "class_name"
                    },
                    {
                        data: "class_branch"
                    },
                    {
                        data: "class_batch"
                    },
                    {
                        data: "class_year"
                    },
                    {
                        data: "class_sem"
                    },
                    {
                        data: "class_actions"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                       targets:[2,3,4,5],
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#course_table").length > 0)
    {
        var confirmedStudent_table = $('#course_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showCourses.php",
                    "type": "POST"
                },
                "columns": [{
                        data: "course_no"
                    },
                    {
                        data: "course_class"
                    },
                    {
                        data: "course_faculty"
                    },
                    {
                        data: "course_subject"
                    },
                    {
                        data: "course_actions"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                       targets:[1,2,3],
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }
    
    if($("#students_table").length > 0)
    {
        var confirmedStudent_table = $('#students_table').DataTable({
                dom: 'PlBfrtip',
                "ajax": {
                    "url": "../showAjax/showStudents.php",
                    "type": "POST"
                },
                "columns": [
                    {
                        data: "student_no"
                    },
                    {
                        data: "student_name"
                    },
                    {
                        data: "student_email"
                    },
                    {
                        data: "student_phone"
                    },
                    {
                        data: "student_branch"
                    },
                    {
                        data: "student_year"
                    },
                    {
                        data: "student_sem"
                    },
                    {
                        data: "student_batch"
                    }
                ],
                columnDefs: [{
                        targets: '_all',
                        className: 'text-center',

                    },
                             
                    {
                        searchPanes: {
                            show: true,
                            initCollapsed: true
                        },
                       targets:[4,5,6,7],
                    }
                ],
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [':visible:not(.notexport)']
                        }
                    },
                    {
                        extend: 'colvis'
                    }
                ],


            });
    }

});
