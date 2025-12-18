<?php 
session_start() ;
$user_id = $_SESSION['user_id'];

print_r($user_id);
require 'db.php';
require 'functions.php';

$articles = getUsersArticles($pdo, $user_id);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Wordify &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href=".\css\profile.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
<?php print_r($user_id);?>
    <div class="wrap">

      <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                <a href="#"><span class="fa fa-twitter"></span></a>
                <a href="#"><span class="fa fa-facebook"></span></a>
                <a href="#"><span class="fa fa-instagram"></span></a>
                <a href="#"><span class="fa fa-youtube-play"></span></a>
              </div>
              <div class="col-3 search-top">
                <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                <form action="#" class="search-top-form">
                  <span class="icon fa fa-search"></span>
                  <input type="text" id="s" placeholder="Type keyword to search...">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="index.html">Wordify</a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link" href="author.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Business</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <a class="dropdown-item" href="category.html">Lifestyle</a>
                    <a class="dropdown-item" href="category.html">Food</a>
                    <a class="dropdown-item" href="category.html">Adventure</a>
                    <a class="dropdown-item" href="category.html">Travel</a>
                    <a class="dropdown-item" href="category.html">Business</a>
                  </div>

                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="about.html">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->


    <section class="site-section pt-5">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-12 main-content">
            
<!--  **********************************  personal info **************************************-->
<div class="container">
        <div class="header">
            <h2>Personnel Information</h2>
            <p>Account Details</p>
        </div>

        <div class="info-row">
            <div class="label">Username</div>
            <div class="value">rihab</div>
        </div>

        <div class="info-row">
            <div class="label">Email</div>
            <div class="value">rihab@wordify.com</div>
        </div>

        <div class="info-row">
            <div class="label">Password</div>
            <div class="value password">••••••••••</div>
        </div>

        <div class="info-row">
            <div class="label">Account Created At</div>
            <div class="value">December 17, 2025</div>
        </div>

        <div class="info-row">
            <div class="label">Posts</div>
            <div class="value">
                <span class="posts-badge">5 Posts</span>
            </div>
        </div>
    </div><!--  **********************************  PSTS   **************************************-->
<div class="row mb-5 mt-5">
              <div class="col-md-12 mb-5">
                <h2>My Posts</h2>
              </div>


              <?php foreach($articles as $article){ ?>
                <div class="post-entry-horzontal">
                  <a href="blog-single.html">
                    <div class="image" style="background-image: url(images/img_10.jpg);"></div>
                    <span class="text">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"><?php echo $article['user_id'] ?></span>&bullet;
                        <span class="mr-2"><?php echo $article["created_at"] ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span><?php
                            $countComments = countComments($pdo, $article["_id"]);
                            echo $countComments;
                        ?></span>
                      </div>
                      <h2><?php echo $article["title"]   ?></h2>
                    </span>
                  </a>
                </div>
                <?php } ?>
                <!-- END post -->


<div class="articles-grid">
            <?php foreach($articles as $article){ ?>
            <article class="article-card">
                <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=800&h=400&fit=crop" alt="Article" class="article-image">
                <div class="article-content">
                    <div class="article-header">
                        <span class="category-badge"><?php echo $article['category_name'] ?></span>
                        <span class="status-badge published"><?php echo $article['status'] ?></span>
                    </div>
                    <h2 class="article-title"><?php echo $article["title"]   ?></h2>
                    <p class="article-text">
                        <?php echo $article['content'] ?>
                    </p>
                    <div class="article-footer">                        
                        <div class="comments-section">
                            <details>
                                <summary>
                                    <svg class="comment-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12c0 1.54.36 3 .97 4.29L2 22l5.71-.97C9 21.64 10.46 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm0 18c-1.38 0-2.68-.29-3.85-.81l-.35-.15-2.65.45.45-2.65-.15-.35C4.29 14.68 4 13.38 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8z"/>
                                    </svg>
                                    <span><?php
                                          $countComments = countComments($pdo, $article["_id"]);
                                          echo $countComments;
                                      ?> comments</span>
                                    <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M7 10l5 5 5-5z"/>
                                    </svg>
                                </summary>
                                <div class="comments-list">
                                    <div class="comment-item">
                                        <div class="comment-header">
                                            <span class="comment-user">Sarah Johnson</span>
                                            <button class="delete-btn" onclick="deleteComment(this)">Delete</button>
                                        </div>
                                        <p class="comment-content">Great article! These tips are really practical and easy to implement. I especially loved the part about focusing on customer retention.</p>
                                    </div>
                                    <div class="comment-item">
                                        <div class="comment-header">
                                            <span class="comment-user">Michael Chen</span>
                                            <button class="delete-btn" onclick="deleteComment(this)">Delete</button>
                                        </div>
                                        <p class="comment-content">Thanks for sharing this. The advice on building a strong team really resonated with me. We're implementing some of these strategies right now!</p>
                                    </div>
                                    <div class="comment-item">
                                        <div class="comment-header">
                                            <span class="comment-user">Emma Williams</span>
                                            <button class="delete-btn" onclick="deleteComment(this)">Delete</button>
                                        </div>
                                        <p class="comment-content">This is exactly what I needed to read today. Very insightful and motivating!</p>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </article>
          <?php } ?>


          </div>

          <!-- END main-content -->


        </div>
      </div>
    </section>
  
    <footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <h3>About Us</h3>
              <p class="mb-4">
                <img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid">
              </p>

              <p>Lorem ipsum dolor sit amet sa ksal sk sa, consectetur adipisicing elit. Ipsa harum inventore reiciendis. <a href="#">Read More</a></p>
            </div>
            <div class="col-md-6 ml-auto">
              <div class="row">
                <div class="col-md-7">
                  <h3>Latest Post</h3>
                  <div class="post-entry-sidebar">
                    <ul>
                      <li>
                        <a href="">
                          <img src="images/img_6.jpg" alt="Image placeholder" class="mr-4">
                          <div class="text">
                            <h4>How to Find the Video Games of Your Youth</h4>
                            <div class="post-meta">
                              <span class="mr-2">March 15, 2018 </span> &bullet;
                              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <img src="images/img_3.jpg" alt="Image placeholder" class="mr-4">
                          <div class="text">
                            <h4>How to Find the Video Games of Your Youth</h4>
                            <div class="post-meta">
                              <span class="mr-2">March 15, 2018 </span> &bullet;
                              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          <img src="images/img_4.jpg" alt="Image placeholder" class="mr-4">
                          <div class="text">
                            <h4>How to Find the Video Games of Your Youth</h4>
                            <div class="post-meta">
                              <span class="mr-2">March 15, 2018 </span> &bullet;
                              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-1"></div>
                
                <div class="col-md-4">

                  <div class="mb-5">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Travel</a></li>
                      <li><a href="#">Adventure</a></li>
                      <li><a href="#">Courses</a></li>
                      <li><a href="#">Categories</a></li>
                    </ul>
                  </div>
                  
                  <div class="mb-5">
                    <h3>Social</h3>
                    <ul class="list-unstyled footer-social">
                      <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                      <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                      <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                      <li><a href="#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                      <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                      <li><a href="#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>
  </body>
</html>