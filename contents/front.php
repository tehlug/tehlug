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
گروه کاربران لینوکس تهران هر دو هفته یکبار در روز چهارشنبه از ساعت <b>۱۷:۳۰ الی ۱۹:۳۰</b> جلسه برگزار میکند.
<b>آدرس محل برگزاری جلسات: بزرگراه جلال آل احمد، ابتدای کوی نصر (گیشا)، پلاک 12، طبقه 3، واحد 8، شرکت فناوران آنیسا
.</b>
<br />
</div>

<div class="dialog" style="float: left;">
	<div class="yellow box">
			معرفی کتاب و مقالات مفید
	</div>
	
<div style="width: 90%; text-align: justify; margin-left: auto; margin-right: auto;">
	<img src="images/eben_moglen.jpg" style="float: left; margin-right: 15px;" />
دانلود <a href="http://emoglen.law.columbia.edu/publications/anarchism.pdf">نسخه‌ای</a> از مقاله‌ی نرم افزار آزاد و پایان کپی-رایت از ابن ماگلن، استاد حقوق در دانشگاه کلمبیا.
<br />
<br />
در این کتاب ماگلن ابتدا در بخش نخست به توضیح پارادوکس تئوریک و سپس در بخشهای بعدی به مشکلات عملی  در مواجهه با مساله‌ی نرم افزار به عنوان یک کالا یا دارایی میپردازد.  مباحث مختلفی از قبیل تئوری حقوقی نرم افزار آزاد در این مقاله به اختصار مورد بحث قرار میگیرند. ماگلن ادعا میکند که نرم افزار آزاد نیاز حیاتی جوامع دموکراتیک و آزاد در جهان مدرن است. نرتیو انتقادی ماگلن در برخورد با پدیده‌ی انحصار در نرم افزار و سایر خطراتی که جامعه‌ی نرم افزار آزاد به طور خاص و شهروندان جامعه‌ی جهانی با طور کل با آن روبرو هستند ستودنی است.
	</div>
</div>
