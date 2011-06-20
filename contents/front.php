<div class="title">
	صفحه اصلی
</div>

<div class="dialog" style="float: right;">
	<div class="green box">
تهران-لاگ چیست؟
	</div>

گروه کاربران گنو/لینوکس تهران یا «تهران-لاگ» گروهی <b>مستقل</b> از کاربران کامپیوتر علاقه‌مند به <a href="http://www.gnu.org/gnu/linux-and-gnu.fa.html">گنو/لینوکس</a> ساکن تهران است. تم محوری جلسات تهران-لاگ عبارت است از نرم افزار آزاد به صورت عمومی. با این حال، فعالیت‌های متفاوتی از جمله معرفی توزیع‌های آزاد گنو/لینوکسی، معرفی انواع سیستم‌عامل‌های آزاد خانواده‌ی بی-اس-دی، نصب آنها، محتوای آموزشی و حتی بحث آزاد در حوزه‌ی تئوریک نرم افزار آزاد نیز به طور همزمان در این اجتماع دنبال میشوند. در واقع تهران-لاگ یک اجتماع از کاربران نرم افزار آزاد است که مایلند دقایقی را در کنار هم سپری کنند.  
<br />
شرکت در جلسات این گروه برای <b>عموم</b> آزاد است.
شما نیز چنانچه علاقه‌مند هستید میتوانید در جلسات آن شرکت کنید و دانش خود را با سایر اعضا به اشتراک گذاشته و یا از دانش آنان استفاده کنید.

<b> برای اطلاعات بیشتر میتوانید عضو <a href="http://lists.tehlug.org/mailman/listinfo/general">لیست پستی</a> گروه شوید.</b>
</div>


<div class="dialog" style="float: left;">
	<div class="orange box">
		برد خبری

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
			محل برگزاری جلسات		
	</div>
  	<div class="map"></div>
گروه کاربران لینوکس تهران هر دو هفته یکبار در روز سه‌شنبه از ساعت <b>۱۸ الی ۲۰</b> جلسه برگزار میکند.
<b>آدرس محل برگزاری جلسات: تهران، تقاطع خیابان کارگر (جنوبی) و جمهوری - فرهنگسرای فن آوری اطلاعات.</b>
<br />
</div>

<div class="dialog" style="float: left;">
	<div class="yellow box">
			معرفی کتاب
	</div>
	
<div style="width: 90%; text-align: justify; margin-left: auto; margin-right: auto;">
	<img src="images/free_society.jpg" style="float: left; margin-right: 15px;" />
دانلود <a href="http://gnu.org/philosophy/fsfs/rms-essays.pdf">نسخه‌ای</a> از کتاب درخشان «نرم افزار آزاد، جامعه‌ی آزاد».	
	<br />
	<br />
این کتاب حاوی دست نوشته‌ها و مقالات ریچارد استالمن پیرامون  مسئله‌ی نرم افزار آزاد و جامعه آن میباشد. همچنین  <a href="http://www.gnu.org/philosophy/lessig-fsfs-intro.fa.html">مقدمه‌ی قابل تامل آن</a> به قلم لارنس لسیگ را نیز نباید از نظر دور نگاه داشت. در این کتاب به اخلاقیات، قوانین و مدل بیزنس در جامعه‌ی نرم افزار پرداخته شده است.		
	<br />
	<br />
	این کتاب به سه بخش اصلی در مورد پروژه گنو و بنیاد نرم افزار آزاد، کپی-لفت، کپی-رایت و پتنت‌ها و جامعه‌ی آزاد و یک بخش فرعی در مورد لایسنس‌های نرم افزاری تقسیم میشود.		
	<br />
	</div>
</div>
