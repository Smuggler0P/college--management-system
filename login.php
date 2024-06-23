<?php

include "./header.php";

?>

<body>
    <h2>Login Form</h2>
    <div id="login">
        <form method="POST" action="api/login.php">
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username">Username:</label><br>
                <input type="text" class="form-control" id="username" name="uname" required><br><br>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label><br>
                <input type="password" class="form-control" id="password" name="pass" required><br><br>
            </div>
            <div class="mb-3">
                <label class="form-label">Login As</label>
                <select class="form-control" name="role">
                    <option value="1">Admin</option>
                    <option value="2">Teacher</option>
                    <option value="3">Student</option>
                    <option value="4">Registrar Office</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="index.php" class="text-decoration-none">Home</a>
        </form>
    </div>
</body>


<?php

include "./footer.php";

?>