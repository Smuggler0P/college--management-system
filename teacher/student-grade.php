<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
       include "../db_connection.php";
       include "data/student.php";
       include "data/grade.php";
       include "data/class.php";
       include "data/section.php";
       include "data/subject.php";
       include "data/teacher.php";
       include "data/setting2.php";

       include "data/student_score.php";

       if (!isset($_GET['student_id'])) {
           header("Location: students.php");
           exit;
       }
       $student_id = $_GET['student_id'];
       $student = getStudentById($student_id, $conn);
      
       $subjects = getSubjectByGrade($student['semester'], $conn);

       $teacher_id = $_SESSION['teacher_id'];
       $teacher = getTeacherById($teacher_id, $conn);

       $teacher_subjects = str_split(trim($teacher['subjects']));
       $setting=getsetting2($conn);
       
      
       $ssubject_id = 0;
       if (isset($_POST['ssubject_id'])) {
           $ssubject_id = $_POST['ssubject_id'];

$student_score = getScoreById($student_id, $teacher_id, $ssubject_id, $setting['current_semester'], $setting['current_year'], $conn); 
       }
 ?>
 <?php 
    include "../header.php";
        
     ?>
<body>
    <?php 
    include "../nav.php";
        if ($student != 0 && $setting !=0 && $subjects !=0 && $teacher_subjects != 0) {
     ?>

     <div class="d-flex align-items-center flex-column"><br><br>
        <div class="login shadow p-3">
        <form method="post"
              action="">
            <div class="mb-3">
                <ul class="list-group">
                    <li class="list-group-item"><b>ID: </b> <?php echo $student['student_id'] ?></li>
                  <li class="list-group-item"><b>First Name: </b> <?php echo $student['fname'] ?></li>
                  <li class="list-group-item"><b>Last Name: </b> <?php echo $student['lname'] ?></li>
                  <li class="list-group-item"><b>Garde: </b> 
                    <?php  $g = getGradeById($student['semester'], $conn); 
                        echo $g['semester_code'].'-'.$g['semester'];
                    ?>
                  </li>
                  <li class="list-group-item"><b>Section: </b> 
                    <?php  $s = getSectionById($student['section'], $conn); 
                        echo $s['section'];
                    ?>
                  </li>
                  <li class="list-group-item text-center"><b>Year: </b> <?php echo $setting['current_year']; ?> &nbsp;&nbsp;&nbsp;<b>Semester</b> <?php echo $setting['current_semester']; ?></li>
                </ul>
            </div>
            <h5 class="text-center">Add Grade</h5>
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
           
         <label class="form-label">Subject / Course</label>
            <select class="form-control"
                    name="ssubject_id">
                    <?php foreach($subjects as $subject){ 
                        foreach($teacher_subjects as $teacher_subject){
                            if($subject['subject_id'] == $teacher_subject){ ?>
                    
                       <option <?php if($ssubject_id == $subject['subject_id']){echo "selected";} ?> 
                           value="<?php echo $subject['subject_id'] ?>">
                        <?php echo $subject['subject_code'] ?></option>
                    <?php }   }
                        } ?>
            </select><br>

            
            <button type="submit" class="btn btn-primary">Select</button><br><br>
        </form>
        <form method="post"
              action="api/save-score.php">
        <?php 
            
            if ($ssubject_id != 0) { 
              $counter = 0;
              if($student_score != 0){ ?>
                <input type="text" name="student_score_id"
            value="<?=$student_score['id']?>" hidden>
            <?php
            $scores = explode(',', trim($student_score['results']));

            foreach ($scores as $score) { 
                $temp =  explode(' ', trim($score));
                $counter++;
            ?>

            <div class="input-group mb-3">
                  <input type="number" min="0" class="form-control" value="<?=$temp[0]?>"name="score-<?php echo $counter; ?>">
                  <span class="input-group-text">/</span>
                  <input type="number" min="0" class="form-control" value="<?=$temp[1]?>"
                  name="aoutof-<?php echo $counter; ?>">
            </div>  
           <?php } } if($counter <  5){ 
               for ($i=++$counter; $i <= 5; $i++) { 
            ?>
            <div class="input-group mb-3">
                  <input type="text" class="form-control" value="" 
                  name="score-<?php echo $i; ?>">
                  <span class="input-group-text">/</span>
                  <input type="text" class="form-control" value=""
                  name="aoutof-<?php echo $i; ?>">
            </div>
            
                   
           <?php } } ?>

           <input type="text" name="student_id" value="<?=$student_id?>" hidden>
            <input type="text" name="subject_id" value="<?=$ssubject_id?>"hidden>
            <input type="text" name="current_semester" value="<?=$setting['current_semester']?>" hidden>
            <input type="text" name="current_year" value="<?=$setting['current_year']?>" hidden>
        
          <button type="submit" class="btn btn-primary">Save</button>
        </form>  
        <?php } ?> 
        </div>
        </div>
     <?php 
         }else{
            header("Location: students.php");
            exit;
         }
     ?>
   	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(4) a").addClass('active');
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
