<?php
$person_id = 0;
if (isset($_GET['person'])) {
    $person_id = $_GET['person'];
}

if ($person_id > 0) {
    $person = DBase::table_row($person_id, "users");
    $feeds = company_feeds($person['id'], 'user');
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
            <h3><?= $person['name'] ?></h3>
            <i><?= $person['mini_bio'] ?></i>
            <p>
                Went to <?= $person['college'] ?> &middot; Works at <?= $person['work'] ?>
            </p>
        </div>
        <div class="span4">
        
            <a style="float:right" class="btn btn-primary btn-medium">
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
        <div class="span5">
            <h3>Feeds</h3>
            <hr>

            <?php if (!empty($feeds)): ?>
                <ul class="thumbnails">
                    <?php foreach ($feeds as $feed): ?>
                        <li class="span1">
                            <a href="#" class="thumbnail">
                                <img src="<?= HOST . 'profilePic/' . $person['profilePic'] ?>"  alt="profile pic" />
                            </a>
                        </li>  

                        <a href="?&person=<?= $person['id'] ?>"> <?= $person['name'] ?></a>
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
                        <a href="?startup=<?= $company['id'] ?>"><?= $company['name']; ?> </a> <br />
                        <?php
                        if ($comments) {
                            echo $comments;
                        }
                        ?>

                        <p> <hr> </p>
                <?php endforeach; ?>
                </ul>
<?php endif; ?>


        </div>
        <div class="span3 well">
            <a class="btn  btn-medium">
                0<br /> Reviews
            </a>
            <a class="btn btn-medium">
                123<br />Followers
            </a>
            <a class="btn  btn-medium">
                98<br/> Following
            </a>
        </div>
        <div class="span2">
            &nbsp;
        </div>
    </div>
</div>

