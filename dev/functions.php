<?php
include_once 'classes/class.db.php';
function company_feeds($searchby_id,$field){
    if($searchby_id > 0 && strlen($field) > 1){
	$feeds = array();
	$activities = DBase::table_row_ids("company_activities where ".$field."_id = '$searchby_id'");
	$comments = DBase::table_row_ids("company_comments where ".$field."_id = '$searchby_id'");
	
	//
	foreach($activities as $activity_id){
		$activity = DBase::table_row($activity_id,'company_activities');
		$feeds[] = $activity['time_performed']."|".$activity['id']."|a";
	}
	foreach($comments as $comment_id){
		$comment = DBase::table_row($comment_id,'company_activities');
		$feeds[] = $comment['time_performed']."|".$comment['id']."|c";
	}
	rsort($feeds);
	
    }
	return $feeds;
}
//function get_feeds($id,$field){
//    $sql = "ACTIVITIES * FROM company_comments WHERE user_id ='$id'";
//    $fees = DBase::table_row_by_sql($sql);
//    echo mysql_error();
//    return $fees;
//}
/* function company_feeds($company_id){
	$feeds = array();
	$activities = DBase::table_row_ids("company_activities where company_id = '$company_id'");
	$comments = DBase::table_row_ids("company_comments where company_id = '$company_id'");
	
	//
	foreach($activities as $activity_id){
		$activity = DBase::table_row($activity_id,'company_activities');
		$feeds[] = $activity['time_performed']."|".$activity['id']."|a";
	}
	foreach($comments as $comment_id){
		$comment = DBase::table_row($comment_id,'company_activities');
		$feeds[] = $comment['time_performed']."|".$comment['id']."|c";
	}
	rsort($feeds);
	
	
	return $feeds;
} */


function is_user_company($user_id){
	$company = DBase::table_row_by_user_id('companies',$user_id);
	if(!empty($company)){
		return $company['id'];
		}else{
		return FALSE;
	}
}
function is_follower(){
	$startup = isset($_GET['startup'])? $_GET['startup']: 0;
	$user_id = $_SESSION['id'];
	$f = DBase::table_row_ids("company_followers where user_id = '$user_id' and company_id = '$startup'");
        if(!empty($f)){
		return TRUE;
		}else{
		return FALSE;
	}
}

/**
 * get the people, companies followed by a user
 * @param type $person_id
 * @return boolean 
 */
function get_following($person_id){
    (int)$person_id;
    $sql = "select * from company_followers where user_id = '$person_id'";
    DBase::db_connect();
    $rows = DBase::getBysql($sql);
    $items = array();
    if(!empty($rows) && $rows){
        foreach($rows as $row){
            $items[] = fetch_data($row , 'company'); 
        }
    }else{
        return false;
    }
    return $items;
}

function get_followers($person_id){
    (int)$person_id;
    $sql = "select * from user_followers where user_id = '$person_id'";
    DBase::db_connect();
    $rows = DBase::getBysql($sql);
    $items = array();
    if(!empty($rows) && $rows){
        foreach($rows as $row){
            $items[] = fetch_data($row, 'follower');
        }
    }else{
        return false;
    }
    return $items;
}

function fetch_data($row , $type){
    $item = new stdClass;
    $table = $type == 'company'?'companies':'users';
    $logo = $type == 'company'?'logo':'profilePic';
    $description = $type == 'company'?'description':'mini_bio';
    $row_field = $type == 'company'?'company_id':'follower_id';
    $thing = DBase::table_row($row[$row_field], $table);
    $item->type = $type;
    $item->name = $thing['name'];
    $item->logo = $thing[$logo];
    $item->id = $thing['id'];
    $item->description = $thing[$description];
    return $item;
}
function thumbtail_list($table,$icon){
	
	//table str
	
	$table_string = @split(' ',$table);
	$itemTable_strings = @split('_',$table_string[0]);
	
	$list_items = DBase::table_row_ids($table);
	$table_fields = DBase::db_tables_fields($table_string[0]);
	
	
	?>
	<ul class="thumbnails">
	<li style="margin:0"></li>
	<?php
	if(!empty($list_items)){
		
		foreach($list_items as $list_item_id){
			$item_relation = DBase::table_row($list_item_id,$table_string[0]);
			
			$itemTable = $itemTable_strings[1];
			$item_id = $item_relation[$table_fields[2]];
			
			$stats = count(DBase::table_row_ids($table_string[0]." where ".$table_fields[2]."='".$item_id."'"))." startups";
			
			if($table_string[0] == 'company_teams'){
				$item = DBase::table_row($list_item_id,$table_string[0]);
				}else{
				$item = DBase::table_row($item_id, $itemTable);
			}
			?>
			<li class='span5 thumbnail'>
			<span class='close  del_select' tbl="<?php echo $table_string[0]?>" vid="<?php echo $list_item_id?>" data-dismiss='alert' type='button'><i class='icon icon-remove'></i></span>
			<i class="icon icon-<?php echo $icon?>"></i> <?php echo $item['name']; /*print_r($item)*/?>
			<br/>
			<span class='greyed'><?php echo ($table_string[0] == 'company_teams')? 'Not confirmed' :$stats?></span><br/>
			</li>
			<?php
		}
		?>
		</ul>
		<?php
	}
}
?>