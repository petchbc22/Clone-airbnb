<?php
  if(isset($_FILES['upfile']['name'])){
    $name=$_FILES['upfile']['name'];
    $tmp=$_FILES['upfile']['tmp_name'];
    move_uploaded_file($tmp, 'img/home/'.$name);
  } else {
    echo 'test';
  }
?>
