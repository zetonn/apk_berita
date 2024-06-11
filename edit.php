<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php 
    include_once 'db.php';
    $id = $_GET['id'];
    $card = $db->query("SELECT * FROM berita WHERE id = $id ")->fetch_assoc();
    
    ?>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="profile.php" style="color: #83C0E0;">
      <i class='bx bx-arrow-back'></i>
      Edit
    </a>
  </div>
</nav>
<div class="p-5">
<form action="handler_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="edit_berita" value="1">
        <input type="hidden" name="gambarLama" value="<?= $card['gambar']; ?>">
        <input type="hiden" name="id" value="<?php echo $_GET['id']; ?>" style="display: none;">

  <div class="card mb-3">
  <img src="../img/<?= $card['gambar']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
  <label class="form-label">Masukan gambar</label><br>
  <input type="file" class="form-control" name="gambar">
  </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" class="form-control" name="judul" value="<?php echo $card['judul'] ?>">
  </div>
  <div class="mb-3">
      <label  class="form-label">Deskripsi</label>
      <textarea class="form-control" style="height: 100px" name='deskripsi'><?php echo $card['deskripsi'] ?></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>