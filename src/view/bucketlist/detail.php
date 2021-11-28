<link rel="stylesheet" href="css/detail.css">
<h2><?php echo("listId ".$_SESSION["detailBucketlist"])?></h2>
<div>    <button type="submit" name="action" value="Edit">Edit</button>
<a class="threedot">...</a>
</div>
<div class="threedotDropDown">
  <ul>
    <li>                <a
                    class="delete-link"
                    href="index.php?page=profile&action=delete&id=<?php echo $_SESSION['detailBucketlist']; ?>"> Delete
                </a></li>
  </ul>
</div>
<ul class="activityList">
</ul>

<script src="./js/detail.js"></script>
