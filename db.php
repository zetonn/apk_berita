<?php
$db = new mysqli("localhost","root","","db_apk_berita");

if(!$db){
    mysqli_errno($db);
}