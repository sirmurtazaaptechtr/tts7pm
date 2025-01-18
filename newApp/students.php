<?php    
    // Include a common header file, which may contain database connection and other shared resources
    include('header.inc.php');
    
    // Initialize variables for message and ID
    $message = $id = '';
    
    // Check if the request method is GET and if an 'id' parameter is passed in the URL
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        // Sanitize the 'id' parameter to prevent SQL injection
        $id = test_input($_GET['id']);
        
        // SQL query to delete a student record from the 'students' table based on the provided ID
        $delete_sql = "DELETE FROM `students` WHERE id = '$id'";
        
        // Execute the deletion query and check if it was successful
        if($is_deleted = mysqli_query($conn, $delete_sql)) {
            // Set a success message indicating the record was deleted
            $message = "Record id = $id is deleted successfully.";
        }
    }
    
    // Check if the request method is GET and if a 'message' parameter is passed in the URL
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['message'])) {
        // Sanitize the 'message' parameter
        $message = test_input($_GET['message']);
    }
    
    // SQL query to fetch all student details along with login information by joining two tables
    $students_sql = "SELECT *, students.id AS student_id FROM `students` LEFT JOIN `logins` ON students.id = logins.user_id";
    
    // Execute the query to retrieve student data
    $result = mysqli_query($conn, $students_sql);    
?>
    <!-- Container for the page content -->
    <div class="container">
        <!-- Check if a message exists and display it as an alert -->
        <?php if(!empty($message)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulations!</strong> <?php echo $message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <!-- Page title -->
        <h1>Student Registration Form</h1>
        
        <!-- Button to add a new student -->
        <div>
            <a type="button" class="btn btn-primary" href="addstudent.php">+ Add New Student</a>
        </div>
        
        <!-- Table displaying student information -->
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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the query result and display each student record -->
                <?php $srno = 1; while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <th scope="row"><?php echo $srno; ?></th>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['gender']; ?></td>                    
                    <td>
                        <!-- Buttons for view, edit, and delete actions -->
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="#" type="button" class="btn btn-info">View</a>
                            <a href="#" type="button" class="btn btn-warning">Edit</a>
                            <!-- Generate a delete link with the current script and student ID -->
                            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $row['student_id']; ?>" type="button" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php $srno++; } ?>
            </tbody>
        </table>
    </div>

<?php
    // Include a common footer file
    include('footer.inc.php');
?>
