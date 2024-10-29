<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</head>
<body>
    <div id="calendar"></div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                navLinks: true, 
                eventLimit: true, 
                events: {
                    url: 'fetch-event.php', 
                    type: 'GET',
                    dataType: 'json', // Expect JSON response
                    success: function(data) {
                      
                        let events = data.map(event => {
                            return {
                                title: event.title,
                            };
                        });
                        return events; 
                    },
                    error: function() {
                        alert('There was an error while fetching events.');
                    }
                }
            });
        });
    </script>
</body>
</html>
