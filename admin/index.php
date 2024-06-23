<?php 

include "../header.php";

?>

<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    
      include '../db_connection.php';
      include 'data/dashboard.php';
      $studentNo = getStudentsCount($conn); 
      $teacherNo = getTeacherCount($conn); 
      $officeNo = getRegCount($conn); 
      $msg = getMessagesPastWeekCount($conn);

      include "data/semester.php";
      $students = getLatestStudents($conn);

      include "data/teacher.php";
      include "data/subject.php";
      include "data/class.php";
      include "data/section.php";
      $teachers = getLatestTeachers($conn);

 ?>

<body>
<?php

include "../nav.php";

?>

<div class="container mt-5">
         <div class="container">

          <!-- Icon Cards-->
          <div class="row text-center">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><?=$studentNo[0] ?> Students</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./student.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"> <?=$teacherNo[0] ?> Teachers</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./teacher.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><?=$officeNo[0] ?> Office Users</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./registrar-office.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><?=$msg[0] ?> Latest Messages</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="./registrar-office.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

          </div>

          <div class="card mb-3">
            <div class="card-header text-center">
              <i class="fas fa-table"></i>
              Latest Data
            </div>

            <?php 
              if ($students != 0) {
            ?>
            <div class="card-body">
              <div class="table-responsive">
              <div class="h4">Students: </div>
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Semester</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($students as $student ) { 
                    $i++;  ?>
                  <tr>
                    <td><?=$student['student_id']?></td>
                    <td>
                      <a href="student-view.php?student_id=<?=$student['student_id']?>">
                        <?=$student['fname']?>
                      </a>
                    </td>
                    <td><?=$student['lname']?></td>
                    <td><?=$student['username']?></td>
                    <td>
                      <?php 
                           $grade = $student['semester'];
                           $g_temp = getGradeById($grade, $conn);
                           if ($g_temp != 0) {
                              echo $g_temp['semester_code'].'-'.
                                     $g_temp['semester'];
                            }
                        ?>
                    </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
             </div>
           <?php } ?>
           <?php 
              if ($teachers != 0) {
           ?>
            <div class="table-responsive">
              <div class="h4">Teachers: </div>
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Class</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($teachers as $teacher ) { 
                    $i++;  ?>
                  <tr>
                    <td><?=$teacher['teacher_id']?></td>
                    <td><a href="teacher-view.php?teacher_id=<?=$teacher['teacher_id']?>">
                         <?=$teacher['fname']?></a></td>
                    <td><?=$teacher['lname']?></td>
                    <td><?=$teacher['username']?></td>
                    <td>
                       <?php 
                           $s = '';
                           $subjects = str_split(trim($teacher['subjects']));
                           foreach ($subjects as $subject) {
                              $s_temp = getSubjectById($subject, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['subject_code'].', ';
                           }
                           echo $s;
                        ?>
                    </td>
                    <td>
                      <?php 
                           $c = '';
                           $classes = str_split(trim($teacher['class']));

                           foreach ($classes as $class_id) {
                               $class = getClassById($class_id, $conn);

                              $c_temp = getGradeById($class['semester'], $conn);
                              $section = getSectionById($class['section'], $conn);
                              if ($c_temp != 0) 
                                $c .=$c_temp['semester_code'].'-'.
                                     $c_temp['semester'].$section['section'].', ';
                           }
                           echo $c;

                        ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php } ?>
            </div>
          </div>

        </div>

          </div>
         
        <!-- <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span><a href="/">Footer</a></span>
            </div>
          </div>
        </footer>
        -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
                           
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>

  </body>

<?php

include "../footer.php";

?>

<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>
