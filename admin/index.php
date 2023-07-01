<?php include 'header.php'; ?>
<body>
   <div class="wrapper">
   <?php include 'navbar.php'; ?>
   <!-- Sidebar -->
   <?php include 'sidebar.php'; ?>
   <div class="main-panel">
      <div class="content">
         <div class="page-inner">
            <div class="page-header">
               <h4 class="page-title">Dashboard</h4>
               <div class="btn-group btn-group-page-header ml-auto">
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                     <div class="card-body ">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-primary bubble-shadow-small">
                                 <i class="fas fa-users"></i>
                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Total Users</p>
                                 <h4 class="card-title"><?php
                                    $query = "SELECT * FROM users"; 
                                    $result = mysqli_query($conn, $query);
                                    if ($result) 
                                    { 
                                      $row = mysqli_num_rows($result); 
                                      if ($row) 
                                      { 
                                       printf($row); 
                                     } 
                                     else{
                                      echo "0";
                                    }
                                    } ?></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                     <div class="card-body">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-info bubble-shadow-small">
                                 <i class="far fa-newspaper"></i>
                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Total Post</p>
                                 <h4 class="card-title"><?php
                                    $query = "SELECT * FROM posts"; 
                                    $result = mysqli_query($conn, $query);
                                    if ($result) 
                                    { 
                                      $row = mysqli_num_rows($result); 
                                      if ($row) 
                                      { 
                                       printf($row); 
                                     } 
                                     else{
                                      echo "0";
                                    }
                                    } ?></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                     <div class="card-body">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-success bubble-shadow-small">
                                 <i class="far fa-chart-bar"></i>
                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Total News</p>
                                 <h4 class="card-title"><?php
                                    $query = "SELECT * FROM news"; 
                                    $result = mysqli_query($conn, $query);
                                    if ($result) 
                                    { 
                                      $row = mysqli_num_rows($result); 
                                      if ($row) 
                                      { 
                                       printf($row); 
                                     } 
                                     else{
                                      echo "0";
                                    }
                                    } ?></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                     <div class="card-body">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                 <i class="far fa-check-circle"></i>
                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Running Trends</p>
                                 <h4 class="card-title"><?php
                                    $query = "SELECT * FROM trend"; 
                                    $result = mysqli_query($conn, $query);
                                    if ($result) 
                                    { 
                                      $row = mysqli_num_rows($result); 
                                      if ($row) 
                                      { 
                                       printf($row); 
                                     } 
                                     else{
                                      echo "0";
                                    }
                                    } ?></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row">
               
               <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                     <div class="card-body ">
                        <div class="row align-items-center">
                           <div class="col-icon">
                              <div class="icon-big text-center icon-primary bubble-shadow-small">
                                 <i class="fas fa-users"></i>
                              </div>
                           </div>
                           <div class="col col-stats ml-3 ml-sm-0">
                              <div class="numbers">
                                 <p class="card-category">Total Site Visitors</p>
                                 <h4 class="card-title"><?php
                                    $query = "SELECT * FROM website_visitor"; 
                                    $result = mysqli_query($conn, $query);
                                    if ($result) 
                                    { 
                                      $row = mysqli_num_rows($result); 
                                      if ($row) 
                                      { 
                                       printf($row); 
                                     } 
                                     else{
                                      echo "0";
                                    }
                                    } ?></h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>



         </div>
      </div>
   </div>
   <?php  include 'footer.php'; ?>