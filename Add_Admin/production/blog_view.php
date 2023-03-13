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
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="blog_name">blog_name:</label>
                                                                <input type="text" id="blog_name" class="form-control" name="blog_name" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="blog_name">blog_name:</label>
                                                                <input type="text" id="blog_details" class="form-control" name="blog_details" required />
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="blog_name">img_file:</label>
                                                                <input type="file" name="img_file" required class="form-control" accept="image/jpeg, image/png, image/jpg">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="blog_name_b2">blog_name_b2:</label>
                                                                <input type="text" id="blog_name_b2" class="form-control" name="blog_name_b2" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="detail_b2">detail_b2 :</label>
                                                                <input type="text" id="detail_b2" class="form-control" name="detail_b2" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="blog_name_b3">blog_name_b3:</label>
                                                                <input type="text" id="blog_name_b3" class="form-control" name="blog_name_b3" required />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="detail_b3">detail_b3 :</label>
                                                                <input type="text" id="detail_b3" class="form-control" name="detail_b3" required />
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="form-control">Submit</button>
                                                    </form>
                                                    <?php

                                                    if (isset($_POST['blog_name'])) {
                                                        require_once 'connection.php';
                                                        //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
                                                        $date1 = date("Ymd_His");
                                                        //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
                                                        $numrand = (mt_rand());
                                                        $img_file = (isset($_POST['img_file']) ? $_POST['img_file'] : '');
                                                        $upload = $_FILES['img_file']['name'];

                                                        //มีการอัพโหลดไฟล์
                                                        if ($upload != '') {
                                                            //ตัดขื่อเอาเฉพาะนามสกุล
                                                            $typefile = strrchr($_FILES['img_file']['name'], ".");

                                                            //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
                                                            if ($typefile == '.jpg' || $typefile  == '.jpeg' || $typefile  == '.png') {

                                                                //โฟลเดอร์ที่เก็บไฟล์
                                                                $path = "upload/";
                                                                //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                                                                $newname = $numrand . $date1 . $typefile;
                                                                $path_copy = $path . $newname;
                                                                //คัดลอกไฟล์ไปยังโฟลเดอร์
                                                                move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

                                                                //ประกาศตัวแปรรับค่าจากฟอร์ม
                                                                $blog_name = $_POST['blog_name'];
                                                                $blog_details = $_POST['blog_details'];
                                                                $blog_name_b2 = $_POST['blog_name_b2'];
                                                                $detail_b2 = $_POST['detail_b2'];
                                                                $blog_name_b3 = $_POST['blog_name_b3'];
                                                                $detail_b3 = $_POST['detail_b3'];

                                                                //sql insert
                                                                $stmt = $conn->prepare("INSERT INTO blog (blog_name,blog_details, blog_name_b2, blog_name_b3, detail_b2, detail_b3, img_file)
                                                                VALUES (:blog_name, :blog_details, :blog_name_b2, :blog_name_b3, :detail_b2, :detail_b3,'$newname')");
                                                                $stmt->bindParam(':blog_name', $blog_name, PDO::PARAM_STR);
                                                                $stmt->bindParam(':blog_details', $blog_details, PDO::PARAM_STR);
                                                                $stmt->bindParam(':blog_name_b2', $blog_name_b2, PDO::PARAM_STR);
                                                                $stmt->bindParam(':detail_b2', $detail_b2, PDO::PARAM_STR);
                                                                $stmt->bindParam(':blog_name_b3', $blog_name_b3, PDO::PARAM_STR);
                                                                $stmt->bindParam(':detail_b3', $detail_b3, PDO::PARAM_STR);
                                                                $result = $stmt->execute();
                                                                //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
                                                                if ($result) {
                                                                    echo '<script>
                                                                    setTimeout(function() {
                                                                    swal({
                                                                        title: "อัพโหลดภาพสำเร็จ",
                                                                        type: "success"
                                                                    }, function() {
                                                                        window.location = "upload.php"; //หน้าที่ต้องการให้กระโดดไป
                                                                    });
                                                                    }, 1000);
                                                                </script>';
                                                                } else {
                                                                    echo '<script>
                                                                    setTimeout(function() {
                                                                    swal({
                                                                        title: "เกิดข้อผิดพลาด",
                                                                        type: "error"
                                                                    }, function() {
                                                                        window.location = "upload.php"; //หน้าที่ต้องการให้กระโดดไป
                                                                    });
                                                                    }, 1000);
                                                                </script>';
                                                                } //else ของ if result


                                                            } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
                                                                echo '<script>
                                                                setTimeout(function() {
                                                                swal({
                                                                    title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                                                                    type: "error"
                                                                }, function() {
                                                                    window.location = "upload.php"; //หน้าที่ต้องการให้กระโดดไป
                                                                });
                                                                }, 1000);
                                                            </script>';
                                                            } //else ของเช็คนามสกุลไฟล์

                                                        } // if($upload !='') {

                                                        $conn = null; //close connect db
                                                    } //isset
                                                    ?>
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