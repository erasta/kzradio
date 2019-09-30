<script type="text/javascript">
////////////// Get shows schedule - start //////////////

function getIsraelTime() {
    return new Date(new Date().toLocaleString("en-US", {timeZone: 'Asia/Jerusalem'}));
}

function makeShow(realtimeTag, djTag, showTag, imageTag) {
    var startTime = getIsraelTime();
    var endTime = new Date(startTime);
    var realtime = jQuery("#" + realtimeTag).attr("realtime");
    if (realtime && realtime.length > 0) {
        realtime = realtime.split(' ').map(parseFloat);
        startTime.setDate(realtime[0] - startTime.getDay() + startTime.getDate());
        endTime.setDate(startTime.getDate());
        startTime.setHours(Math.floor(realtime[1]), Math.floor((realtime[1] % 1) * 60));
        endTime.setHours(Math.floor(realtime[2]), Math.floor((realtime[2] % 1) * 60));
    } else {
        startTime.setMinutes(0);
        endTime.setMinutes(60);
    }
    return {
        startTime: startTime,
        endTime: endTime,
        start: startTime.toTimeString().substr(0, 5),
        end: endTime.toTimeString().substr(0, 5),
        dj: jQuery("#" + djTag).text(),
        show: jQuery("#" + showTag).text(),
        image: jQuery("#" + imageTag).attr("src")
    };
}

function changeActiveShowOnSchedule() {
    var d = getIsraelTime();
    var h = d.getHours() + d.getMinutes() / 60 + d.getSeconds() / 3600;
    var elements = document.getElementsByClassName("show-box") || [];
    for (var ind in elements) {
        if (!elements.hasOwnProperty(ind)) continue;
        var e = elements[ind];
        var tm = (e.getAttribute('realtime') || '').split(' ').map(parseFloat);
        var act = (tm.length == 3 && tm[0] == d.getDay() && tm[1] <= h && h <= tm[2]);
        e.className = e.className.replace(" active", "") + (act ? " active" : "");
    }
}

function findCurrShow() {
    console.log("findCurrShow");
    var currShowObject = makeShow("show-link-curr", "show-dj-curr", "show-name-curr", "show-image-curr");
    var nextShowObject = makeShow("next-show-1", "show-dj-1", "show-name-1", "show-image-1");
    if (typeof player_update_live_show != 'undefined') {
        player_update_live_show(currShowObject);
    }

    // Next check is the earlier of curr show end, next show start, 15 minutes from now, but not before 1 minute from now.
	var d = new Date(), nextCheck = new Date(d), nextMinute = new Date(d);
    nextCheck.setMinutes(d.getMinutes() + 25);
    nextMinute.setMinutes(d.getMinutes() + 5);
    nextCheck = new Date(Math.max(nextMinute, Math.min(nextCheck, nextShowObject.startTime, currShowObject.endTime)));

	var checkms = nextCheck - Date.now();
	checkms=Math.max(300000,checkms);
	console.log('next check:', checkms, 'ms --- ', new Date(nextCheck));

	setTimeout(() => {
		// Get curr shows banners from server
		jQuery.ajax({
			url: "<?php echo admin_url('admin-ajax.php?html_curr_schedule=true'); ?>",
			type: "POST",
			cache: false,
			data: 'action=html_curr_schedule',
			success: (data) => {
				data = data.substr(0, data.length - 1);
				jQuery('#shows-curr-and-next').replaceWith(data);
			}
		});

        // When on schedule page, change active show
		if (typeof changeActiveShowOnSchedule != 'undefined') {
            changeActiveShowOnSchedule();
        }

        // Run again, timeout to let DOM refresh
        setTimeout(() => {
            findCurrShow();
        }, 1);
	}, checkms);
};

////////////// Get shows schedule - end //////////////
</script>

<?php
// var_dump($im_on_home_page);
// if(!isset($im_on_home_page) || !$im_on_home_page) {
echo '<div style="display: none" id="not_on_home_page">';
get_curr_shows();
echo '</div>';
// }
?>