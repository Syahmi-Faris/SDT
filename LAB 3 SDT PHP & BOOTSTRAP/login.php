<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <body class="bg-transparent">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">   
        <h2 class="text-center mb-4 text-uppercase bottom-50">LOGIN</h2>
            <form action="login.php" method="POST" class="p-4 bg-secondary bg-gradient rounded shadow-lg">
                 <div class="mb-3">
                    <label for="username" class="form-label text-light">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                 </div>
                 <div class="mb-3">
                    <label for="password" class="form-label text-light">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Login</button>
                <div class="mt-2">
                    <a href="register.php" class="text-primary">Dont have an account? Register here</a>
                </div>   
                </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>

<?php
session_start(); // starting session
include "db_conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){ // check if form is submitted
    $username = mysqli_real_escape_string($conn, $_POST['username']); // get the username value from the form
    $password = $_POST['password']; // get the password value from the form

    $sql = "SELECT * FROM users_reg WHERE username='$username'"; // query the databse for user
    $result = mysqli_query($conn, $sql); // run the query
    
    if(mysqli_num_rows($result) == 1){ //check if user exists
        while($row = mysqli_fetch_assoc($result)){ // get the data from database
            if(password_verify($password, $row["password"])){ // check if the password matches
                $_SESSION['username']=$username; // set the session variable
                header("Location: index.php"); // redirect to the home page
            }else{ //if the password doesnt match
                echo "Invalid username or password";
            }
        }
    }else{ //if the user doesnt exists
        echo "No user found with that username";
    }
}