<!-- database connection -->
<?php

$conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');

if(!$conn){
  echo 'connection success';
}

?>