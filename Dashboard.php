<?php
include('includes/Header.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    ?>

    <!DOCTYPE html>
    <html lang="th">
    <body id="page-top">
    <div id="wrapper">
        <?php
        include('includes/Side-Bar.php');
        ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include('includes/Top-Bar.php');
                ?>
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-12">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                </div>
                                <div class="card-body">
                                    <section class="container-fluid">
                                        <div id='calendar'></div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('includes/Modal-Logout.php');
    include('includes/Footer.php');
    ?>
    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/myadmin.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

    <link href='vendor/calendar/main.css' rel='stylesheet'/>
    <script src='vendor/calendar/main.js'></script>
    <script src='vendor/calendar/locales/th.js'></script>

    <!--script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    center: 'addEventButton'
                },
                customButtons: {
                    addEventButton: {
                        text: 'add event...',
                        click: function () {
                            let dateStr = prompt('Enter a date in YYYY-MM-DD format');
                            let date = new Date(dateStr + 'T00:00:00'); // will be in local time

                            if (!isNaN(date.valueOf())) { // valid?
                                calendar.addEvent({
                                    title: 'dynamic event',
                                    start: date,
                                    allDay: true
                                });
                                alert('Great. Now, update your database...');
                            } else {
                                alert('Invalid date.');
                            }
                        }
                    }
                }
            });

            calendar.render();
        });


    </script-->

    <script>

        $(document).ready(function () {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                dateClick: function (info) {
                    let date = info.dateStr;
                    let title = prompt("Please enter event");
                    if (title != null) {
                        calendar.addEvent({
                            title: title,
                            start: date,
                            allDay: true
                        });
                        Save_Calendar(title, date);
                    }
                }
            });
            calendar.render();
        });

    </script>

    <script>
        function Save_Calendar(title, date) {
            let formData = {action: "ADD", title: title, date: date};
            $.ajax({
                url: 'model/manage_calendar_process.php',
                method: "POST",
                data: formData,
                success: function (data) {
                    alertify.success(data);
                }
            })
        }
    </script>

    </body>

    </html>
<?php } ?>