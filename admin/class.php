<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../db_connection.php";
       include "data/class.php";
       include "data/grade.php";
       include "data/section.php";
       $classes = getAllClasses($conn);
 ?>
<?php
       include "../header.php";
?>
<body>
    <?php 
        include "../nav.php";
        if ($classes != 0) {
     ?>
     <div class="container mt-5">
        <a href="class-add.php"
           class="btn btn-dark">Add New Class</a>

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
                    <th scope="col">Class</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($classes as $class ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td>
                      <?php 
                          $grade  = getGradeById($class['semester'], $conn);
                          $section = getSectionById($class['section'], $conn);
                          echo $grade['semester_code'].'-'.$grade['semester'].$section['section'];
                       ?>
                    </td>
                    <td>
                        <a href="class-edit.php?class_id=<?=$class['class_id']?>"
                           class="btn btn-warning">Edit</a>
                        <a href="class-delete.php?class_id=<?=$class['class_id']?>"
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
             $("#navLinks li:nth-child(6) a").addClass('active');
        });
    </script>

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
