<?php
require '../../includes/connection.php';

if ( isset( $_POST["loadFaculty"] ) ) {
    $BranchId = $_POST['BranchId'];
    $stmt1 = $conn->prepare( "select faculty_id, faculty_name from faculty f inner join classes c on c.class_branch=f.faculty_branch where c.class_id=?" );
    $stmt1->bind_param( "s", $BranchId);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count=$result->num_rows;
    echo '<option value="" selected disabled>---Select Faculty---</option>';
    if($count>0)
    {
        while($row=$result->fetch_assoc())
        {
            echo '<option value="'.$row['faculty_id'].'">'.$row['faculty_name'].'</option>';
        }
    }
}

if ( isset( $_POST["loadSubjects"] ) ) {
    $BranchId = $_POST['BranchId'];
    $stmt1 = $conn->prepare( "select subject_id, subject_name from subjects s inner join classes c on c.class_branch=s.subject_branch where c.class_id=?" );
    $stmt1->bind_param( "s", $BranchId);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count=$result->num_rows;
    echo '<option value="" selected disabled>---Select Subject---</option>';
    if($count>0)
    {
        while($row=$result->fetch_assoc())
        {
            echo '<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>';
        }
    }
}

if ( isset( $_POST["loadStudents"] ) ) {
    $CourseId = $_POST['CourseId'];
    $stmt1 = $conn->prepare( "select sp.student_fname, sp.student_ien from student_personal sp inner join student_status ss on sp.student_id=ss.student_id inner join classes cl on cl.class_id=ss.student_class inner join courses co on co.course_class=cl.class_id where co.course_id=?" );
    $stmt1->bind_param( "s", $CourseId);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count=$result->num_rows;
    echo '
        <table class="table mt-3 text-center">
            <thead>
                <th>IEN</th>
                <th>Name</th>
                <th>Attendance</th>
            </thead>
            <tbody>
    ';
    if($count>0)
    {
        while($row=$result->fetch_assoc())
        {
           echo '
                <tr>
                    <td>'.$row['student_ien'].'</td>
                    <td>'.$row['student_fname'].'</td>
                    <td><input type="checkbox" name="attendance[]" value="'.$row['student_ien'].'"></td>
                </tr>
           ';
        }
    }
    echo '
            </tbody>
        </table>
        <div class="text-center">
            <input type="submit" class="btn btn-success" value="Submit Attendance" id="student_attendance_btn">
        </div>
    ';
}
?>
