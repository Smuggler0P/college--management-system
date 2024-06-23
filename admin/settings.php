<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../db_connection.php";
?>

<?php 
include "../header.php";
?>

<body>
<?php
include "../nav.php";
?>

<div class="container mt-5">
        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/settings-edit.php">
        <h3>Edit Settings</h3><hr>
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
          <label class="form-label">College Name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['college_name']?>" 
                 name="college_name">
        </div>
        <div class="mb-3">
          <label class="form-label">Slogan</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['slogan']?>" 
                 name="slogan">
        </div>
        <div class="mb-3">
                <label class="form-label">About</label>
                <textarea class="form-control" name="about"
                          rows="4"><?=$setting['about']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Current Year</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['current_year']?>" 
                 name="current_year">
        </div>
        <div class="mb-3">
          <label class="form-label">Current Semester</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['current_semester']?>"
                 name="current_semester">
        </div>
        <div class="mb-3">
          <label class="form-label">Contact</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$setting['contact']?>" 
                 name="contact">
        </div>
        <div class="mb-3">
          <label class="form-label">Address</label>
          <textarea class="form-control" name="address"
                    rows="4"><?=$setting['address']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Course 1</label>
          <textarea class="form-control" name="course1"
                    rows="2"><?=$setting['course1']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Course 1 Description</label>
          <textarea class="form-control" name="course1desc"
                    rows="4"><?=$setting['course1desc']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Course 2</label>
          <textarea class="form-control" name="course2"
                    rows="2"><?=$setting['course2']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Course 2 Description</label>
          <textarea class="form-control" name="course2desc"
                    rows="4"><?=$setting['course2desc']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Course 3</label>
          <textarea class="form-control" name="course3"
                    rows="2"><?=$setting['course3']?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Course 3 Description</label>
          <textarea class="form-control" name="course3desc"
                    rows="4"><?=$setting['course3desc']?></textarea>
        </div>
      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>
 </div>
     
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(10) a").addClass('active');
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
