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
			محل برگزاری جلسه
	</div>
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=51.31663441658021%2C35.69831838850593%2C51.32262110710145%2C35.700853800575416&amp;layer=mapnik&amp;marker=35.69958610461807%2C51.31962776184082" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=35.69959&amp;mlon=51.31963#map=18/35.69959/51.31963">View Larger Map</a></small>
<br />
<a href="https://osm.org/go/zSR6uXsPt--?m=" target="_blank">
<b>آدرس محل برگزاری جلسهٔ: جاده مخصوص کرج، جنب متروی بیمه، خط کندرو، بین کوچه بیمه 2 و بیمه 3، پلاک 31، (محل سابق کارخانه الکترودسازی آما) کارخانه نوآوری</b>
</a>
<br />
</div>

<div class="dialog" style="float: left;">
	<div class="yellow box">
			اشکان قاسمی در گذشت
	</div>

<div>
	<a href="images/Ashkan_Ghasemi_banner_die_1_small.jpg"><img src="images/Ashkan_Ghasemi_banner_die_1.jpg" style="margin: 0 auto; display: block;"></a>
	</div>
</div>
