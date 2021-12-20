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
  if(isset($title) && $title!= "profile"){
  echo('<br><a href="index.php?page=profile">Profile</a>
');}
echo('<a href="destroy.php"> Log Out</a>
');
}
?>
      <?php echo $content;?>
  </div>

  <footer class="footer">
  <div class="footer__container">
    <div class="row">
      <div class="footer__column">
        <h4>
          Home
        </h4>
      </div>
      <div class="footer__column">
        <h4>
          Profile
        </h4>
        <ul>
          <p>bucket lists here</p>
        </ul>
      </div>
      <div class="footer__column">
        <h4>
          Account
        </h4>
        <ul>
          <p>log in</p>
          <p>sign up</p>
        </ul>
      </div><div class="footer__column">
          <h1 class="pagetitle"><a href="index.php">Buck it</a></h1>
      </div>
    </div>
  </div>
  </footer>
  <?php echo $js; ?>
</body>
</html>
