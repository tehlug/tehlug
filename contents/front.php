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
	<div class="blue box">
			محل برگزاری جلسه ۲۰۰
	</div>
  	<div class="map"></div><div align="right">
گروه کاربران لینوکس تهران جلسه ۲۰۰ را در روز چهارشنبه از ساعت <b>۱۸ الی ۲۰</b> در محل حوزه هنری برگزار می‌نماید.<br />
<b>آدرس محل برگزاری جلسه ۲۰۰: خیابان سمیه - نرسیده به خیابان حافظ - حوزه هنری

</b>
<br />
</div>
</div>

<div class="dialog" style="float: left;">
	<div class="yellow box">
			پوستر جلسه ۲۰۰ تهران‌لاگ
	</div>

<div style="width: 90%; text-align: justify; margin-left: auto; margin-right: auto;">
<div align="center">
<a href="images/tehlug-200-poster.jpg"><img src="images/tehlug-200-poster-thumb.jpg" /></a>
</div>
	</div>
</div>
