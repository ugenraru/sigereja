<link rel="stylesheet" href="administrator/home/assets/calendar/fullcalendar.min.css" />
<script src="administrator/home/assets/calendar/lib/jquery.min.js"></script>
<script src="administrator/home/assets/calendar/lib/moment.min.js"></script>
<script src="administrator/home/assets/calendar/fullcalendar.min.js"></script>
<div id="calendar"></div>

<script>
  $(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
      editable: false,
      events: "administrator/home/load/kalender_event.php",
      displayEventTime: false,
      eventRender: function(event, element, view) {
        if (event.allDay === 'true') {
          event.allDay = true;
        } else {
          event.allDay = false;
        }
      },
      eventMouseover: function(calEvent, jsEvent) {
        var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#B2CEE6;position:absolute;z-index:10001;">' + calEvent.title + '</div>';
        var $tooltip = $(tooltip).appendTo('body');

        $(this).mouseover(function(e) {
          $(this).css('z-index', 10000);
          $tooltip.fadeIn('500');
          $tooltip.fadeTo('10', 1.9);
        }).mousemove(function(e) {
          $tooltip.css('top', e.pageY + 10);
          $tooltip.css('left', e.pageX + 20);
        });
      },
      eventMouseout: function(calEvent, jsEvent) {
        $(this).css('z-index', 8);
        $('.tooltipevent').remove();
      }
    });
  });

  function displayMessage(message) {
    $(".response").html("<div class='success'>" + message + "</div>");
    setInterval(function() {
      $(".success").fadeOut();
    }, 1000);
  }
</script>
