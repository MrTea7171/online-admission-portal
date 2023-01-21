$(document).on("click",".departmentdelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteDepartment: "DeleteDepartment",
                        Department_id: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Department deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#department_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting department.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });

$(document).on("click",".offerdelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteOffer: "DeleteOffer",
                        Offer_id: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Placement offer deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#placement_offers_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting placement offer.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });

$(document).on("click",".confirmdelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteStudent: "DeleteStudent",
                        Student_id: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Student deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#confirmedStudent_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting student.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });
$(document).on("click",".feesdelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteFeeDetail: "DeleteFeeDetail",
                        Fee_id: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Fee Detail deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#feesdetail_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting fee detail.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });

$(document).on("click",".facultydelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteFaculty: "DeleteFaculty",
                        Faculty_id: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Faculty deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#faculty_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting faculty.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });

$(document).on("click",".subjectdelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteSubject: "DeleteSubject",
                        Subject_id: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Subject deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#subject_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting subject.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });

$(document).on("click",".classdelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteClass: "DeleteClass",
                        ClassId: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Class deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#class_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting class.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });

$(document).on("click",".coursedelete_btn",function(){
    var id=$(this).attr('id');
    swal({
                title: "Are you sure to proceed?",
                buttons: ['Yes','No'],
                cancel:true,
                dangerMode: true,
            })
            .then((status) => 
            {
                if(!status)
                {
                    $.ajax({
                    url: "../includes/delete.php",
                    method: "post",
                    data: {
                        DeleteCourse: "DeleteCourse",
                        CourseId: id
                    },
                    success: function (response) {
                        if(response=="success")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Success!</strong>',
									message: 'Course deleted successfully.'
								},{
									type: 'success',
									delay: 5000
								});
								$('#course_table').DataTable().ajax.reload();
							}
							if(response=="error")
							{
								$.notify({
									icon: 'glyphicon glyphicon-ok',
									title: '<strong>Error!</strong>',
									message: 'Error while deleting course.'
								},{
									type: 'danger',
									delay: 5000
								});
							}
						},
						error: function() {
							swal({title:"Error",text:"Error Sending Request!",type:"error"});
						}
                    
                });
            }
        });

    });