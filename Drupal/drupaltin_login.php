<?php
   /*============================================================================*\  
   ||                               -= Drupaltin =-                              ||
   ||                                                                            ||
   || By Jordan Starcher                                                         ||
   || drupaltin_login.php -> /drupal/                                            ||
   || Engineered for Drupal 5.x & vB 3.6.x                                       ||
   || Project Version 5.x-1.0a                                                   ||
   || File Version 1.01                                                          ||
   || February 20, 2007                                                          ||
   || Release under the GPL license                                              ||
   ||                                                                            ||
   ||                                                                            ||
   ||                               Copyright ©2007                              || 
   ||                        http://www.TheOverclocked.com                       ||
   \*============================================================================*/

require_once('drupaltin_logout.php');
require_once($vb_main_dir . '/includes/drupaltin_config.php');
$connector = new DbConnector();
require_once('includes/bootstrap.inc');
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

if (!empty($_REQUEST['drupaltin_username']) && !empty($_REQUEST['drupaltin_password']) && !empty($_REQUEST['drupaltin_login_hash'])) {

$drupaltin_login_fetch = sprintf("SELECT created FROM users WHERE name = '%s'",
		mysql_real_escape_string($_REQUEST['drupaltin_username']));

$drupaltin_login_connect = $connector->query($drupaltin_login_fetch);
$drupaltin_login_created = mysql_fetch_row($drupaltin_login_connect);
$drupaltin_login_hash = sha1($drupaltin_login_created['0']);        
                   if ($drupaltin_login_hash === $_REQUEST['drupaltin_login_hash']) {
                       
                        user_authenticate($_REQUEST['drupaltin_username'], $_REQUEST['drupaltin_password']);

                        unset($_REQUEST['drupaltin_username'], $_REQUEST['drupaltin_password']);
                        return $drupaltin_login_hash;
                   } else {
                        echo "CAUGHT YOU! Stop trying to hack or you will be prosecuted. If you feel you've reached this message in error, <br />
                              please notify the Administrator.";
                        exit;
                   }
}
?>
