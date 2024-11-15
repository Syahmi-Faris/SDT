<?php
include "db_conn.php"; // Include database connection

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $program = $_POST['program'];
    $year_of_study = $_POST['year_of_study'];

    $subject_digital_logic = isset($_POST['subject_digital_logic']) ? 1 : 0;
    $subject_discrete_structure = isset($_POST['subject_discrete_structure']) ? 1 : 0;
    $subject_psda = isset($_POST['subject_psda']) ? 1 : 0;
    $subject_sad = isset($_POST['subject_sad']) ? 1 : 0;
    $subject_programming = isset($_POST['subject_programming']) ? 1 : 0;

    $sql = "INSERT INTO students 
        (name, studentID, email, phone, gender, date_of_birth, program, year_of_study, 
        subject_digital_logic, subject_discrete_structure, subject_psda, subject_sad, subject_programming) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssiiiii", 
        $name, $studentID, $email, $phone, $gender, $date_of_birth, $program, 
        $year_of_study, $subject_digital_logic, $subject_discrete_structure, 
        $subject_psda, $subject_sad, $subject_programming
    );

    if (mysqli_stmt_execute($stmt)) {
        echo 'Hello, ' . htmlspecialchars($name) . '! Your registration was successful.';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
