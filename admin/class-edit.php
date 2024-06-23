<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['class_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../db_connection.php";
       include "data/class.php";
       include "data/grade.php";
       include "data/section.php";

       $class = getClassById($_GET['class_id'], $conn);
       $grades = getAllGrades($conn);
       $sections = getAllSections($conn);
       

       if ($class == 0) {
         header("Location: class.php");
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
        <a href="class.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/class-edit.php">
        <h3>Edit Class</h3><hr>
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
          <label class="form-label">Semester</label>
          <select name="grade"
                  class="form-control" >
                  <?php foreach ($grades as $grade) { 
                     $selected = 0;
                     if ($grade['semester_id'] == $class['semester'] ) {
                       $selected = 1;
                     }
                  ?>

                    <option  value="<?=$grade['semester_id']?>"
                          <?php if ($selected) echo "selected"; ?> >
                       <?=$grade['semester_code'].'-'.$grade['semester']?>
                    </option> 
                  <?php } ?>
                  
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Section</label>
          <select name="section"
                  class="form-control" >
                  <?php foreach ($sections as $section) {
                    $selected = 0;
                    if ($section['section_id'] == $class['section'] ) {
                       $selected = 1;
                     }
                   ?>
                    <option value="<?=$section['section_id']?>" <?php if ($selected) echo "selected"; ?> >
                       <?=$section['section']?>
                    </option> 
                  <?php } ?> 
          </select>
        </div>
        <input type="text" 
                 class="form-control"
                 value="<?=$class['class_id']?>"
                 name="class_id"
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
    header("Location: class.php");
    exit;
  } 
}else {
	header("Location: class.php");
	exit;
} 

?>
