<?php
session_start();
require_once( 'Facebook/autoload.php' );

$fb = new Facebook\Facebook([
  'app_id' => 'Put APP ID Here',
  'app_secret' => 'Put Secret Key Here',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions for more permission you need to send your application for review
$loginUrl = $helper->getLoginUrl('https://www.appface.com//callback.php', $permissions);
header("location: ".$loginUrl);

?>