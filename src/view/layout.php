<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
<a class="button button__login" href="index.php?page=login">login</a>' );
}
else{
  if(isset($title) && $title!= "profile"){
  echo('<a class="button button__profile" href="index.php?page=profile">
          <span class="glyphicon glyphicon-user"></span>
        </a>
');}
echo('<a class="button button__logout" href="destroy.php">
          <span class="glyphicon glyphicon-log-out"></span>
        </a>
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
          <a href="index.php">Home</a>
        </h4>
      </div>
      <div class="footer__column">
        <h4>
          <a href="index.php?page=profile">Profile</a>
        </h4>
        <ul>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>
          <li><p>bucket lists here</p></li>

        </ul>
      </div>
      <div class="footer__column">
        <h4>
          Account
        </h4>
        <ul>
          <li><a href="index.php?page=login">Log In</a></li>
          <li><a href="index.php?page=signup">Sign Up</a></li>
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
