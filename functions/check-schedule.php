<?php

function get_show_schedule($daynum) {
	$cat = get_term(get_sub_field('the_show'), 'shows');
    $dj_arr = get_field('show_dj', $cat->taxonomy . '_' . $cat->term_id );
    $dj_name = '';
    for ($i = 0; $i < count($dj_arr); ++$i) {
        if ($i > 0) $dj_name = $dj_name . ' ו';
        $dj_name = $dj_name . get_term($dj_arr[$i], 'djs')->name;
    }
	$dj = get_term($dj_arr[0], 'djs');
	$start = get_sub_field('starting_time');
    $end = get_sub_field('ending_time');
    $starthour = intval(explode(":", $start)[0]) + intval(explode(":", $start)[1]) / 60;
    $endhour = intval(explode(":", $end)[0]) + intval(explode(":", $end)[1]) / 60;
    if ($endhour == 0) $endhour = 24;
	$dj_colour = get_field( 'colour', $dj ) ? '#'.get_field( 'colour', $dj ) : 'transparent';
	$is_special = $cat->name == 'ספיישלים';
	$showname = get_sub_field('subtitle') ? get_sub_field('subtitle') : $cat->name;

	$image_id = get_field('show_image', $cat->taxonomy . '_' . $cat->term_id );
	$show_image = wp_get_attachment_image_src( $image_id, 'next_shows' );
	$show_image_full = wp_get_attachment_image_src( $image_id, 'full' );

	$image = $is_special ? get_sub_field('customized_image') : $show_image[0];
	$image_full = $is_special ? get_sub_field('customized_image') : $show_image_full[0];

	$term = $cat->term_id;
	$ret = array(
		//"image_id" => $show_image_full,
		"start" => $start,
		"starthour" => $starthour,
		"end" => $end,
		"endhour" => $endhour,
		"hide_on_schedule" => get_sub_field('hide_on_schedule'),
		"show" => $showname,
		"dj" => $dj_name,
		"dj_colour" => $dj_colour,
		"image" => $image,
		"image_full" => $image_full,
		"desc" => $cat->description,
		"linkshow" => strlen($cat->slug) == 0 ? "" : get_term_link( $term ),
		"linkdj" => strlen($cat->slug) == 0 ? "" : get_term_link( $dj->term_id ),
        "realtime" => $daynum . ' ' . $starthour . ' ' . $endhour,
        "slug" => $cat->slug,
        "term" => $cat->term_id
    );

    foreach ($ret as $key => $value) {
        if (is_wp_error($ret[$key])) $ret[$key] = "";
    }

    $show_image_position = get_field('show_image_position', $cat->taxonomy . '_' . $cat->term_id );
    if ($show_image_position) $ret["image_position"] = $show_image_position;

    return $ret;
}

function assure_detail(&$obj, $fld, $val) {
	if (!array_key_exists($fld, $obj) || is_wp_error($obj[$fld]) || !is_string($obj[$fld]) || strlen($obj[$fld]) == 0) {
		$obj[$fld] = $val;
	}
	return $obj;
}

function fill_show_details($obj) {
	$obj = assure_detail($obj, "show", "הקצה נונסטופ");
	$obj = assure_detail($obj, "dj", "הקצה");
	$obj = assure_detail($obj, "image", '/wp-content/uploads/2018/11/pexels-photo-744318.jpeg');
	$obj = assure_detail($obj, "image_full", '/wp-content/uploads/2018/11/pexels-photo-744318.jpeg');
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

// function get_days() {
// 	return array(
// 		'day' => array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'),
// 		'num' => array(0, 1, 2, 3, 4, 5, 6),
// 		'heb' => array( 'יום ראשון', 'יום שני', 'יום שלישי', 'יום רביעי', 'יום חמישי', 'יום שישי', 'יום שבת' )
// 	);
// }


function get_day_schedule($daynum) {
    $days_names_eng = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
    $day = $days_names_eng[$daynum];
    $dayarr = array();
    $dayrow = $day . '_single_day_shows';
    while ( have_rows($dayrow, 'options') ) {
        the_row();
        $curr = get_show_schedule($daynum);
        if ($curr['show'] == '' || $curr['start'] == '') continue;
        $dayarr[$curr['starthour'] * 100] = $curr;
    }
    ksort($dayarr, SORT_NUMERIC);
    return array("daynum" => $daynum, "day" => $day, "times" => $dayarr);
}

function get_schedule() {
    $days_names_eng = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
	$shows = array();
	foreach ($days_names_eng as $daynum => $day) {
        $shows[$daynum] = get_day_schedule($daynum);
    }
	return $shows;
}

function make_main_banner($showlive) {
	// echo '<div style="display:none">'; var_dump($showlive); echo '</div>';
	$blog = get_bloginfo('template_url');
    $playbtn = ''; //array_key_exists("start", $showlive) ? '' : ' display: none';
    $objpos = '';
    if (array_key_exists("image_position", $showlive)) {
        $objpos = 'object-position: 50% ' . $showlive["image_position"] . '%';
    }
    $realt = array_key_exists("realtime", $showlive) ? $showlive["realtime"] : "";
	return
'<div class="main-banner">
	<div href="#" id="show-link-curr" realtime="' . $realt . '">
		<img id="show-image-curr"
			src="' . $showlive["image_full"] . '"
			alt="' . htmlspecialchars($showlive["desc"]) .'"
			style="cursor: pointer; ' . $objpos . '"
			onclick="javascript:player_backtolive(\''. $showlive["image"] .'\',\''. htmlspecialchars($showlive["show"]) .'\');return false;">
		<span class="show-details">
			<span class="blck-bg">
				<span class="now-label">עכשיו לייב!</span>
			</span>
			<span class="blck-bg">
				<a href="' . $showlive["linkdj"] .'" id="show-dj-curr" class="dj-name">
					' . htmlspecialchars($showlive["dj"]) . '
				</a>
			</span>
			<span class="blck-bg">
				<a href="' . $showlive["linkshow"] . '" id="show-name-curr" class="show-name">
					' . htmlspecialchars($showlive["show"]) . '
				</a>
			</span>
			<span class="play-btn" id="play-btn" style="' . $playbtn . '">
				<img onclick="javascript:player_backtolive(\''. $showlive["image"] .'\',\''. htmlspecialchars($showlive["show"]) .'\');return false;"
					src="' . $blog . '/theme/images/play-red.svg"
					alt="Play" style="cursor: pointer;" >
			</span>
		</span>
	</div>
</div>';
}

function make_next_banner($showfirst, $num) {
    $active = array_key_exists("start", $showfirst) ? '' : ' nonactive';
    $realt = array_key_exists("realtime", $showfirst) ? $showfirst["realtime"] : "";
	$namelen = strlen(trim($showfirst["show"]));
	$showfontsize = '';
	if ($namelen > 30) {
		$showfontsize = ' style="font-size: ' . (36 - round(sqrt($namelen - 30))) . 'px"';
	}
	return
'<div id="next-show-' . $num . '" class="next-show-item' . $active .'" realtime="' . $realt . '">
	<div class="show-overlay" style="background: ' . $showfirst["dj_colour"] . ';"></div>
	<div id="show-link-' . $num . '">
		<img id="show-image-' . $num . '"
				alt="' . htmlspecialchars($showfirst["desc"]) . '"
				src="' . $showfirst["image"] . '">
		<span class="show-details wrapper">
			<span class="blck-bg">
				<span id="show-start-' . $num . '" class="next-show-time">' . $showfirst["start"] . '</span>
			</span>
			<span class="blck-bg">
				<a href="' . $showfirst["linkdj"] . '" id="show-dj-' . $num . '" class="next-show-dj">
					' . htmlspecialchars($showfirst["dj"]) . '
				</a>
			</span>
			<span class="blck-bg">
				<a href="' . $showfirst["linkshow"] . '" id="show-name-' . $num . '" class="next-show-name"' . $showfontsize . '>
					' . htmlspecialchars($showfirst["show"]) . '
				</a>
				<br>
			</span>
		</span>
	</div>
</div>';
}

function make_banners($curr, $next1, $next2, $next3) {
	return
'<div id="shows-curr-and-next">
	' . $curr . '
	<div class="next-shows clearfix">
		' . $next1 . '
		' . $next2 . '
		' . $next3 . '
	</div><!--.next-shows-->
</div>';
}

function get_curr_shows_impl() {
    // Getting today and tomorrow schedules
	$date = new DateTime("now", new DateTimeZone("Israel") );
	$hour = intval($date->format("H")) + intval($date->format("i")) / 60.0;
	$daynum = intval($date->format("w"));
    $daynumTomorrow = ($daynum + 1) % 7;
	$today = get_day_schedule($daynum)["times"] ?: array();
    $tomorrow = get_day_schedule($daynumTomorrow)["times"] ?: array();

    // Filtering just shows that are in the preset or future
	$fromnow = array_filter($today, function($s) use ($hour) {
		return $hour < $s["endhour"];
    });

    // Add empty show if first show is in the future
	if (count($fromnow) == 0 || reset($fromnow)["starthour"] > $hour) {
		array_unshift($fromnow, array());
    }

    // Add tomorrow shows
	foreach ($tomorrow as &$value) {
		$value["start"] = "מחר ב-" . $value["start"];
	}
    $fromnow = array_merge($fromnow, $tomorrow);

    // Assuring 4 shows
	array_push($fromnow, array(), array(), array(), array());
    $fromnow = array_slice($fromnow, 0, 4);

    // Filling details for all shows and creating banners
	foreach ($fromnow as &$value) {
		$value = fill_show_details($value);
	}
	echo make_banners(
		make_main_banner($fromnow[0]),
		make_next_banner($fromnow[1], 1),
		make_next_banner($fromnow[2], 2),
		make_next_banner($fromnow[3], 3)
	);
}

function get_curr_shows() {
	get_curr_shows_impl();
}

function check_schedule_impl($shows) {
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

function check_schedule() {
	check_schedule_impl(get_schedule());
}

function html_curr_schedule() {
	// $shows = get_schedule();
	get_curr_shows_impl();
	// echo '<$&$/>';
	// check_schedule_impl($shows);
}

add_action('wp_ajax_html_curr_schedule', 'html_curr_schedule');
add_action('wp_ajax_nopriv_html_curr_schedule', 'html_curr_schedule');

add_action('wp_ajax_schedule', 'check_schedule');
add_action('wp_ajax_nopriv_schedule', 'check_schedule');
