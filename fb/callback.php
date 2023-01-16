<?php

session_start();
$fb = new Facebook\Facebook([
  'app_id' => '553741543315941',
  'app_secret' => '275bc22d139568b5f53d2a188fd996f5',
  'default_graph_version' => 'v2.5',
]);  
  
$helper = $fb->getRedirectLoginHelper();  
  
try 
{  
  $accessToken = $helper->getAccessToken();  
} catch(Facebook\Exceptions\FacebookResponseException $e) {  

  echo 'Graph returned an error: ' . $e->getMessage();  
  exit;  
} catch(Facebook\Exceptions\FacebookSDKException $e) {

  echo 'Facebook SDK returned an error: ' . $e->getMessage();  
  exit;  
}  


try 
{
  $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken->getValue());

} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'ERROR: Graph ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'ERROR: validation fails ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();

echo "Full Name: ".$me->getProperty('name')."<br>";
echo "Email: ".$me->getProperty('email')."<br>";
echo "Facebook ID: <a href='https://www.facebook.com/".$me->getProperty('id')."' target='_blank'>".$me->getProperty

('id')."</a>";

$_SESSION['fb_id']     = $me->getProperty('id');
$_SESSION['user_name'] = $me->getProperty('name');
$_SESSION['email'] = $me->getProperty('email');

checkuser($conn, $_SESSION['fb_id'], $_SESSION['user_name'], $_SESSION['email']);
header("Location: index.php");

?>