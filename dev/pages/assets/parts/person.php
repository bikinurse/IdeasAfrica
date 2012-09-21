<style type="text/css">
.ui-tooltip-content
{
    font-size: 1.2em;
    padding: 2px;
    background-color:#2E2E2E;
    width: 20em;
    color:#D8D8D8;
}
</style>
<?php
$person_id = 0;
$following = array();
$followers = array();
if (isset($_GET['person'])) {
    $person_id = $_GET['person'];
}

if ($person_id > 0) {
    $person = DBase::table_row($person_id, "users");
    $feeds = company_feeds($person['id'], 'user');
    $following = get_following($person_id);
    $followers = get_followers($person_id);
    //$feeds = implode('|', $feeds);
} else {
    ?>
    <div class="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Error!</strong> Oops Could not get the profile
    </div>  
<?php } ?>

<div id="person-profile" style="margin-top: 4em">
    <div class="row-fluid">
        <div class="span2">
            &nbsp;
            <?php
            //echo "<pre>";
            //print_r($person);
            //echo "</pre>";
            ?>
        </div>
        <div class="span1">
            <div class="thumbnail">
                <img src="<?= HOST . 'profilePic/' . $person['profilePic'] ?>"  alt="profile pic" />
            </div>  
        </div>
        <div class="span4">
            <h3><?= ucwords($person['name']) ?></h3>
            <i><?= $person['mini_bio'] ?></i>
            <p>
                Went to <?= $person['college'] ?> &middot; Works at <?= $person['work'] ?>
            </p>
        </div>
        <div class="span4">
        
            <a style="float:right" class="btn btn-primary btn-medium selector">
                Follow
            </a>
       
        </div>
    </div>

    <div style="height: 2.8em;  background-color: #dddeee;" class="row-fluid">
        <div class="span2">
            &nbsp;
        </div>
        <div style="margin-top: 1px;" class="span10">
            <ul  class="nav nav-tabs">
                <li class="active">
                    <a href="#">Overview</a>
                </li>
                <li><a href="#">Activity</a></li>
            </ul>
        </div>
        
    </div>
    <div class="row-fluid">
        <div class="span2">
            &nbsp;
        </div>
        <div class="span5 feeds">
            <h3>Feeds</h3>
            <hr>

            <?php if (!empty($feeds)){ ?>
                <ul class="thumbnails">
                    <?php foreach ($feeds as $feed): ?>
                        <li class="span1">
                            <a href="#"  class="thumbnail">
                                <img src="<?= HOST . 'profilePic/' . $person['profilePic'] ?>"  alt="profile pic" />
                            </a>
                        </li>  

                        <a title="<img style='float:left; padding:1px' height=100 src='<?=HOST?>/profilePic/<?=$person['profilePic']?>'/>
                            <?php echo "<b><font color=#FAFAFA>".ucwords($person['name'])."</font></b><p>".substr($person['mini_bio'],0,100)?>...<br><font size=2>Went to <?= $person['college'] ?>,<br>Works at <?= $person['work'] ?></font>"  href="?&person=<?= $person['id'] ?>"> <?= $person['name'] ?></a>
                        <?php
                        $item = explode('|', $feed);
                        if ($item[2] == 'a') {
                            $activity = DBase::table_row($item[1], "company_activities");
                            $activity_details = DBase::table_row($activity['activity_id'], "activities");
                            echo $activity_details['activity'] . " ";
                        } else {
                            $activity = DBase::table_row($item[1], 'company_comments');
                            $comments = $activity['comment'];
                        }
                        $company = DBase::table_row($activity['company_id'], "companies");
                        ?> 
                        <a title="<img style='float:left; padding:1px' height=100 src='<?=HOST?>/logos/<?=$company['logo']?>'/>
                            <?php echo "<p><b><font color=#FAFAFA>".ucwords($company['name'])."</font></b><p>".substr($company['description'],0,100)?><br >" href="?startup=<?= $company['id'] ?>"><?= $company['name']; ?> </a> <br />
                        <?php
                        if (isset($comments) && $comments!=null) {
                            echo $comments;
                        }
                        ?>

                        <p> <hr> </p>
                <?php endforeach; ?>
                </ul>
<?php } else { ?>
            <b>No Activities</b>
<?php } ?>

        </div>
        <div class="span3 well">
            <a class="btn  btn-medium">
                0<br /> Reviews
            </a>
            <a onclick="get_followers(<?=$person_id?>,0)" class="btn btn-medium">
                <?=count($followers)?><br />Followers
            </a>
            <a id="following" onclick="get_followers(<?=$person_id?>,1)" class="btn  btn-medium">
                <?=count($following)?><br/> Following
            </a>
            <hr>
               
            <div id="follow_details">
                
            </div>
             
        </div>
        <div class="span2">
            &nbsp;
        </div>
     

    </div>
</div>
</div>


