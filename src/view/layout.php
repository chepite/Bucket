<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <?php echo $css; ?>
  <title>Buck it!</title>
</head>
<body>
  <div class="container">
      <header><h1 class="pagetitle"><a href="index.php">Buck it</a></h1></header>
      <?php echo $content;?>
  </div>
  <?php echo $js; ?>
</body>
</html>
