<?php 
// All semester
function getAllGrades($conn){
   $sql = "SELECT * FROM semester";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $semester = $stmt->fetchAll();
     return $semester;
   }else {
    return 0;
   }
}

// Get Grade by ID
function getGradeById($grade_id, $conn){
   $sql = "SELECT * FROM semester
           WHERE semester_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$grade_id]);

   if ($stmt->rowCount() == 1) {
     $grade = $stmt->fetch();
     return $grade;
   }else {
    return 0;
   }
}

// DELETE
function removeCourse($id, $conn){
   $sql  = "DELETE FROM semester
           WHERE semester_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}
