<?php
include_once 'init.php';

if (isset($_FILES['pictures'])) {
  // var_dump($_FILES['pictures']);die;
  $uploads_dir = 'uploads';
  foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["pictures"]["name"][$key]);
        $ext = getExtension($name);
        $change_name = criptFileName($name);
        $stmt = $pdo->prepare('INSERT INTO `images`(`name`, `path`) VALUES (?, ?)');
        $stmt->execute(array($name, "/{$uploads_dir}/{$change_name}{$ext}"));

        if (move_uploaded_file($tmp_name, DDP_ROOT."/{$uploads_dir}/{$change_name}{$ext}"))
        {
          // echo "success! ";
        }

    }
  }
	header('Location: admin.php');
}

$images = $pdo->query('SELECT * FROM images;');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="http://cdns.localhost/libraries/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Admin</title>
</head>
<body>
  <a href="index.php">Acceuil</a>
  <h3>Uploader image</h3>
  <form method="post" enctype="multipart/form-data">
    <input multiple type="file" name="pictures[]" value=""><br><br>
    <button type="submit" name="sub">Uploader</button>
  </form>
  <div class="images">
    <div class="row">
      <?php foreach ($images as $key => $value): ?>
        <div class="col-xs-4">
          <div class="img">
            <img width="300" height="300" src="<?= $value['path'] ?>" alt="image">
          </div>
          <div class="control">
            <a href="delete.php?id=<?= $value['id'] ?>">Supprimer</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
