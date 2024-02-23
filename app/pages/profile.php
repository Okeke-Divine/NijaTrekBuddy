<?php require('__inherit.php'); ?>
<?php

$view = @$_GET['view'];
$view = (empty($view)) ? 'me' : $view;

if ($view === 'me') {
    $profile_UserId = $session_user_id;
} else {
    $profile_UserId = $view;
}

$verifyIfUserExist = mysqli_query($conn, "SELECT * FROM $usersTb WHERE user_id = '$profile_UserId'");
if (mysqli_num_rows($verifyIfUserExist) > 0) {
    while ($row = mysqli_fetch_array($verifyIfUserExist)) {
        $profile_userName = $row['username'];
        $profile_firstName = $row['firstname'];
        $profile_lastName = $row['lastname'];
        $profile_shoeSize = $row['shoeSize'];
        $profile_stateId = $row['state_id'];
        $profile_userPicture = $row['userPicture'];
        $profile_lastActivity = $row['lastActivity'];
        $profile_URL = $site_base_url."/links/user/@".$profile_userName;

        $profile_userState = "<i>unknow</i>";
        $getUserState = mysqli_query($conn, "SELECT * FROM $statesTb WHERE state_id = '$profile_stateId'");
        while ($row = mysqli_fetch_array($getUserState)) {
            $profile_userState = $row['state_name'];
        }

        $getGravatarById = mysqli_query($conn, "SELECT * FROM $gravatar_listTb WHERE gravatarId = '$profile_userPicture'");
        while ($row = mysqli_fetch_array($getGravatarById)) {
            $profile_userPicture_name = $row['gratarName'];
        }
    }
} else {
?>
    Sorry, the user does not exist.
<?php
    die();
}

?>
<div class="__user_coverPhoto"></div>
<div class="profileBody">

    <div class="profileHighlight">
        <div>
            <img src="/assets/images/Gravatar/<?php echo $profile_userPicture_name; ?>" />
        </div>
        <div class="userDetails">
            <div class="row">
                <div class="col">
                    <div class="detailsItem fullname">
                        <div><i class="las la-font"></i></div>
                        <div><?php echo $profile_firstName; ?> <?php echo $profile_lastName; ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="detailsItem">
                        <div>@</div>
                        <div><?php echo $profile_userName; ?></div>
                    </div>
                </div>
                <div class="col">
                    <div class="detailsItem">
                        <div><i class="las la-shoe-prints"></i></div>
                        <div><?php echo $profile_shoeSize; ?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="detailsItem">
                        <div><i class="las la-map-marker"></i></div>
                        <div><?php echo $profile_userState; ?></div>
                    </div>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </div>

    <div class="custom_hr_2">
        <div class="main"></div>
    </div>
    <div class="profile_middleZone">
        <button class="message">Message</button>
        <button class="link" onclick="swal.fire({title:'Profile Link',text:'<?php echo $profile_URL; ?>'});"><i class="las la-link"></i></button>
    </div>
    
    <div class="custom_hr_2">
        <div class="main"></div>
    </div>

    <div>

    </div>

</div>