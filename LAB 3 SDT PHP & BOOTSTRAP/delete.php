<?php
include "db_conn.php"; // Include database connection

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Student Deleted Successfully'); window.location='index.php'</script>";
    } else {
        echo "<script>alert('Error deleting student'); window.location='index.php'</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
