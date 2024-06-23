<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      include '../db_connection.php';
      include 'data/grade.php';
      $grades = getAllGrades($conn);

      ?>
<?php
       include "../header.php";
?>
<body>
    <?php 
        include "../nav.php";
     ?>
     <div class="container mt-5">
        <a href="course.php"
           class="btn btn-dark">Go Back</a> <br><br>
        <?php if ($grades == 0) { ?>
          <div class="alert alert-info" role="alert">
           First create grade.
          </div>
        <?php }else{ ?>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/course-add.php">

        <h3>Add New Course</h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>
        
        <div class="mb-3">
          <label class="form-label">Course Name</label>
          <input type="text" 
                 class="form-control"
                 name="course_name">
        </div>
        <div class="mb-3">
          <label class="form-label">Course Code</label>
          <input type="text" 
                 class="form-control"
                 name="course_code">
        </div>
        <div class="mb-3">
          <label class="form-label">Semester</label>
          <select name="grade"
                  class="form-control" >
                  <?php foreach ($grades as $grade) { ?>
                    <option value="<?=$grade['semester_id']?>">
                       <?=$grade['semester_code'].'-'.$grade['semester']?>
                    </option> 
                  <?php } ?>
                  
          </select>
        </div>
      <button type="submit" class="btn btn-primary">Create</button>
     </form>
     </div>
     <?php } ?>

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
