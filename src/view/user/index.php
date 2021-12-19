<!-- search form -->
<form action="index.php" class="searchform">
    <div class="formLine">
    <label for="search"></label>
    <input class="search__bar" type="text" placeholder="Looking for new lists?" required name="searchtext" value="<?php
          if (!empty($_GET['searchtext'])) echo $_GET['searchtext'];?>">
    <input class="submit__button" type="submit">
    </div>


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
<div class="bucketlists">
</div>

<script src="./js/search.js"></script>

