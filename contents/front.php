<div class="title">
	صفحه اصلی
</div>

<div class="dialog" style="float: right;">
	<div class="green box">
تهران‌لاگ چیست؟
	</div>

گروه کاربران گنو/لینوکس تهران یا «تهران‌لاگ» گروهی <b>مستقل</b> از کاربران کامپیوتر علاقه‌مند به <a href="http://www.gnu.org/gnu/linux-and-gnu.fa.html">گنو/لینوکس</a> ساکن تهران است. تم محوری جلسات تهران‌لاگ عبارت است از نرم افزار آزاد به صورت عمومی. با این حال، فعالیت‌های متفاوتی از جمله معرفی توزیع‌های آزاد گنو/لینوکسی، معرفی انواع سیستم‌عامل‌های آزاد خانواده‌ی بی‌اس‌دی، نصب آنها، محتوای آموزشی و حتی بحث آزاد در حوزه‌ی تئوریک نرم افزار آزاد نیز به طور همزمان در این اجتماع دنبال میشوند. در واقع تهران‌لاگ یک اجتماع از کاربران نرم افزار آزاد است که مایلند دقایقی را در کنار هم سپری کنند.
<br />
شرکت در جلسات این گروه برای <b>عموم</b> آزاد است.
شما نیز چنانچه علاقه‌مند هستید میتوانید در جلسات آن شرکت کنید و دانش خود را با سایر اعضا به اشتراک گذاشته و یا از دانش آنان استفاده کنید.

<b> برای اطلاعات بیشتر میتوانید عضو <a href="http://lists.tehlug.org/mailman/listinfo/general">لیست پستی</a> گروه شوید.</b>
</div>


<div class="dialog" style="float: left;">
	<div class="orange box">
		تابلوی اخبار و جلسات

		<a href="rss.php">
			<img src="images/rss.png" alt="RSS Feed" title="RSS Feed" style="float: left;" />
		</a>
	</div>

	<ul class="entries">
		<?php
		$next = getNextSession();
		foreach(getEntries(Null, 6) as $entry) {
			echo '<li class="entry">';
			if($entry == $next)
				echo 'جلسه بعدی:';
			echo '<a href="'.$entry->url.'">';
			echo $entry->title;
			echo '</a>';
			if($entry->date)
				echo "<div class='date'>".toPersian($entry->date)."</div>";
			echo '</li>';
		}
		?>
	</ul>
</div>

<div class="clear"></div>

<div class="dialog center" style="float: right;">
	<div class="blue box" style="color: white;">
			محل برگزاری جلسه ۲۲۱
	</div>
<iframe width="400" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=51.38390153646469%2C35.725580730265804%2C51.38578176498413%2C35.72692204587511&amp;layer=mapnik&amp;marker=35.72625139089366%2C51.38484165072441" style="border: 1px solid black"></iframe><br/><small><a href="http://www.openstreetmap.org/?mlat=35.72625&amp;mlon=51.38484#map=19/35.72625/51.38484">نمایش نقشهٔ بزرگ‌تر</a></small>
<br />
<b> <a herf="http://tehlug.org/index.php?page=entries/221">اطلاعیه کامل برگزاری جلسه ۲۲۱</a> </b>
<br />
<a href="https://goo.gl/maps/sLalx" target="_blank">
<b>آدرس محل برگزاری جلسهٔ ۲۲۱: خیابان کارگر شمالی، بالاتر از بزرگراه جلال آل احمد، پردیس دانشکده‌های فنّی دانشگاه تهران، دانشکدهٔ مهندسی نفت، طبقهٔ ۵، آواتک </b>
</a>
<br />
</div>

<div class="dialog" style="float: left;">
	<div class="yellow box">
			تصویری از جلسه ۲۱۹
	</div>

<div>
	<a href="images/tehlug219-pic-big.jpg"><img src="images/tehlug219-pic-thumb.jpg" style="margin: 0 auto; display: block;"></a>
	</div>
</div>
