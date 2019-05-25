<?php
require_once('includes/db-conect.php'); // Database connection
$query = "SELECT * FROM feed order by id desc"; // select page already in database or not query.

$result = mysqli_query($connection,$query); // execute query
?>
<html lang="en">
<body>
<div class="row">
<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
<ul class="event-list">
<?php
while($rowsFeed = mysqli_fetch_array($result))
{
?>
<li>
<img src="<?php echo $rowsFeed['Picture'];?>" />
<div class="info">
<p class="desc"><?php echo $rowsFeed['Post'];?></p>
<ul>
<li style="width:33%;"><span class="fa fa-thumbs-up"></span> <?php echo $rowsFeed['Likes'];?></li>
<li style="width:34%;"><span class="fa fa-comment"></span> <?php echo $rowsFeed['Comments'];?></li>
<li style="width:33%;"><span class="fa fa-share"></span> <?php echo $rowsFeed['Shares'];?></li>
</ul>
</div>
<div class="social">
<ul>
<li class="facebook" style="width:33%;"><a href="https://fb.com/<?php echo $rowsFeed['PostID'];?>" target="_blank"><span class="fa fa-facebook"></span></a></li>
</ul>
</div>
</li>
<?php

}
?>
</ul>
</div>

</div>
</div>
</body>
</html> 