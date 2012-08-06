<?php
session_start();
require("twitteroauth/twitteroauth.php");  

// The TwitterOAuth instance  
    $twitteroauth = new TwitterOAuth('Yo3tqyBN0ZDK9GvwlWSEg', 'Uu3cvu0y5eyZ9vT8LPxqJCrzxf9Rxxwh9I6RSEWOTLM');  
    // Requesting authentication tokens, the parameter is the URL we will be redirected to  
    $request_token = $twitteroauth->getRequestToken('http://twololo.com/twitter_oauth.php');  
      
    // Saving them into the session  
    $_SESSION['oauth_token'] = $request_token['oauth_token'];  
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];  
      
    // If everything goes well..  
    if($twitteroauth->http_code==200){  
        // Let's generate the URL and redirect  
        $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']); 
        header('Location: '. $url); 
    } else { 
        // It's a bad idea to kill the script, but we've got to know when there's an error.  
        die('Something wrong happened.');  
    } 
?>