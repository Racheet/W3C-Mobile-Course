<?php
/*
* This script has been written by Alex Pot of SmartScripts (www.smartscripts.nl)
* The detection of $_GET['m'] and $_COOKIE['m'] is an adapted version of a script by Phil Archer (http://philarcher.org/diary/2011/mobilecontentandstyle/)
* The lightweight class for detection of mobile browsers can be found here: http://code.google.com/p/php-mobile-detect/
* You are free to adapt and use this script for your own projects, on the one condition that you keep these credits intact
*/

if (!isset($root)) {
	header("HTTP/1.0 404 Not Found"); //hide existence of this file
	die;
}

header("Vary: User-Agent, Accept");

//construct the base url (including the directory, but not the file name):
$base = "http://" . $_SERVER['SERVER_NAME'] . preg_replace("/[^\/]*(\?.*)?$/", "", $_SERVER['REQUEST_URI']);

$mobile_browser = 0;
$display_mode_changed = false;

if (isset($_GET['m']) && in_array($_GET['m'], Array("0", "1"))) { // We have a value directly from the user that we need to store
  setcookie('m', $_GET['m'], time()+$cookie_lifetime);	// Although we may already have a cookie, the value may
  $_COOKIE['m'] = $_GET['m'];						// have changed so we'll store it anyway. Also update $_COOKIE array.

  if ($_GET['m'] == "1")$mobile_browser++;

  $display_mode_changed = true;
}

elseif (isset($_COOKIE['m']) && $_COOKIE['m'] == "1") {// If we have a cookie set to 1 or if we have
  $mobile_browser++;								// just set it to 1, we want the mobile view
}

elseif (isset($_COOKIE['m']) && $_COOKIE['m'] == "0") { //forced Desktop View
  $mobile_browser = 0;
}

else {						// No indication of user preference
  include($root . "/inc/mobile_detection_class.php");	// include the detector script
  $detect = new Mobile_Detect();
  $mobile_browser = $detect->isMobile(); //returns 0 or 1
}		//OK, we're done. We know which version we want so let's return it


if (!$display_mode_changed)header("Cache-Control: max-age=" . $maxage);				// Set cache control before we go any further
else {
	//force a quicker refresh of (only) the current page after the visitor has changed the display mode manually:
	header("Expires: ".gmdate("D, d M Y H:i:s")." GMT"); // Always expired
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");// always modified
	header("Cache-Control: no-cache, must-revalidate, max-age=0");// HTTP/1.1
	header("Pragma: nocache");// HTTP/1.0
	header("Cache-Control: max-age=0"); //force refresh of this page
}

$current_file = pathinfo($file);
$full_path = $base . $current_file['basename'];

function echoDesk($text) {
	global $mobile_browser;
	if ($mobile_browser == 0 ) {
		echo $text;
	}
}

function echoMobile($text) {
	global $mobile_browser;
	if ($mobile_browser > 0 ) {
		echo $text;
	}
}

function echoSwitch ($desktoptext, $mobiletext) {
	global $mobile_browser;
	if ($mobile_browser > 0 ) {
		echo $mobiletext;
	}
	else echo $desktoptext;
}