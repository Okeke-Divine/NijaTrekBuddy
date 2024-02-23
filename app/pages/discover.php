<?php require('__inherit.php'); ?>
<div class="pageCoverBg">
    <div class="cogIcon">
        <div><i class="las la-wifi"></i></div>
    </div>
    <div class="settings_bannerText">
        <h4>Discover</h4>
        <i>...explore the app</i>
    </div>
</div>
<div class="app_discover">

    <div class="searchZone">
        <div class="searchDiv">
            <div class="searchContainer">
                <input type="search" placeholder="Search by users, visual cabs, etc..." />
                <div><i class="las la-search"></i></div>
            </div>
        </div>
        <div class="filter_container">
            <div class="">
                <i class="las la-cog"></i>
            </div>
        </div>
    </div>

    <div class="custom_hr_2">
        <div class="main"></div>
    </div>

    <div class="app_categories">

        <div class="app_categories_head">
            <div class="title">Users</div>
            <div class="viewAll">View All</div>
        </div>

        <div class="app_categories_list">

            <?php

            $discoverUsers = mysqli_query($conn, "SELECT * FROM $usersTb WHERE user_id != '$session_user_id' LIMIT 10");
            while ($row = mysqli_fetch_array($discoverUsers)) {
                $profile_userPicture = $row['userPicture'];
                $profile_userName = $row['username'];
                $profile_firstName = $row['firstname'];
                $profile_lastName = $row['lastname'];
                $profile_stateId = $row['state_id'];
                $profile_userId = $row['user_id'];

                $profile_userState = "<i>unknow</i>";
                $getUserState = mysqli_query($conn, "SELECT * FROM $statesTb WHERE state_id = '$profile_stateId'");
                while ($row = mysqli_fetch_array($getUserState)) {
                    $profile_userState = $row['state_name'];
                }

                $getGravatarById = mysqli_query($conn, "SELECT * FROM $gravatar_listTb WHERE gravatarId = '$profile_userPicture'");
                while ($row = mysqli_fetch_array($getGravatarById)) {
                    $profile_userPicture_name = $row['gratarName'];
                }
            ?>
                <div>
                    <div class="discover_user_card" onclick="xhrAppLoader('profile','?view=<?php echo $profile_userId; ?>');">
                        <div class="imageZone">
                            <img src="/assets/images/Gravatar/<?php echo $profile_userPicture_name; ?>">
                        </div>
                        <div class="detailsZone">
                            <div><?php echo $profile_firstName; ?> <?php echo $profile_lastName; ?></div>
                            <div>@<?php echo $profile_userName; ?></div>
                            <div><?php echo $profile_userState; ?></div>
                        </div>
                    </div>
                </div>
            <?php
            }

            ?>

        </div>

    </div>

</div>

<br /><br />