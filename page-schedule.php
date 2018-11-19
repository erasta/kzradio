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
				<h1 class="kz-title">שידורינו השבוע</h1>
				<div class="schedule-wrapper">
					
					<div style="display: none;"><?php var_dump ( get_schedule() ); ?></div>
					<?php
						$day_start = '9:00';
						$day_end = '23:59';
						$day_start_num = 9;
						$day_end_num = 23 + 59 / 60;
						$shows = get_schedule();
						$schedule_days_titles = array( 'יום ראשון', 'יום שני', 'יום שלישי', 'יום רביעי', 'יום חמישי', 'יום שישי', 'יום שבת' );
						$currdate = new DateTime("now", new DateTimeZone("Israel") );
						$currdaynum = intval($currdate->format("w"));
						$currhour = intval($currdate->format("H")) + intval($currdate->format("i")) / 60.0;
					?>
					
					<div class="schedule-table clearfix">
						<?php
							foreach ($shows as $daynum => $daydata) {
								$inner_counter = 0;
								if( $daynum == $currdaynum ) {
									echo '<div class="day-column active-day">';
								} else {
									echo '<div class="day-column">';
								}
									echo '<div class="day-title">' . $schedule_days_titles[$daynum] . '</div>';
								foreach ($daydata["times"] as $startnum => $times) {
									if( $inner_counter == 0 ) {
										$difference = round($times['starthour'] - $day_start_num, 2);
										if( $difference > 0 ) {
											echo '<div class="show-box length' . $difference . '">';
												echo '<div class="show-hour">' . $day_start . '-' . $times['start'] . '</div>';
											echo '</div>';
										}
									} 
									$difference = ceil(abs($times['starthour'] - $times['endhour']));
									$id = $daydata["day"] . '_' . $times['starthour'];
									$clazz = 'show-box length' . $difference . ' cat-' . $times['term'];
									if ($daynum == $currdaynum && $times['starthour'] <= $currhour && $currhour <= $times['endhour']) {
										$clazz .= ' active';
									}
									echo '<div id="' . $id . '" class="' . $clazz . '">';
// 										echo '<img src="' . $times['image'] . '">';
										echo '<div class="show-hour">' . $times['start'] . '-' . $times['end'] . '</div>';
										echo '<div class="dj-and-name">';
											echo '<a href="' . $times['linkdj'] . '">' . $times['dj'] . '</a>';
											echo '<a href="' . $times['linkshow'] . '"><b>' . $times['show'] . '</b></a>';
										echo '</div>';
									echo '</div>';
									
									if( $inner_counter == count($daydata["times"]) - 1 ) {
										$difference = ceil(($day_end_num - $times['endhour']) * 10) / 10; // when its 100 there's a pixel missing
										if( $difference > 0 ) {
											echo '<div class="show-box length' . $difference . '">';
												echo '<div class="show-hour">' . $times['endhour'] . '-' . $day_end . '</div>';
											echo '</div>';
										}
									}
									
									$inner_counter++;
								}
								echo '</div>';
								$counter++;
							}
						?>
						<script>
							jQuery(window).ready(function(){
								if( jQuery('.schedule-table').length ) {
									jQuery('.show-box').each(function(){										
										var showBoxClasses = jQuery(this).attr('class');
										var showLength = showBoxClasses.substring( showBoxClasses.indexOf('length')+6);
// 										console.log(200*parseFloat(showLength));
										jQuery(this).css('height', 80*parseFloat(showLength)+'px' );
									})
								}
							});
						</script>
					</div>
				</div>
			</div><!--#wrapper-schedule-->
		</div><!-- /#content -->
		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</main><!-- /.container -->
<?php get_footer(); ?>