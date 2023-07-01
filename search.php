<?php 

include 'header.php';
$search=$_GET['search_word'];
$search = ltrim($search,'#');

$Query = "SELECT word FROM trend WHERE word LIKE '%$search%'";
$ExecQuery = mysqli_query($conn, $Query);
if ($ExecQuery->num_rows > 0) {
  ?>
     <script type="text/javascript">
     	window.location.href="trend-post.php?word=<?php echo $search;?>"
     </script>
  <?php
}
else{
	$search=$_GET['search_word'];
  $search = ltrim($search,'News: ');
$Query2 = "SELECT id FROM news WHERE tittle LIKE '%$search%'";
$ExecQuery2 = mysqli_query($conn, $Query2);
if ($ExecQuery2->num_rows > 0) {
$row1 = mysqli_fetch_array($ExecQuery2);
    ?>
     <script type="text/javascript">
     	window.location.href="single-news.php?news-id=<?php echo $row1['id'];?>";
     </script>
  <?php
}
else{
 $search=$_GET['search_word'];
echo $search = ltrim($search,'Q) ');
$Query2 = "SELECT post_id FROM posts WHERE question_heading LIKE '%$search%'";
$ExecQuery2 = mysqli_query($conn, $Query2);
if ($ExecQuery2->num_rows > 0) {
$row1 = mysqli_fetch_array($ExecQuery2);
    ?>
     <script type="text/javascript">
        window.location.href="Post-View.php?post-id=<?php echo $row1['post_id'];?>";
     </script>
  <?php
}
else{
	?>
   <script type="text/javascript">
   	alert('Sorry');
   	window.location.href="index.php";
   </script>
	<?php
}
}
}
