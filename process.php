<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);

    // Handle file upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmpPath = $_FILES['resume']['tmp_name'];
        $fileName = basename($_FILES['resume']['name']);
        $fileDestPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $fileDestPath)) {
            $resumePath = $fileDestPath;
        } else {
            die("<p style='color: red;'>File upload failed. Please try again.</p>");
        }
    } else {
        die("<p style='color: red;'>Error uploading resume.</p>");
    }

    echo "<h2>Registration Successful!</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Resume:</strong> <a href='$resumePath' target='_blank'>View File</a></p>";
} else {
    echo "<p style='color: red;'>Invalid Request!</p>";
}
?>