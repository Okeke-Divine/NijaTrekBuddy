<?php
session_start();
require('../config.php');
require('../dbConn.php');
require('../tbNames.php');
require('../functions.php');
require('../modals.php');
// ------
require('authenticate.php');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $site_name; ?></title>
	<?php
	require('../internalAssets.php');
	require('../externalAssets.php');
	?>
</head>

<!-- <div class="leftHightline"></div> -->

<body class="mainappBg">

	<button class="mini-sidebar-controller" data-isToogled="false" id="minSideBarCont" onclick="toggleSidebar()"><i class="las la-bars"></i></button>

	<div class="appSidebarFixed">
		<!-- <div class="sideBarAppNameZone">
			<?php echo $site_name; ?>
		</div> -->
		<hr />
		<div class="sideBarLinkLister">
			<div class="sideBarLink active" onclick="xhrAppLoader('home');" id="home_linkButton">
				<div><i class="las la-home"></i></div>
				<div>Home</div>
			</div>
			<div class="sideBarLink" onclick="xhrAppLoader('create');" id="create_linkButton">
				<div><i class="las la-plus"></i></div>
				<div>Create</div>
			</div>
			<div class="sideBarLink" onclick="xhrAppLoader('discover');" id="discover_linkButton">
				<div><i class="las la-wifi"></i></div>
				<div>Discover</div>
			</div>
			<div class="sideBarLink" onclick="xhrAppLoader('profile','?view=me');" id="profile_linkButton">
				<div><i class="las la-user"></i></div>
				<div>My Profile</div>
			</div>
			<div class="sideBarLink" onclick="xhrAppLoader('settings');" id="settings_linkButton">
				<div><i class="las la-cog"></i></div>
				<div>Settings</div>
			</div>
			<div class="customHr1"></div>
			<div class="sideBarLink" onclick="logoutUser();">
				<div><i class="las la-sign-out-alt"></i></div>
				<div>Logout</div>
			</div>
		</div>
		<div class="sideBarHighLight">
		</div>
	</div>

	<div class="">
		<div class="appUiNavbar">
		</div>
		<div class="appBody" id="appBody">
			loading...
		</div>

	</div>

</body>

</html>
<?php
if(isset($_GET['page'])){
	$page = $_GET['page'];
	?>
		<script>
			xhrAppLoader('<?php echo $page; ?>');
		</script>
	<?php
}
?>