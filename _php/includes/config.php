<?php
$cfg["db_host"] = "localhost";
$cfg["db_user"] = "root";
$cfg["db_password"] = "root";
$cfg["db_name"] = "prashantiYoga";
$cfg["port"] = 3306;

define("MAX_IMAGE_SIZE", 5000000);

$GLOBALS["allowed_file_types"] = [
  "jpg" => "image/jpeg",
  "jpeg" => "image/jpeg",
  "png" => "image/png"
];