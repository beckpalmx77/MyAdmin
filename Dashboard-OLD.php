<?php
include('includes/Header.php');
if (strlen($_SESSION['alogin']) == "") {
    header("Location: index.php");
} else {
    ?>

    <!DOCTYPE html>
    <html lang="th">
    <body id="page-top">

    <link href='vendor/mycalendar/core/main.css' rel='stylesheet'/>
    <link href='vendor/mycalendar/daygrid/main.css' rel='stylesheet'/>
    <link href='vendor/mycalendar/timegrid/main.css' rel='stylesheet'/>
    <link href='vendor/mycalendar/list/main.css' rel='stylesheet'/>
    <link href='vendor/mycalendar/bootstrap/css/bootstrap.css' rel='stylesheet'/>
    <link href="vendor/mycalendar/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href='vendor/mycalendar/datepicker/datepicker.css' rel='stylesheet'/>
    <link href='vendor/mycalendar/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet'/>
    <link href='vendor/mycalendar/css/style.css' rel='stylesheet'/>
    <script src='vendor/mycalendar/core/main.js'></script>
    <script src='vendor/mycalendar/daygrid/main.js'></script>
    <script src='vendor/mycalendar/timegrid/main.js'></script>
    <script src='vendor/mycalendar/list/main.js'></script>
    <script src='vendor/mycalendar/interaction/main.js'></script>
    <script src='vendor/mycalendar/jquery/jquery.js'></script>
    <script src='vendor/mycalendar/jqueryui/jqueryui.min.js'></script>
    <script src='vendor/mycalendar/bootstrap/js/bootstrap.js'></script>
    <script src='vendor/mycalendar/datepicker/datepicker.js'></script>
    <script src='vendor/mycalendar/colorpicker/bootstrap-colorpicker.min.js'></script>
    <script src='js/mycalendar.js'></script>

    <div id="wrapper">
        <?php
        include('includes/Side-Bar.php');
        ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include('includes/Top-Bar.php');
                ?>

                <div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Add Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="container-fluid">

                                    <form id="createEvent" class="form-horizontal">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div id="title-group" class="form-group">
                                                    <label class="control-label" for="title">Title</label>
                                                    <input type="text" class="form-control" name="title">
                                                    <!-- errors will go here -->
                                                </div>

                                                <div id="startdate-group" class="form-group">
                                                    <label class="control-label" for="startDate">Start Date</label>
                                                    <input type="text" class="form-control datetimepicker" id="startDate"
                                                           name="startDate">
                                                    <!-- errors will go here -->
                                                </div>

                                                <div id="enddate-group" class="form-group">
                                                    <label class="control-label" for="endDate">End Date</label>
                                                    <input type="text" class="form-control datetimepicker" id="endDate" name="endDate">
                                                    <!-- errors will go here -->
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div id="color-group" class="form-group">
                                                    <label class="control-label" for="color">Colour</label>
                                                    <input type="text" class="form-control colorpicker" name="color" value="#6453e9">
                                                    <!-- errors will go here -->
                                                </div>

                                                <div id="textcolor-group" class="form-group">
                                                    <label class="control-label" for="textcolor">Text Colour</label>
                                                    <input type="text" class="form-control colorpicker" name="text_color"
                                                           value="#ffffff">
                                                    <!-- errors will go here -->
                                                </div>

                                            </div>

                                        </div>


                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                            </form>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade" id="editeventmodal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Update Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <div class="container-fluid">

                                    <form id="editEvent" class="form-horizontal">
                                        <input type="hidden" id="editEventId" name="editEventId" value="">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div id="edit-title-group" class="form-group">
                                                    <label class="control-label" for="editEventTitle">Title</label>
                                                    <input type="text" class="form-control" id="editEventTitle" name="editEventTitle">
                                                    <!-- errors will go here -->
                                                </div>

                                                <div id="edit-startdate-group" class="form-group">
                                                    <label class="control-label" for="editStartDate">Start Date</label>
                                                    <input type="text" class="form-control datetimepicker" id="editStartDate"
                                                           name="editStartDate">
                                                    <!-- errors will go here -->
                                                </div>

                                                <div id="edit-enddate-group" class="form-group">
                                                    <label class="control-label" for="editEndDate">End Date</label>
                                                    <input type="text" class="form-control datetimepicker" id="editEndDate"
                                                           name="editEndDate">
                                                    <!-- errors will go here -->
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div id="edit-color-group" class="form-group">
                                                    <label class="control-label" for="editColor">Colour</label>
                                                    <input type="text" class="form-control colorpicker" id="editColor" name="editColor"
                                                           value="#6453e9">
                                                    <!-- errors will go here -->
                                                </div>

                                                <div id="edit-textcolor-group" class="form-group">
                                                    <label class="control-label" for="editTextColor">Text Colour</label>
                                                    <input type="text" class="form-control colorpicker" id="editTextColor"
                                                           name="editTextColor" value="#ffffff">
                                                    <!-- errors will go here -->
                                                </div>

                                            </div>

                                        </div>

                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-danger" id="deleteEvent" data-id>Delete</button>
                            </div>

                            </form>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="container">

                    <p><br></p>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addeventmodal">
                        Add Event
                    </button>

                    <div id="calendar"></div>
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





    </body>

    </html>
<?php } ?>