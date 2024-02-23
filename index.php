<?php
require('config.php');
require('dbConn.php');
require('tbNames.php');
require('functions.php');
require('modals.php');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $site_name; ?></title>
	<?php
	require('internalAssets.php');
	require('externalAssets.php');
	?>
</head>


<body class="homeBageBg">

	<div class="homePage">
		<div class="homePageHeader">
			<div class="title"><?php echo $site_name; ?></div>
			<div>

			</div>
			<div class="buttons">
				<button onclick="open_iframeOverlay('iframeOverlay_1','/~login-frame');">Login</button>
				<button onclick="open_iframeOverlay('iframeOverlay_1','/~register-frame');">Register</button>
			</div>
		</div>
		<div class="homePageBody">
			<div class="homePage_bannerPicture">
				<div>
					<div class="title"><?php echo $site_name; ?></div>
					<div class="subtitle">Treking made fun...</div>
					<div class="callToAction">
						<button>Get Started</button>
					</div>
				</div>
			</div>
		</div>
		<div class="homePageFooter">

		</div>
	</div>

	<?php
	require('internalAssetsFooter.php');
	?>
</body>

<?php

	if(isset($_GET['view'])){
		$view = $_GET['view'];
		if($view === 'login'){
			$reason = $_GET['reason'];
			if($reason === 'mustAuthenticate'){
				?>
				<script>
					open_iframeOverlay('iframeOverlay_1','/~login-frame?r=mA');
				</script>
				<?php
			}else{
				?>
				<script>
					open_iframeOverlay('iframeOverlay_1','/~login-frame');
				</script>
				<?php
			}
		}
	}

?>

</html>