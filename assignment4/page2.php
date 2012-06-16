<?php
/*
* This script has been written by Alex Pot of SmartScripts (www.smartscripts.nl)
* The detection of $_GET['m'] and $_COOKIE['m'] is an adapted version of a script by Phil Archer (http://philarcher.org/diary/2011/mobilecontentandstyle/)
* The lightweight class for detection of mobile browsers can be found here: http://code.google.com/p/php-mobile-detect/
* You are free to adapt and use this script for your own projects, on the one condition that you keep these credits intact
*/

//if your files are in the rootfolder of your site, $subdir has no value written between the quotation marks, like this ''; else you name the subdir, like so: '/namesubdir' (note it has a slash at the start, BUT NOT AT THE END!). This sample suggests to name the folder 'switch', this is the value used below. This is correct as long as the folder is placed in the root and not in a subfolder; else the value should be '/namesubfolder/switch'.
$subdir = '/switch'; //change this according to the name of the folder your files are in (see also instruction above)
$cookie_lifetime = 60*60*24*30; //you may change the numbers: sec x min x hrs x days = how long (in seconds) must the cookie with the user preference persist?
$maxage = 60; //this is the value (in seconds) for the max-age header that the switcher-script sends. This time will determine how long the version op the page in your browser cache will stay unrefreshed. Note: changes in the user preference for the lay-out will only become definitive after this number of seconds.

//==================== DON'T CHANGE PHP VARIABLES BELOW THIS LINE ==========================

$root = $_SERVER['DOCUMENT_ROOT'] . $subdir;
$file = __FILE__;

//include required by the mobile-desktop switch script:
include($root . '/inc/switcher.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
  "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title><?php echoSwitch('Desktop Page 2', 'Mobile Page 2'); ?></title>
  <link rel="canonical" href="<?php echo $full_path; ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echoSwitch('screen_styles', 'mobile_styles'); ?>.css" />
</head>
<body>
<p id="mob_switch"><a href="<?php echo $current_file['basename']; ?>?m=<?php echoSwitch('1', '0'); ?>"><?php echoSwitch('Mobile View', 'Desktop View'); ?></a> (changes will become definitive after a delay of <?php echo $maxage; ?> seconds or a reload of the page)</p>
<h1><?php echoSwitch('Desktop', 'Mobile'); ?> Presentation of page 2</h1>
<p>This static page represents the <?php echoSwitch('desktop', 'mobile'); ?> presentation of the resource available at <?php echo $full_path; ?>.</p>
<?php
echoSwitch(
<<<DESKTOP

<h2>Lorem Ipsum</h2>
<p>Eu fugiat nulla 'pariatur'. Ut aliquip ex ea commodo consequat. Ullamco laboris nisi sunt in culpa qui officia deserunt. Excepteur sint occaecat cupidatat non proident, ut enim ad minim veniam. In reprehenderit in voluptate sunt in culpa velit esse cillum dolore. Mollit anim id est laborum. Quis nostrud exercitation ut enim ad minim veniam, ut aliquip ex ea commodo consequat. Excepteur sint occaecat ut labore et dolore magna aliqua. Ut enim ad minim veniam, duis aute irure dolor velit esse cillum dolore. Ullamco laboris nisi ut labore et dolore magna aliqua. Excepteur sint occaecat sunt in culpa eu fugiat nulla pariatur. Ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt excepteur sint occaecat lorem ipsum dolor sit amet. Consectetur adipisicing elit, in reprehenderit in voluptate sunt in culpa. Sed do eiusmod tempor incididunt ullamco laboris nisi ut enim ad minim veniam.</p>

DESKTOP
,
<<<MOBILE

<h2>Lorem Ipsum</h2>
<p>Eu fugiat nulla 'pariatur'. Ut aliquip ex ea commodo consequat. Ullamco laboris nisi sunt in culpa qui officia deserunt. Excepteur sint occaecat cupidatat non proident, ut enim ad minim veniam. In reprehenderit in voluptate sunt in culpa velit esse cillum dolore. Mollit anim id est laborum. Quis nostrud exercitation ut enim ad minim veniam, ut aliquip ex ea commodo consequat.</p>

MOBILE
); ?>
<p><a href="page.php">HOME</a></p>
</body>
</html>