<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
 ?>

<?php
       include "../header.php";
?>


<body>
<?php
       include "../nav.php";
?>
     <div class="container mt-5">
         <div class="container text-center">
             <div class="row row-cols-5">
               <a href="student-add.php" 
                  class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-user-plus fs-1" aria-hidden="true"></i><br>
                  Register Student
               </a> 

               <a href="student.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-user fs-1" aria-hidden="true"></i><br>
                  All Students 
               </a> 
               
               <a href="../logout.php" class="col btn btn-warning m-2 py-3 col-5">
                 <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                  Logout
               </a> 
             </div>
         </div>
     </div>
     <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>

</body>
</html>
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
