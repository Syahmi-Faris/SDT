<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-transparent">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">   
        <h2 class="text-center mb-4 text-uppercase">REGISTER</h2>
        <form action="register.php" method="POST" class="p-4 bg-secondary bg-gradient rounded shadow-lg">
             <div class="mb-3">
                <label for="username" class="form-label text-light">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
             </div>
             <div class="mb-3">
                <label for="password" class="form-label text-light">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Register</button>
            <div class="mt-2">
                <a href="login.php" class="text-primary">Already have an account? Login here</a>
            </div>   
        </form>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    New record created successfully.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        if (window.location.search.includes('success=1')) {
            var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
                backdrop: 'static'
            });
            myModal.show();
        }
    </script>
</body>
</html>

<?php
include "db_conn.php"; //using database connection file here

if($_SERVER["REQUEST_METHOD"]=="POST"){ // check if form is submitted
    $username = mysqli_real_escape_string($conn, $_POST['username']); // get the username value from the form
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // get the password value from the form

    $sql = "INSERT INTO users_reg (username, password) VALUES ('$username', '$password')";

    if(mysqli_query($conn, $sql)){
        header("Location: register.php?success=1");
        exit();
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}