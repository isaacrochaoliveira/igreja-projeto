document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      //initialDate: '2023-05-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
	  events: 'leitura-individual/datas.php',
	  extraParams: function() {
      	return {
        	cachebuster: new Date().valueOf()
      	};
      },
	  eventClick: function(info) {
		  info.jsEvent.preventDefault();
		  $('#datasJob #id_jobs').val(info.event.id);
		  $('#btnCarregarDetalhes').click();
		  
      }
    });

    calendar.render();
  });
