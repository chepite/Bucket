<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo $css; ?>
  <title>Buck it!</title>
</head>
<body>
  <div class="container">
      <header>
        <h1 class="pagetitle"><a href="index.php">Buck it</a></h1>
      </header>
      <?php
if(empty($_SESSION['userId'])){
  echo('
<a class="button__login" href="index.php?page=login">login</a>' );
}
else{
  echo('<p class="welcome__text">welcome back ' . $_SESSION['username'] . '</p>');
  if(isset($title) && $title!= "profile"){
  echo('<br><a href="index.php?page=profile">Profile</a>
');}
echo('<a href="destroy.php"> Log Out</a>
');
}
?>
      <?php echo $content;?>
  </div>
  <?php echo $js; ?>
</body>
</html>
