<!-- search form -->
<form method="post" action="index.php?page=signup">
    <input type="hidden" name="action" required value="addUser"/>
    <div class="formLine">
    <label for="search">Search</label>
    <input type="text"  required name="search" value="<?php
          if (!empty($_POST['username'])) echo $_POST['username'];?>">
    </div>

    <input type="submit">
</form>
<!-- end search form -->

<?php
if(empty($_SESSION['userId'])){
  echo('
<a class="button__login" href="index.php?page=login">login</a>' );
}
else{
  echo('welcome back '.$_SESSION['username']);
  echo('<br><a href="index.php?page=profile">Profile</a>
');
echo('<br><a href="destroy.php"> Log Out</a>
');
}
?>
