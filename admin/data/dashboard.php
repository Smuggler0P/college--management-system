<?php 

// Get Students counts
function getStudentsCount($conn){
   $sql = "SELECT COUNT('student_id') FROM students";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $count = $stmt->fetch();
     return $count;
   }else {
   	return 0;
   }
}

// Get Teachers counts
function getTeacherCount($conn){
   $sql = "SELECT COUNT('teacher_id') FROM teachers";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $count = $stmt->fetch();
     return $count;
   }else {
   	return 0;
   }
}

// Get Office counts
function getRegCount($conn){
   $sql = "SELECT COUNT('r_user_id') FROM registrar_office";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $count = $stmt->fetch();
     return $count;
   }else {
   	return 0;
   }
}

// Get Latest joined students
function getLatestStudents($conn){
   $sql = "SELECT * FROM students ORDER BY date_of_joined DESC LIMIT 10";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   } else {
   	return 0;
   }
}

// Get Latest joined teachers
function getLatestTeachers($conn){
   $sql = "SELECT * FROM teachers ORDER BY date_of_joined DESC LIMIT 10";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $teachers = $stmt->fetchAll();
     return $teachers;
   } else {
   	return 0;
   }
}


// Count of Messages from the past week
function getMessagesPastWeekCount($conn){
   $oneWeekAgo = date('Y-m-d H:i:s', strtotime('-1 week'));

   $sql = "SELECT COUNT(*) as message_count FROM message WHERE date_time >= :oneWeekAgo";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':oneWeekAgo', $oneWeekAgo);
   $stmt->execute();

   $rowCount = $stmt->fetch();

   return $rowCount;
}

?>
