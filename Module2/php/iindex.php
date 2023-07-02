




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Calendar View</title>
    <link rel="stylesheet" href="../MODULE1/PUVA/styleSheet/index_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
   
</head>
<body>
    <a href="./index.php"><img class="logo" src="../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../Views/broadcast/index.php" style="text-decoration: none;">Broadcast</a>
        <a href="../Views/viewProgress/index.php" style="text-decoration: none;">Progress</a>
        <a href="../Views/report/index.php" style="text-decoration: none;">Report</a>
        <a href="../logout.php" id="logout" style="text-decoration: none; float:right;">Logout</a>
        <a href="../Views/Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h2 id="title">Calendar View</h2>

    <br><br>
    <div class="background_calendar">
        <script>

            $(document).ready(function(){
                var calendar = $('#calendar').fullCalendar({
                    editable:true, //enable to edit the events
                    header:{ //button for calendar required
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month, agendaWeek, agendaDay'
                    },
                    events: 'read.php', //to read all the data to database
                    selectable: true,
                    selectHelper: true, //help user to highlight the multi-date
                    select: function(start, end, allDay)
                    {
                        var title = prompt("Enter Event Title");
                        if(title)
                        {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            $.ajax({
                                url:"add.php",
                                type:"POST",
                                data:{title:title, start:start, end:end},
                                success:function()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Added Successfully");
                                }
                            })
                        }
                    },
                    editable:true,
                    eventResize:function(event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id},
                            success:function(){
                                calendar.fullCalendar('refetchEvents');
                                alert('Event Update');
                            }
                        })
                    },

                    eventDrop:function(event)
                    {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url:"update.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Updated");
                            }
                        });
                    },

                    eventClick:function(event)
                    {
                        if(confirm("Are you sure you want to remove it?"))
                        {
                            var id = event.id;
                            $.ajax({
                                url:"delete.php",
                                type:"POST",
                                data:{id:id},
                                success:function()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Removed");
                                }
                            })
                        }
                    },
                });
            });
        </script>
    </div>

    <div class="container">
        <div id="calendar"></div>
    </div>

</body>
</html>