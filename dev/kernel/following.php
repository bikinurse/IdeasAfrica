<?php

include '../includes.php';
/* get the name of the base url */
$host = $_SERVER['HTTP_HOST'] == 'localhost' ? 'http://' . $_SERVER['HTTP_HOST'] . '/dev/' : $_SERVER['HTTP_HOST'];

!defined('HOST') ? define('HOST', $host) : '';
$following = array();
$followers = array();
$query = (int)$_POST['type'];//type of query (following or followers)
$person_id = (int) $_POST['id'];

if($query > 0){
$following = get_following($person_id);
if (!empty($following) && is_array($following)):
    $logo = 'no-logo.png';
    foreach ($following as $item):
        if (strlen($item->logo) > 0):
            $logo = $item->logo;
        else:
            $logo = 'no-logo.png';
        endif;
        echo '<div class="span3">';
        echo '<a class="thumbnail" title="' . $item->name . '" href="?startup=' . $item->id . '">';
        echo '<img src="' . HOST . 'logos/' . $logo . '" /></a>';
        echo '</div> ';

    endforeach;
else:
    echo "No one is following ";
endif;
}else{
$followers = get_followers($person_id);

if (!empty($followers) && is_array($followers)):
    $logo = 'no-logo.png';
    foreach ($followers as $item):
        if (strlen($item->logo) > 0):
            $logo = $item->logo;
        else:
            $logo = 'no-logo.png';
        endif;
        echo '<div class="span3">';
        echo '<a class="thumbnail" title="' . $item->name . '" href="?person=' . $item->id . '">';
        echo '<img src="' . HOST . 'profilePic/' . $logo . '" /></a>';
        echo '</div> ';

    endforeach;
else:
    echo "No followers";
endif;

}


?>          


