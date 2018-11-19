<script type="text/javascript">
	////////////// Get shows schedule - start //////////////

function timeByString(t, s) {
	var tn = new Date(t);
	var sp = s.split(":");
	tn.setHours(Number(sp[0]));
	tn.setMinutes(Number(sp[1]));
	tn.setSeconds(0);
	tn.setMilliseconds(0);
	return tn;
}

function parseShows(data) {
	shows = [];
	var arr = data.split("\n").forEach(s => {
		if (s.startsWith("day")) {
			var ds = s.split(" ");
			shows.push({day: ds[1], daynum: Number(ds[2]), times : []});
		} else if (s.startsWith("start")) {
			var fields = s.split("\t");
			var obj = {};
			for (var i = 0; i < fields.length; i += 2) {
				obj[fields[i]] = fields[i+1];
			}
			shows[shows.length - 1].times.push(obj);
		}
	});
	console.log("parseShows: ", shows);
}

function setCurrShow(showObj, suffix) {
	suffix = suffix || "curr";
	showObj = showObj || {};
	function assure(field, def) {
		if (!showObj[field] || showObj[field].length == 0) showObj[field] = def;
		return showObj[field];
	}
	function setField(elementName, fieldName, value) {
		var element = document.getElementById("show-" + elementName + "-" + suffix);
		if (element) {
			element[fieldName] = value;
			var isDjCurrNull = (elementName == "dj" && suffix == "curr" && value == "הקצה");
			element.style.display = isDjCurrNull ? "none" : "";
		}
	}
	if (suffix == "curr" && typeof player_update_live_show !== "undefined") {
		if (!showObj.start) {
			var currHour = new Date().getHours();
			showObj.start = currHour + ":00";
			showObj.end = (currHour + 1) + ":00";
		}
		player_update_live_show(showObj)
	}
}

function setNextShows(currShowObj, fromNow) {
	console.log("setNextShows");
	setCurrShow(currShowObj);
	for (var i = 0; i < 3; ++i) {
		var suffix = "" + (i+1);
		var part = document.getElementById("next-show-" + suffix);
		if (part) {
			if (fromNow.length > i) {
				part.classList.remove("nonactive");
			} else {
				part.classList.add("nonactive");
			}
		}
		if (fromNow.length > i) setCurrShow(fromNow[i], suffix);
	}
}

function showsForDay(daynum, fromTime) {
	var showsOfDay = shows.filter(function(s) {return s.daynum == daynum});
	if (!showsOfDay || showsOfDay.length == 0) return [];
	var times = showsOfDay[0].times;
	var d = new Date();
	times.sort(function(a, b) { return a.starthour - b.starthour; });
	times = times.filter((t) => {return t.start;});
	if (fromTime) {
		times = times.filter(function(tt) {return fromTime < timeByString(d, tt.end)});
	}
	return times;
}

// function showPlayButtonOnHeadline(shouldShow) {
// 	var e = document.getElementById("play-btn");
// 	if (e) {
// 		e.style.display = shouldShow ? "" : "none";
// // 		console.log("showPlayButtonOnHeadline=" + shouldShow);
// 	}
// }

function changeActiveShowOnSchedule(showId) {
	var elements = document.getElementsByClassName("show-box");
	if (!elements) return;
	for (var ind in elements) {
		if (!elements.hasOwnProperty(ind)) continue;
		var e = elements[ind];
		e.className = e.className.replace(" active", "");
		if (e.id != "" && e.id == showId) {
			e.className += " active";
		}
	}
}

function updatePlayer(showObj) {
	if (!showObj.start) {
		var currHour = new Date().getHours();
		showObj.start = currHour + ":00";
		showObj.end = (currHour + 1) + ":00";
	}
	showObj.dj = showObj.dj || "הקצה";
	showObj.show = showObj.show || "הקצה נונסטופ";
	showObj.image = showObj.image || defaultImage;
	player_update_live_show(showObj)
}

function findCurrShow() {
	console.log("findCurrShow");
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

	var d = new Date();
	var nextCheck = new Date(d);
	nextCheck.setMinutes(d.getMinutes() + 15);
	var showsToday = showsForDay(d.getDay(), d, "");
	var showsTomorrow = showsForDay((d.getDay() + 1) % 7, 0, "מחר ב-");
	console.log("today", showsToday, "\ntomorrow", showsTomorrow);
	if (showsToday.length == 0 || d < timeByString(d, showsToday[0].start)) {
		if (showsToday.length > 0) {
			nextCheck = Math.min(nextCheck, timeByString(d, showsToday[0].start));
		}
		updatePlayer({});
	} else {
		nextCheck = Math.min(nextCheck, timeByString(d, showsToday[0].end));
		if (showsToday.length > 1) {
			nextCheck = Math.min(nextCheck, timeByString(d, showsToday[1].start));
		}
		updatePlayer(showsToday[0]);
	}
	var checkms = nextCheck - Date.now();
	console.log('next check:', checkms, 'ms --- ', new Date(nextCheck));

	setTimeout(() => {
		// Get curr shows banners from server
		jQuery.ajax({
			url: ajaxurl,
			type: "POST",
			cache: false,
			data: 'action=html_curr_schedule',
			success: (data) => {
				data = data.substr(0, data.length - 1);
				var splitter = data.split('<$&$/>');

				jQuery('#shows-curr-and-next').replaceWith(splitter[0]);

				// Get whole schedule from server (maybe delete later if no one uses shows varible)
				parseShows(splitter[1]);
			}
		});

		var dayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
		changeActiveShowOnSchedule(dayNames[d.getDay()] + "_" + showsToday[0].starthour);

		findCurrShow(); // run again
	}, checkms);
};

var defaultImage = 'wp-content/uploads/2018/11/pexels-photo-744318.jpeg';
var showsText = `<?php check_schedule(); ?>`

	parseShows(showsText);
//	jQuery(document).ready(findCurrShow);
// 	findCurrShow();

	////////////// Get shows schedule - end //////////////
</script>
