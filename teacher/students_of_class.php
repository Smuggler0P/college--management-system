<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') 
       include "../db_connection.php";
       include "data/student.php";
       include "data/grade.php";
       include "data/class.php";
       include "data/section.php";
       if (!isset($_GET['class_id'])) {
           header("Location: students.php");
           exit;
       }
       $class_id = $_GET['class_id'];
       $students = getAllStudents($conn);

       $class = getClassById($class_id, $conn);}
 ?>

 <?php 
    include "../header.php";
        if ($students != 0) {
            $check = 0;
     ?>
<body>
    <?php 
    include "../nav.php";
        if ($students != 0) {
            $check = 0;
     ?>
     
  <?php $i = 0; foreach ($students as $student ) { 
       $g = getGradeById($class['semester'], $conn);
       $s = getSectionById($class['section'], $conn);
       if ($g['semester_id'] == $student['semester'] && $s['section_id'] == $student['section']) { $i++; 
       if ($i == 1) { 
        $check++;
    ?>
        <div class="container mt-5">
           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Semester</th>
                  </tr>
                </thead>
                <tbody>  
              <?php } ?>          
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$student['student_id']?></td>
                    <td>
                      <a href="student-grade.php?student_id=<?=$student['student_id']?>">
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
                <?php } } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>
    <?php if ($check == 0) {
        header("Location: students.php");
        exit;
    } ?>
     
    
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 


?>

<?php 
    include "../footer.php";
        if ($students != 0) {
            $check = 0;}
     ?>