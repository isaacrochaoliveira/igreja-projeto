<?php

require_once('../config.php');

?>
<link rel="stylesheet" href="../assets/styles/calendar.css">
<link rel="stylesheet" href="../assets/styles/demo.css">
<script type="text/javascript" src="<?= JS ?>/calendar.js"></script>

<div id="caleandar">

</div>
<script>
	var events = [{
			'Date': new Date(2023, 4, 5),
			'Title': 'Doctor appointment at 3:25pm.'
		},
		{
			'Date': new Date(2016, 6, 18),
			'Title': 'New Garfield movie comes out!',
			'Link': 'https://garfield.com'
		},
		{
			'Date': new Date(2016, 6, 27),
			'Title': '25 year anniversary',
			'Link': 'https://www.google.com.au/#q=anniversary+gifts'
		},
	];
	var settings = {
		Color: '#000', //(string - color) font color of whole calendar.
		LinkColor: '#333', //(string - color) font color of event titles.
		NavShow: true, //(bool) show navigation arrows.
		NavVertical: false, //(bool) show previous and coming months.
		NavLocation: '#caleandar', //(string - element) where to display navigation, if not in default position.
		DateTimeShow: true, //(bool) show current date.
		DateTimeFormat: 'mmm, yyyy', //(string - dateformat) format previously mentioned date is shown in.
		DatetimeLocation: '', //(string - element) where to display previously mentioned date, if not in default position.
	};
	var element = document.getElementById('caleandar');
	caleandar(element, events, settings);
</script>