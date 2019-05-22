<?php
session_start();
ini_set('display_errors', 1);
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;


$fb = new Facebook\Facebook([
  'app_id' => '1059071897590074',
  'app_secret' => '87b3ae96a005758780217cb2dc26c8cc',
  'default_graph_version' => 'v3.0',
]);

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']

  $response = $fb->get('/me?fields=id,name,picture', $accessToken);

  $user = $response->getGraphUser();
  //echo'<pre>';
  //print_r($user);
  //echo'</pre>';

  $_SESSION["id"]=$user['id'];
  $_SESSION["username"]=$user['name'];
  $_SESSION["picture"]=$user['picture']['url'];

  echo "<script type=\"text/javascript\">";
  echo "alert(\"Login สำเร็จเเล้วครับ\");";
  echo "window.location=\"3.php\"";
  echo "</script>";
}

?>
