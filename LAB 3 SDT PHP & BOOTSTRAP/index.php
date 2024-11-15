<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Student Registration</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">List Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Add New Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <h2 class="border-bottom pb-2">Students List</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Program</th>
                        <th>Year of Study</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_conn.php";

                    $sql = "SELECT * FROM students";
                    $results = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($results) > 0) {
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($row["id"])."</td>";
                            echo "<td>".htmlspecialchars($row["name"])."</td>";
                            echo "<td>".htmlspecialchars($row["studentID"])."</td>";
                            echo "<td>".htmlspecialchars($row["email"])."</td>";
                            echo "<td>".htmlspecialchars($row["phone"])."</td>";
                            echo "<td>".htmlspecialchars($row["program"])."</td>";
                            echo "<td>".htmlspecialchars($row["year_of_study"])."</td>";
                            echo "<td><a href='update.php?id=".htmlspecialchars($row['id'])."' class='btn btn-primary btn-sm'>Edit</a></td>";
                            echo "<td><a href='delete.php?id=".htmlspecialchars($row['id'])."' class='btn btn-danger btn-sm'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No Data Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="text-end mt-3">
            <a href="create.php" class="btn btn-success">Add New Student</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
