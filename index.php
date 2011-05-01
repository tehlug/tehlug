<?php
include_once('functions.php');
?>
<html>
	<head>
		<title>Tehran Linux Users Group</title>

		<meta http-equiv="content-type" content="text-html; charset=UTF-8" />
		<link rel="stylesheet" href="style.css" />
		<link rel="alternate" type="application/rss+xml" href="rss.php" />
		<link rel="icon" href="images/favicon.png" />
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="menu_container">
					<?php
					include('menu.php');
					?>

					<div id="search_box">
						<form action="index.php?page=search" method="POST">
							<input type="text" name="keywords" value="<?php if(isset($_POST['keywords'])) { echo $_POST['keywords']; } ?>" />
							<input type="submit" name="submit" value="جستجو" />
						</form>
					</div>
				</div>
			</div>

			<div id="content">
				<?php
				$page = (isset($_GET['page'])) ? $_GET['page'] : "front";

				$page = 'contents/'.$page.'.php';
				include($page);
				?>
			</div>

			<div class="clear"></div>


			<div id="footer">
				<?php
					$time = filemtime($page);
					echo 'Updated: $Date: '.date('Y/m/d H:i:s', $time).' $';
				?>
			</div>
	</body>
</html>