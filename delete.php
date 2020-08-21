<?php
include_once 'init.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

// Delete from the server
$stmt = $pdo->prepare('select path from images where id=?');
$stmt->execute(array($id));
$img = $stmt->fetch();
unlink(__DIR__ . $img['path']);

// get image frome the db
$stmt = $pdo->query('DELETE FROM images WHERE id='.$id);

header('Location: admin.php');
return 1;
