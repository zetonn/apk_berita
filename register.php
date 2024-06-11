<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="d-flex justify-content-center align-items-center">
  <div class="card shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 18rem;border:none;margin-top:80px;">
  <div class="card-body">
  <form class="d-flex flex-column" action="handler_register.php" method="post">
    <input type="hidden" name="registrasi" value="1">
    <h1 style="font-weight: bold;font-size:20px;text-align:center;color:#83C0E0;">Register</h1>
    <p style="font-size:12px;text-align:center;color:#83C0E0;">Buat akun dan lihat berita terupdate terkini</p>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" style="color:#83C0E0;">Username</label>
    <input type="text" class="form-control"  name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="color:#83C0E0;">Password</label>
    <input type="text" class="form-control"  name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="color:#83C0E0;">Email</label>
    <input type="text" class="form-control"  name="email">
  </div>
  <br>
  <button type="submit" class="btn btn-dark" style="background-color: #83C0E0;border:none;">Submit</button>
</form>
  </div>
</div>
  </div>
  
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>