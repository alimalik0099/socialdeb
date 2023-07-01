<?php include 'header.php';?>
<body>
   <?php include 'navbar.php';?>
   <div class="container-fluid py-3">
      <h3> <span class="badge bg-secondary px-5">Rss News</span></h3>
      <div class="row">
         
         <div class="col-md-12">
            <div class="rounded p-3 border-1 mb-4" style="background-color: rgb(223,232, 240);">
        <style type="text/css">
    .content{
    width: 60%;
    margin: 0 auto;
}

input[type=text]{
    padding: 5px 10px;
    width: 60%;
    letter-spacing: 1px;
}

input[type=submit]{
    padding: 5px 15px;
    letter-spacing: 1px;
    border: 0;
    background: gold;
    color: white;
    font-weight: bold;
    font-size: 17px;
}

h1{
    border-bottom: 1px solid gray;
}

h2{
    color: black;
}
h2 a{
    color: black;
    text-decoration: none;
}

.post{
    border: 1px solid gray;
    padding: 5px;
    border-radius: 3px;
    margin-top: 15px;
}

.post-head span{
    font-size: 14px;
    color: gray;
    letter-spacing: 1px;
}

.post-content{
    font-size: 18px;
    color: black;
}
</style>

<div class="content">

 <?php
$query = "SELECT * FROM rss ORDER BY id DESC";
$result = mysqli_query($conn, $query);  
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result))  
{
   $url=$row['link'];

 $invalidurl = false;
 if(@simplexml_load_file($url)){
  $feeds = simplexml_load_file($url);
 }else{
  $invalidurl = true;
  echo "<h2>Invalid RSS feed URL.</h2>";
 }


 $i=0;
 if(!empty($feeds)){

  $site = $feeds->channel->title;
  $sitelink = $feeds->channel->link;

  echo "<h2>".$site."</h2>";
  foreach ($feeds->channel->item as $item) {

   $title = $item->title;
   $link = $item->link;
   $description = $item->description;
   $postDate = $item->pubDate;
   $pubDate = date('D, d M Y',strtotime($postDate));


   if($i>=5) break;
  ?>
   <div class="post">
     <div class="post-head">
       <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
       <span><?php echo $pubDate; ?></span>
     </div>
     <div class="post-content">
       <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Read more</a>
     </div>
   </div>

   <?php
    $i++;
   }
 }else{
   if(!$invalidurl){
     echo "<h2>No item found</h2>";
   }
 }
}
}
 ?>
</div>


            </div>
         </div>
      </div>
   </div>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
  
</body>
</html>