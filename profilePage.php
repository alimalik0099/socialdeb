<?php include 'header.php';?>

        <style>
            @media screen and (max-width: 990px) {
                #search-bar {
                    width: 90vw !important;
                }  
            }
            
        </style>

    <body>
        <?php include 'navbar.php';?>
        
                            <div class="container-fluid py-3 my-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card py-3 mb-3 position-relative" style="background-color:rgb(223, 178,
                                            240); ">
                                            <h4> <span type="button"
                                                    class="badge
                                                    bg-primary mx-2 position-absolute end-0">Follow</span></h4>
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img src="./images/news.jpg" style="clip-path: circle(31.2% at 46% 43%);
                                                " class="img-fluid" alt="">
                                                <h3>Noman Manzoor</h3>
                                                <div class="d-flex justify-content-center align-items-center px-3" >
                                                    <p class="text-center " >I am a software engineer at Dev&Mark, a service based comapny</p>
                                                </div>

                                            

                                                <div >
                                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-envelope me-2" viewBox="0 0 16 16">
                                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                      </svg> <span>maliknomi1032@gmail.com</span></p>
                                                      <p><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-telephone-inbound me-2" viewBox="0 0 16 16">
                                                        <path d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                                      </svg>
                                                      </svg> <span>099676866425</span></p>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary">Message</button>
                                                </div>
                                            </div>

                                        </div>

                                 
                                    </div>
                                    <div class="col-md-5">
                                        <div class="rounded p-3 border-1 mb-4"
                                            style="background-color: rgb(223,
                                            232, 240);">
                                             <div>
                                                <button class=" py-2 px-3 bg-primary text-white"  style="border-radius: 34px; border: none ;" id="post-btn" onclick="sharePost()">Post</button>
                                                 <button style="border-radius: 34px; border: none;" id = "quesbtn" class="py-2 px-3" onclick="askQuestion()">Ask Question?</button>
                                              </div>
                                              <div id="msgarea" class="my-3">
                                                    <h4 class="my-3">Write Question which you want to Ask</h4>
                                                    <textarea class="form-control "
                                                        id="question" rows="4"
                                                        placeholder="Write Question here"></textarea>
                                               </div>
                                        
                                               <div id="postarea">
                                                    <h4 class="my-3">Write Post which you want to Publish</h4>
                                                     <textarea class="form-control my-2"
                                                        id="post" rows="4"
                                                        placeholder="Write post here"></textarea>
                                                </div>
                                                <button class="btn btn-primary"
                                                    id="toggle-button">Publish</button>
                                        </div>

                                        <div class="rounded p-3 border-1 my-3 px-4"
                                            style="background-color: rgb(223,
                                            232, 240);">
                                            <div class="d-flex
                                                justify-content-between
                                                align-items-center p-0">
                                                <div>
                                                    <img
                                                        src="./images/profile.jpg"
                                                        class="mt-2"
                                                        style="clip-path: circle(37.6% at 50% 41%);
                                                        "
                                                        alt="">
                                                    <span>user123</span>
                                                </div>
                                                
                                                    <h1 class="badge
                                                        bg-danger">Follow</h1>
                                            </div>
                                            <div>
                                                <h2>Today is Hot!</h2>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, labore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, modi?</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="left">
                                                    <button class="btn btn-primary"> Like</button>
                                                    <button class="btn btn-primary"> Repost</button>
                                                    <button class="btn btn-primary"> Share</button>
                                                </div>
                                                <div class="right">
                                                    <button class="btn btn-primary"> Reply</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="rounded p-3 border-1 my-3 px-4"
                                        style="background-color: rgb(223,
                                        232, 240);">
                                        <div class="d-flex
                                            justify-content-between
                                            align-items-center p-0">
                                            <div>
                                                <img
                                                    src="./images/profile.jpg"
                                                    class="mt-2"
                                                    style="clip-path: circle(37.6% at 50% 41%);
                                                    "
                                                    alt="">
                                                <span>user123</span>
                                            </div>
                                            
                                                <h1 class="badge
                                                    bg-danger">Follow</h1>
                                        </div>
                                        <div>
                                            <h2>Weather will be Rainy next 5 days</h2>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, labore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, modi?</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="left">
                                                <button class="btn btn-primary"> Like</button>
                                                <button class="btn btn-primary"> Repost</button>
                                                <button class="btn btn-primary"> Share</button>
                                            </div>
                                            <div class="right">
                                                <button class="btn btn-primary"> Reply</button>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card pt-3 mb-2 bg-danger
                                            text-white" >
                                            <h3> <span type="button"
                                                    class="badge
                                                    bg-secondary mx-4">Trends</span></h3>
                                            <div class="d-flex
                                                justify-content-around
                                                align-items-center p-0">
                                                <div>
                                                    <p>#trend1</p>
                                                </div>
                                                <div>
                                                    <p>1500+</p>
                                                </div>
                                            </div>

                                            <div class="d-flex
                                                justify-content-around
                                                align-items-center p-0">
                                                <div>
                                                    <p>#trend1</p>
                                                </div>
                                                <div>
                                                    <p>1500+</p>
                                                </div>
                                            </div>
                                            <div class="d-flex
                                                justify-content-around
                                                align-items-center p-0">
                                                <div>
                                                    <p>#trend2</p>
                                                </div>
                                                <div>
                                                    <p>1600+</p>
                                                </div>
                                            </div>
                                            <div class="d-flex
                                                justify-content-around
                                                align-items-center p-0">
                                                <div>
                                                    <p>#trend3</p>
                                                </div>
                                                <div>
                                                    <p>1700+</p>
                                                </div>
                                            </div>
                                            <div class="d-flex
                                                justify-content-around
                                                align-items-center p-0">
                                                <div>
                                                    <p>#trend4</p>
                                                </div>
                                                <div>
                                                    <p>1800+</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card pt-3 mt-2 px-3"
                                            style="
                                            background-color: rgb(245, 221,
                                            66);">
                                            <h3> <span type="button"
                                                    class="badge
                                                    bg-secondary mx-2">Trending
                                                    News</span></h3>
                                            <div class="card mb-3 mt-2"
                                                style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img
                                                            src="./images/news.jpg"
                                                            class="img-fluid
                                                            rounded-start"
                                                            alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h6
                                                                class="card-title">Today
                                                                is hot in new
                                                                yark. It's 40C
                                                                temperature.</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-3 mt-2"
                                                style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img
                                                            src="./images/news.jpg"
                                                            class="img-fluid
                                                            rounded-start"
                                                            alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h6
                                                                class="card-title">Today
                                                                is hot in new
                                                                yark. It's 40C
                                                                temperature.</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card mb-3 mt-2"
                                                style="max-width: 540px;">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img
                                                            src="./images/news.jpg"
                                                            class="img-fluid
                                                            rounded-start"
                                                            alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h6
                                                                class="card-title">Today
                                                                is hot in new
                                                                yark. It's 40C
                                                                temperature.</h6>
                                                        </div>
                                                    </div>
                                                </div>
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

                                <script>
                                    
                                    document.getElementById('msgarea').style.display = "none";
                                    function askQuestion()
                                    {
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