<?php include 'header.php';?>
   <body>
      <?php include 'navbar.php';?>
      <div class="container-fluid py-3">
         <h3> <span class="badge bg-secondary px-5">Timeline</span></h3>
         <div class="row">
          <?php include 'Follow-Group-Left.php';?>
            <div class="col-md-5">
               <?php include 'Post-Question.php';?>
              
              <?php include 'timeline.php';?>
            </div>
            <?php include 'trends.php';?>
         </div>
      </div>
 
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
         crossorigin="anonymous"></script>
      <script>
         document.getElementById('msgarea').style.display = "none";
             document.getElementById('post').required = true;
         function askQuestion()
         { 
             document.getElementById('question').required = true;
             document.getElementById('question_heading').required = true;
             document.getElementById('post').required = false;
             document.getElementById('post').value="";
             document.getElementById('post-btn').classList.remove("bg-primary");
             document.getElementById('post-btn').classList.remove("text-white");
         
         
             document.getElementById('msgarea').style.display = "block";
             document.getElementById('quesbtn').classList.add("bg-primary");
             document.getElementById('quesbtn').classList.add("text-white");
         
             document.getElementById('postarea').style.display = "none";
             document.getElementById('toggle-button').innerText = "Send Question"
         }
         function sharePost()
         {    
            document.getElementById('question').required = false;
            document.getElementById('question_heading').required = false;
            document.getElementById('post').required = true;
            document.getElementById('question').value="";
            document.getElementById('question_heading').value="";


             document.getElementById('post-btn').classList.add("bg-primary");
             document.getElementById('post-btn').classList.add("text-white");
         
         
             document.getElementById('msgarea').style.display = "none";
             document.getElementById('quesbtn').classList.remove("bg-primary");
             document.getElementById('quesbtn').classList.remove("text-white");
         
             document.getElementById('postarea').style.display = "block";
             document.getElementById('toggle-button').innerText = "Post Publish"
         }
      </script>


   </body>
</html>