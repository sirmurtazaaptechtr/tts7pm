<?php
    require('connection.inc.php');
    $message = '';
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['message'])) {
        $message = test_input($_GET['message']);
    }
    $students_sql = "SELECT *,students.id AS student_id  FROM `students`JOIN `logins` ON students.id = logins.user_id";
    $result = mysqli_query($conn,$students_sql);    
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php if(!empty($message)) {?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulations!</strong> <?php echo $message;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php }?>
        <h1>Student Registration Form</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php $srno = 1; while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <th scope="row"><?php echo $srno;?></th>
                    <td><?php echo $row['student_id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['gender'];?></td>
                </tr>
                <?php $srno++; }?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>