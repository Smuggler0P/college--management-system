<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../db_connection.php";
       include "data/registrar_office.php";

       if(isset($_GET['r_user_id'])){

       $r_user_id = $_GET['r_user_id'];
       $r_user = getR_usersById($r_user_id,$conn);    
 ?>
<?php
       include "../header.php";
?>
<body>
    <?php 
        include "../nav.php";
        if ($r_user != 0) {
     ?>
     <div class="container mt-5">
         <div class="card" style="width: 22rem;">
          <img src="../img/registrar-office-<?=$r_user['gender']?>.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$r_user['username']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">First name: <?=$r_user['fname']?></li>
            <li class="list-group-item">Last name: <?=$r_user['lname']?></li>
            <li class="list-group-item">Username: <?=$r_user['username']?></li>

            <li class="list-group-item">Employee number: <?=$r_user['employee_number']?></li>
            <li class="list-group-item">Address: <?=$r_user['address']?></li>
            <li class="list-group-item">Date of birth: <?=$r_user['date_of_birth']?></li>
            <li class="list-group-item">Phone number: <?=$r_user['phone_number']?></li>
            <li class="list-group-item">Qualification: <?=$r_user['qualification']?></li>
            <li class="list-group-item">Email address: <?=$r_user['email_address']?></li>
            <li class="list-group-item">Gender: <?=$r_user['gender']?></li>
            <li class="list-group-item">Date of joined: <?=$r_user['date_of_joined']?></li>
          </ul>
          <div class="card-body">
            <a href="registrar-office.php" class="card-link">Go Back</a>
          </div>
        </div>
     </div>
     <?php 
        }else {
          header("Location: registrar-office.php");
          exit;
        }
     ?>
     
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(7) a").addClass('active');
        });
    </script>

</body>
<?php
        include "../footer.php";
?>
<?php 

    }else {
        header("Location: registrar-office.php");
        exit;
    }

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>
