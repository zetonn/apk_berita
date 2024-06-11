<?php 
session_start();
  if(!isset($_SESSION['users'])){
    header("Location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body style="height: 168vh;">
  <?php 
  include_once "db.php";

  $data_berita = $db->query("SELECT berita.*, users.username FROM berita JOIN users ON users.id = berita.user_id");  
  ?>
  <nav class="navbar navbar-dark" style="background-color: #83C0E0;">
  <div class="container-fluid">
    <a class="navbar-brand" style="font-size: 28px;">Zetoon | News</a>
    <form class="d-flex" role="search">
      <a href="profile.php" style="text-decoration:none;color:white;margin-right:10px;"><?php echo  $_SESSION['users']['username']; ?></a>
      <a href="profile.php"><i class='bx bxs-user bx-sm' style="color: white;"></i></a>
    </form>
  </div>
</nav>

<div class="berita">
  <h4 class="d-flex justify-content-center " style="margin-top: 10vh;color:#83C0E0;">Berita Terbaru </h4>
  <div class="d-flex flex-wrap justify-content-center gap-3 "  style="margin-top:9vh;">
  <?php foreach ($data_berita as $item): ?>
  <div class="card shadow" >
    <img src="../img/<?= $item['gambar'] ?>" class="card-img-top" style="height:220px;" alt="">
    <div class="card-body">
      <h5 class="card-title"><?= $item['judul'] ?></h5>
      <p class="card-text"><?= $item['deskripsi'] ?></p>
      <p class="card-text"><small class="text-body-secondary"><?= $item['tanggal'] ?></small></p>
      
      <div class="d-flex gap-1">
        <i class='bx bxs-user-circle bx-sm'></i>
        <p class="card-text"><small class="text-body-secondary"><?php echo  $item['username'] ?></small></p>
      </div>
      
    </div>
  </div>
  <?php endforeach; ?>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </body>
</html>