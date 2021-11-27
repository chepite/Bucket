<?php
if(!empty($_SESSION['userId'])){
  echo('<h1>Profile of ' .$_SESSION['username'].'</h1>');

  if(isset($errors)){
    var_dump($errors);

}
//<input type="hidden" name="action" value="addBucketlist">

echo('
<form method="post" action="index.php?page=profile">
<input type="hidden" name="action" value="addBucketlist">
<input type="submit">
</form>');
}
else{
  header('Location: index.php?page=profile');
}


?>

<ul class="bucketlistList">
</ul>
<a href="destroy.php">Log out</a>
<script src="./js/profile.js"></script>
