<?php
session_start();
include('includes/db.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    // $password = md5($_POST['password']);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('email not valid');</script>";
    }

    $sql = "SELECT * FROM admin WHERE email = '$email' AND ad_pw = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) {
            $_SESSION['log'] = 'loggedIn';
            $_SESSION['username'] = $rows['username'];
            $_SESSION['email'] = $rows['email'];
            header('location: listarticle.php');
        }
    } else {
        echo "Incorrect User Id or Password";
        unset($_SESSION['log']);
        session_destroy();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctype/doc.php'); ?>
    <title>Login</title>
</head>

<body>

    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-fields">
                <form name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validation();">
                    <h1>Login</h1>
                    <p>
                        <label>Email: </label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    <div class="error"></div>
                    </p>
                    <p>
                        <label>Password: </label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    <div class="pw-error"></div>
                    </p>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>