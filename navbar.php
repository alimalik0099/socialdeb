<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0">
         <div class="container-fluid">
            <a class="navbar-brand" href="./index.php"><img
               src="./images/logo.png.png" style="width:65px;"
               class="mx-5" alt=""></a>
            <button class="navbar-toggler" type="button"
               data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"
               id="navbarSupportedContent">
               <form class="d-flex me-5 position-relative" action="search.php" method="GET">
               <input list="searchlist" class="form-control me-2" style="width: 35vw;" type="search" placeholder="Search" id="search_input"  aria-label="Search" autocomplete="OFF" required name="search_word">
               <button class="btn btn-primary position-absolute end-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button>
               <datalist id="searchlist">
                 
               </datalist>
                 
               </form>

               <ul class="navbar-nav me-auto mb-2 mb-lg-0 me-5">
                  <li class="nav-item mx-2">
                     <a class="nav-link active" aria-current="page"
                        href="./index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                           <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                        </svg>
                     </a>
                  </li>
                  <li class="nav-item mx-2">
                     <a class="nav-link active" aria-current="page"
                        href="./news.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                           <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                           <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                        </svg>
                     </a>
                  </li>
                  <li class="nav-item  mx-2">
                     <a class="nav-link active " aria-current="page"
                        href="./message.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                           <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                           <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                        </svg>
                     </a>
                  </li>
                  <li class="nav-item  mx-2">
                     <a class="nav-link active" aria-current="page"
                        href="./message.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                           <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                     </a>
                  </li>
               </ul>

               <?php 
               if ($user_session=="yes") {
                 ?>
                 <a href="Profile.php" class="text-white">
                  <button
                     class="btn btn-primary mx-1" type="button">
                     Profile
                  </button>
                 </a>

                 <a href="Logout.php" class="text-white">
                  <button
                     class="btn btn-primary mx-1" type="button">
                     Logout
                  </button>
                 </a>
               <?php 
               }
               else{ ?>
               <a href="login.php" class="text-white">
                  <button
                     class="btn btn-primary mx-1" type="button">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-in-right" viewBox="0
                        0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0
                           1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0
                           1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0
                           0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0
                           0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5
                           2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1
                           0v-2z" />
                        <path fill-rule="evenodd" d="M11.854
                           8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0
                           1 0-.708.708L10.293 7.5H1.5a.5.5 0 0
                           0 0 1h8.793l-2.147 2.146a.5.5 0 0 0
                           .708.708l3-3z" />
                     </svg>
                     Login
                  </button>
               </a>
               <a href="registration.php"
                  class="text-white">
                  <button class="btn
                     btn-primary mx-1" type="button">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16"
                        fill="currentColor" class="bi
                        bi-person-plus" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0
                           0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0
                           1 4 0zm4 8c0 1-1 1-1 1H1s-1
                           0-1-1 1-4 6-4 6 3 6
                           4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516
                           10.68 8.289 10 6 10c-2.29
                           0-3.516.68-4.168
                           1.332-.678.678-.83 1.418-.832
                           1.664h10z" />
                        <path fill-rule="evenodd"
                           d="M13.5 5a.5.5 0 0 1
                           .5.5V7h1.5a.5.5 0 0 1 0
                           1H14v1.5a.5.5 0 0 1-1
                           0V8h-1.5a.5.5 0 0 1
                           0-1H13V5.5a.5.5 0 0 1
                           .5-.5z" />
                     </svg>
                     Register
                  </button>
               </a>
            <?php } ?>



            </div>
         </div>
      </nav>

<script type="text/javascript">
   $(document).ready(function() {
   $("#search_input").keyup(function(){
      var search_word = $('#search_input').val();

      $.ajax({
               type: "POST",
               url: "search-ajax.php",
               data: {
                   search_word: search_word

               },
               success: function(html) {
                  // alert(html);
                    $("#searchlist").html(html);
               }
           });
});
});
</script>
