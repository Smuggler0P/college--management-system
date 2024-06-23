<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../db_connection.php";
       include "data/subject.php";
       include "data/grade.php";
       $courses = getAllSubjects($conn);
       
 ?>
<?php
       include "../header.php";
?>
<body>
    <?php 
        include "../nav.php";
        if ($courses != 0) {
     ?>
     <div class="container mt-5">
        <a href="course-add.php"
           class="btn btn-dark">Add New Course</a>

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Semester</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($courses as $course ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td>
                      <?php 
                          echo $course['subject'];
                       ?>
                    </td>
                    <td>
                      <?php 
                          echo $course['subject_code'];
                       ?>
                    </td>
                    <td>
                      <?php 
                          $grade = getGradeById($course['semester'], $conn);
                          echo $grade['semester_code'].'-'.$grade['semester'];
                       ?>
                    </td>
                    <td>
                        <a href="course-edit.php?course_id=<?=$course['subject_id']?>"
                           class="btn btn-warning">Edit</a>
                           
                        <a href="course-delete.php?course_id=<?=$course['subject_id']?>"
                           class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php } ?>
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
     <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(8) a").addClass('active');
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
