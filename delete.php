<?php
include_once "db.php";

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $delete = $db->query("DELETE FROM berita WHERE id = $id");
    
    if($delete){
        header('Location: profile.php');
    }else {
        echo "data gagal di hapus";
    }
}