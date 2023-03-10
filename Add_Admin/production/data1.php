<!DOCTYPE html>
<?php require_once 'head.php'; ?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php require_once 'sidebar.php'; ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="x_panel">
                                                <div class="x_content">
                                                    <!-- start form for validation -->
                                                    <form id="demo-form" data-parsley-validate>
                                                        <?php
                                                        if (isset($_GET['id'])) {
                                                            require_once 'connection.php';
                                                            $stmt = $conn->prepare("SELECT* FROM childcare WHERE id=?");
                                                            $stmt->execute([$_GET['id']]);
                                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                            if ($stmt->rowCount() < 1) {
                                                                header('Location: index.php');
                                                                exit();
                                                            }
                                                        } //isset
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['name_parent']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['tel_parent']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['province']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['district']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['parish']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['name_father']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['work_father']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['title']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['name_child']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['nickname']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['birthday']; ?>" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="fullname">Full Name * :</label>
                                                                <input type="text" id="fullname" class="form-control" name="fullname" value="<?= $row['date']; ?>" required />
                                                            </div>

                                                        </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="item form-group">
                                                            <div class="col-md-6 col-sm-6 offset-md-6">
                                                                <button class="btn btn-primary" type="button">Cancel</button>
                                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <!-- end form for validations -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>