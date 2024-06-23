<?php 
if (isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="/static/logo.png" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navLinks">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teacher.php">Teachers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="student.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="semester.php">Semester</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="section.php">Section</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="class.php">Class</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registrar-office.php">Registrar-Office</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="course.php">Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="message.php">Message</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="settings.php">Settings</a>
        </li>
      </ul>
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
} else if ($_SESSION['role'] == 'Teacher') {
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="/static/logo.png" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"
          id="navLinks">
        <li class="nav-item">
          <a class="nav-link" 
             aria-current="page" 
             href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="classes.php">Classes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Students Grade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pass.php">Change Password</a>
        </li>

      </ul>
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>
  </div>
    </div>
</nav>
<?php
} else if ($_SESSION['role'] == 'Student') {
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="/static/logo.png" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"
          id="navLinks">
        <li class="nav-item">
          <a class="nav-link" 
             aria-current="page" 
             href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="grade.php">Grade Summary</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pass.php">Change Password</a>
        </li>

      </ul>
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>
  </div>
    </div>
</nav>
<?php
} else if ($_SESSION['role'] == 'Registrar Office') {
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="/static/logo.png" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"
          id="navLinks">
        <li class="nav-item">
          <a class="nav-link" 
             aria-current="page" 
             href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="student-add.php">Student Add</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="student-view.php">Student View</a>
        </li>

      </ul>
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>
  </div>
    </div>
</nav>

<?php 
  }else {
    exit;
  } 
}else {
	exit;
} 

?>
