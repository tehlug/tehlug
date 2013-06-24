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

				$page = 'contents/'.htmlentities($page).'.php';

				//Make sure page is a subdir of contents
				$realpath = realpath($page);
				$contentsPath = realpath('./contents');

				if(substr($realpath, 0, strlen($contentsPath)) === $contentsPath)
                    if(file_exists($page)) {
                        include($page);
                        $included = true;
                    }
				?>
			</div>

			<div class="clear"></div>


			<div id="footer">
				<?php
                    if(isset($included)) {
                        $time = filemtime($page);
                        echo 'Updated: $Date: '.date('Y/m/d H:i:s', $time).' IRST $';
                    }
				?>
			</div>
			<!-- Piwik -->
			 <script type="text/javascript">
			  var pkBaseURL = (("https:" == document.location.protocol) ? "https://tehlug.org/stats/" : "http://tehlug.org/stats/");
			   document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
			    </script><script type="text/javascript">
			     try {
			      var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
			       piwikTracker.trackPageView();
			        piwikTracker.enableLinkTracking();
				 } catch( err ) {}
				  </script><noscript><p><img src="http://tehlug.org/stats/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
			   <!-- End Piwik Tracking Code -->
	</body>
</html>
