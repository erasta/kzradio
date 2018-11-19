<?php

function get_show_schedule() {
	$cat = get_term(get_sub_field('the_show'), 'shows');
	$dj = get_term(get_field('show_dj', $cat->taxonomy . '_' . $cat->term_id )[0], 'djs');
	$start = get_sub_field('starting_time');
	$end = get_sub_field('ending_time');
	$dj_colour = get_field( 'colour', $dj ) ? '#'.get_field( 'colour', $dj ) : 'transparent';
	$is_special = $cat->name == 'ספיישלים';
	$showname = $is_special ? get_sub_field('subtitle') : $cat->name;

	$image_id = get_field('show_image', $cat->taxonomy . '_' . $cat->term_id );
	$show_image = wp_get_attachment_image_src( $image_id, 'next_shows' );
	$show_image_full = wp_get_attachment_image_src( $image_id, 'full' );

	$image = $is_special ? get_sub_field('customized_image') : $show_image[0];
	$image_full = $is_special ? get_sub_field('customized_image') : $show_image_full[0];
	$term = $cat->term_id;
	return array(
		//"image_id" => $show_image_full,
		"start" => $start,
		"starthour" => intval(explode(":", $start)[0]) + intval(explode(":", $start)[1]) / 60,
		"end" => $end,
		"endhour" => intval(explode(":", $end)[0]) + intval(explode(":", $end)[1]) / 60,
		"show" => $showname,
		"dj" => $dj->name,
		"dj_colour" => $dj_colour,
		"image" => $image,
		"image_full" => $image_full,
		"desc" => $cat->description,
		"linkshow" => strlen($cat->slug) == 0 ? "" : get_term_link( $term ),
		"linkdj" => strlen($cat->slug) == 0 ? "" : get_term_link( $dj->term_id ),
		"term" => $cat->term_id
	);
}

function assure_detail($obj, $fld, $val) {
	if (!array_key_exists($fld, $obj) || !is_string($obj[$fld]) || strlen($obj[$fld]) == 0) {
		$obj[$fld] = $val;
	}
	return $obj;
}

function fill_show_details($obj) {
	$obj = assure_detail($obj, "show", "הקצה נונסטופ");
	$obj = assure_detail($obj, "dj", "הקצה");
	$obj = assure_detail($obj, "image", 'wp-content/uploads/2018/11/pexels-photo-744318.jpeg');
	$obj = assure_detail($obj, "desc", "מוזיקת קצה שלא מפסיקה");
	$obj = assure_detail($obj, "linkshow", "#");
	$obj = assure_detail($obj, "linkdj", "#");
	return $obj;
}

function print_raw_schedule($s) {
	$ret = "";
	foreach($s as $key => $value) {
		$ret .= $key . "\t" . $value . "\t";
	}
    return $ret . "\n";
}

function get_schedule() {
	$days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
	$shows = array();
	foreach ($days as $daynum => &$day) {
		$dayrow = $day . '_single_day_shows';
		if( have_rows($dayrow, 'options') ) {
			$dayarr = array();
			while ( have_rows($dayrow, 'options') ) {
				the_row();
				$curr = get_show_schedule();
				$dayarr[$curr[starthour]] = $curr;
			}
			ksort($dayarr, SORT_NUMERIC);
			$shows[$daynum] = array("daynum" => $daynum, "day" => $day, "times" => $dayarr);
		}
	}
	return $shows;
}

function make_main_banner($showlive) {
	$blog = get_bloginfo('template_url');
	return
'<div class="main-banner">
	<div href="#" id="show-link-curr" >
		<img id="show-image-curr"
			src="' . $showlive["image_full"] . '"
			alt="' . $showlive["desc"] .'"
			onclick="javascript:player_backtolive();return false;">
		<span class="show-details">
			<span class="blck-bg">
				<span class="now-label">עכשיו לייב!</span>
			</span>
			<span class="blck-bg">
				<a href="' . $showlive["linkdj"] .'" id="show-dj-curr" class="dj-name">
					' . $showlive["dj"] . '
				</a>
			</span>
			<span class="blck-bg">
				<a href="' . $showlive["linkshow"] . '" id="show-name-curr" class="show-name">
					' . $showlive["show"] . '
				</a>
			</span>
			<span class="play-btn" id="play-btn">
				<img onclick="javascript:player_backtolive();return false;"
					src="' . $blog . '/theme/images/play-red.svg"
					alt="Play" style="cursor: pointer;" >
			</span>
		</span>
	</div>
</div>';
}

function make_next_banner($showfirst, $num) {
	$active = array_key_exists("start", $showfirst) ? '' : ' nonactive';
	return
'<div id="next-show-' . $num . '"
	class="next-show-item' . $active .'">
	<div class="show-overlay" style="background: ' . $showfirst["dj_colour"] . ';"></div>
	<div id="show-link-' . $num . '">
		<img id="show-image-' . $num . '"
				alt="' . $showfirst["desc"] . '"
				src="' . $showfirst["image"] . '">
		<span class="show-details wrapper">
			<span class="blck-bg">
				<span id="show-start-' . $num . '" class="next-show-time"><' . $showfirst["start"] . '</span>
			</span>
			<span class="blck-bg">
				<a href="' . $showfirst["linkdj"] . '" id="show-dj-' . $num . '" class="next-show-dj">
					' . $showfirst["dj"] . '
				</a>
			</span>
			<span class="blck-bg">
				<a href="' . $showfirst["linkshow"] . '" id="show-name-' . $num . '" class="next-show-name">
					' . $showfirst["show"] . '
				</a>
				<br>
			</span>
		</span>
	</div>
</div>';
}

function make_banners($curr, $next1, $next2, $next3) {
	return
	$curr . '
<div class="next-shows clearfix">
	' . $next1 . '
	' . $next2 . '
	' . $next3 . '
</div><!--.next-shows-->';
}

function get_curr_shows() {
	$shows = get_schedule();
	$date = new DateTime("now", new DateTimeZone("Israel") );
	$daynum = intval($date->format("w"));
	$hour = intval($date->format("H")) + intval($date->format("i")) / 60.0;
	$today = $shows[$daynum]["times"];
	$tomorrow = $shows[($daynum + 1) % 7]["times"];
	$fromnow = array_filter($today, function($s) use ($hour) {
		return $hour < $s["endhour"];
	});
	foreach ($tomorrow as &$value) {
		$value["start"] = "מחר ב-" . $value["start"];
	}
	$fromnow = array_merge($fromnow, $tomorrow);
	if ($fromnow[0]["starthour"] > $hour) {
		array_unshift($fromnow, array());
	}
	while (count($fromnow) < 4) {
		array_push($fromnow, array());
	}
	foreach ($fromnow as &$value) {
		$value = fill_show_details($value);
	}
	$fromnow = array_slice($fromnow, 0, 4);
	return make_banners(make_main_banner($fromnow[0]),
		make_next_banner($fromnow[1], 1),
		make_next_banner($fromnow[2], 2),
		make_next_banner($fromnow[3], 3));
}

function check_schedule() {
	$shows = get_schedule();
	foreach ($shows as $daynum => &$daydata) {
		$day = $daydata["day"];
		echo 'day ' . $day . ' ' . $daynum . "\n";
		foreach ($daydata["times"] as $times) {
			foreach($times as $key => $value) {
				echo $key . "\t" . $value . "\t";
			}
			echo "\n";
		}
	}
}

add_action('wp_ajax_schedule', 'check_schedule');
add_action('wp_ajax_nopriv_schedule', 'check_schedule');
