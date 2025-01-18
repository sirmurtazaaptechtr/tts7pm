<?php
include('inc.connection.php');
$select_student_sql = "SELECT * FROM `students`";
$result = mysqli_query($conn,$select_student_sql);
// pr($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>All Students</h1>
        <a type="button" class="btn btn-primary" href="add-student.php">+Add new Student</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $srno = 1; while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $srno;?></th>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="#" type="button" class="btn btn-danger">Delete</a>
                            <a href="#" type="button" class="btn btn-warning">Edit</a>
                            <a href="#" type="button" class="btn btn-info">View</a>
                        </div>
                    </td>
                </tr>
                <?php $srno++; }?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>