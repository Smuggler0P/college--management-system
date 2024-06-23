<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['grade_code']) &&
    isset($_POST['grade'])) {
    
    include '../../db_connection.php';

    $grade_code = $_POST['grade_code'];
    $grade = $_POST['grade'];
    
    $data = 'semester_code='.$grade_code.'&semester='.$grade;

  if (empty($grade_code)) {
		$em  = "Sem Code is required";
		header("Location: ../semester-add.php?error=$em&$data");
		exit;
	}else if (empty($grade)) {
		$em  = "Semester is required";
		header("Location: ../semester-add.php?error=$em&$data");
		exit;
	}else {
        $sql  = "INSERT INTO
                 semester(semester, semester_code)
                 VALUES(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$grade, $grade_code]);
        $sm = "New Sem created successfully";
        header("Location: ../semester-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../semester-add.php?error=$em");
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
