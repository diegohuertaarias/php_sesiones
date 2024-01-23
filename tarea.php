<html>
<body>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit" name="register">

</form>


<?php
// Conexión a la base de datos
$db = new mysqli('localhost', 'root', '', 'cookies');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Registro de usuario
    if (isset($_POST['register'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Encriptación MD5

        $query = "INSERT INTO info (id, email, password) VALUES (null, '$email', '$password')";
        mysqli_query($db, $query);
    }

    // Login de usuario
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']); // Encriptación MD5

        $query = "SELECT * FROM info WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: private_content.php');
        } else {
            echo "Wrong username/password combination";
        }
    }
}
?>

