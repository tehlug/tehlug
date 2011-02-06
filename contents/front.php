<div class="title">
	صفحه اصلی
</div>

<div class="dialog" style="float: right;">
	<div class="green box">
تهران-لاگ چیست؟
	</div>

گروه کاربران گنو/لینوکس تهران یا «تهران-لاگ» گروهی <b>مستقل</b> از کاربران کامپیوتر علاقه‌مند به <a href="http://gnu.org/gnu/linux-and-gnu.html">گنو/لینوکس</a> ساکن تهران است. تم محوری جلسات تهران-لاگ عبارت است از نرم افزار آزاد به صورت عمومی. با این حال، فعالیت‌های متفاوتی از جمله معرفی توزیع‌های آزاد گنو/لینوکسی، معرفی انواع سیستم‌عامل‌های آزاد خانواده‌ی بی-اس-دی، نصب آنها، محتوای آموزشی و حتی بحث آزاد در حوزه‌ی تئوریک نرم افزار آزاد نیز به طور همزمان در این اجتماع دنبال میشوند. در واقع تهران-لاگ یک اجتماع از کاربران نرم افزار آزاد است که مایلند دقایقی را در کنار هم سپری کنند.  
<br />
شرکت در جلسات این گروه برای <b>عموم</b> آزاد است.
شما نیز چنانچه علاقه‌مند هستید میتوانید در جلسات آن شرکت کنید و دانش خود را با سایر اعضا به اشتراک گذاشته و یا از دانش آنان استفاده کنید.

 برای اطلاعات بیشتر میتوانید عضو <a href="http://lists.tehlug.org">لیست پستی</a> گروه شوید.
</div>


<div class="dialog" style="float: left;">
	<div class="orange box">
		برد خبری
	</div>

	<ul class="entries">
		<?php
		foreach(getEntries(Null, 6) as $entry) {
			echo '<li class="entry">';

			echo '<a href="index.php?page=entries/'.$entry->id.'">';

			if($entry == getNextSession())
				echo 'جلسه بعدی:';

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
			محل برگزاری جلسات		
	</div>
  	<div class="map"></div>
گروه کاربران لینوکس تهران هر دو هفته یکبار در روز سه‌شنبه از ساعت ۱۷ الی ۱۹ جلسه برگزار میکند. 	
آدرس محل برگزاری جلسه: تهران، تقاطع خیابان کارگر (جنوبی) و جمهوری اسلامی - فرهنگسرای فن آوری اطلاعات.
<br />
<b>جلسات گروه به علت پاره‌ای از مشکلات موقتا برگزار نمیشوند. </b>

	<br />
</div>

<div class="dialog" style="float: left;">
	<div class="yellow box">
			جلسه بعدی
	</div>
	
<div style="width: 90%; text-align: right; margin-left: auto; margin-right: auto;">
	<img src="images/kde-debian-release-party.png" style="margin-left: auto; margin-right: auto;" />
	<br />
	به مناسبت انتشار نسخه جدید سیستم‌عامل دبیان، موسوم به دبیان ۶.۰ «اسکوئیز» و انتشار نسخه ۴.۶.۰ پروژه کی‌دی‌، تهران‌لاگ جشنی در کافه پراگ واقع در بلوار کشاورز تدارک دیده‌است.
<br />
شرکت کردن در این جشن انتشار برای عموم آزاد است.
</div>