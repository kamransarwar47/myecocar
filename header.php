<?php //session_start();

// SERVICE DE MAINTENANCE
// if ($_SESSION['debug'] != 1){ header("Location: /maintenance/"); die(); }

/*include_once('php/bdd_connexion.php');
include_once('php/redirect_link.php');

$panierClef = $_SERVER['REMOTE_ADDR'].'#'.time().'#'.rand(1000, 9999);
if (!empty($_COOKIE['mec_driver']))
  $mec_driver = $_COOKIE['mec_driver'];
else
  $mec_driver = hash('sha512', $panierClef); 
setcookie("mec_driver", $mec_driver, time()+(60*60*24*365), "/", $DOMAINE, false, true);

$bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
$dateString = (!empty($date) && is_numeric($date)) ? date("d/m/Y", intval($date)) : date("d/m/Y"); 
$pages = 0;
$time = time();*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Myecocar-La nouvelle génération de covoiturage</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap/offcanvas.css">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="assets/vendor/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/dzsparallaxer.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
  <link rel="stylesheet" href="assets/vendor/animate.css">
  <link rel="stylesheet" href="assets/vendor/jquery-ui/themes/base/jquery-ui.min.css">
  <link rel="stylesheet" href="assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="assets/vendor/hamburgers/hamburgers.min.css">
  

  <!-- Show / Copy Code -->
  <link rel="stylesheet" href="assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="assets/vendor/prism/themes/prism.css">
  <link rel="stylesheet" href="assets/vendor/custombox/custombox.min.css">


  <!-- CSS Unify -->
  <link rel="stylesheet" href="assets/css/unify-core.css">
  <link rel="stylesheet" href="assets/css/unify-components.css">
  <link rel="stylesheet" href="assets/css/unify-globals.css">


  <!-- CSS Customization -->
  <link rel="stylesheet" href="assets/css/custom.css">
  
</head>

<body>
  <main>
   <!-- Header -->
    <header id="js-header" class="u-header u-header--static u-header--toggle-section u-header--change-appearance" data-header-fix-moment="300">
      <!-- Top Bar -->
      <div class="u-header__section u-header__section--hidden u-header__section--dark g-bg-black g-transition-0_3 g-py-10">
        <div class="container">
          <div class="row flex-column flex-sm-row justify-content-between align-items-center text-uppercase g-font-weight-600 g-color-white g-font-size-12 g-mx-0--lg">
            <div class="col-auto">
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                    <i class="fa fa-tumblr"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                    <i class="fa fa-pinterest-p"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                    <i class="fa fa-google"></i>
                  </a>
                </li>
              </ul>
            </div>

            <div class="col-auto">
              <i class="fa fa-phone g-font-size-18 g-valign-middle g-color-primary g-mr-10 g-mt-minus-2"></i>
              8 800 1234 4321
            </div>

            <div class="col-auto">
              <i class="fa fa-clock-o g-font-size-18 g-valign-middle g-color-primary g-mr-10 g-mt-minus-2"></i>
              Mon-Fri: 9 AM - 5 PM
            </div>

            <div class="col-auto g-pos-rel">
              <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                <!-- language 
                <li class="list-inline-item g-mx-4">|</li>-->
                <li class="list-inline-item g-mx-4">
                  <a class="g-color-white g-color-primary--hover g-text-underline--none--hover" href="page-login-signup.php">Connexion</a>
                </li>
                <li class="list-inline-item g-mx-4">|</li>
                <li class="list-inline-item g-mx-4">
                  <a class="g-color-white g-color-primary--hover g-text-underline--none--hover" href="page-login-signup.php">Inscrivez-vous</a>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>
      <!-- End Top Bar -->

      <div class="u-header__section u-header__section--light g-bg-white-opacity-0_8 g-py-10" data-header-fix-moment-exclude="g-bg-white-opacity-0_8 g-py-10" data-header-fix-moment-classes="g-bg-white u-shadow-v18 g-py-0">
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
            </button>
            <!-- End Responsive Toggle Button -->

            <!-- Logo -->
            <a href="index.php" class="navbar-brand">
             <img src="assets/img/bg/logo-new.png" alt="Image Description">
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
              <ul class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
                <li class="nav-item g-mx-20--lg">
                  <a href="index.php" class="nav-link px-0">Accueil
                
              </a>
                </li>
                <li class="nav-item g-mx-20--lg active">
                  <a href="page-annonce.php" class="nav-link px-0">Proposer un trajet
                <span class="sr-only">(current)</span>
              </a>
                </li>
                <li class="nav-item g-mx-20--lg">
                  <a href="page-recherche-trajet.php" class="nav-link px-0">Rechercher
                
              </a>
                </li>
                <li class="nav-item g-mx-20--lg">
                  <a href="page-about.php" class="nav-link px-0">Qui sommes nous?
                 </a>
                </li>
              </ul>
            </div>
            <!-- End Navigation -->
          </div>
        </nav>
      </div>
    </header>
    <!-- End Header -->
