<?php
session_start();
include('../include/dbconn.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $sql = "SELECT email, staff_name, phone_num, password FROM admin WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));

    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);
        echo "Logged In";
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        header('Location: ../index.php');
        exit();
    } else {
        header('Location: ../Login_v1/loginpage.html');
        exit();
    }
}

mysqli_close($dbconn);
?>
