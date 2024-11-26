<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label" for="fileToUpload">Select image to upload:</label>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
            </div>
            <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
        </form>
    </div>
</body>
</html>