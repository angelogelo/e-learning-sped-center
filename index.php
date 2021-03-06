<?php

  include 'includes/connection.php';

  $aboutus = $connection->query("SELECT * FROM about");
  $aboutusRow = $aboutus->fetch_array();

  $contactus = $connection->query("SELECT * FROM contact");
  $contactusRow = $contactus->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <title>Narciso R. Ramos Elementary School - SPED CENTER</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="webAssets/css/fontawesome.css">
    <link rel="stylesheet" href="webAssets/css/templatemo-seo-dream.css">
    <link rel="stylesheet" href="webAssets/css/animated.css">
    <link rel="stylesheet" href="webAssets/css/owl.css">
    <!-- Icon -->
    <link rel="icon" href="images/spedLogo.png">

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <h4>SPED CENTER <img src="images/spedLogo.png" style="border-radius: 50%;"></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active" style="font-size: 20px;"><b>Home</b></a></li>
              <li class="scroll-to-section"><a href="#features" style="font-size: 20px;"><b>Announcements</b></a></li>
              <li class="scroll-to-section"><a href="#about" style="font-size: 20px;"><b>About Us</b></a></li>
              <li class="scroll-to-section"><a href="#contact" style="font-size: 20px;"><b>Contact Us</b></a></li> 
              <li class="scroll-to-section"><div class="main-blue-button"><a href="login.php">LOGIN</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Abilities Outweigh Disabilities</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="webAssets/images/banner-right-image.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="features" class="features section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="features-content">
            <div class="row">
              <?php
                $announcement = $connection->query("SELECT * FROM announcement WHERE cms ='true'");
                while ($announcementRow = $announcement->fetch_array()) {
              ?>
              <div class="col-lg-3">
                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="first-number number">
                    <h6></h6>
                  </div>
                  <div class="icon"></div>
                  <h4><?= $announcementRow['title']; ?></h4>
                  <div class="line-dec"></div>
                  <p><?= $announcementRow['description']; ?></p>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
            <img src="webAssets/images/about-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="section-heading">
            <h2>About Us</h2>
          </div>
          <div class="row">
            <div class="col-lg-6 col-sm-6">
              <div class="about-item">
                <h4>Mission</h4>
                <h6><?= $aboutusRow['mission']; ?></h6>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="about-item">
                <h4>Vision</h4>
                <h6><?= $aboutusRow['vision']; ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                  <h6>Contact Us</h6>
                  <h2>Fill Out The Form Below To <span>Get</span> In <em>Touch</em> With Us</h2>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="row">
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-6">
                    <fieldset>
                      <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="contact-info">
                  <ul>
                    <li>
                      <div class="icon">
                        <img src="webAssets/images/contact-icon-01.png" alt="email icon">
                      </div>
                      <a href="#"><?= $contactusRow['email']; ?></a>
                    </li>
                    <li>
                      <div class="icon">
                        <img src="webAssets/images/contact-icon-02.png" alt="phone">
                      </div>
                      <a href="#"><?= $contactusRow['contact_no']; ?></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright ?? 2021
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="webAssets/js/owl-carousel.js"></script>
  <script src="webAssets/js/animation.js"></script>
  <script src="webAssets/js/imagesloaded.js"></script>
  <script src="webAssets/js/custom.js"></script>
</body>
</html>