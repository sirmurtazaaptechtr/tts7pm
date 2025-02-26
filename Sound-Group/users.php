<?php include('inc.header.php');

// Handle Delete Request
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']); // Ensure it's an integer to prevent SQL injection
  $query = "DELETE FROM Users WHERE user_id = $id";
  mysqli_query($conn, $query);
  header("Location: users.php");
  exit();
}

// Fetch Users Data
$query = "SELECT * FROM Users";
$result = mysqli_query($conn, $query);
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>                
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Users</h5>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='add.user.php'">
                            <i class="bi bi-plus me-1"></i> Add new User
                        </button>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <th><?php echo $row['user_id']; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo ucfirst($row['role']); ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="edit.user.php?id=<?php echo $row['user_id']; ?>" class="btn btn-warning">Edit</a>
                                                <a href="users.php?delete=<?php echo $row['user_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>  
<?php include('inc.footer.php'); ?>