<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>CRUD</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#"><font color=blue>CRUD PHP MySQLi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><font color=blue>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tambah.php"><font color=blue>Tambah </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container" style="margin-top:20px">
    <font color=saddlebrown><h2>Edit Data </h2>
    
    <hr>
    
    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if(isset($_GET['id'])){
      //membuat variabel $id untuk menyimpan id dari GET id di URL
      $id = $_GET['id'];
      
      //query ke database SELECT tabel mahasiswa berdasarkan id = $id
      $select = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'") or die(mysqli_error($koneksi));
      
      //jika hasil query = 0 maka muncul pesan error
      if(mysqli_num_rows($select) == 0){
        echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
        exit();
      //jika hasil query > 0
      }else{
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
      }
    }
    ?>
    
    <?php
    //jika tombol simpan di tekan/klik
    if(isset($_POST['submit'])){
      $nama        = $_POST['nama'];
      $username    = $_POST['username'];
      $password    = $_POST['password'];
      $email       = $_POST['email'];

      
      $sql = mysqli_query($koneksi, "UPDATE data SET Nama='$nama', Username='$username', Password='$password', Email='$email' WHERE Id='$id'") or die(mysqli_error($koneksi));
      
      if($sql){
        echo '<script>alert("Data Berhasil di Simpan."); document.location="edit.php?id='.$id.'";</script>';
      }else{
        echo '<div class="alert alert-warning">Data Gagal di Edit.</div>';
      }
    }
    ?>
    
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" name="nama" class="form-control" value="<?php echo $data['Nama']; ?>" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control" value="<?php echo $data['Username']; ?>" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" value="<?php echo $data['Password']; ?>" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" name="email" class="form-control" value="<?php echo $data['Email']; ?>" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
          <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
          <a href="index.php" class="btn btn-primary"><font color=black><-</a>
          
        </div>
      </div>
    </form>
    
  </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/b ootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</body>
</html>