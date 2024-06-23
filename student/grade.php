  <?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
     include "../db_connection.php";
     include "data/score.php";
     include "data/subject.php";


     $student_id = $_SESSION['student_id'];

     $scores = getScoreById($student_id, $conn);


 ?>

<?php 
        include "../header.php";
     ?>

<body>
    <?php 
        include "../nav.php";
        if ($scores != 0) {

     ?>
     <div class="d-flex justify-content-center align-items-center flex-column pt-4">
         <?php  
            $check = 0;
            foreach ($scores as $score) { 
              if($score['year'] == $check){
                $check = $score['year'];
                $csubject = getSubjectById($score['subject_id'], $conn);
          ?>
          <tr>
            <td><?=$csubject['subject_code']?></th>
            <td><?=$csubject['subject']?></th>
            <td>
              <?php 
                  $total = 0;
                  $outOf = 0;
                  $results = explode(',', trim($score['results']));
                  foreach ($results as $result) {
                    
                    $temp =  explode(' ', trim($result));
                     $total +=$temp[0]; 
                     $outOf +=$temp[1]; 
               ?>
              <small class="border p-1">
                <?=$temp[0]?> / <?=$temp[1]?>
              </small>&nbsp;
            <?php } ?>
            </th>
            <th><?=$total?> / <?=$outOf?></th>
            <th><?php 
                echo gradeCalc($total);
               ?></th>
            <th><?=$score['semester']?></th>
          </tr>
        <?php }else { 
          $check = $score['year'];

          $csubject = getSubjectById($score['subject_id'], $conn);
        ?>
         <div class="table-responsive " style="width: 90%; max-width: 700px;">
              <table class="table table-bordered mt-1 mb-5 n-table">
                 <caption style="caption-side:top">Year - <?=$score['year']?> </caption>
                <thead>
                  <tr>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Title</th>
                    <th scope="col">Results</th>
                    <th scope="col">Total</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Semester</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
            <td><?=$csubject['subject_code']?></th>
            <td><?=$csubject['subject']?></th>
            <td>
              <?php 
                  $total = 0;
                  $outOf = 0;
                  $results = explode(',', trim($score['results']));
                  foreach ($results as $result) { 
                    $temp =  explode(' ', trim($result));
                    $total += $temp[0];
                    $outOf += $temp[1];
               ?>
              <small class="border p-1">
                <?=$temp[0]?> / <?=$temp[1]?>
              </small>&nbsp;
            <?php } ?>
            </th>
            <th><?=$total?> / <?=$outOf?></th>
            <th><?php 
                echo gradeCalc($total/$outOf);
               ?></th>
            <th><?=$score['semester']?></th>
          </tr>
        <?php } if($score['year'] != $check){ ?>   
        </tbody>
      </table>
   </div><br />  
  <?php  } } ?>
          
   <?php }else { ?>
     <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
     </div>
   <?php } ?>
    
    	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
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
