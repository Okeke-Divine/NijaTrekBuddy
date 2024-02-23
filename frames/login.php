<?php
require('../config.php');
require('../dbConn.php');
require('../tbNames.php');
require('../functions.php');
session_start();
$session_user_id = (int) @$_SESSION['session_user_id'];
if(!empty($session_user_id)){
	?>
	<script>
		window.parent.postMessage('userLoggedIn_success');
	</script>
	<?php
	die();
}
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
<body class="loginPageBg">
	<div class="loginPageContainer">
		<div class="title">Sign In</div>
		<hr />
		<form action="" method="POST">
			<?php 
				if(isset($_POST['userIdentifier'],$_POST['password'])){
					$userIdentifier = $_POST['userIdentifier'];
					$userIdentifier = mysqli_escape_string($conn,$userIdentifier);
					$password = $_POST['password'];
					///////
					$encrptedPswd = sha1(md5($password));
					@$remeberMe = @$_POST['remeberMe'];

					$authenticateUser = mysqli_query($conn,"SELECT * FROM $usersTb WHERE (username = '$userIdentifier' AND password = '$encrptedPswd') OR (email = '$userIdentifier' AND password = '$encrptedPswd')");
					if(mysqli_num_rows($authenticateUser) > 0){
						while($userRow = mysqli_fetch_array($authenticateUser)){
							$userId = (int) $userRow['user_id'];
							$_SESSION['session_user_id'] = $userId;
						}
						?>
						<div class="alert alert-success">
							Login Success. <br />
							<i>Redirecting you...</i>
						</div>
						<hr>
						<script>
							window.parent.postMessage('userLoggedIn_success');
						</script>
						<?php
					}else{
						?>
						<div class="alert alert-danger">
							Wrong login details. Please try again.
						</div>
						<hr>
						<?php
					}
					
				}else{
					if(isset($_GET['r'])){
						$r = $_GET['r'];
						if($r === 'mA'){
							?>
							<div class="alert alert-danger">
								Please login to continue.
							</div>
							<hr />
							<?php
						}
					}
				}
			?>
			<div class="ourInputGroup mb-3">
				<div>
					<input type="text" value="<?php echo @$_POST['userIdentifier']; ?>" placeholder="Username or Email" name="userIdentifier" required />
					<div><i class="las la-user"></i></div>
				</div>
			</div>
			<div class="ourInputGroup mb-3">
				<div>
					<input type="password" placeholder="Password" name="password" required />
					<div><i class="las la-lock"></i></div>
				</div>
			</div>
			<div class="mb-3">
				<div>
					<input type="checkbox" name="remeberMe" id="remeberMe" /> 
					<label for="remeberMe">Remeber me</label>
				</div>
			</div>
			<button class="buttonStyle1 customLoginButton">
				<i class="las la-angle-double-right"></i>
			</button>
		</form>
		<hr />
		<div class="loginLowerBanner">
			<div>New Here? <a href="#"/>Sign Up</a></div>
			<div><a href="#"/>Forgot Password</a></div>
		</div>
	</div>

</body>
</html>