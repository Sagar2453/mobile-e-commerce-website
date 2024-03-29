<!DOCTYPE html>
<html>
<head>
    <!-- Your CSS styles -->
</head>
<body>
    <div class="form-container">
        <form enctype="multipart/form-data" action="" method="POST">
            <!-- Your existing form fields -->

            <!-- Image upload field -->
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" />
                <label class="upload-label" for="productImage">Choose File</label>
                <p class="selected-file">No file selected</p>
            </div>

            <!-- Your existing form fields -->

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <!-- Your JavaScript for updating the selected file name -->
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    // Check if a file was uploaded
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === 0) {
        $uploadDirectory = 'admin_upload/'; // Directory where you want to save the uploaded images

        // Generate a unique filename to prevent overwriting existing files
        $originalFileName = $_FILES['productImage']['name'];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $uniqueFileName = uniqid() . '.' . $extension;

        // Specify the full path for the uploaded file
        $uploadPath = $uploadDirectory . $uniqueFileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadPath)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file was uploaded or an error occurred.";
    }
}
?>