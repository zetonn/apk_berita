<?php
include_once "db.php";
include_once "handler_upload.php";

if(isset($_POST['edit_berita'])) {
    $id = $_POST['id'];
    $gambarLama = $_POST['gambarLama'];
    $judul = $_POST['judul'];
    $desk = $_POST['deskripsi'];

    // cek user ubah gambar atau tidak
    if($_FILES['gambar']['error']===4){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $insert = $db->query(
        "UPDATE berita set `gambar` = '$gambar',judul = '$judul', deskripsi = '$desk' WHERE id = $id"
    );

    if($insert) {
        header('Location:profile.php');
    }else {
        echo "data gagal dimasukan";
    }
}