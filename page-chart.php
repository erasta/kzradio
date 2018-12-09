<?php
/**
 * Template Name: Chart
 * The template for displaying the yearly form for the chart parade
 */

get_header();
?>

<style>
    a {color: gray;}
</style>
    <div id="content">
        <?php $bg = get_field('bg'); ?>
        <div class="chart-container" style="background-image: url('<?php echo $bg['url']; ?>');">
            <div class="image-header"><?php the_post_thumbnail('extra_large'); ?></div>
            <div class="chart-content">
                <form id="ss-form" action="https://docs.google.com/forms/d/e/1FAIpQLSdurEz658_VRV7sQCDyIKBeviNhuvgedc8yUglycNDbzSxyJA/formResponse" method="POST" novalidate="" target="hidden_iframe">
                    <input name="pageHistory" type="hidden" value="0" />
                    <div class="content two-sided opening">
                        <div class="side right">
                            <?php $open_img = get_field('open_image'); ?>
                            <img src="<?php echo $open_img['sizes']['large']; ?>" alt="<?php echo $open_img['alt']; ?>">
                        </div>
                        <div class="side left">
                            <?php the_field('open_text'); ?>
                        </div>
                    </div>
                    <div class="details">
                        <table style="width:100%"><tr>
                            <td style="padding-left: 5px;"><input type="text" class="ss-q-short kz-req" aria-label="שם פרטי"       name="entry.17759131" placeholder="שם פרטי"   /></td>
                            <td style="padding-left: 5px;"><input type="text" class="ss-q-short kz-req" aria-label="שם משפחה"       name="entry.1323075005" placeholder="שם משפחה"   /></td>
                            <td style="padding: 0 5px;"><input type="text" class="ss-q-short kz-req" aria-label="מייל"         name="entry.2051152561" placeholder="אימייל" /></td>
                            <td style="padding-right: 5px;"><input type="text" class="ss-q-short kz-req" aria-label="מקום מגורים"  name="entry.1470743141" placeholder="עיר/ישוב" /></td>
                        </tr></table>
                    </div>
                    <div class="content fields">
                        <div class="side right">
                            <div class="header">שירי השנה</div>
                            <p>חובה לבחור לפחות שיר אחד. אפשר לבחור עד 10. אין משמעות לסדר הבחירה, לכל בחירה משקל שווה, חוץ משיר השנה שלכםן שיקבל נקודה נוספת.</p>
							<div class="ufo">
								<?php $m_img = get_field('middle_image'); ?>
								<img src="<?php echo $m_img['sizes']['large']; ?>" class="ufo-inner">
							</div>
                        </div>
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
                    <div class="ufo mobile">
                        <img src="<?php echo $m_img['sizes']['large']; ?>" class="ufo-inner">
                    </div>

                    <div class="content fields">
                        <div class="side right">
                            <div class="header">אלבומי השנה</div>
                            <p>חובה לבחור לפחות אלבום אחד. אפשר לבחור עד 10. אין משמעות לסדר הבחירה, לכל בחירה משקל שווה, חות מאלבום השנה שלכםן שיקבל נקודה נוספת.</p>
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


                    <div class="content fields">
                        <div class="side right">
                            <?php the_field('details_right'); ?>
                        </div>
                        <div class="side left">
                            <?php the_field('details_left'); ?>
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
                            <button id="ss-submit-fake" type="button" onclick="var req = document.getElementsByClassName('kz-req');var good = true;for (var i = 0; i < req.length; ++i) {var bad = req[i].value.length === 0;req[i].style.backgroundColor = bad ? 'lightcoral' : 'white';if (good && bad) {good = false;req[i].focus();}}if (good) {jQuery('.spaceship').addClass('launch');setTimeout(function() {jQuery('.send').fadeOut(200);jQuery('#ss-submit').click();}, 1000);}">שגרו את הטופס</button>
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
            </div>

            </div>
        </div>
    </div>
</div>



<?php get_footer(); ?>