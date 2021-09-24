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

                    <div class="row mb-3">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><p class="text-success"
                                                                                                   id="Text1"></p></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i
                                                            class="fa fa-arrow-up"></i> 3.48%</span>
                                                <span>Since last month</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i
                                                            class="fas fa-arrow-up"></i> 12%</span>
                                                <span>Since last years</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New User Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <span class="text-success mr-2"><i
                                                            class="fas fa-arrow-up"></i> 20.4%</span>
                                                <span>Since last month</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                            <span class="text-danger mr-2"><i
                                                        class="fas fa-arrow-down"></i> 1.10%</span>
                                                <span>Since yesterday</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
        <div class="modal fade" id="EventModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="ModalHeader">Carlendar Event</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form id="editEventFrm" class="form-horizontal">
                                <input type="hidden" id="id" name="id" value="">
                                <div class="row">
                                    <div-- class="col-md-12">
                                        <div id="edit-title-group" class="form-group">
                                            <label class="control-label" for="title">Event Detail</label>
                                            <input type="text" class="form-control" id="title"
                                                   name="title">
                                        </div>
                                </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" id="action" name="action" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="editEvent" data-id>Update</button>
                        <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Delete</button>
                    </div>

                </div>
            </div>
            </form>
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

    <script>

        $(document).ready(function () {
            let earn_value = 1;
            document.getElementById("Text1").innerHTML = earn_value.toString();
            setInterval(function () {
                earn_value = earn_value + 1;
                document.getElementById("Text1").innerHTML = earn_value.toString();
            }, 3000);
        });
        
    </script>

    <script>

        $(document).ready(function () {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                defaultView: 'dayGridMonth', // ค้าเริ่มร้นเมื่อโหลดแสดงปฏิทิน
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                eventLimit: true, // allow "more" link when too many events
                locale: 'th',
                events: 'api/calendar_api.php',
                dateClick: function (info) {
                    let action = "ADD";
                    let param = "1";
                    let id = "";
                    let date = info.dateStr;
                    let title = prompt("Event Detail");
                    if (title != null) {
                        calendar.addEvent({
                            title: title,
                            start: date,
                            allDay: true
                        });
                        let formData = {action: action, id: id, title: title, date: date};
                        Manage_Calendar(param, formData);
                    }
                },
                eventClick: function (info) {
                    let id = info.event.id;
                    let title = info.event.title;
                    $('#id').val(id);
                    $('#title').val(title);
                    $('#action').val("UPDATE");
                    $('#EventModal').modal('show');
                }
            });
            calendar.render();
        });

    </script>

    <script>

        $("#editEvent").click(function () {
            $('#action').val("UPDATE");
            let formData = $('#editEventFrm').serialize();
            let param = 2;
            Manage_Calendar(param, formData);
        });

    </script>

    <script>

        $("#deleteEvent").click(function () {
            $('#action').val("DELETE");
            let param = 2;
            let formData = $('#editEventFrm').serialize();
            Manage_Calendar(param, formData);
        });

    </script>

    <script>
        function Manage_Calendar(param, formData) {
            let method = param;
            $.ajax({
                url: 'model/manage_calendar_process.php',
                method: "POST",
                data: formData,
                success: function (data) {
                    alertify.success(data);
                    if (method == 2) {
                        $('#EventModal').modal('hide');
                        location.reload();
                    }
                }
            })
        }
    </script>

    </body>

    </html>
<?php } ?>