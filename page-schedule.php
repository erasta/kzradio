<?php
/**
 * Template Name: Schedule
 * The template for displaying all posts.
 */

get_header();
?>
<main class="container schedule" id="main">
	<div class="row">
		<div id="content" role="main">
			<div id="wrapper-schedule">
				<h1 class="kz-title"><?php the_title(); ?></h1>
				<h2 class="schedule-content">
                    <?php
                    for ($i = 0; have_posts(); ++$i) {
                        the_post();
                        the_content();
                    }
                    ?>
				</h2>
				<div class="schedule-wrapper">

					<?php
						function showTimeSpan($from, $to) {
							return ($from  == '23:59' ? '00:00' : $from) . '-' . ($to == '23:59' ? '00:00' : $to);
						}
						
						function fix59($timehour) {
							if (round(($timehour - floor($timehour)) * 60.0) == 59.0) {
								return (floor($timehour) + 1) * 100;
							} else {
								return round($timehour * 100);
							}
						}
					

                        $schedule_days_titles = array( 'יום ראשון', 'יום שני', 'יום שלישי', 'יום רביעי', 'יום חמישי', 'יום שישי', 'יום שבת' );
                        $currdate = new DateTime("now", new DateTimeZone("Israel") );
                        $currdaynum = intval($currdate->format("w"));
                        $currhour = intval($currdate->format("H")) + intval($currdate->format("i")) / 60.0;

						// Rotate shows so day start at 5 am and shows before 5am are the prev day
						$origshows = get_schedule();
					
						$shows = array();
						for ($daynum = 0; $daynum < 7; ++$daynum) {
							$shows[$daynum] = $origshows[$daynum];
							$shows[$daynum]['times'] = array();
						}
						foreach ($origshows as $daynum => $daydata) {
							foreach ($daydata['times'] as $timenum => $times) {
                                if ($times['hide_on_schedule']) continue;
								if ($times['starthour'] < 5) {
									$times['starthour'] += 24;
									$times['endhour'] += 24;
									$shows[($daynum + 6) % 7]['times'][round($times['starthour'] * 100)] = $times;
								} else {
									$shows[$daynum]['times'][round($times['starthour'] * 100)] = $times;
								}
							}
							ksort($shows[$daynum]['times']);
						}

						// Get change show times
						$changehours = array();
						foreach ($shows as $daynum => $daydata) {
							foreach ($daydata['times'] as $timenum => $times) {
								$changehours[fix59($times['starthour'])] = $times['start'];
								$changehours[fix59($times['endhour'])] = $times['end'];
							}
                        }
						ksort($changehours);
                        $changehoursnums = array_keys($changehours);
					?>

					<div class="schedule-table clearfix">
						<div class="mobile-slides">
							<?php
								foreach ($shows as $daynum => $daydata) {
									if( $daynum == $currdaynum ) {
										echo '<div class="day-column active-day">';
									} else {
										echo '<div class="day-column">';
									}
									echo '<div class="day-title">' . $schedule_days_titles[$daynum];
										echo '<div class="day-title-date">';
											echo date('d/m', strtotime('+'.($daynum-date('w')).' days'));
										echo '</div>';
									echo '</div>';

									$lastend = 0;
									$lasttime = reset($changehours);

									foreach ($daydata["times"] as $startnum => $times) {

										$startnum = array_search(fix59($times['starthour']), $changehoursnums);
										$endnum = array_search(fix59($times['endhour']), $changehoursnums);
										$times['len'] = $endnum - $startnum;
										$times['beforelen'] = $startnum - $lastend;
										$times['beforetime'] = $lasttime;
										$lastend = $endnum;
										$lasttime = $times['end'];

										if( $times['beforelen'] > 0 ) {
											echo '<div class="show-box" style="background: rgba(0,0,0,0); height: ' . $times['beforelen']*80 . 'px">';
												// echo '<div class="show-hour">' . showTimeSpan($times['beforetime'], $times['start']) . '</div>';
											echo '</div>';
										}

										$id = $daydata["day"] . '_' . $times['starthour'];
										$clazz = 'show-box cat-' . $times['term'];
										if ($daynum == $currdaynum && $times['starthour'] <= $currhour && $currhour <= $times['endhour']) {
											$clazz .= ' active';
										}
										$style = 'height: ' . $times['len']*80 . 'px';
										echo '<div id="' . $id . '" class="' . $clazz . '" realtime="' . $times['realtime'] . '" style="' . $style . '">';
	// 										echo '<img src="' . $times['image'] . '">';
											echo '<div class="show-hour">' . showTimeSpan($times['start'], $times['end']) . '</div>';
											echo '<div class="dj-and-name">';
												echo '<a href="' . $times['linkdj'] . '">' . $times['dj'] . '</a>';
												echo '<a href="' . $times['linkshow'] . '"><b>' . $times['show'] . '</b></a>';
											echo '</div>';
										echo '</div>';
									}
									echo '</div>';
								}
							?>
						</div>
					</div><!--.mobile-slides-->
					<div class="mobile-only controls">
						<a href="#" class="arrow prev">▶</a>
						<a href="#" class="arrow next">◀</a>
					</div>
				</div>
				<script>
					setTimeout(function(){
						console.log('1');
						if( jQuery('#wrapper-schedule .schedule-table .day-column').length ) {
							jQuery('#wrapper-schedule .mobile-slides').height( jQuery('#wrapper-schedule .schedule-table .day-column.active-day').height() );
							jQuery('#wrapper-schedule .schedule-table').height( jQuery('#wrapper-schedule .schedule-table .day-column.active-day').height() );
							console.log(jQuery('#wrapper-schedule .schedule-table .day-column.active-day').height());

							jQuery('#wrapper-schedule .controls .arrow.next').click(function(){
							var currentDayIndex = jQuery(this).parents('.schedule-wrapper').find('.active-day').index();
							var newDayIndex = currentDayIndex+1;
							
							if(currentDayIndex == 6)
								newDayIndex = 0;
							
							jQuery(this).parents('.schedule-wrapper').find('.active-day').removeClass('active-day');
							jQuery(this).parents('.schedule-wrapper').find('.day-column').eq(newDayIndex).addClass('active-day');
							return false;
						});
						jQuery('#wrapper-schedule .controls .arrow.prev').click(function(){
							var currentDayIndex = jQuery(this).parents('.schedule-wrapper').find('.active-day').index();
							var newDayIndex = currentDayIndex-1;
							
							if(currentDayIndex == 0)
								newDayIndex = 6;
							
							jQuery(this).parents('.schedule-wrapper').find('.active-day').removeClass('active-day');
							jQuery(this).parents('.schedule-wrapper').find('.day-column').eq(newDayIndex).addClass('active-day');
							return false;
						});
						}
					}, 750);
				</script>
			</div><!--#wrapper-schedule-->
		</div><!-- /#content -->

		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>