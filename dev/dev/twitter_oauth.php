<?php
session_start();
require("twitteroauth/twitteroauth.php");
require("includes.php");
$company_id = 0;
//require("includes.php"); 

//DBase::db_connect();

if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){  
        // We've got everything we need  
    } else {  
        // Something's missing, go back to square 1  
        header('Location: twitter_login.php');  
    }  
   
// TwitterOAuth instance, with two new parameters we got in twitter_login.php  
    $twitteroauth = new TwitterOAuth('4Mp7szLuKXjvwGrerkYCZw', 'qUYSzYYI26mgLj6RTmkzeTfZDzEb3V91BJx0IkwfJ24', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);  
    // Let's request the access token  
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']); 
    // Save it in a session var 
    $_SESSION['access_token'] = $access_token; 
    // Let's get the user's info 
    $user_info = $twitteroauth->get('account/verify_credentials'); 
    // Print user's info  
    $_SESSION['userInfo'] = $user_info;
   //print_r($user_info);  
    
    
    //User Handle
    
    mysql_connect('localhost', 'ideasafr_ica', 'ideasafr_ica');  
mysql_select_db('ideasafr_ideas'); 


    if(isset($user_info->error)){  
        // Something's wrong, go back to square 1  
        header('Location: twitter_login.php'); 
    } else { 
        // Let's find the user by its ID  
        $query = mysql_query("SELECT * FROM users WHERE oauth_provider = 'twitter' AND oauth_uid = ". $user_info->id);  
        $result = mysql_fetch_array($query);  
      
        // If not, let's add it to the database  
        if(empty($result)){  
            $query = mysql_query("INSERT INTO users (oauth_provider, oauth_uid, username, oauth_token, oauth_secret) VALUES ('twitter', {$user_info->id}, '{$user_info->screen_name}', '{$access_token['oauth_token']}', '{$access_token['oauth_token_secret']}')");  
	
	$user_id = mysql_insert_id();	
	mysql_query("insert into companies(user_id,date_added) values('$user_id',now())");
	$company_id = mysql_insert_id();
			
            $query = mysql_query("SELECT * FROM users WHERE id = " . mysql_insert_id());  
            $result = mysql_fetch_array($query);  
        } else {  
            // Update the tokens  
            $query = mysql_query("UPDATE users SET oauth_token = '{$access_token['oauth_token']}', oauth_secret = '{$access_token['oauth_token_secret']}' WHERE oauth_provider = 'twitter' AND oauth_uid = {$user_info->id}");  
        }  
      
        $_SESSION['id'] = $result['id']; 
		
		//companies registed by the user
		$companies = DBase::table_row_ids("companies where user_id = '{$_SESSION['id']}'");
	//print_r($companies[0]);	
		
        $company_id = ($company_id == 0) ? $companies[0] : $company_id; 
		
        $_SESSION['company_id'] = $company_id;
		
        $_SESSION['username'] = $result['username']; 
        $_SESSION['oauth_uid'] = $result['oauth_uid']; 
        $_SESSION['oauth_provider'] = $result['oauth_provider']; 
        $_SESSION['oauth_token'] = $result['oauth_token']; 
        $_SESSION['oauth_secret'] = $result['oauth_secret']; 
     
        header('Location: ./');  
    }  