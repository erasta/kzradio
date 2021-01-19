<?php
/**
 * Template Name: Chart (Avi)
 * The template for displaying the yearly form for the chart parade
 */

get_header();
?>

<style>
	@font-face {
    	font-family: 'baba-regular-fm';
    	font-style: normal;
		font-weight: normal;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-regular-fm.ttf') format('truetype'),
		url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-regular-fm.woff') format('woff');
	}
	@font-face {
    	font-family: 'baba-bold-fm';
    	font-style: normal;
		font-weight: normal;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-bold-fm.ttf') format('truetype'),
		url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-bold-fm.woff') format('woff');
	}
	@font-face {
    	font-family: 'baba-dots-fm';
    	font-style: normal;
		font-weight: normal;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-dots-fm.ttf') format('truetype'),
		url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-dots-fm.woff') format('woff');
	}
	@font-face {
    	font-family: 'baba-shadow-fm';
    	font-style: normal;
		font-weight: normal;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-shadow-fm.ttf') format('truetype'),
		url('<?php echo get_template_directory_uri(); ?>/theme/fonts/baba-shadow-fm.woff') format('woff');
	}

	@font-face {
    	font-family: 'BowersShadow';
    	font-style: normal;
		font-weight: normal;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/bowshadw.ttf') format('truetype'),
		url('<?php echo get_template_directory_uri(); ?>/theme/fonts/bowshadw.woff') format('woff');
	}
	@font-face {
    	font-family: 'Heebo';
    	font-style: normal;
		font-weight: normal;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/heebo-regular.ttf') format('truetype'),
			url('<?php echo get_template_directory_uri(); ?>/theme/fonts/heebo-regular.woff') format('woff');
	}
	@font-face {
    	font-family: 'Heebo';
    	font-style: normal;
		font-weight: bold;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/heebo-bold.ttf') format('truetype'),
			url('<?php echo get_template_directory_uri(); ?>/theme/fonts/heebo-bold.woff') format('woff');
	}
	
	#red-bg-wrapper {
		background-color: #ff0000;
		overflow: hidden;
	}
	#content.chart2020 {
		width: 1730px;
		max-width: 95%;
		margin: 186px auto 120px;
		background: #fff;
		border: 10px solid #0000ff;
		
	}
	#content.chart2020 #cover {
		position: relative;
		text-align: center;
	}
	#content.chart2020 #cover .hand-wrapper {
		position: absolute;
		top: -240px;
		left: -70px;
		right: -70px;
		bottom: 0;
		background: url('<?php echo get_template_directory_uri(); ?>/theme/images/cover-hand.png') no-repeat top center;
		background-size: cover;
	}
	#content.chart2020 #cover .text-wrapper {
		width: 86.5%;
		margin: 150px auto 0;
		background: #ff0;
	}
	#content.chart2020 #cover .page-title {
		width: 76%;
		margin: 0 auto;
		padding: 90px 0 50px;
		font-family: 'baba-shadow-fm', sans-serif;
		font-size: 111px;
		color: #474d59;
	}
	#content.chart2020 #cover .page-title .dots {
		position: relative;
		font-family: 'baba-dots-fm', 'baba-shadow-fm', sans-serif;
	}
	#content.chart2020 #cover .page-title .dots:before {
		content: "2020!";
		font-family: 'baba-shadow-fm', sans-serif;
		position: absolute;
	}

	#content.chart2020 #prizes {
		margin-left: -100%;
		margin-right: -100%;
		padding: 50px 0;
		font-family: 'baba-regular-fm', sans-serif;
		font-size: 56.5px;
		text-align: center;
		color: #fff;
		background-color: #00f;
	}
	#content.chart2020 #prizes .site-width {
		width: 1730px;
		max-width: 100%;
		margin: 0 auto;
	}
	#content.chart2020 #prizes .prizes-list {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		list-style: none;
		margin: 0;
		padding: 0;
		font-size: 43px;
	}
	#content.chart2020 #prizes .prizes-list li {
		display: flex;
		align-items: center;
		width: 32%;
		padding: 24px 10px;
		line-height: 1.2;
		border: 10px solid yellow;
	}
	#content.chart2020 #prizes .prizes-list li .wrapper {
		width: 100%;
	}
	#content.chart2020 #prizes .prizes-list li .enf {
		font-family: 'Helvetica Neue', sans-serif;
		font-weight: 700;
	}
	#content.chart2020 .enf-bs {
		font-family: 'BowersShadow', sans-serif;
	}
	#content.chart2020 .f-baba-sd {
		font-family: 'baba-shadow-fm', sans-serif;
	}

	.chart-container .chart-content {
		max-width: none;
		padding-left: 100px;
		padding-right: 100px;
		color: #000;
	}
	#content.chart2020 .form-wrapper #songs-wrapper,
	#content.chart2020 .form-wrapper #albums-wrapper {
		width: 45%;
	}
	#content.chart2020 .form-wrapper .songs-title,
	#content.chart2020 .form-wrapper .albums-title {
		position: relative;
		margin-bottom: 30px;
		padding-right: 20px;
		font-family: 'baba-regular-fm', sans-serif;
		font-size: 45px;
		color: #00f;
		background: #0f0;
	}
	#content.chart2020 .form-wrapper .songs-title:before,
	#content.chart2020 .form-wrapper .albums-title:before {
		content: "";
		position: absolute;
		top: 0;
		bottom: 0;
		width: 200%;
		background-color: #0f0;
	}
	#content.chart2020 .form-wrapper .songs-title:before {
		left: 100%;
	}
	#content.chart2020 .form-wrapper .albums-title:before {
		right: 100%;
	}

	#content.chart2020 .form-wrapper .notes {
		font-family: 'Heebo', sans-serif;
		font-size: 27px;
		list-style: none;
	}
	#content.chart2020 .form-wrapper .notes li {
		margin-bottom: 4px;
	}
	#content.chart2020 .form-wrapper .notes li:before {
		content: "*";
		display: inline-block;
		vertical-align: top;
		margin-left: 6px;
		font-size: 40px;
		color: #ff00ff;
	}

	#prizes-text,
	#where-when {
		font-family: 'Heebo', sans-serif;
		font-size: 36px;
	}
	#prizes-text .red {
		font-weight: bold;
		color: red;
	}
	#prizes-text .blue {
		font-weight: bold;
		color: blue;
	}
	#prizes-text .green {
		font-weight: bold;
		color: #0f0;
	}
	#prizes-text .pink {
		font-weight: bold;
		color: #ff00ff;
	}
	#prizes-text .f-baba-sd, 
	#prizes-text .enf-bs {
		color: #00f;
	}
	#prizes-text .f-baba-sd.pink {
		color: #ff00ff;
	}
	#where-when {
		margin-top: 30px;
		
	}
	#where-when .green-bg {
		position: relative;
		font-family: 'baba-bold-fm', sans-serif;
	}
	#where-when .green-bg .row1 {
		position: relative;
	}
	#where-when .green-bg .row1:before {
		content: "";
		position: absolute;
		right: -6px;
		bottom: 0;
		width: 2000px;
		height: 46px;
		background: #0f0;
	}
	#where-when .green-bg .text {
		position: relative;
	}
</style>
	
<div id="red-bg-wrapper">
	<div id="content" class="chart2020">
		<div id="cover">
			<div class="hand-wrapper"></div>
			<div class="text-wrapper">
				<h1 class="page-title">המצעד האלטרנטיבי השנתי של רדיו הקצה <span class="dots">2020!</span></h1>
			</div>
		</div>	

		<div id="prizes">
			<div class="site-width">
				<p class="intro">
					מהם השירים והאלבומים שהכי אהבתם בשנה האחרונה?<br>
					הצביעו כבר עכשיו ואולי תוכלו לזכות ב:
				</p>
				<ul class="prizes-list">
					<li>
						<div class="wrapper">
							קונסולת <br>
							<span class="enf">Xbox Series X 1TB!</span><br>
							מתנת מחסני חשמל  
						</div>
					</li>
					<li>
						<div class="wrapper">
							פטיפון תוצרת פרוג׳קט!<br>
							מתנת האוזן השלישית<br>
							ו- <span class="enf-bs">Kodo Audio</span><br>
						</div>
					</li>
					<li>
						<div class="wrapper">					
							גיפט קארד בשווי <br>
							<span class="f-baba-sd">₪1500</span> לקניית תקליטים,<br>
							דיסקים וכל מה שתרצו באוזן השלישית!
						</div>
					</li>
				</ul>
			</div>
		</div>
	
        <div class="chart-container form-wrapper">
            
            <div class="chart-content">
                <form id="ss-form" action="#" method="POST" novalidate="" target="hidden_iframe">
                <!-- <form id="ss-form" action="https://docs.google.com/forms/d/e/1FAIpQLSdurEz658_VRV7sQCDyIKBeviNhuvgedc8yUglycNDbzSxyJA/formResponse" method="POST" novalidate="" target="hidden_iframe"> -->
                    <input name="pageHistory" type="hidden" value="0" />
					
					<div class="details">
                        <table style="width:100%"><tr>
                            <td style="padding-left: 5px;"><input type="text" class="ss-q-short kz-req" aria-label="שם פרטי"       name="entry.17759131" placeholder="שם פרטי"   /></td>
                            <td style="padding-left: 5px;"><input type="text" class="ss-q-short kz-req" aria-label="שם משפחה"       name="entry.1323075005" placeholder="שם משפחה"   /></td>
                            <td style="padding: 0 5px;"><input type="text" class="ss-q-short kz-req" aria-label="מייל"         name="entry.2051152561" placeholder="אימייל" /></td>
                            <td style="padding-right: 5px;"><input type="text" class="ss-q-short kz-req" aria-label="מקום מגורים"  name="entry.1470743141" placeholder="עיר/ישוב" /></td>
                        </tr></table>
                    </div>
                    
                    <div class="content fields">
						<div id="songs-wrapper">
							<h2 class="songs-title">שירי השנה</h2>
							<ul class="notes">
								<li>חובה לבחור לפחות שיר אחד.</li>
								<li>אין משמעות לסדר הבחירה, לכל בחירה משקל שווה.</li>
								<li>הקפידו לרשום את השירים כך: Artist - Song</li>
							</ul>
						</div><!--#songs-wrapper-->

						<div id="albums-wrapper">
							<h2 class="albums-title">אלבומי השנה</h2>
							<ul class="notes">
								<li>חובה לבחור לפחות אלבום אחד.</li>
								<li>אין משמעות לסדר הבחירה, לכל בחירה משקל שווה.</li>
								<li>הקפידו לרשום את האלבומים כך: Artist - Album</li>
							</ul>
						</div><!--#songs-wrapper-->
						

                        <div class="side left">

                            <table style="width:100%">
                                <tr><td>1</td> <td><input type="text" class="ss-q-short kz-req" aria-td="שיר 1 - אמן"  placeholder="Song of the Year - Artist"  name="entry.701237114" /></td></tr>
                                <tr><td>2</td> <td><input type="text" class="ss-q-short" aria-td="שיר 2 - אמן" placeholder="Song - Artist"   name="entry.46347914"/>  </td></tr>
                                <tr><td>3</td> <td><input type="text" class="ss-q-short" aria-td="שיר 3 - אמן" placeholder="Song - Artist"   name="entry.214943481"/> </td></tr>
                                <tr><td>4</td> <td><input type="text" class="ss-q-short" aria-td="שיר 4 - אמן" placeholder="Song - Artist"   name="entry.1994387214"/></td></tr>
                                <tr><td>5</td> <td><input type="text" class="ss-q-short" aria-td="שיר 5 - אמן" placeholder="Song - Artist"   name="entry.566772780"/> </td></tr>
                                <tr><td>6</td> <td><input type="text" class="ss-q-short" aria-td="שיר 6 - אמן" placeholder="Song - Artist"   name="entry.1532636144"/></td></tr>
                                <tr><td>7</td> <td><input type="text" class="ss-q-short" aria-td="שיר 7 - אמן" placeholder="Song - Artist"   name="entry.220868254"/> </td></tr>
                                <tr><td>8</td> <td><input type="text" class="ss-q-short" aria-td="שיר 8 - אמן" placeholder="Song - Artist"   name="entry.1318019346"/></td></tr>
                                <tr><td>9</td> <td><input type="text" class="ss-q-short" aria-td="שיר 9 - אמן" placeholder="Song - Artist"   name="entry.371258779"/> </td></tr>
                                <tr><td>10</td><td><input type="text" class="ss-q-short" aria-td="שיר 10 - אמן" placeholder="Song - Artist"  name="entry.1657916397"/></td></tr>
                            </table>

                        </div>
                    </div>
                    

                    <div class="content fields">
                        <div class="side right">
                            <div class="header">אלבומי השנה</div>
                            <p>חובה לבחור לפחות אלבום אחד. אפשר לבחור עד 10. אין משמעות לסדר הבחירה, לכל בחירה משקל שווה, חוץ מאלבום השנה שלכםן שיקבל נקודה נוספת.</p>
                        </div>
                        <div class="side left">
                            <table style="width:100%">
                                <tr><td>1</td>    <td><input type="text" class="ss-q-short kz-req" aria-td="אלבום 1 - אמן"   placeholder="Album of the Year - Artist"   name="entry.1625902853" /></tr>
                                <tr><td>2</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 2 - אמן"   placeholder="Album - Artist"   name="entry.1089321432"/>  </td></tr>
                                <tr><td>3</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 3 - אמן"   placeholder="Album - Artist"   name="entry.1393226390"/>  </td></tr>
                                <tr><td>4</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 4 - אמן"   placeholder="Album - Artist"   name="entry.273420690"/>   </td></tr>
                                <tr><td>5</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 5 - אמן"   placeholder="Album - Artist"   name="entry.1734503566"/>  </td></tr>
                                <tr><td>6</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 6 - אמן"   placeholder="Album - Artist"   name="entry.816811017"/>   </td></tr>
                                <tr><td>7</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 7 - אמן"   placeholder="Album - Artist"   name="entry.514536408"/>   </td></tr>
                                <tr><td>8</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 8 - אמן"   placeholder="Album - Artist"   name="entry.224702127"/>   </td></tr>
                                <tr><td>9</td>    <td><input type="text" class="ss-q-short" aria-td="אלבום 9 - אמן"   placeholder="Album - Artist"   name="entry.2113714396"/>  </td></tr>
                                <tr><td>10</td>   <td><input type="text" class="ss-q-short" aria-td="אלבום 10 - אמן"  placeholder="Album - Artist"   name="entry.2099288823"/>  </td></tr>
                            </table>
                        </div>
                    </div>

                    <div class="content fields">
                        <div class="side right">
                            <div class="header">ועוד קצת</div>
                        </div>
                        <div class="side left">
                            <table style="width:100%">
                                <tr><td>1</td>    <td><input type="text" class="ss-q-short" placeholder="סרט השנה" name="entry.16200457"/></td></tr>
                                <tr><td>2</td>    <td><input type="text" class="ss-q-short" placeholder="הופעת השנה" name="entry.256847024"/></td></tr>
                                <tr><td>3</td>    <td><input type="text" class="ss-q-short" placeholder="סדרת הטלויזיה של השנה" name="entry.784331204"/></td></tr>
                                <tr><td>&nbsp;</td>    <td><textarea class="ss-q-short" placeholder="יש לך משהו להוסיף, לגלות לשתף?" name="entry.384525549" data-rows="5"></textarea></td></tr>
                                <tr><td>&nbsp;</td>    <td><input type="checkbox" name="entry.1357401023" value="תצטרפו לרשימת התפוצה? שולחים הפתעות ועדכונים" />תצטרפו לרשימת התפוצה? שולחים הפתעות ועדכונים</td></tr>
                            </table>
                        </div>
                    </div>

                    <script>
                        // function checkform() {
                        //     var req = document.getElementsByClassName('kz-req');
                        //     var good = true;
                        //     for (var i = 0; i < req.length; ++i) {
                        //         var bad = req[i].value.length === 0;
                        //         req[i].style.backgroundColor = bad ? "lightcoral" : "white";
                        //         if (good && bad) {
                        //             good = false;
                        //             req[i].focus();
                        //         }
                        //     }

                        //     if (good) {
                        //         jQuery('.spaceship').addClass('launch');
                        //         setTimeout(function() {
                        //             jQuery('.send').fadeOut(200);
                        //             // jQuery('.thanks').fadeIn(200);
						// 			// setTimeout(function() {
                        //             jQuery('#ss-submit').click();
                        //             // }, 2000);
                        //         }, 1000);
                        //     }
                        // }
                        // function checkform() {
                        //     var req = document.getElementsByClassName('kz-req');var good = true;for (var i = 0; i < req.length; ++i) {var bad = req[i].value.length === 0;req[i].style.backgroundColor = bad ? 'lightcoral' : 'white';if (good && bad) {good = false;req[i].focus();}}if (good) {jQuery('.spaceship').addClass('launch');setTimeout(function() {jQuery('.send').fadeOut(200);jQuery('#ss-submit').click();}, 1000);}
                        // }
                    </script>
                    <div class="content send">
                        <?php $spaceship = get_field('spaceship_image'); ?>
                        <div class="spaceship">
                            <img src="<?php echo $spaceship['url']; ?>" class="spaceship" alt="Send">
                        </div>
                        <div class="buttons">
                            <button id="ss-submit-fake" type="button" style="display: none" onclick="var req = document.getElementsByClassName('kz-req');var good = true;for (var i = 0; i < req.length; ++i) {var bad = req[i].value.length === 0;req[i].style.backgroundColor = bad ? 'lightcoral' : 'white';if (good && bad) {good = false;req[i].focus();}}if (good) {jQuery('.spaceship').addClass('launch');setTimeout(function() {jQuery('.send').fadeOut(200);jQuery('#ss-submit').click();}, 1000);}">שגרו את הטופס</button>
                            <button id="ss-submit" type="submit" style="display: none">שגרו את הטופס</button>
                            <!-- <button id="ss-submit" type="submit">שלח/י</button> -->
                            <iframe id="wholeform" style="display: none"></iframe>
                        </div>
                    </div>
                    <div class="content credits">
                        <img src="/wp-content/uploads/2018/12/kilombo2x.png" style="max-height: 64px; margin-top: -8px;">
                        <img src="/wp-content/uploads/2018/12/ista2x.png" style="max-height: 50px;">
                        <img src="/wp-content/uploads/2018/12/indnegev2x.png" style="max-height: 40px; margin-top: 8px;">
                        <img src="/wp-content/uploads/2018/08/bpm@2x.png" style="max-height: 55px; margin-top: 8px;">
                    </div>
                    <div class="content thanks">
                        <p>
                            <strong>תודה רבה על ההשתתפות! </strong><br>המצעד השנתי של הקצה ועונג שבת ישודר ביום ראשון ה-30.12.18, החל מ-10:00 בבוקר ועד הערב ברדיו הקצה – ניתן להאזין לו באתר או באפליקציית הקצה. עד אז, אפשר להאזין לסיכומי השנה של השדרנים שלנו מדי יום ברדיו הקצה: <a href="http://www.kzradio.net">kzradio.net</a>.
                            <br>אוהבים, הקצה והעונג.
                        </p>
                    </div>

				</form>
				
				<div id="prizes-text">
					<p>
						<span class="red">אנחנו מחלקים פרסים מדהימים בין כל מי שישתף את סרטון ההצבעה שלנו</span>
						<span class="blue">ב</span><span class="red">פיי</span><span class="pink">ס</span><span class="blue">ב</span><span class="green">ו</span><span class="red">ק:</span>
						<span class="f-baba-sd">קונסולת</span>
						<span class="enf-bs">Xbox Series X 1TB</span>
						בייצור Microsoft, מתנת רשת מחסני חשמל,
						<span class="f-baba-sd">גיפט קארד</span>
						<span class="pink normal">בשווי</span>
						<span class="f-baba-sd">₪1500</span>
						לקניית תקליטים, דיסקים וכל מה שתרצו באוזן השלישית.
						<span class="f-baba-sd">פטיפון</span>
						תוצרת פרוג'קט! מתנת האוזן השלישית ו-
						<span class="enf-bs">Kodo Audio</span>
						<span class="blue">וגם</span>
						<span class="pink">חמישה שוברי הנחה על סך</span>
						<span class="f-baba-sd pink">₪50,</span>
						לרכישה חופשית באתר האוזן השלישית.
					</p>
				</div>

				<div id="where-when">
					המצעד האלטרנטיבי השנתי של הקצה ישודר
					<span class="green-bg"><span class="row1"></span><span class="text">ביום ראשון ה-27.12.20, החל מ-10:00 בבוקר ברדיו הקצה,</span><span class="row2"></span></span>
				</div>
            </div>

            </div>
        </div>
    </div>
</div>
</div><!--.red-bg-wrapper-->

<?php get_footer(); ?>