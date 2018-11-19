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
	console.log("parseShows");
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
	console.log(shows);
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
	var desc = assure("desc", "מוזיקת קצה שלא מפסיקה");
	assure("image", defaultImage);
	assure("image_full", defaultImage);
	setField("image", "src", showObj[suffix == "curr" ? "image_full" : "image"]);
	setField("image", "alt", desc);
// 	setField("image", "title", desc);
	setField("dj", "textContent", assure("dj", "הקצה"));
	setField("name", "textContent", assure("show", "הקצה נונסטופ"));
	setField("dj", "href", assure("linkdj", "#"));
	setField("name", "href", assure("linkshow", "#"));
	if (suffix != "curr") {
		setField("start", "textContent", showObj.dayText + assure("start", ""));
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

function showsForDay(daynum, fromTime, dayText) {
	var showsOfDay = shows.filter(function(s) {return s.daynum == daynum});
	if (!showsOfDay || showsOfDay.length == 0) return [];
	var times = showsOfDay[0].times;
	var d = new Date();
	times.forEach(function(tt) {
		tt.startNum = timeByString(d, tt.start);
		tt.endNum = timeByString(d, tt.end)
	});
	times.sort(function(a, b) { return a.startNum - b.endNum; });
	times = times.filter((t) => {return t.start;});
	if (fromTime) {
		times = times.filter(function(tt) {return fromTime < tt.endNum});
	}
	times.forEach(tt => {tt.dayText = dayText});
	return times;
}

function showPlayButtonOnHeadline(shouldShow) {
	var e = document.getElementById("play-btn");
	if (e) {
		e.style.display = shouldShow ? "" : "none";
// 		console.log("showPlayButtonOnHeadline=" + shouldShow);
	}
}

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

function findCurrShow() {
	console.log("findCurrShow");
// 	if (document.getElementById("show-image-curr") == null || document.getElementById("show-dj-curr") == null || document.getElementById("next-show-3") == null || document.getElementById("show-link-3") == null) {
// 		setTimeout(findCurrShow, 10);
// 		return;
// 	}
	var d = new Date();
	var nextCheck = new Date(d);
	nextCheck.setMinutes(d.getMinutes() + 15);
	var showsToday = showsForDay(d.getDay(), d, "");
	var showsTomorrow = showsForDay((d.getDay() + 1) % 7, 0, "מחר ב-");
	console.log("today", showsToday, "\ntomorrow", showsTomorrow);
	if (showsToday.length == 0 || d < showsToday[0].startNum) {
		setNextShows(null, showsToday.concat(showsTomorrow));
		if (showsToday.length > 0) {
			nextCheck = Math.min(nextCheck, showsToday[0].startNum);
		}
		showPlayButtonOnHeadline(false);
		changeActiveShowOnSchedule("")
	} else {
		setNextShows(showsToday[0], (showsToday.concat(showsTomorrow)).slice(1));
		nextCheck = Math.min(nextCheck, showsToday[0].endNum);
		if (showsToday.length > 1) {
			nextCheck = Math.min(nextCheck, showsToday[1].startNum);
		}
		showPlayButtonOnHeadline(true);
		changeActiveShowOnSchedule(shows.filter(function(s) {return s.daynum == d.getDay()})[0].day + "_" + showsToday[0].starthour);
	}
	var checkms = nextCheck - Date.now();
	console.log('next check:', checkms, 'ms --- ', new Date(nextCheck));
	setTimeout(findCurrShow, checkms);

	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	jQuery.ajax({
		url: ajaxurl,
		type: "POST",
		cache: false,
		data: 'action=schedule',
		success: parseShows
	});
};

var defaultImage = 'wp-content/uploads/2018/11/pexels-photo-744318.jpeg';
var showsText = `<?php check_schedule(); ?>`

	parseShows(showsText);
//	jQuery(document).ready(findCurrShow);
// 	findCurrShow();

	////////////// Get shows schedule - end //////////////
</script>
