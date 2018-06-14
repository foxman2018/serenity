<?php

  session_start();

  error_reporting(E_ALL);
  ini_set('display_errors', 'on');

  // Find Page Url and extract Page Name

  $url = $_SERVER['REQUEST_URI'];
  $pageUrl = str_replace('/Serenity/', '', $url);
  $pageName = str_replace('.php', '', $pageUrl);
  $pageTitle = str_replace('-', ' ', $pageName);

?>

<html>
<head>
<title>Serenity
  <?php

    // Output Page Title as per URL

    if ($pageName !== "index") {
      echo '| '.ucwords($pageTitle);
    }

  ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/ico" href="img/favicon.png" />
<link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/normalize.css" rel="stylesheet" type="text/css">
<link href="css/skeleton.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<?php

// Check if user has selected an accent colour

if (isset($_SESSION['accent'])) {

$accent = $_SESSION['accent'];

?>

<style>

  .header-info, .header-info-mobile, .item-divider { background-color: <?php echo $accent; ?> ; }

  .title-header, .item-number, .package-number, .home-number, .footer-social i, .button:hover, .navbar ul li a:hover, .active, .top, button:hover, input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover, .button:focus, button:focus, input[type="submit"]:focus, input[type="reset"]:focus, input[type="button"]:focus { color: <?php echo $accent; ?> ; }

  .mobile nav ul ul { border-bottom: 3px solid #<?php echo $accent; ?> ; }

</style>

<?php

}

// Check if user has selected night mode

if (isset($_SESSION['textcolour'])) {

$textcolour = $_SESSION['textcolour'];

  if ($textcolour == "dark") { ?>

  <style>

    .header-info, .header-info-mobile, .header-info i, .header-info-mobile i, .header-info a, .header-info-mobile a { color: #333; }
    body { background-color: #111; color: #fff; }
    .opacity-screen, .mobile nav ul ul { background-color: #111; }
    .button, { color: #fff; }
    select { color: #333; }
    .logo-image .text, .footer-logo-image .text, .cls-1 .text { fill: #fff !important; opacity: 1; }
    h1, h2, h3, h4, h5, h6, p, a, span, nav ul li a { color: #fff; }
    .button, input[type="submit"], .top { color: <?php echo $accent; ?> ; }
    .mobile .navbar ul ul li:hover { background-color: #222; }
    #slider, .header-img { opacity: .6; }
    input[type="number"] { color: #000; }

  </style>


  <?php }

 } ?>

</head>

<body>

<div class="header-info">
  <div class="container">
    <div class="row">

        <?php

        // Check if user

          if(isset($_SESSION['id'])) { ?>

          <div class="six columns header-phone">
            Welcome <?php echo ucwords($_SESSION['name']); ?>!
          </div>
          <div class="six columns header-account">
            <a href="my-account.php">My Account</a>
            <a href="checkout.php"><i class="fa fa-shopping-cart"></i>

            <?php

            // Echo out a zero if no basket items

            if (isset($_SESSION['item-count'])) {

              echo $_SESSION['item-count'].' Items</a>';

            } else {

              echo '0 Items</a>';

            }

            ?>

            <a href="logout.php">Log Out</a>
          </div>

        <?php

        // Check if admin

        } else if (isset($_SESSION['admin-id'])) {

        ?>

        <div class="six columns header-phone">
          Admin Account :  <?php echo $_SESSION['admin-id']; ?>
        </div>
        <div class="six columns header-account">
          <a href="admin.php">Admin Panel</a>
          <a href="logout.php">Log Out</a>
        </div>

          <?php } else { ?>

          <div class="six columns header-phone">
            <i class="fa fa-phone"></i> (+353) 53 1234567 &nbsp; &nbsp;
            <i class="fa fa-envelope-o"></i> <a href="mailto:info@serenity.ie">info@serenity.ie</a>
          </div>
          <div class="six columns header-account">
            <a href="sign-in.php"><i class="fa fa-lock"></i>Sign In</a>
          </div>

        <?php  } ?>

    </div>
  </div>
</div>
<div class="header">
  <div class="container">
    <div class="row">
        <div class="three columns logo">
          <div class="logo-image">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 852.88 221.09"><defs><style>.cls-1{font-size:184.48px;fill:#333;font-family:Allura;}.text{fill:#111;opacity:1;}.cls-2{fill:#a1edff;}.cls-2,.cls-3,.cls-4,.cls-5,.cls-6{opacity:0.51;}.cls-3{fill:#e0e0ad;}.cls-4{fill:#ffd1b6;}.cls-5{fill:#e0a6e0;}.cls-6{fill:#a6d5e0;}</style></defs><title>Untitled-1</title><text class="cls-1 text" transform="translate(318.84 138.08)">Serenity</text><path class="cls-2" d="M221.39,391.16c32.67,18.37,38,37,29.74,51.67s-26.93,19.82-59.6,1.45-90.71-85.95-90.71-85.95S188.72,372.79,221.39,391.16Z" transform="translate(-100.82 -280.07)"/><path class="cls-3" d="M227.66,390.84c-31.48,20.34-35.64,39.27-26.5,53.4s28.1,18.12,59.58-2.22S346,350.65,346,350.65,259.14,370.49,227.66,390.84Z" transform="translate(-100.82 -280.07)"/><path class="cls-4" d="M256,404.82c0,37.48-13.64,51.24-30.47,51.24s-30.47-13.76-30.47-51.24,30.47-121.19,30.47-121.19S256,367.34,256,404.82Z" transform="translate(-100.82 -280.07)"/><path class="cls-5" d="M212.35,392.68c-19.18,32.2-14.5,51,0,59.62s33.22,3.77,52.4-28.44,35.83-119.71,35.83-119.71S231.53,360.48,212.35,392.68Z" transform="translate(-100.82 -280.07)"/><path class="cls-6" d="M236.54,392.68c19.18,32.2,14.5,51,0,59.62s-33.22,3.77-52.4-28.44-35.83-119.71-35.83-119.71S217.36,360.48,236.54,392.68Z" transform="translate(-100.82 -280.07)"/></svg>
         </div>
      </div>
      <div class="nine columns navbar">
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="locations.php">Locations</a></li>
            <li><a href="treatments.php">Treatments</a></li>
            <li><a href="shop.php">Shop</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="header-info mobile">
  <div class="container">
    <div class="row">

      <?php

      // Mobile header and navbar

        if(isset($_SESSION['id'])) { ?>

        <div class="twelve columns header-phone">
          Welcome <?php echo ucwords($_SESSION['name']); ?>!
        </div>
        <div class="twelve columns header-account-mobile">
          <a href="my-account.php">My Account</a>
          <a href="checkout.php"><i class="fa fa-shopping-cart"></i>

            <?php

            if (isset($_SESSION['item-count'])) {

              echo $_SESSION['item-count'].' Items</a>';

            } else {

              echo '0 Items</a>';

            }

            ?>

          <a href="logout.php">Log Out</a>
        </div>

        <?php } else if(isset($_SESSION['admin-id'])) { ?>

        <div class="six columns header-phone">
          Admin Account :  <?php echo $_SESSION['admin-id']; ?>
        </div>
        <div class="six columns header-account-mobile">
          <a href="admin.php">Admin Panel</a>
          <a href="logout.php">Log Out</a>
        </div>

        <?php } else { ?>

        <div class="twelve columns header-phone">
          <i class="fa fa-phone"></i> (+353) 53 1234567 &nbsp; &nbsp;
          <i class="fa fa-envelope-o"></i> <a href="mailto:info@serenity.ie">info@serenity.ie</a>
        </div>
        <div class="twelve columns header-account-mobile">
          <a href="sign-in.php"><i class="fa fa-lock"></i>Sign In</a>
        </div>

      <?php  } ?>

    </div>
  </div>
</div>
<div class="header mobile">
  <div class="container">
    <div class="row">
      <div class="twelve columns logo mobile">
        <div class="footer-logo-image">
          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 439.44 369.44"><defs><style>.cls-1{fill:#a1edff;}.cls-1,.cls-2,.cls-3,.cls-4,.cls-5{opacity:0.51;}.cls-1.text{fill:#111;opacity:1;}.cls-2{fill:#e0e0ad;}.cls-3{fill:#ffd1b6;}.cls-4{fill:#e0a6e0;}.cls-5{fill:#a6d5e0;}.cls-6{font-size:151.8px;font-family:Allura;}</style></defs><title>Untitled-2</title><path class="cls-1" d="M503.88,329.11c38.63,21.72,44.91,43.75,35.16,61.09s-31.84,23.43-70.47,1.71S361.32,290.3,361.32,290.3,465.25,307.4,503.88,329.11Z" transform="translate(-286.54 -201.98)"/><path class="cls-2" d="M511.29,328.73c-37.22,24.05-42.13,46.43-31.33,63.14s33.22,21.42,70.44-2.63,100.79-108,100.79-108S548.51,304.68,511.29,328.73Z" transform="translate(-286.54 -201.98)"/><path class="cls-3" d="M544.79,345.27c0,44.31-16.13,60.59-36,60.59s-36-16.27-36-60.59,36-143.28,36-143.28S544.79,301,544.79,345.27Z" transform="translate(-286.54 -201.98)"/><path class="cls-4" d="M493.19,330.92C470.51,369,476,391.22,493.13,401.4s39.28,4.45,62-33.62,42.37-141.54,42.37-141.54S515.86,292.84,493.19,330.92Z" transform="translate(-286.54 -201.98)"/><path class="cls-5" d="M521.78,330.92c22.68,38.07,17.15,60.31.05,70.49s-39.28,4.45-62-33.62-42.37-141.54-42.37-141.54S499.11,292.84,521.78,330.92Z" transform="translate(-286.54 -201.98)"/><text class="cls-6 text" transform="translate(0 301.13)">Serenity</text></svg>
        </div>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="twelve columns navbar mobile">
        <nav>
          <ul>
            <li>
              <a class="menu-trigger" href="#">Menu</a>
              <ul class="mobile-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="locations.php">Locations</a></li>
                <li><a href="treatments.php">Treatments</a></li>
                <li><a href="shop.php">Shop</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
