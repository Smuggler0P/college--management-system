<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {

 ?>
<?php
      include "../header.php";
?>
<body>
    <?php 
        include "../nav.php";
     ?>
     <div class="container mt-5">
        <a href="section.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/section-add.php">
        <h3>Add New Section</h3><hr>
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
          <label class="form-label">Section</label>
          <input type="text" 
                 class="form-control"
                 name="section">
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
