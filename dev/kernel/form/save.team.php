<?php
session_start();
include_once('../../includes.php');
DBase::db_connect();


$name = trim($_POST['name']);
$email = trim($_POST['email']);
$team_id = trim($_POST['team_id']);
$company_id = $_SESSION['company_id'];

$t = md5('ta3M');

$company = DBase::table_row($company_id,'companies');
$team = DBase::table_row($team_id,'teams');

$sql = "insert into company_teams(company_id,name,email,team_id,date_added) values ('$company_id','$name','$email','$team_id',now())";
$result = mysql_query($sql);

$vid = mysql_insert_id();
/*×*/
if($result){
	//Send Confirmation Mail
	
	
	
	?>
	<li class='span5 thumbnail'>
	<span class='close remove_team' vid="<?php echo $vid?>" data-dismiss='alert' type='button'><i class='icon icon-remove'></i></span>
	<i class="icon icon-user"></i> <?php echo $name;?>
	<br/>
	<span class='greyed'>Not Confirmed</span><br/>
	</li>
	
	<?php
	
	
	//SEND CONFIRMATION MAIL
	
	$mail = new PHPMailer();
	
	//Your SMTP servers details
	
	$mail->IsSMTP();               // set mailer to use SMTP
	$mail->Host = "ideasafrica.com";  // specify main and backup server or localhost
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = "confirm@ideasafrica.com";  // SMTP username
	$mail->Password = "confirm"; // SMTP password
	//It should be same as that of the SMTP user
	
	$redirect_url = "http://".$_SERVER['SERVER_NAME']; //Redirect URL after submit the form
	
	$mail->From = $mail->Username;	//Default From email same as smtp user
	$mail->FromName = "Ideas Africa";
	
	$mail->AddAddress($email); //Email address where you wish to receive/collect those emails.
	
	$mail->WordWrap = 50;                                 		// set word wrap to 50 characters
	$mail->IsHTML(true);                                  		// set email format to HTML
	
	$mail->Subject = $company['name']." team confirmation";
	
	
	
	
	$mail_body = '	<html>
	<head>
	<title>Password Recovery</title>
	<style type="text/css">
	P, LI {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		text-align: justify;
		padding-right: 8px;
		padding-left: 5px;
		line-height: 16px;
	}
	.code{
		font-size: 20px;
	}
	</style>
	</head>
	<body bgcolor="#ffffff">
	
	Dear <b>'.$name.'</b>,<br/><br/>
	
	<p>Are you a <b>'.$company['name'].'</b> <b>'.$team['name'].'</b>?</p>
	
	Click  on <a href="http://dev.ideasafrica.com/?&vid='.$vid.'&t='.$t.'">http://dev.ideasafrica.com/?&vid='.$vid.'&t='.$t.'</a></span>
	
	<p>mail to confirm@ideasafrica.com</p>
	<br/><br/>
	</body>
	</html>
	';
	
	
	$mail->Body = $mail_body;
	
	if(!$mail->Send()){
		echo "Mail could not be sent. <p>";
		echo "Mailer Error: " . $mail->ErrorInfo;
		exit;
		}else{
		echo $code;
		
	}
	
	}else{
	?>
	<li class="span5">
	<div class="alert alert-error">
	<span class='close' vid="" data-dismiss='alert' type='button'><i class='icon icon-remove'></i></span>
	<i class="icon icon-warning-sign"></i> Error while saving data
	</div>
	</li>
	<?php
}
?>
<script type="text/javascript">
//<!--
$(function(){
	$(".remove_team").bind('click',function(){
		var vid = $(this)[0].getAttribute('vid');
		var tbl = 'company_teams';
		
		$.ajax({
			url:"kernel/delete.php",
			type:"POST",
			data:"vid="+vid+"&tbl="+tbl
			});
		$('#'+vid+'_'+tbl).fadeOut('slow');
		});
	});
//-->
</script>