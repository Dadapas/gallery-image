<?php
define('DDP_ROOT', dirname(__FILE__));

$pdo = new PDO('mysql:host=localhost;dbname=gallerie_image', 'root', '');


function getExtension($filename)
{
  preg_match('/\.[a-zA-Z0-9]+$/', $filename, $matchs);

  return isset($matchs[0]) ? $matchs[0]: false;
}

function criptFileName($filename)
{
  return substr(md5($filename), 0, 7);
}
