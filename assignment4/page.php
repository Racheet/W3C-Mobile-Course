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
  <title><?php echoSwitch('Desktop Page', 'Mobile Page'); ?></title>
  <link rel="canonical" href="<?php echo $full_path; ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echoSwitch('screen_styles', 'mobile_styles'); ?>.css" />
</head>
<body>
<p id="mob_switch"><a href="<?php echo $current_file['basename']; ?>?m=<?php echoSwitch('1', '0'); ?>"><?php echoSwitch('Mobile View', 'Desktop View'); ?></a> (changes will become definitive after a delay of <?php echo $maxage; ?> seconds or a reload of the page)</p>
<h1><?php echoSwitch('Desktop', 'Mobile'); ?> Presentation</h1>
<p>This static page represents the <?php echoSwitch('desktop', 'mobile'); ?> presentation of the resource available at <?php echo $full_path; ?>.</p>
<?php
echoSwitch(
<<<DESKTOP

<h2>Content with quotation marks</h2>
<p id="sample">In 'reprehenderit' in voluptate lorem ipsum dolor sit amet: "consectetur adipisicing elit". Ut aliquip ex ea commodo consequat. Sed do eiusmod tempor incididunt cupidatat non proident, in reprehenderit in voluptate. Ut enim ad minim veniam, ullamco laboris nisi mollit anim id est laborum.</p>
<p>Eu fugiat nulla pariatur. Duis aute irure dolor lorem ipsum dolor sit amet, sunt in culpa. Velit esse cillum dolore excepteur sint occaecat qui officia deserunt. Eu fugiat nulla pariatur. Duis aute irure dolor in reprehenderit in voluptate ullamco laboris nisi.</p>
<p>Ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, in reprehenderit in voluptate excepteur sint occaecat. Ut aliquip ex ea commodo consequat. Duis aute irure dolor ut enim ad minim veniam, ullamco laboris nisi.</p>

DESKTOP
,
<<<MOBILE

<h2>Content with quotation marks</h2>
<p id="sample">In 'reprehenderit' in voluptate lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut aliquip ex ea commodo consequat. Sed do eiusmod tempor incididunt cupidatat non proident, in reprehenderit in voluptate. Ut enim ad minim veniam, ullamco laboris nisi mollit anim id est laborum.</p>

MOBILE
); ?>
<p><a href="page2.php">PAGE 2</a></p>

<!-- Read this comment about placing content with quotation marks:

Take a look above at for instance in line 26 where is written 'Desktop Page' and 'Mobile Page'. The text Desktop Page will be presented on desktop and the text Mobile Page on mobile. If you replace that text with a larger block of content, then that is the content that wil be presented instead. If that contant contains single quotation marks, you are in trouble: the browser will read these as PHP instead of the HTML you mean it to be.

If content has been placed via the PHP HEREDOC-notation (see the section above with the header 'Content with quotation marks'), then that way quotation marks in the content won't pose a problem anymore. As you can see in that section, that does contain these single quotation marks.

The HEREDOC-notation is done by replacing the start quotation marks with what is written instead at line 36 and at the end at line 43.

It is not impossible to place content in PHP code that uses single quotation marks like in the sample at line 26. All you need to do is place one backslash before any single quotation mark inside the content like this Tim\'s. This will make the browser present the content correctly. It may be clear that using HEREDOC-notation instead for larger pieces of content, is safer.

Note that PHP may use double quotation marks instead of single ones. In that case an HTML attribute like an ID or a class may cause similar problems. You can solve this with a backslash before the double quotaton marks like this id=\"test\".

By the way: you may use the same HEREDOC notations as many times as you like in one page. So DESKTOP and MOBILE as markers don't need to be unique. You may also use just D instead of DESKTOP and just M instead of MOBILE, or another variation, that's up to you, just keep the syntax similar.

End of comment -->

</body>
</html>