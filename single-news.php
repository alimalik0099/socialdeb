<?php include 'header.php';
$get_news_id=$_GET['news-id'];
?>

<body>
   <?php include 'navbar.php';?>
   <div class="container-fluid py-3">
      <h3> <span class="badge bg-secondary px-5">News</span></h3>
      <div class="row">
         <div class="col-md-3">
            <div class="card pt-3" style="background-color:rgb(223, 178,
               240);">
               <h3> <span type="button"
                  class="badge
                  bg-secondary mx-4">Categories</span></h3>

               <div class="px-5 pb-4">
                <?php
                   $query = "SELECT * FROM categories ORDER BY id DESC";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>
                  <a href="category-news.php?catid=<?php echo $row['id'];?>" style="text-decoration: none;color: black"><h4><?php echo $row['name'];?></h4></a><hr>
              <?php } } ?>
               </div>
            </div>
         </div>
         <div class="col-md-5">
            <div class="rounded p-3 border-1 mb-4"
               style="background-color: rgb(223,
               232, 240);">
            <?php
                   $query = "SELECT * FROM news WHERE id='$get_news_id'";
                   $result = mysqli_query($conn, $query);  
                   if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result))  
                    {
                      ?>


               <div class="card">
                <?php 
                     echo '<img style=" width:100%;height:300px" class="card-img-top" alt="" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
                     ?> 
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><?php echo $row['tittle'];?></h4>
                        <h3><span class="badge bg-danger"><?php 
                           $category=$row['category'];
                      $query1 = "SELECT * FROM categories WHERE id='$category'";
                      $result1 = mysqli_query($conn, $query1);  
                      $row1 = mysqli_fetch_array($result1);
                      echo $row1['name']; ?></span></h3>
                     </div>
                     <p class="card-text">
                     <?php 
                     echo $row['detail'];
                     ?>
                 </p>
                  </div>
               </div>
               <?php 
           }
       }
       ?>


            </div>
         </div>
        <?php include 'trends.php';?>
      </div>
   </div>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
  
</body>
</html>