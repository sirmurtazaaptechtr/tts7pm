<?php    
    include('header.inc.php');
    $message = '';
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['message'])) {
        $message = test_input($_GET['message']);
    }
    $students_sql = "SELECT *,students.id AS student_id  FROM `students`JOIN `logins` ON students.id = logins.user_id";
    $result = mysqli_query($conn,$students_sql);    
?>
    <div class="container">
        <?php if(!empty($message)) {?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulations!</strong> <?php echo $message;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php }?>
        <h1>Student Registration Form</h1>
        <div>
            <a type="button" class="btn btn-primary" href="addstudent.php">+ Add New Student</a>
        </div>
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

<?php
    include('footer.inc.php');
?>