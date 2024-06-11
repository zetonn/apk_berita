<?php
include_once 'db.php';



$username = $_POST['username'];
$password = $_POST['password'];

$users = $db->query("SELECT * FROM users 
WHERE
username = '$username' AND password = '$password'");

$check_login = $users->fetch_array();

// if(isset($_COOKIE['id'])&&isset($_COOKIE['key'])){
//     $id = $_COOKIE['id'];
//     $key = $_COOKIE['key'];

//     // ambil username berdassarkan id
//     $result = $db -> query("SELECT username FROM users WHERE id = $id");
//     $row = $result -> fetch_assoc();

//     // cek cookie dan username
//     if($key === hash('sha256',$row['username'])){
//         $_SESSION['users'] = true;
//     }
// }

if($check_login[0]){
    session_start();
    $_SESSION['users'] = $check_login;
    // if(isset($_POST['remember'])){
    //     setcookie('id',$check_login['id'],time()+120);
    //     setcookie('key',hash('sha256',$check_login['username']),time()+120);
    // }
    header("Location: index.php");
    exit;
}else {
    echo 'user tidak terdaftar';
    header('Location: login.php');
}



