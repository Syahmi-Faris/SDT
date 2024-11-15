<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="bg-info d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 500px; width: 100%;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Update Student</h2>
            <a href="index.php" class="btn btn-secondary">View List</a>
        </div>

        <?php
        include "db_conn.php";

        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        }
        ?>

        <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="studentID" class="form-label">Student ID:</label>
                <input type="text" id="studentID" name="studentID" class="form-control" value="<?php echo htmlspecialchars($row['studentID']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number:</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
            </div>

            <p class="form-label">Please select your gender:</p>
            <div class="mb-3">
                <div class="form-check">
                    <input type="radio" id="male" name="gender" value="Male" class="form-check-input" <?php if ($row['gender'] == 'Male') echo 'checked'; ?>>
                    <label for="male" class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="female" name="gender" value="Female" class="form-check-input" <?php if ($row['gender'] == 'Female') echo 'checked'; ?>>
                    <label for="female" class="form-check-label">Female</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="other" name="gender" value="Other" class="form-check-input" <?php if ($row['gender'] == 'Other') echo 'checked'; ?>>
                    <label for="other" class="form-check-label">Other</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="<?php echo htmlspecialchars($row['date_of_birth']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="program" class="form-label">Choose your program:</label>
                <select id="program" name="program" class="form-select" required>
                    <option value="SECVH" <?php if ($row['program'] == 'SECVH') echo 'selected'; ?>>SECVH</option>
                    <option value="SECRH" <?php if ($row['program'] == 'SECRH') echo 'selected'; ?>>SECRH</option>
                    <option value="SECBH" <?php if ($row['program'] == 'SECBH') echo 'selected'; ?>>SECBH</option>
                    <option value="SECJH" <?php if ($row['program'] == 'SECJH') echo 'selected'; ?>>SECJH</option>
                    <option value="SECPH" <?php if ($row['program'] == 'SECPH') echo 'selected'; ?>>SECPH</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="year_of_study" class="form-label">Year of Study:</label>
                <select id="year_of_study" name="year_of_study" class="form-select" required>
                    <option value="YEAR1" <?php if ($row['year_of_study'] == 'YEAR1') echo 'selected'; ?>>YEAR 1</option>
                    <option value="YEAR2" <?php if ($row['year_of_study'] == 'YEAR2') echo 'selected'; ?>>YEAR 2</option>
                    <option value="YEAR3" <?php if ($row['year_of_study'] == 'YEAR3') echo 'selected'; ?>>YEAR 3</option>
                    <option value="YEAR4" <?php if ($row['year_of_study'] == 'YEAR4') echo 'selected'; ?>>YEAR 4</option>
                </select>
            </div>

            <p class="form-label">Select your subject(s):</p>
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" id="subject_digital_logic" name="subject_digital_logic" value="1" class="form-check-input" <?php if ($row['subject_digital_logic']) echo 'checked'; ?>>
                    <label for="subject_digital_logic" class="form-check-label">Digital Logic</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="subject_discrete_structure" name="subject_discrete_structure" value="1" class="form-check-input" <?php if ($row['subject_discrete_structure']) echo 'checked'; ?>>
                    <label for="subject_discrete_structure" class="form-check-label">Discrete Structure</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="subject_psda" name="subject_psda" value="1" class="form-check-input" <?php if ($row['subject_psda']) echo 'checked'; ?>>
                    <label for="subject_psda" class="form-check-label">PSDA</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="subject_sad" name="subject_sad" value="1" class="form-check-input" <?php if ($row['subject_sad']) echo 'checked'; ?>>
                    <label for="subject_sad" class="form-check-label">SAD</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="subject_programming" name="subject_programming" value="1" class="form-check-input" <?php if ($row['subject_programming']) echo 'checked'; ?>>
                    <label for="subject_programming" class="form-check-label">Programming Technique</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Student</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $studentID = $_POST["studentID"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];
            $date_of_birth = $_POST["date_of_birth"];
            $program = $_POST["program"];
            $year_of_study = $_POST["year_of_study"];
            $subject_digital_logic = isset($_POST["subject_digital_logic"]) ? 1 : 0;
            $subject_discrete_structure = isset($_POST["subject_discrete_structure"]) ? 1 : 0;
            $subject_psda = isset($_POST["subject_psda"]) ? 1 : 0;
            $subject_sad = isset($_POST["subject_sad"]) ? 1 : 0;
            $subject_programming = isset($_POST["subject_programming"]) ? 1 : 0;

            $sql = "UPDATE students SET 
                        name='$name', 
                        studentID='$studentID', 
                        email='$email', 
                        phone='$phone', 
                        gender='$gender', 
                        date_of_birth='$date_of_birth', 
                        program='$program', 
                        year_of_study='$year_of_study',
                        subject_digital_logic=$subject_digital_logic, 
                        subject_discrete_structure=$subject_discrete_structure, 
                        subject_psda=$subject_psda, 
                        subject_sad=$subject_sad, 
                        subject_programming=$subject_programming 
                    WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success mt-3'>Record updated successfully</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
