<?php
class Eker{
	private $auth =FALSE;
	private $user_is = NULL;
	
	public function authenticate($eker,$PIN){
		$sql = "select id from users where eker='$eker' and PIN='$PIN' limit 1";
		$result = mysql_query($sql);
		if(mysql_affected_rows()>0){
			$this->user_id = mysql_result($result,0,'id');
			$this->auth = TRUE;
		}
		return array($this->user_id,$this->auth);
		} 
	public function block(){
		$_COOKIE['unauthenticated_user'] = md5('blocked');
	}
}
?>