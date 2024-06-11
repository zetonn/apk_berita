<?php
include_once "db.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$data = $db->query("INSERT INTO users VALUES ('','$username','$password','$email')");

if (isset($_POST['registrasi']) > 0) {
    echo "
    <script>
    alert('Akun Berhasil di Buat')
    </script>
    ";
    header("Location: login.php");
} else {
    echo mysqli_error($db);
}
  
   