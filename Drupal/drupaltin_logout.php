<?php
   /*============================================================================*\  
   ||                               -= Drupaltin =-                              ||
   ||                                                                            ||
   || By Jordan Starcher                                                         ||
   || drupaltin_logout.php -> /drupal/                                           ||
   || Engineered for Drupal 5.x & vB 3.6.x                                       ||
   || Project Version 5.x-1.0a                                                   ||
   || File Version 1.01                                                          ||
   || February 20, 2007                                                          ||
   || Release under the GPL license                                              ||
   ||                                                                            ||
   ||                              Copyright ©2007                               ||
   ||                       http://www.TheOverclocked.com                        ||
   \*============================================================================*/


////////////////////////////////////
//+------------------------------+//
//|  Define the path parameters  |//
//+------------------------------+//
////////////////////////////////////

// vBulletin server path
$vb_main_dir = '/var/www/forums.theoverclocked.com'; ## NO TRAILING SLASH

////////////////////////////////////////
//+----------------------------------+//
//|  END Define the path parameters  |//
//+----------------------------------+//
////////////////////////////////////////




//
// DO NOT EDIT BELOW THIS LINE UNLESS YOU KNOW WHAT YOU ARE DOING
///////////////////////////////////////////////////////////////////////













$drupaltin_cwd = getcwd();
chdir($vb_main_dir);
// ####################### SET PHP ENVIRONMENT ###########################
error_reporting(E_ALL & ~E_NOTICE);

// #################### DEFINE IMPORTANT CONSTANTS #######################
define('NO_REGISTER_GLOBALS', 1);
define('THIS_SCRIPT', 'login');

// ################### PRE-CACHE TEMPLATES AND DATA ######################
$phrasegroups = array(

);

// ######################### REQUIRE BACK-END ############################
require_once('./global.php');
require_once(DIR . '/includes/functions_login.php');

// #######################################################################
// ######################## START MAIN SCRIPT ############################
// #######################################################################
if ($_REQUEST['do'] == 'logout')
{
process_logout();
}
chdir($drupaltin_cwd);
?>
