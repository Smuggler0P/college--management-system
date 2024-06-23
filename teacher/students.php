<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role']))

    if ($_SESSION['role'] == 'Teacher') {
       include "../db_connection.php";
       include "data/class.php";
       include "data/grade.php";
       include "data/section.php";
       include "data/teacher.php";
       
       $teacher_id = $_SESSION['teacher_id'];
       $teacher = getTeacherById($teacher_id, $conn);
       $classes = getAllClasses($conn);}
 ?>
    <?php 
        include "../header.php";
        if ($classes != 0) {
     ?>
<body>
    <?php 
        include "../nav.php";
        if ($classes != 0) {
     ?>
     <div class="container mt-5">

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
                      ?>
                  

                      <?php 
                          $classesx = str_split(trim($teacher['class']));
                          $grade  = getGradeById($class['semester'], $conn);
                          $section = getSectionById($class['section'], $conn);
                          $c = $grade['semester_code'].'-'.$grade['semester'].$section['section'];
                          foreach ($classesx as $class_id) {
                               if ($class_id == $class['class_id']) {  $i++; ?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td> <a href="students_of_class.php?class_id=<?=$class['class_id']?>">
                                          <?php echo $c; ?>
                                      </a>   
                            </td>
                          </tr>

                            <?php         
                            }
                          }
                          
                          
                       ?>
                       
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
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>

</body>
<?php 
        include "../footer.php";
        if ($classes != 0) {
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