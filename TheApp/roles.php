<?php
require('inc.connection.php');
$select_role_sql = "SELECT * FROM `roles`";
$result = mysqli_query($conn,$select_role_sql);
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
        <h1>User Types</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role ID</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                <?php $srno=1; while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td scope="row"><?php echo $srno;?></td>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['role'];?></td>
                </tr>
                <?php $srno++; }?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>