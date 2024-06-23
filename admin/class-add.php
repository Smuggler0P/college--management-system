<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include '../db_connection.php';
       include 'data/grade.php';
       include 'data/section.php';
       $grades = getAllGrades($conn);
       $sections = getAllSections($conn);

 ?>
<?php
       include "../header.php";
?>
<body>
    <?php 
        include "../nav.php";
        if ($sections == 0 || $grades == 0) { ?>
           
          <div class="alert alert-info" role="alert">
           First create section and class
          </div>
           <a href="class.php"
           class="btn btn-dark">Go Back</a>
      <?php } ?>
     <div class="container mt-5">
        <a href="class.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/class-add.php">
        <h3>Add New Class</h3><hr>
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
          <label class="form-label">Grade</label>
          <select name="grade"
                  class="form-control" >
                  <?php foreach ($grades as $grade) { ?>
                    <option value="<?=$grade['semester_id']?>">
                       <?=$grade['semester_code'].'-'.$grade['semester']?>
                    </option> 
                  <?php } ?>
                  
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Section</label>
          <select name="section"
                  class="form-control" >
                  <?php foreach ($sections as $section) { ?>
                    <option value="<?=$section['section_id']?>">
                       <?=$section['section']?>
                    </option> 
                  <?php } ?> 
          </select>
        </div>
      <button type="submit" class="btn btn-primary">Create</button>
     </form>
     </div>
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
