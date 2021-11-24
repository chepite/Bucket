<?php
if(empty($_SESSION['userId'])){
  echo('
<a href="index.php?page=login">login</a>' );
}
else{
  echo('welcome back '.$_SESSION['username']);
  echo('<br><a href="index.php?page=profile">Profile</a>
');
echo('<br><a href="destroy.php"> Log Out</a>
');

}
?>
