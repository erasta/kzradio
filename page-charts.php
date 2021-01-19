<?php
/**
 * Template Name: Chart
 * The template for displaying the yearly form for the chart parade
 */

get_header();
?>

<div id="red-bg-wrapper">
	<div id="content" class="chart2020">
		<div id="inside-wrapper">
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

	@font-face {
    	font-family: 'Gveret';
    	font-style: normal;
		font-weight: normal;
		font-display: swap;
		src: url('<?php echo get_template_directory_uri(); ?>/theme/fonts/GveretLevinAlefAlefAlef-Regular.ttf') format('truetype');
	}
	
	
	#red-bg-wrapper {
		background-color: #ff0000;
		overflow: hidden;
	}
	#inside-wrapper:before {
		content: "";
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: -1;
		background: red;
	}
	#inside-wrapper {
		width: 1730px;
		max-width: 95%;
		margin: 186px auto 120px;
		background: #fff;
		border: 10px solid #0000ff;
	}
	#inside-wrapper #cover {
		position: relative;
		text-align: center;
	}
	#inside-wrapper #cover .hand-wrapper {
		position: absolute;
		top: -250px;
		left: -70px;
		right: -70px;
		bottom: 0;
		background: url('<?php echo get_template_directory_uri(); ?>/theme/images/cover-hand.png') no-repeat top center;
		background-size: cover;
	}
	#inside-wrapper #cover .text-wrapper {
		width: 86.5%;
		margin: 150px auto 0;
		background: #ff0;
	}
	#inside-wrapper #cover .page-title {
		width: 76%;
		margin: 0 auto;
		padding: 60px 0 25px;
		font-family: 'baba-shadow-fm', sans-serif;
		font-size: 90px;
		font-kerning: none;
		color: #474d59;
	}
	#inside-wrapper #cover .page-title .dots {
		display: inline-block;
		position: relative;
		font-family: 'baba-dots-fm', 'baba-shadow-fm', sans-serif;
	}
	#inside-wrapper #cover .page-title .dots:before {
		content: "2020!";
		font-family: 'baba-shadow-fm', sans-serif;
		position: absolute;
	}

	#inside-wrapper #prizes {
		margin-left: -100%;
		margin-right: -100%;
		padding: 40px 0 50px;
		font-family: 'baba-regular-fm', sans-serif;
		font-size: 44px;
		text-align: center;
		color: #fff;
		background-color: #00f;
	}
	#inside-wrapper #prizes .site-width {
		width: 1730px;
		max-width: 100%;
		margin: 0 auto;
	}
	#inside-wrapper #prizes .prizes-list {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		list-style: none;
		margin: 12px 0 0;
		padding: 0;
		font-size: 34px;
	}
	#inside-wrapper #prizes .prizes-list li {
		display: flex;
		align-items: center;
		width: 30%;
		padding: 24px 10px;
		line-height: 1.2;
		border: 9px solid yellow;
	}
	#inside-wrapper #prizes .prizes-list li .wrapper {
		width: 100%;
	}
	#inside-wrapper #prizes .prizes-list li .enf {
		font-family: 'Helvetica Neue', sans-serif;
		font-weight: 700;
	}
	#inside-wrapper .enf-bs {
		font-family: 'BowersShadow', sans-serif;
	}
	#inside-wrapper .f-baba-sd {
		font-family: 'baba-shadow-fm', sans-serif;
	}

	.chart-container .chart-content {
		max-width: none;
		padding-top: 40px;
		padding-left: 100px;
		padding-right: 100px;
		color: #000;
	}
	#inside-wrapper .form-wrapper .details {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		margin-bottom: 26px;
	}
	#inside-wrapper .form-wrapper .details .input-wrapper {
		width: 30%;
	}
	#inside-wrapper .form-wrapper input[type="text"],
	#inside-wrapper .form-wrapper input[type="email"],
	#inside-wrapper .form-wrapper input[type="tel"] {
		padding: 8px 10px;
		color: blue;
		text-align: right;
	}
	#inside-wrapper .form-wrapper .details .input-wrapper label {
		margin-bottom: 0;
		font-family: 'Heebo', sans-serif;
		font-size: 28px;
		color: blue;
	}
	#inside-wrapper .form-wrapper input {
		margin-top: 8px;
		background-color: yellow;
		border: none;
		border-right: 8px solid blue;
	}
	
	#inside-wrapper .form-wrapper #songs-wrapper,
	#inside-wrapper .form-wrapper #albums-wrapper {
		width: 45%;
	}
	#inside-wrapper .form-wrapper .songs-title,
	#inside-wrapper .form-wrapper .albums-title {
		position: relative;
		margin-bottom: 30px;
		margin-right: -10px;
		padding-right: 10px;
		font-family: 'baba-regular-fm', sans-serif;
		font-size: 36px;
		color: #00f;
		background: #0f0;
	}
	#inside-wrapper .form-wrapper .songs-title:before,
	#inside-wrapper .form-wrapper .albums-title:before {
		content: "";
		position: absolute;
		top: 0;
		bottom: 0;
		width: 200%;
		background-color: #0f0;
	}
	#inside-wrapper .form-wrapper .songs-title:before {
		left: 100%;
	}
	#inside-wrapper .form-wrapper .albums-title:before {
		right: 100%;
	}
	#inside-wrapper .form-wrapper table {
		width: 100%;
	}
	#inside-wrapper .form-wrapper table tr td:first-child {
		font-family: 'baba-regular-fm', sans-serif;;
		font-size: 36px;
		vertical-align: bottom;
		color: blue;
	}
	#inside-wrapper .form-wrapper table tr td + td {
		width: 100%;
	}

	#inside-wrapper .form-wrapper .notes {
		padding-right: 0;
		font-family: 'Heebo', sans-serif;
		font-size: 22px;
		list-style: none;
	}
	#inside-wrapper .form-wrapper .notes li {
		margin-bottom: 4px;
	}
	#inside-wrapper .form-wrapper .notes li:before {
		content: "*";
		display: inline-block;
		vertical-align: top;
		margin-left: 6px;
		font-size: 32px;
		color: #ff00ff;
	}
	#inside-wrapper .more-fields {
		position: relative;
		margin-bottom: 50px;
		font-family: 'Heebo', sans-serif;
		font-size: 28px;
		color: blue;
	}
	#inside-wrapper .more-fields label {
		line-height: 1.2;
	}
	#inside-wrapper .more-fields .flex {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		flex-wrap: wrap;
	}
	#inside-wrapper .more-fields .input-wrapper {
		width: 48%;
		margin-bottom: 60px;
	}
	#inside-wrapper .more-fields input {
		border-right: 8px solid #00ff00;
	}
	#inside-wrapper .more-fields .order-4 {
		order: 4;
		position: absolute;
		bottom: 34px;
		right: 0;
	}
	#inside-wrapper .more-fields textarea {
		height: 220px;
		margin-top: 8px;
		background-color: yellow;
		border: none;
		border-right: 8px solid #ff00ff;
	}
	#inside-wrapper .more-fields .input-wrapper:last-child .pink {
		font-family: Gveret, Heebo, sans-serif;
		color: #ff00ff;
	}
	
	#inside-wrapper .more-fields .red {
		color: red;
	}

	#prizes-text,
	#where-when,
	#chart-cta {
		font-family: 'Heebo', sans-serif;
		font-size: 28px;
	}
	#prizes-text {
		margin-bottom: 50px;
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

	#chart-cta {
		position: relative;
		padding: 0 90px;
		text-align: center;
	}
	#chart-cta:before,
	#chart-cta:after {
		content: "";
		position: absolute;
		width: 182px;
		height: 104px;
		top: 0;
		background: url('<?php echo get_template_directory_uri(); ?>/theme/images/pointing-hand.png') no-repeat top center;
	}
	#chart-cta:before {
		right: -100px;
	}
	#chart-cta:after {
		left: -100px;
		transform: scaleX(-1);
	}
	#chart-cta .red {
		color: red;
		font-weight: bold;
	}
	#chart-cta .post-link {
		color: red;
	}
	#chart-cta .takanon {
		color: blue;
	}

	#where-when {
		margin: 60px 0 60px;
		padding: 0 60px;
		line-height: 1.3;
		text-align: center;
	}
	#where-when .green-bg {
		position: relative;
		display: block;
		font-family: 'baba-bold-fm', sans-serif;
		color: blue;
	}
	#where-when .green-bg .row1 {
		position: relative;
	}
	#where-when .green-bg .row1:before {
		content: "";
		position: absolute;
		right: -100vw;
		bottom: 0;
		width: 200vw;
		height: 36px;
		background: #0f0;
	}
	#where-when .green-bg .text {
		position: relative;
		z-index: 2;
	}
	#where-when .f-baba-sd {
		color: blue;
	}
	#where-when .pink {
		color: #ff00ff;
	}

	#inside-wrapper .chart-credits {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	#ss-submit-fake {
		background-color: #1c1cff;
		color: #fff;
		font-family: 'baba-shadow-fm', sans-serif;
		font-size: 28px;
		border-radius: 0;
	}
	#inside-wrapper .chart-container .send {
		position: absolute;
		left: 0;
		bottom: -30px;
		padding-top: 0;
	}

	@media (max-width:1712px) {
		#inside-wrapper #cover .hand-wrapper {
			top: -220px;
		}
		#inside-wrapper #cover .text-wrapper {
			width: 87.5%;
			margin-top: 110px;
		}
		#inside-wrapper #cover .page-title {
			font-size: 82px;
		}
		#inside-wrapper #prizes {
			margin-left: -5%;
			margin-right: -5%;
			padding: 50px 60px;
			font-size: 38px;
		}
		#inside-wrapper #prizes .intro {
			margin-bottom: 20px;
			line-height: 1.2;
		}
		#inside-wrapper #prizes .prizes-list {
			font-size: 30px;
		}
		#inside-wrapper #prizes .prizes-list li {
			width: 29%;
		}
		#inside-wrapper .more-fields {
			font-size: 28px;
		}
		#where-when {
			padding: 0 20px;
		}	
	}
	@media (max-width:1630px) {
		#where-when {
			padding: 0 0;
		}
	}
	@media (max-width:1570px) {
		#inside-wrapper #cover .text-wrapper {
			width: 89%;
		}
		#inside-wrapper #cover .page-title {
			width: 77%;
			font-size: 78px;
		}
		#inside-wrapper #prizes {
			font-size: 36px;
		}
		#inside-wrapper #prizes .prizes-list {
			font-size: 28px;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper label,
		#inside-wrapper .form-wrapper label,
		#inside-wrapper .more-fields {
			font-size: 26px;
		}
		#inside-wrapper .form-wrapper .songs-title, 
		#inside-wrapper .form-wrapper .albums-title {
			margin-bottom: 20px;
			font-size: 32px;
		}
		#inside-wrapper .form-wrapper .notes {
			font-size: 20px;
		}
		#inside-wrapper .form-wrapper table tr td:first-child {
			font-size: 32px;
		}
		#prizes-text, #where-when, #chart-cta {
			font-size: 26px;
		}
		#where-when {
			width: 1260px;
		}
		#where-when .green-bg .row2:before {
			/*left: 388px;*/
		}
	}
	@media (max-width:1460px) {
		#inside-wrapper {
			max-width: 93%;
			margin-top: 160px;
		}
		#inside-wrapper #cover .page-title {
			font-size: 72px;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper label, 
		#inside-wrapper .form-wrapper label, 
		#inside-wrapper .more-fields {
			/*font-size: 30px;*/
			letter-spacing: -0.5px;
		}
		#inside-wrapper .form-wrapper #songs-wrapper, 
		#inside-wrapper .form-wrapper #albums-wrapper {
			width: 47%;
		}
		#inside-wrapper .form-wrapper .notes {
			font-size: 23px;
		}
		#inside-wrapper .form-wrapper .notes li {
			margin-bottom: 8px;
		}
		#inside-wrapper .form-wrapper .notes li:before {
			margin-top: 8px;
			font-size: 30px;
			line-height: 0.5;
		}
		#inside-wrapper .form-wrapper table tr td:first-child {
			font-size: 27px;
		}
		#prizes-text p,
		#chart-cta p {
			line-height: 1.3;
		}
		#where-when {
			width: 1140px;
		}
		
		#where-when .green-bg .row1:before {
			height: 32px;
		}
	}
	@media (max-width:1360px) {
		#inside-wrapper #cover .hand-wrapper {
			left: -50px;
			right: -50px;
		}
		#inside-wrapper #cover .text-wrapper {
			/*width: 95%;*/
			margin-top: 90px;
		}
		#inside-wrapper #cover .page-title {
			/*padding: 60px 0 40px;*/
			font-size: 66px;
		}
		#inside-wrapper #prizes {
			font-size: 32px;
		}
		#inside-wrapper #prizes .prizes-list {
			font-size: 25px;
		}
		#inside-wrapper #prizes .prizes-list li {
			padding: 16px 6px;
			border-width: 8px;
		}
		.chart-container .chart-content {
			padding-right: 70px;
			padding-left: 70px;
		}
		#chart-cta:before, #chart-cta:after {
			width: 127px;
			height: 85px;
			background-size: 100%;
		}
		#chart-cta:before {
			right: -70px;
		}
		#chart-cta:after {
			left: -70px;
		}
		#inside-wrapper .chart-credits {
			margin-left: -20px;
			margin-right: -20px;
		}
		#inside-wrapper .chart-credits img {
			transform: scale(.85);
		}
	}
	@media (max-width:1270px) {
		#inside-wrapper #cover .text-wrapper {
			width: 92.5%;
		}
		#inside-wrapper #cover .page-title {
			padding: 40px 0 10px;
			font-size: 60px;
		}
		#inside-wrapper #prizes {
			font-size: 30px;
		}
		#inside-wrapper #prizes .prizes-list {
			font-size: 24px;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper label, #inside-wrapper .form-wrapper label, #inside-wrapper .more-fields {
			font-size: 26px;
		}
		#inside-wrapper .form-wrapper .songs-title, #inside-wrapper .form-wrapper .albums-title {
			font-size: 30px;
		}
		#prizes-text, #where-when, #chart-cta {
			font-size: 26px;
		}
		#where-when {
			width: 960px;
		}
		#where-when .green-bg .row2:before {
			left: 140px;
		}
		#where-when .green-bg .row1:before,
		#where-when .green-bg .row2:before {
			height: 36px;
		}
		#inside-wrapper .chart-credits {
			margin-left: 0;
			margin-right: 0;
			justify-content: center;
		}
		#inside-wrapper .chart-credits img {
			transform: scale(0.65);
		}
	}
	@media (max-width:1150px) {
		#inside-wrapper #cover .hand-wrapper {
			left: -60px;
			right: -60px;
			top: -170px;
		}
		#inside-wrapper #cover .text-wrapper {
			margin-top: 100px;
		}
		#inside-wrapper #cover .page-title {
			font-size: 70px;
			line-height: 1.1;
		}
		#inside-wrapper #prizes {
			padding: 30px 40px;
			font-size: 32px;
		}
		#inside-wrapper #prizes .prizes-list {
			font-size: 24px;
		}
		#prizes-text, #where-when, #chart-cta {
			font-size: 28px;
		}
		#chart-cta {
			padding: 0 54px;
		}
		#where-when {
			width: 860px;
		}
		#where-when .green-bg .row2:before {
			left: 70px;
		}
		#inside-wrapper .chart-credits img {
			max-width: 200px;
			transform: scale(.75);
		}
	}
	@media (max-width:1023px) {
		#inside-wrapper {
			margin-top: 90px;
			border-width: 6px;
		}
		#inside-wrapper #cover .page-title {
			font-size: 50px;
		}
		#inside-wrapper #prizes {
			font-size: 24px;
		}
		#inside-wrapper #prizes .prizes-list li {
			padding: 8px 5px;
			font-size: 20px;
			border-width: 4px;
		}
		.chart-container .chart-content {
			padding-right: 40px;
			padding-left: 40px;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper label, #inside-wrapper .form-wrapper label, #inside-wrapper .more-fields {
			font-size: 20px;
		}
		.chart-container input, .chart-container textarea {
			padding: 4px 10px;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper {
			width: 32%;
		}
		#inside-wrapper .form-wrapper .songs-title, #inside-wrapper .form-wrapper .albums-title {
			font-size: 30px;
		}
		#inside-wrapper .form-wrapper .notes {
			font-size: 18px;
		}
		#inside-wrapper .form-wrapper .notes li:before {
			font-size: 26px;
		}
		#inside-wrapper .form-wrapper table tr td:first-child {
			font-size: 26px;
			vertical-align: middle;
		}
		#inside-wrapper .more-fields textarea {
			height: 160px;
		}
		#inside-wrapper .more-fields .input-wrapper {
			margin-bottom: 44px;
		}
		#ss-submit-fake {
			font-size: 24px;
		}
		#prizes-text, #where-when, #chart-cta {
			font-size: 24px;
		}
		#chart-cta {
			padding: 0 30px;
		}
		#chart-cta:before, #chart-cta:after {
			width: 91px;
		}
		#where-when {
			width: 690px;
			margin: 40px 0;
		}
		#where-when .green-bg .row1:before, #where-when .green-bg .row2:before {
			height: 28px;
		}
		#where-when .green-bg .row2:before {
			left: -4px;
		}
		#inside-wrapper .chart-credits img {
			max-width: 130px;
			transform: scale(.85);
		}
	}
	#inside-wrapper .prizes-list.mobile-only {
		display: none;
	}
	@media (max-width:767px) {
		#inside-wrapper {
			max-width: 90%;
			margin-top: 70px;
			margin-bottom: 50px;
		}
		#inside-wrapper #cover .hand-wrapper {
			left: -8%;
			right: -8%;
			top: -90px;
		}
		#inside-wrapper #cover .text-wrapper {
			margin-top: 60px;
		}
		#inside-wrapper #cover .page-title {
			width: 85%;
			padding-top: 10px;
			font-size: 26px;
		}
		#inside-wrapper #prizes {
			margin-left: -10%;
			margin-right: -10%;
			padding: 15px 40px 5px;
			font-size: 15px;
		}
		#inside-wrapper #prizes .prizes-list {
			display: none;
		}
		#inside-wrapper .prizes-list.mobile-only {
			display: block;
			margin-top: 20px;
			padding: 0 20px;
			list-style: none;
			color: blue;
			font-family: 'baba-regular-fm', sans-serif;
		}
		#inside-wrapper .prizes-list.mobile-only li {
			margin-bottom: 10px;
		}
		#inside-wrapper .prizes-list.mobile-only li .wrapper {
			display: inline-block;
			vertical-align: top;
			max-width: 90%;
		}
		#inside-wrapper .prizes-list.mobile-only li .wrapper br {
			display: none;
		}
		#inside-wrapper .prizes-list.mobile-only li:before {
			content: "*";
			display: inline-block;
			vertical-align: top;
			margin-left: 4px;
			padding-top: 4px;
			font-size: 20px;
			color: #ff00ff;
		}
		#inside-wrapper .form-wrapper .details {
			display: block;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper {
			width: 100%;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper label, #inside-wrapper .form-wrapper label, #inside-wrapper .more-fields {
			font-size: 15px;
		}
		#inside-wrapper .form-wrapper .details .input-wrapper input {
			margin-top: 4px;
		}
		.chart-container input, .chart-container textarea {
			padding: 2px 9px;
		}
		.chart-container .content.fields {
			display: block;
		}
		#inside-wrapper .form-wrapper #songs-wrapper, #inside-wrapper .form-wrapper #albums-wrapper {
			width: 100%;
		}
		#inside-wrapper .form-wrapper #albums-wrapper {
			margin-top: 30px;
		}
		#inside-wrapper .form-wrapper .songs-title, #inside-wrapper .form-wrapper .albums-title {
			margin-bottom: 16px;
			font-size: 16px;
		}
		#inside-wrapper .form-wrapper .notes {
			font-size: 13px;
		}
		#inside-wrapper .form-wrapper .notes li:before {
			font-size: 18px;
			margin-left: 3px;
		}
		#inside-wrapper .form-wrapper table tr td:first-child {
			font-size: 16px;
		}
		#inside-wrapper .more-fields {
			padding-top: 0;
		}
		#inside-wrapper .form-wrapper #songs-wrapper input,
		#inside-wrapper .form-wrapper #albums-wrapper input {
			border-right: none;
		}
		#inside-wrapper .more-fields .flex {
			display: block;
		}
		#inside-wrapper .more-fields .input-wrapper {
			width: 100%;
			margin-bottom: 26px;
		}
		#inside-wrapper .more-fields .order-4 {
			position: static;
		}
		#inside-wrapper .chart-container .send {
			bottom: -50px;
		}
		#ss-submit-fake {
			width: 120px;
			font-size: 20px;
		}
		#prizes-text, #where-when, #chart-cta {
			font-size: 13px;
			text-align: center;
		}
		#chart-cta {
			padding: 0;
		}
		#chart-cta:before {
			width: 60px;
			transform: rotate(-45deg);
			top: -40px;
		}
		#chart-cta:after {
			width: 60px;
			transform: scaleX(-1) rotate(-45deg);
			top: -40px;
		}
		#where-when {
			width: auto;
			margin-left: -10px;
			margin-right: -10px;
		}
		#where-when .green-bg {
			display: block;
			padding-top: 4px;
			background: #0f0;
		}
		#where-when .green-bg:before,
		#where-when .green-bg:after {
			content: "";
			position: absolute;
			width: 800px;
			top: -2px;
			bottom: 0;
			background: #0f0;
		}
		#where-when .green-bg:before {
			left: 0;
		}
		#where-when .green-bg:after {
			right: 0;
		}
		#where-when .green-bg .row1:before,
		#where-when .green-bg .row2:before {
			display: none;
		}
		#inside-wrapper .chart-credits {
			margin-left: -20px;
			margin-right: -20px;
			justify-content: space-between;
		}
		#inside-wrapper .chart-credits img {
			max-width: 42px;
			transform: scale(1);
		}
	}
</style>

			<div id="cover">
				<div class="hand-wrapper"></div>
				<div class="text-wrapper">
					<h1 class="page-title">המצעד האלטרנטיבי השנתי של רדיו הקצה <span class="dots">2020!</span></h1>
				</div>
			</div>	

			<div style="display: none">
				<?php 
// 				$t=time();
// 				echo($t . "<br>");
// 				echo(date("Y-m-d",$t));
// 				echo($t >= 1608674400);
// 				echo(new DateTimeImmutable('2020-12-23').getTimestamp());
// 				$finish_timestamp = date_create('2020-12-23',timezone_open("Asia/Jerusalem"));
// 				if (time() < $finish_timestamp) {
				?>
			</div>
			
			<?php 
			$finish_timestamp = date_timestamp_get(date_create('2020-12-23',timezone_open("Asia/Jerusalem")));
			if (time() < $finish_timestamp) {
			?>
		
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

			<div class="chart-container">
				<ul class="prizes-list mobile-only">
					<li>
						<div class="wrapper">
							קונסולת <br>
							<span class="enf">Xbox Series X 1TB!</span><br>
							מתנת מחסני חשמל  
						</div>
					</li>
					<li>
						<div class="wrapper">					
							גיפט קארד בשווי <br>
							<span class="f-baba-sd">₪1500</span> לקניית תקליטים,<br>
							דיסקים וכל מה שתרצו באוזן השלישית!
						</div>
					</li>
					<li>
						<div class="wrapper">
							פטיפון תוצרת פרוג׳קט!<br>
							מתנת האוזן השלישית<br>
							ו- <span class="enf-bs">Kodo Audio</span><br>
						</div>
					</li>
				</ul>
				<div class="chart-content form-wrapper">
					<form id="ss-form" action="https://docs.google.com/forms/d/e/1FAIpQLSenLkzXkB2nGF-evLWf6fHO5mKNhElVQUk1ZkcpCL3I-kJk3w/formResponse" method="POST" novalidate="" target="hidden_iframe">
						<input name="pageHistory" type="hidden" value="0" />
						
						<div class="details">
							<div class="input-wrapper">
								<label for="fullname">שם מלא:</label>
								<input type="text" id="fullname" class="ss-q-short kz-req" aria-label="שם פרטי" name="entry.17759131"/>
							</div>
							<div class="input-wrapper">
								<label for="email">אימייל:</label>	
								<input type="text" id="email" class="ss-q-short kz-req" aria-label="מייל" name="entry.2051152561"/>
							</div>
							<div class="input-wrapper">
								<label for="city">עיר/ יישוב:</label>
								<input type="text" id="city" class="ss-q-short kz-req" aria-label="מקום מגורים" name="entry.1470743141"/>
							</div>
						</div>
						
						<div class="content fields">
							<div id="songs-wrapper">
								<h2 class="songs-title">שירי השנה</h2>
								<ul class="notes">
									<li>חובה לבחור לפחות שיר אחד.</li>
									<li>אין משמעות לסדר הבחירה, לכל בחירה משקל שווה.</li>
									<li>הקפידו לרשום את השירים כך: Artist - Song</li>
								</ul>

								<table>
									<tr><td>1.</td> <td><input type="text" class="ss-q-short kz-req" aria-td="שיר 1 - אמן" name="entry.701237114" /></td></tr>
									<tr><td>2.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 2 - אמן" name="entry.46347914"/>  </td></tr>
									<tr><td>3.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 3 - אמן" name="entry.214943481"/> </td></tr>
									<tr><td>4.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 4 - אמן" name="entry.1994387214"/></td></tr>
									<tr><td>5.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 5 - אמן" name="entry.566772780"/> </td></tr>
									<tr><td>6.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 6 - אמן" name="entry.1532636144"/></td></tr>
									<tr><td>7.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 7 - אמן" name="entry.220868254"/> </td></tr>
									<tr><td>8.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 8 - אמן" name="entry.1318019346"/></td></tr>
									<tr><td>9.</td> <td><input type="text" class="ss-q-short" aria-td="שיר 9 - אמן" name="entry.371258779"/> </td></tr>
									<tr><td>10.</td><td><input type="text" class="ss-q-short" aria-td="שיר 10 - אמן" name="entry.1657916397"/></td></tr>
									<tr><td>11.</td><td><input type="text" class="ss-q-short" aria-td="שיר 11 - אמן" name="entry.493920478"/></td></tr>
									<tr><td>12.</td><td><input type="text" class="ss-q-short" aria-td="שיר 12 - אמן" name="entry.1776753937"/></td></tr>
									<tr><td>13.</td><td><input type="text" class="ss-q-short" aria-td="שיר 13 - אמן" name="entry.954395543"/></td></tr>
									<tr><td>14.</td><td><input type="text" class="ss-q-short" aria-td="שיר 14 - אמן" name="entry.1752091222"/></td></tr>
									<tr><td>15.</td><td><input type="text" class="ss-q-short" aria-td="שיר 15 - אמן" name="entry.744800293"/></td></tr>
									
								</table>
								
							</div><!--#songs-wrapper-->

							<div id="albums-wrapper">
								<h2 class="albums-title">אלבומי השנה</h2>
								<ul class="notes">
									<li>חובה לבחור לפחות אלבום אחד.</li>
									<li>אין משמעות לסדר הבחירה, לכל בחירה משקל שווה.</li>
									<li>הקפידו לרשום את האלבומים כך: Artist - Album</li>
								</ul>

								<table>
									<tr><td>1.</td><td><input type="text" class="ss-q-short kz-req" aria-td="אלבום 1 - אמן" name="entry.1625902853" /></tr>
									<tr><td>2.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 2 - אמן" name="entry.1089321432"/>  </td></tr>
									<tr><td>3.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 3 - אמן" name="entry.1393226390"/>  </td></tr>
									<tr><td>4.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 4 - אמן" name="entry.273420690"/>   </td></tr>
									<tr><td>5.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 5 - אמן" name="entry.1734503566"/>  </td></tr>
									<tr><td>6.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 6 - אמן" name="entry.816811017"/>   </td></tr>
									<tr><td>7.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 7 - אמן" name="entry.514536408"/>   </td></tr>
									<tr><td>8.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 8 - אמן" name="entry.224702127"/>   </td></tr>
									<tr><td>9.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 9 - אמן" name="entry.2113714396"/>  </td></tr>
									<tr><td>10.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 10 - אמן" name="entry.2099288823"/>  </td></tr>
									<tr><td>11.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 11 - אמן" name="entry.218122951"/>  </td></tr>
									<tr><td>12.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 12 - אמן" name="entry.537404717"/>  </td></tr>
									<tr><td>13.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 13 - אמן" name="entry.1705033073"/>  </td></tr>
									<tr><td>14.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 14 - אמן" name="entry.359363236"/>  </td></tr>
									<tr><td>15.</td><td><input type="text" class="ss-q-short" aria-td="אלבום 15 - אמן" name="entry.90823084"/>  </td></tr>
								</table>
							</div><!--#albums-wrapper-->
						</div>

						<div class="content fields more-fields">
							
							<div class="flex flex-row">
								<div class="input-wrapper">
									<labal for="song-of-year">אילו יכולתם לבחור רק  שיר אחד מהרשימה שהכנתם, <span class="red">שיר השנה שלכם הוא:</span></label>
									<input type="text" id="song-of-year" class="ss-q-short kz-req" aria-td="שיר השנה" name="entry.501706939"/>
								</div>
								<div class="input-wrapper">
									<labal for="album-of-year">אילו יכולתם לבחור רק אלבום אחד מהרשימה שהכנתם, <span class="red">אלבום השנה שלכם הוא:</span></label>
									<input type="text" id="album-of-year" class="ss-q-short kz-req" aria-td="אלבום השנה" name="entry.1714810338"/>
								</div>
								<div class="input-wrapper">
									<labal for="movie-of-year">סרט השנה <span class="red">(בשיתוף סינמסקופ):</span></label>
									<input type="text" id="movie-of-year" class="ss-q-short" name="entry.16200457"/>
								</div>
								<div class="input-wrapper order-4">
									<labal for="series-of-year"><span class="red">תכנית הטלוויזיה של השנה:</span></label>
									<input type="text" id="series-of-year" class="ss-q-short" name="entry.784331204"/>
								</div>
								<div class="input-wrapper">	
									<labal for="msg"><span class="pink">עוד משהו שתרצו לומר?</span></label>
									<textarea id="msg" class="ss-q-short" name="entry.384525549" data-rows="5"></textarea>
								</div>
									<!--<input type="checkbox" name="entry.1357401023" value="תצטרפו לרשימת התפוצה? שולחים הפתעות ועדכונים" />תצטרפו לרשימת התפוצה? שולחים הפתעות ועדכונים-->
								
							</div>

							<div class="content send">
								<?php /*
								<?php $spaceship = get_field('spaceship_image'); ?>
								<div class="spaceship">
									<img src="<?php echo $spaceship['url']; ?>" class="spaceship" alt="Send">
								</div> */ ?>
								<div class="buttons">
									<button id="ss-submit-fake" type="button" onclick="var req = document.getElementsByClassName('kz-req');var good = true;for (var i = 0; i < req.length; ++i) {var bad = req[i].value.length === 0;req[i].style.backgroundColor = bad ? 'lightcoral' : 'white';if (good && bad) {good = false;req[i].focus();}}if (good) {jQuery('.spaceship').addClass('launch');setTimeout(function() {jQuery('.send').fadeOut(200);jQuery('#ss-submit').click();}, 1000);}">שלחו</button>
									<button id="ss-submit" type="submit" style="display: none">שלחו</button>
									<!-- <button id="ss-submit" type="submit">שלח/י</button> -->
									<iframe id="wholeform" style="display: none"></iframe>
								</div>
							</div>
						</div><!--.more-fields-->

						

						<div class="content thanks">
							
						</div>

					</form>
					
					<div id="prizes-text">
						<p>
							<span class="red">אנחנו מחלקים פרסים מדהימים בין כל מי שישתף את סרטון ההצבעה שלנו</span>
							<span class="blue">ב</span><span class="red">פיי</span><span class="pink">ס</span><span class="blue">ב</span><span class="green">ו</span><span class="red">ק:</span>
							<span class="f-baba-sd">קונסולת</span>
							<span class="enf-bs">Xbox Series X 1TB</span>
							בייצור Microsoft, מתנת רשת מחסני חשמל;
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

					<div id="chart-cta">
						<p>
							כל מה שתצטרכו לעשות כדי להיכנס לתחרות על הפרסים הוא לשתף בעמוד הפייסבוק שלכם את הפוסט
							<a href="https://www.facebook.com/KZradio.net/posts/3748783901839730" target="_blank" class="post-link">הבא</a>
							ולהגיב לנו בקומנטס על השאלה שיש בו, ואולי
							<span class="red">תזכו באחד הפרסים!!</span><br>
							על ידי השתתפות בפעילות אתם מאשרים כי קראתם את 
							<a href="https://docs.google.com/document/d/e/2PACX-1vRrGuYmJbuVk3vD2XnbBR48kd0X8ex_srW3budFk01nZEGn-af4k3llW7EING5hBIOtHYw7ZTs80eaB/pub?fbclid=IwAR05iu9c0rME-Tw-O8aw2VyPZBpHcz5vDFRbMliXs78drHj8SviEk6WvYws" class="takanon" target="_blank">התקנון.</a>
							בהצלחה!
						</p>
					</div>

					<?php 
					} else {
					?>
					
					<div id="chart-cta">
						<p style="color: blue">
							הסתיימה ההצבעה למצעד! תודה רבה לכל מי שהשתתפ/ה ❤ את המצעד האלטרנטיבי השנתי 2020 נשדר בראשון הקרוב, 27.12, מ-10:00 בבוקר עד 22:00 בלילה. אל תחמיצו! וכמו כן - עדיין ניתן לנסות לזכות בקונסולת Xbox Series X 1TB בייצור Microsoft, מתנת רשת מחסני חשמל; גיפט קארד בשווי ₪1500 לקניית תקליטים, דיסקים וכל מה שתרצו באוזן השלישית. ופטיפון תוצרת פרוג'קט! מתנת האוזן השלישית ו- Kodo Audio.
							כל מה שתצטרכו לעשות כדי להיכנס לתחרות על הפרסים הוא לשתף בעמוד הפייסבוק שלכם את הפוסט
							<a href="https://www.facebook.com/KZradio.net/posts/3748783901839730" target="_blank" class="post-link">הבא</a>
							ולהגיב לנו בקומנטס על השאלה שיש בו, ואולי
							<span class="red">תזכו באחד הפרסים!!</span><br>
							על ידי השתתפות בפעילות אתם מאשרים כי קראתם את 
							<a href="https://docs.google.com/document/d/e/2PACX-1vRrGuYmJbuVk3vD2XnbBR48kd0X8ex_srW3budFk01nZEGn-af4k3llW7EING5hBIOtHYw7ZTs80eaB/pub?fbclid=IwAR05iu9c0rME-Tw-O8aw2VyPZBpHcz5vDFRbMliXs78drHj8SviEk6WvYws" class="takanon" target="_blank">התקנון.</a>
							בהצלחה!
						</p>
					</div>

					<?php 
					}
					?>

					<div id="where-when" style="color: blue;">
						המצעד האלטרנטיבי השנתי של הקצה ישודר
						<span class="green-bg"><span class="row1"></span><span class="text">ביום ראשון ה-27.12.20, החל מ-10:00 בבוקר ברדיו הקצה,</span><span class="row2"></span></span>
						לו ניתן להאזין
						<span class="f-baba-sd">24/7</span>
						פה:
						<a href="https://www.kzradio.net" class="pink">kzradio.net</a>
						ובשלל אפליקציות הרדיו.
					</div>

					<div class="chart-credits">
						<a href="http://kodoaudio.co.il/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme/images/logo-kodo.jpg" alt="Kodo Audio" style=""></a>
						<a href="http://www.third-ear.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme/images/logo-third-ear.jpg" alt="האוזן השלישית" style=""></a>
						<img src="<?php echo get_template_directory_uri(); ?>/theme/images/logo-kz.jpg" alt="הקצה" style="">
						<a href="https://www.bpm-music.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme/images/logo-bpm.jpg" alt="bpm" style=""></a>
						<a href="https://www.payngo.co.il/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/theme/images/logo-hashmal.jpg" alt="מחסני חשמל" style=""></a>
					</div>

				</div><!--.chart-content-->

			</div><!--.chart-container-->
        </div><!--#inside-wrapper-->
    </div>
</div>



<?php get_footer(); ?>