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
        <h1 class="subhead">I provide <em>actionable</em> web analytics</h1>
        </div>
     </header>
    <div id="main" class="smaller-text" role="main">
    <div id="top-content">
		<?php echoSwitch('<img class="pullout-image" src="img/helper.jpg" alt="A picture of a flustered robot" width="277" height="684"/>', '<img class="pullout-image" src="img/helper-tiny.jpg" alt="A picture of a flustered robot" width="120" height="296"/>'); ?>
        <p>My job is to help people gain insight into their digital communications. I love to work with people, and I think it's important to help my clients learn the skills they need to own their own analytics.</p>
        <p>I specialise in providing training and consultancy to digital teams to help them expand their analytics capability.</p>
        <h2>Services I provide</h2>
        <p>I've done a lot of different types of work as an analyst, here are some of the types I'm good at:</p>
        <ul>
        <li>Analyst Coaching</li>
        <li>Campaign Evaluation</li>
        <li>A/B/n testing</li>
        <li>Email Marketing Analysis</li>
        <li>Conversion Optimisation</li>
        <li>KPI reporting</li>
        </ul>
        <h2>Tools I've used</h2>
        <p>I have plenty of experience working with industry standard web analytics software, and I've spent extensive time using:</p>
        <ul>
        <li>Google Analytics</li>
        <li>Adobe's Omniture SiteCatalyst</li>
        <li>Adobe's Omniture Discover</li>
        <li>Experian's Hitwise</li>
        <li>Cognesia's Intellitracker</li>
        </ul>
    </div>
	    <div id="bottom-content" class="clearfix">
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




</body>
</html>