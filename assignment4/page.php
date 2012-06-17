<?php
/*
* This script has been written by Alex Pot of SmartScripts (www.smartscripts.nl)
* The detection of $_GET['m'] and $_COOKIE['m'] is an adapted version of a script by Phil Archer (http://philarcher.org/diary/2011/mobilecontentandstyle/)
* The lightweight class for detection of mobile browsers can be found here: http://code.google.com/p/php-mobile-detect/
* You are free to adapt and use this script for your own projects, on the one condition that you keep these credits intact
*/

//if your files are in the rootfolder of your site, $subdir has no value written between the quotation marks, like this ''; else you name the subdir, like so: '/namesubdir' (note it has a slash at the start, BUT NOT AT THE END!). This sample suggests to name the folder 'switch', this is the value used below. This is correct as long as the folder is placed in the root and not in a subfolder; else the value should be '/namesubfolder/switch'.
$subdir = ''; //change this according to the name of the folder your files are in (see also instruction above)
$cookie_lifetime = 60*60*24*30; //you may change the numbers: sec x min x hrs x days = how long (in seconds) must the cookie with the user preference persist?
$maxage = 60; //this is the value (in seconds) for the max-age header that the switcher-script sends. This time will determine how long the version op the page in your browser cache will stay unrefreshed. Note: changes in the user preference for the lay-out will only become definitive after this number of seconds.

//==================== DON'T CHANGE PHP VARIABLES BELOW THIS LINE ==========================

$root = $_SERVER['DOCUMENT_ROOT'] . $subdir;
$file = __FILE__;

//include required by the mobile-desktop switch script:
include($root . '/inc/switcher.php');
?>
<!doctype html>
<!-- Conditional comment for mobile ie7 blogs.msdn.com/b/iemobile/ -->
<!--[if IEMobile 7 ]>    <html class="no-js iem7" lang="en"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <title>Racheet Dave</title>
  <link rel="canonical" href="<?php echo $full_path; ?>" />
  <meta name="description" content="The personal homepage of Racheet Dave, digital marketer, web analyst and technologist">

  <!-- Mobile viewport optimization h5bp.com/ad -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width">

  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">

  <!-- more tags for your 'head' to consider h5bp.com/d/head-Tips -->

  <!-- Main Stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/<?php echoSwitch('base.css', 'base-mobile.css'); ?>">
  <link rel="stylesheet" type="text/css" href="css/enhanced.css" media="all and (min-width: 600px)" />
  <link rel="stylesheet" type="text/css" href="css/desktop.css" media="all and (min-width: 1080px)" />
 
  <!--[if lt IE 9 & !IEMobile]>

	<link rel="stylesheet" type="text/css" href="css/enhanced.css" />
	<link rel="stylesheet" type="text/css" href="css/desktop.css" />

  <![endif]--> 
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
  
  <script>
      var _gaq=[["_setAccount","UA-32389030-1"],["_trackPageview"]];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
      g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
      s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>
  
  <script type="text/javascript" src="http://use.typekit.com/ywl7kqk.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body>
<div id="container" class="clearfix">
    <header class="cleafix">
        <nav class="clearfix"><ul>
        <li><a href="index.php">Home<?php echoSwitch(' <em>The Quick Sell</em>', ''); ?> </a></li>
        <li><a href="work.php">Work<?php echoSwitch(' <em>My Working Self</em>', ''); ?></a></li>
        <li><a href="play.php">Play<?php echoSwitch(' <em>Living the Dream</em>', ''); ?></a></li>
        </ul></nav>
        <div>
        <p>Hello, I'm <em>Racheet</em></p>
        <h1 class="subhead">I'm <em>passionate</em> about data driven marketing</h1>
        </div>
     </header>
    <div id="main" role="main">
    <div id="top-content">
		<?php echoSwitch('<img class="pullout-image" src="img/dalektea.jpg" alt="A picture of a Dalek offering tea" width="325px" height="400px"/>', '<img class="pullout-image" src="img/dalektea-tiny.jpg" alt="A picture of a Dalek offering tea" width="120px" height="148px"/>'); ?>
		<p>It's not the only thing I'm passionate about. I'm also passionate about Daleks, vegetarian food, swordplay and taking long evening walks through the English countryside.
        <p>Most of all though, I'm passionate about data driven marketing.</p>
        <p>I believe it's important that marketers use evidence to support their decisions. I believe access to good data is empowering, it provides people with the context they need to make good decisions. </p>
        <p>I work as a web analyst, helping my clients to gain the most use they can from the data they have. Perhaps I can help you.</p>
    </div>
    <div id="bottom-content" class="clearfix">
    
    <div class="box-out clearfix">
    <h2>Books I've Read</h2>
    <dl class="clearfix">
    <div>
    <dt><cite><a href="http://www.amazon.co.uk/The-Visual-Display-Quantitative-Information/dp/0961392142/">The Visual Display of Quantitative Information</a></cite> by Edward Tufte.</dt>
    <dd>This book is a classic, and is the most comprehensive review of data presentation best practice currently available. It left me with plenty to think about and use in my day to day work.</dd>
    </div>
    <div>
    <dt><cite><a href="http://www.amazon.co.uk/Show-Me-Numbers-Designing-Enlighten/dp/0970601999/">Show Me the Numbers</a></cite> by Stephen Few</dt>
    <dd>Stephen sets out in this book to expand on Tufte's principles and apply them to business data, and he does so magnificently.</dd>
    </div>
    <div>
    <dt><cite><a href="http://www.amazon.co.uk/Web-Analytics-An-Hour-Day/dp/0470130652/">Web Analytics: an Hour a Day</a></cite> by Avinash Kaushik</dt>
    <dd>Avinash does a great job of covering the fundamentals of web analytics practice. This is a great book to read if you want to really understand the nuts and bolts of good analytics practice.</dd>
    </div>
    </dl>
    
    </div>
    
    <div class="box-out center clearfix">
    <h2>Blogs I Follow</h2>
    <dl class="clearfix">
    <div>
    <dt><cite><a href="http://www.marginhound.com">Marginhound</a></cite> Thoughts on Python, R, and Open Source Analytics</dt>
    <dd>This blogger has held positions as an analyst, a marketing strategist and as an analytics coder. He doesn't blog often, but when he does, I listen.</dd>
    </div>
    <div>
    <dt><cite><a href="http://adam.webanalyticsdemystified.com/">Adam Greco</a></cite> on Web Analytics Demystified</dt>
    <dd>Adam is one of the biggest names in the Web Analytics community. I've found his deep knowledge of SiteCatalyst implementation techniques invaluable during my work.</dd>
    </div>
    <div>
    <dt><cite><a href="http://www.kaushik.net/avinash">Occam's Razor</a></cite> by Avinash Kaushik</dt>
    <dd>A period spent working your way through the back catalogue of Occam's Razor is basically mandatory to be a modern web analyst.</dd>
    </div>
    </dl>
    </div>
    
    <div class="box-out clearfix">
    <h2>My Friends' Websites</h2>
    <dl class="clearfix">
    <div>
    <dt><a href="http://ianrenton.com/">Ian Renton</a></dt>
    <dd><p>Ian is a UX designer I've known since my university days.</p> <p>I love his simple and playful site design for its focus on high background/text contrast for great usability.</p></dd>
    </div>
    <div>
    <dt><a href="http://www.westministerhubble.com">Westminister hubble</a></dt>
    <dd>A project of Ian's, this website aggregates all the web activity for each of Westminister's 650 MPs.</dd>
    </div>
    <div>
    <dt><a href="http://davoul.blogspot.co.uk/p/whos-that-what.html">Who's-that-what?</a> by David Mumford</dt>
    <dd>The personal blog of my artist friend. He runs it as a three-times-a-week competition where he draws a character and asks his readers to guess who it is.</dd>
    </div>
    </dl>
    </div>
    </div>
    </div>
    <footer>
        <nav><ul>
        <li><a id="linkedin" href="http://www.linkedin.com/profile/view?id=103970032">Find me on LinkedIn</a></li>
        <li><a id="github" href="https://github.com/Racheet">Fork me on Github</a></li>
        </ul></nav>
        <div>
		<p>All art by <a href="http://davoul.blogspot.co.uk/p/whos-that-what.html">David Mumford</a>, used with permission.</p>
		<p id="mobileview"><a href="<?php echo $current_file['basename']; ?>?m=<?php echoSwitch('1', '0'); ?>"><?php echoSwitch('Switch to Mobile View', 'Switch to Desktop View'); ?></a></p>
		</div>
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <?php echoSwitch('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write(\'<script src="js/libs/jquery-1.7.1.min.js"><\/script>\')</script>
  <script src="js/script.js"></script>', ''); ?>


</body>
</html>