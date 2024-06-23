<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       $grade_code = '';
       $grade = '';

       if (isset($_GET['grade_code'])) $grade_code = $_GET['grade_code'];
       if (isset($_GET['grade'])) $grade = $_GET['grade'];

 ?>
<?php
       include "../header.php";
?>
<body>
    <?php 
        include "../nav.php";
     ?>
     <div class="container mt-5">
        <a href="semester.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/semester-add.php">
        <h3>Add New Semester</h3><hr>
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
                 value="<?=$grade_code?>" 
                 name="grade_code">
        </div>
        <div class="mb-3">
          <label class="form-label">Semester</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$grade?>"
                 name="grade">
        </div>
      <button type="submit" class="btn btn-primary">Create</button>
     </form>
     </div>
     
</body>
</html>
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
