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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo urldecode($_GET['s']) ?></h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><?php echo urldecode($_GET['m']) ?></li>
                            <li class="breadcrumb-item active"
                                aria-current="page"><?php echo urldecode($_GET['s']) ?></li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-12">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                </div>
                                <div class="card-body">
                                    <section class="container-fluid">

                                        <div class="col-md-12 col-md-offset-2">
                                            <label for="name_t"
                                                   class="control-label"><b>เพิ่ม <?php echo urldecode($_GET['s']) ?></b></label>

                                            <button type='button' name='btnAdd' id='btnAdd'
                                                    class='btn btn-primary btn-xs'>Add
                                            </button>
                                        </div>

                                        <div class="col-md-12 col-md-offset-2">
                                            <table id='TableRecordList' class='display dataTable'>
                                                <thead>
                                                <tr>
                                                    <th>รหัสสินค้า/อะไหล่</th>
                                                    <th>ชื่อสินค้า/อะไหล่</th>
                                                    <th>ยอดคงเหลือ</th>
                                                    <th>หน่วยนับ</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>รหัสสินค้า/อะไหล่</th>
                                                    <th>ชื่อสินค้า/อะไหล่</th>
                                                    <th>ยอดคงเหลือ</th>
                                                    <th>หน่วยนับ</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                            <div id="result"></div>

                                        </div>

                                        <!--/div-->
                                        <!-- /.row -->

                                    </section>


                                </div>

                            </div>

                        </div>

                    </div>
                    <!--Row-->

                    <!-- Row -->

                </div>

                <div id="recordModal" class="modal fade">
                    <div class="modal-dialog">
                        <form method="post" id="recordForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group"
                                    <label for="product_id" class="control-label">รหัสสินค้า/อะไหล่</label>
                                    <input type="product_id" class="form-control" id="product_id" name="product_id"
                                           required="required"
                                           placeholder="รหัสสินค้า/อะไหล่">
                                </div>

                                <div class="form-group">
                                    <label for="name_t" class="control-label">ชื่อสินค้า/อะไหล่</label>
                                    <input type="text" class="form-control" id="name_t" name="name_t"
                                           required="required"
                                           placeholder="ชื่อสินค้า/อะไหล่">
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="control-label">ยอดคงเหลือ</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity"
                                           required="required"
                                           placeholder="ยอดคงเหลือ">
                                </div>
                                <div class=”form-group”>
                                    <label for="unit_id" class="control-label">หน่วยนับ</label>
                                    <select id="unit_id" name="unit_id"
                                            class="form-control" data-live-search="true"
                                            title="Please select">
                                        <!--option>KG</option>
                                        <option>Nos</option-->
                                    </select>
                                </div>


                                <div class=”form-group”>
                                    <label for="status" class="control-label">Status</label>
                                    <select id="status" name="status"
                                            class="form-control" data-live-search="true"
                                            title="Please select">
                                        <option>Active</option>
                                        <option>InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="id"/>
                                <input type="hidden" name="action" id="action" value=""/>
                                <input type="submit" name="save" id="save" class="btn btn-primary" value="Save"/>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                </div>

            </div>


            <!---Container Fluid-->

        </div>

        <?php
        include('includes/Modal-Logout.php');
        include('includes/Footer.php');
        ?>

    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/myadmin.min.js"></script>

    <!-- Page level plugins -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css"/>

    <script>

        $("#product_id").blur(function () {
            let method = $('#action').val();
            if (method === "ADD") {
                let product_id = $('#product_id').val();
                let formData = {action: "SEARCH", product_id: product_id};
                $.ajax({
                    url: 'model/manage_product_process.php',
                    method: "POST",
                    data: formData,
                    success: function (data) {
                        if (data == 2) {
                            alert("Duplicate มีข้อมูลนี้แล้วในระบบ กรุณาตรวจสอบ");
                        }
                    }
                })
            }
        });

    </script>
    <script>
        $(document).ready(function () {

            let dataRecords = $('#TableRecordList').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'model/get_product_records.php'
                },
                'columns': [
                    {data: 'product_id'},
                    {data: 'name_t'},
                    {data: 'quantity', className: 'text-right'},
                    {data: 'unit_id'},
                    {data: 'status'},
                    {data: 'update'},
                    {data: 'delete'}
                ]
            });

            <!-- *** FOR SUBMIT FORM *** -->
            $("#recordModal").on('submit', '#recordForm', function (event) {
                event.preventDefault();
                $('#save').attr('disabled', 'disabled');
                let formData = $(this).serialize();
                $.ajax({
                    url: 'model/manage_product_process.php',
                    method: "POST",
                    data: formData,
                    success: function (data) {
                        alertify.success(data);
                        $('#recordForm')[0].reset();
                        $('#recordModal').modal('hide');
                        $('#save').attr('disabled', false);
                        dataRecords.ajax.reload();
                    }
                })
            });
            <!-- *** FOR SUBMIT FORM *** -->
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#btnAdd").click(function () {
                $('#recordModal').modal('show');
                $('#id').val("");
                $('#product_id').val("");
                $('#name_t').val("");
                $('#quantity').val("");
                $('.modal-title').html("<i class='fa fa-plus'></i> ADD Record");
                $('#action').val('ADD');
                $('#save').val('Save');
            });
        });

    </script>

    <script>

        $("#TableRecordList").on('click', '.update', function () {
            let id = $(this).attr("id");
            let formData = {action: "GETDATA", id: id};
            $.ajax({
                type: "POST",
                url: 'model/manage_product_process.php',
                dataType: "json",
                data: formData,
                success: function (response) {
                    let len = response.length;
                    for (let i = 0; i < len; i++) {
                        let id = response[i].id;
                        let product_id = response[i].product_id;
                        let name_t = response[i].name_t;
                        let quantity = response[i].quantity;
                        let unit_id = response[i].unit_id;
                        let status = response[i].status;

                        $('#recordModal').modal('show');
                        $('#id').val(id);
                        $('#product_id').val(product_id);
                        $('#name_t').val(name_t);
                        $('#quantity').val(quantity);
                        $('#unit_id').val(unit_id);
                        $('#status').val(status);
                        $('.modal-title').html("<i class='fa fa-plus'></i> Edit Record");
                        $('#action').val('UPDATE');
                        $('#save').val('Save');

                    }
                },
                error: function (response) {
                    alertify.error("error : " + response);
                }
            });
        });

    </script>

    <script>

        $("#TableRecordList").on('click', '.delete', function () {
            let id = $(this).attr("id");
            let formData = {action: "GETDATA", id: id};
            $.ajax({
                type: "POST",
                url: 'model/manage_product_process.php',
                dataType: "json",
                data: formData,
                success: function (response) {
                    let len = response.length;
                    for (let i = 0; i < len; i++) {
                        let id = response[i].id;
                        let product_id = response[i].product_id;
                        let name_t = response[i].name_t;
                        let quantity = response[i].quantity;
                        let unit_id = response[i].unit_id;
                        let status = response[i].status;

                        $('#recordModal').modal('show');
                        $('#id').val(id);
                        $('#product_id').val(product_id);
                        $('#name_t').val(name_t);
                        $('#quantity').val(quantity);
                        $('#unit_id').val(unit_id);
                        $('#status').val(status);
                        $('.modal-title').html("<i class='fa fa-minus'></i> Delete Record");
                        $('#action').val('DELETE');
                        $('#save').val('Confirm Delete');
                    }
                },
                error: function (response) {
                    alertify.error("error : " + response);
                }
            });
        });

    </script>


    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        $(document).ready(function(){

            $('#unit_id').selectpicker();
                $.ajax({
                    url:"model/manage_product_process.php",
                    method:"POST",
                    data:{action:"FIND_UNIT"},
                    dataType:"json",
                    success:function(data)
                    {
                        let html = '';
                        for(let count = 0; count < data.length; count++)
                        {
                            html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
                        }
                    }
                })
            }

    </script>


    </body>

    </html>

<?php } ?>