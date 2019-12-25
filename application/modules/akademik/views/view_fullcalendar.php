<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/id.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css" rel="stylesheet" media="print">
</head>

<body>

  <div class="container">
    <h3>Kalender Akademik <br><?= $sekolah['sekolah'] ?> </h3>
    <div class="row">
      <div class="col-md-12">
        <div id="calendar"></div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var events = <?php echo json_encode($data) ?>;


    var date = new Date()
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear()

    $('#calendar').fullCalendar({
      locale: 'id',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaDay,listMonth'
      },
      buttonText: {
        today: 'Sekarang',
        month: 'Bulanan',
        day: 'Harian',
        list: 'Agenda'
      },
      events: events
    })
  </script>

</body>

</html>