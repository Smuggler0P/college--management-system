<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['grade_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../db_connection.php";
       include "data/grade.php";

       $grades = getAllGrades($conn);
       
       $grade_id = $_GET['grade_id'];
       $grades = getGradeById($grade_id, $conn);

       if ($grades == 0) {
         header("Location: semester.php");
         exit;
       }


?>
<?php
       include "../header.php";
?>

<body>
    <?php 
        include "../nav.php";
     ?>
     <div class="container mt-5">
        <a href="grade.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/semester-edit.php">
        <h3>Edit Semester</h3><hr>
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
          <label class="form-label">Sem Code</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$grades['semester_code']?>" 
                 name="grade_code">
        </div>
        <div class="mb-3">
          <label class="form-label">Semester</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$grades['semester']?>"
                 name="grade">
        </div>
        <input type="text" 
                 class="form-control"
                 value="<?=$grades['semester_id']?>"
                 name="grade_id"
                 hidden>

      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>

</body>
<?php
       include "../footer.php";
?>
<?php 

  }else {
    header("Location: semester.php");
    exit;
  } 
}else {
	header("Location: semester.php");
	exit;
} 

?>
