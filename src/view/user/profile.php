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
<input type="submit" value="add bucketlist">
</form>');
}
else{
  header('Location: index.php?page=profile');
}


?>

<ul class="bucketlistList">
</ul>
<a class="button button__logout--profile" href="destroy.php">
          <span class="glyphicon glyphicon-log-out"></span>
        </a>
<script src="./js/profile.js"></script>
