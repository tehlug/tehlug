<html>
	<head>
		<title>Tehran Linux Users Group</title>

		<meta http-equiv="content-type" content="text-html; charset=UTF-8" />
		<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/style.css" />
		<link rel="alternate" type="application/rss+xml" href="<?php echo Yii::app()->createUrl('/news/rss');?>" />
		<link rel="icon" href="images/favicon.png" />
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="menu_container">
					<ul id="menu">
						<?php foreach($this->menu as $uri => $title) { ?>
							<li>
								<a href="<?php echo Yii::app()->createUrl($uri); ?>"><?php echo $title; ?></a>
							</li>
						<?php } ?>
					</ul>

					<div id="search_box">
						<form action="index.php?page=search" method="POST">
							<input type="text" name="keywords" value="<?php if(isset($_POST['keywords'])) { echo $_POST['keywords']; } ?>" />
							<input type="submit" name="submit" value="جستجو" />
						</form>
					</div>
				</div>
			</div>
			<?php if(!Yii::app()->user->isGuest) { ?>
				<div id="logout" class="orange">
					<a href="<?php echo Yii::app()->createUrl('/member/logout');?>">
						<?php echo Yii::t('member', 'Hi :name. Click to logout.', Array(':name' => Yii::app()->user->name)); ?>
					</a>
				</div>
			<?php } ?>

			<div id="content">
				<?php echo $content; ?>
			</div>
	</body>
</html>