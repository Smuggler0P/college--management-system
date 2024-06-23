<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['grade_code']) &&
    isset($_POST['grade']) &&
    isset($_POST['grade_id'])) {
    
    include '../../db_connection.php';

    $grade_code = $_POST['grade_code'];
    $grade = $_POST['grade'];
    $grade_id = $_POST['grade_id'];
   
    $data = 'semester_code='.$grade_code.'&semester='.$grade.'&semester_id='.$grade_id;

    if (empty($grade_code)) {
        $em  = "Grade Code is required";
        header("Location: ../semester-edit.php?error=$em&$data");
        exit;
    }else if (empty($grade)) {
        $em  = "Grade is required";
        header("Location: ../semester-edit.php?error=$em&$data");
        exit;
    }else {

        $sql  = "UPDATE semester SET semester=?, semester_code=?
                 WHERE semester_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$grade, $grade_code, $grade_id]);
        $sm = "Grade updated successfully";
        header("Location: ../semester-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../semester.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
