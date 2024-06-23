<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['section_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../db_connection.php";
       include "data/section.php";
       $section_id = $_GET['section_id'];
       $section = getSectionById($section_id, $conn);

       if ($section == 0) {
         header("Location: section.php");
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
        <a href="section.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="api/section-edit.php">
        <h3>Edit Section</h3><hr>
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
                 value="<?=$section['section']?>" 
                 name="section">
        </div>
        <input type="text" 
                 class="form-control"
                 value="<?=$section['section_id']?>"
                 name="section_id"
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
    header("Location: grade.php");
    exit;
  } 
}else {
        header("Location: grade.php");
        exit;
} 

?>
