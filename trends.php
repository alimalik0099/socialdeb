<style type="text/css">
   #trending_card{
      cursor: pointer;
      
   }
</style>

<div class="col-md-4">
   <div class="card pt-3 mb-2 bg-danger
      text-white" >
      <h3> <span type="button" class="badge bg-secondary mx-4">Trends</span></h3>
      

<?php
      $query_trendss = "SELECT * FROM trend WHERE count>9 ORDER BY count DESC LIMIT 5";
      $result_trendss = mysqli_query($conn, $query_trendss);  
      if ($result_trendss->num_rows > 0) {
      while($row_trendss = mysqli_fetch_array($result_trendss))  
      {
         ?>
         <a href="trend-post.php?word=<?php echo $row_trendss['word'];?>" style="text-decoration: none;">
      <div class="d-flex justify-content-around align-items-center p-0 text-white">
         <div> <p>#<?php echo $row_trendss['word'];?></p> </div>
         <div> <p><?php echo $row_trendss['count'];?></p> </div>
      </div></a>

   <?php } } ?>


   </div>
   <div class="card pt-3 mt-2 px-3" style=" background-color: rgb(245, 221,
      66);">
      <h3> <span type="button" class="badge bg-secondary mx-2">Latest News</span>
      </h3> 

<?php

$query = "SELECT * FROM news ORDER BY id DESC LIMIT 5";
$result = mysqli_query($conn, $query);  
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result))  
{
   ?>
      
       <div id="trending_card" class="card mb-3 mt-2" style="max-width: 540px;" onclick="window.location.href='single-news.php?news-id=<?php echo $row['id'];?>'">
         <div class="row g-0">
            <div class="col-md-4">
              <?php 
                     echo '<img style="width:525px;height:100px" class="img-fluid" alt="" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
                     ?> 
            </div>
            <div class="col-md-8">
               <div class="card-body">
                  <h6 class="card-title">
                     <?php echo $row['tittle'];?>
                  </h6>
               </div>
            </div>
         </div>
      </div>
 
<?php 
}
}
?>

   <!-- </div> -->
</div>