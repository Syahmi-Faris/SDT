<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 700px; width: 100%;">

        <img src="UTM_logo.png" alt="This is UTM logo" width="500" height="200" class="d-block mx-auto mb-4 align-items-center">
        
        <h1 class="text-center mb-4">Student Registration Form for Subject Enrollment</h1>

        <h3>REGISTRATION FORM</h3>

        <form action="create.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="studentID" class="form-label">Student ID:</label>
                <input type="text" name="studentID" class="form-control" id="studentID" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="text" name="phone" class="form-control" id="phone" required>
            </div>

            <p class="form-label">Please select your gender:</p>
            <div class="mb-3">
                <div class="form-check">
                    <input type="radio" name="gender" value="Male" id="male" class="form-check-input" required>
                    <label for="male" class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" value="Female" id="female" class="form-check-input" required>
                    <label for="female" class="form-check-label">Female</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" value="Other" id="other" class="form-check-input" required>
                    <label for="other" class="form-check-label">Other</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required>
            </div>

            <h3>Academic Information:</h3>
            <div class="mb-3">
                <label for="program" class="form-label">Program:</label>
                <select name="program" class="form-select" id="program">
                    <option value="SECVH">SECVH</option>
                    <option value="SECRH">SECRH</option>
                    <option value="SECBH">SECBH</option>
                    <option value="SECJH">SECJH</option>
                    <option value="SECPH">SECPH</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="year_of_study" class="form-label">Year of Study:</label>
                <select name="year_of_study" class="form-select" id="year_of_study">
                    <option value="YEAR1">YEAR 1</option>
                    <option value="YEAR2">YEAR 2</option>
                    <option value="YEAR3">YEAR 3</option>
                    <option value="YEAR4">YEAR 4</option>
                </select>
            </div>

            <p class="form-label">Select your subject(s):</p>
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" name="subject_digital_logic" value="1" id="subject_digital_logic" class="form-check-input">
                    <label for="subject_digital_logic" class="form-check-label">Digital Logic</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="subject_discrete_structure" value="1" id="subject_discrete_structure" class="form-check-input">
                    <label for="subject_discrete_structure" class="form-check-label">Discrete Structure</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="subject_psda" value="1" id="subject_psda" class="form-check-input">
                    <label for="subject_psda" class="form-check-label">PSDA</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="subject_sad" value="1" id="subject_sad" class="form-check-input">
                    <label for="subject_sad" class="form-check-label">SAD</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="subject_programming" value="1" id="subject_programming" class="form-check-input">
                    <label for="subject_programming" class="form-check-label">Programming Technique</label>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <a href="index.php" class="d-block mt-3">Back to student list</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<?php
include "db_conn.php"; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $program = $_POST['program'];
    $year_of_study = $_POST['year_of_study'];

    $subject_digital_logic = isset($_POST['subject_digital_logic']) ;
    $subject_discrete_structure = isset($_POST['subject_discrete_structure']) ;
    $subject_psda = isset($_POST['subject_psda']) ;
    $subject_sad = isset($_POST['subject_sad']) ;
    $subject_programming = isset($_POST['subject_programming']) ;

    $sql = "INSERT INTO students (name, studentID, email, phone, gender, date_of_birth, program, year_of_study, 
            subject_digital_logic, subject_discrete_structure, subject_psda, subject_sad, subject_programming) 
            VALUES ('$name', '$studentID', '$email', '$phone', '$gender', '$date_of_birth', '$program', '$year_of_study', 
            $subject_digital_logic, $subject_discrete_structure, $subject_psda, $subject_sad, $subject_programming)";

    if (mysqli_query($conn, $sql)) {
        echo "Student registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
