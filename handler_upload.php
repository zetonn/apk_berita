<?php
session_start();
include_once "db.php";
$user = $_SESSION['users'];

if (!isset($user)) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['upload'])) {
    $judul = $_POST['judul'];
    $desk = $_POST['deskripsi'];
    $gambar = upload();
    $userid = $user['id'];

    if (!$gambar) {
        return false;
    }

    $insert = $db->query("INSERT INTO berita (judul, gambar, tanggal, deskripsi, user_id) VALUES ('$judul', '$gambar', NOW(), '$desk', '$userid')");

    if ($insert) {
        header('Location: profile.php');
    } else {
        echo "Data gagal dimasukkan";
    }
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Isi foto terlebih dahulu');</script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang Anda upload bukan gambar');</script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>alert('Ukuran gambar terlalu besar');</script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.' . $ekstensiGambar;
    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    return $namaFileBaru;
}
?>
