<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body style="height: 170vh;">
  <?php 
  session_start();
  if (!isset($_SESSION['users'])) {
    header("Location: login.php");
    exit;
  }

  include_once "db.php";

  $userid = $_SESSION['users']['id'];
  $data_berita = $db->query("SELECT berita.*, users.username FROM berita JOIN users ON users.id = berita.user_id WHERE berita.user_id = $userid");
  if (!$data_berita) {
    echo "Error: " . $db->error; // Debugging query error
  }
  ?>
  <nav class="navbar navbar-dark" style="background-color: #83C0E0;height:40vh;">
    <div class="container-fluid d-flex flex-column">
      <form class="d-flex flex-column " role="search">
        <i class='bx bxs-user-circle bx-lg' style="color: white;"></i>
        <a href="" style="text-decoration:none;color:white;text-align:center;font-size:20px;">
          <?php echo $_SESSION['users']['username'] ?>
        </a>
      </form>
      <a href="logout.php"><button type="button" class="btn btn-dark mt-3" style="background-color: #6F97FF;border:none;">Logout</button></a>
    </div>
  </nav>

  <div class="input-tambah position-absolute shadow" style="width:5vh;height:5vh;background-color:white;border-radius:50px;margin-left:3vh;margin-top:5vh;z-index:999;">
    <a href="upload.php"><i class='bx bx-plus bx-sm' style="margin-left:0.6vh;margin-top:0.6vh;position:absolute;color:#83C0E0;z-index:999;"></i></a>
  </div>
  <div class="input-tambah position-absolute shadow" style="width:5vh;height:5vh;background-color:white;border-radius:50px;margin-left:3vh;margin-top:12vh;z-index:999;">
    <a href="index.php"><i class='bx bxs-home'  style="margin-left:1.3vh;margin-top:1.3vh;position:absolute;color:#83C0E0;z-index:999;"></i></a>
  </div>

  <div class="my-berita d-flex justify-content-center">
    <div class="d-flex flex-wrap justify-content-center gap-3" style="margin-top:9vh;">
      <?php foreach ($data_berita as $item): ?>
      <div class="card shadow" style="width: 25rem;">
        <img src="../img/<?= $item['gambar'] ?>" class="card-img-top" style="height:220px;" alt="">
        <div class="card-body">
          <h5 class="card-title"><?= $item['judul'] ?></h5>
          <p class="card-text"><?= $item['deskripsi'] ?></p>
          <p class="card-text"><small class="text-body-secondary"><?= $item['tanggal'] ?></small></p>
          <div class="d-flex gap-1">
            <i class='bx bxs-user-circle bx-sm'></i>
            <p class="card-text"><small class="text-body-secondary"><?= $item['username'] ?></small></p>
          </div>
          <div>
            <a href="edit.php?id=<?php echo $item['id'] ?>"><button type="button" class="btn btn-dark mt-3" style="background-color: #83C0E0;border:none;">Edit</button></a>
            <a href="delete.php?delete_id=<?php echo $item['id'] ?>"><button type="button" class="btn btn-dark mt-3" style="background-color: #83C0E0;border:none;">Delete</button></a>
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
