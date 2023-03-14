<?php require_once 'head.php'; ?>

<body>
    <?php
    require_once 'navbar.php';
    require_once 'header.php';
    ?>



    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">ห้องเรียนยอดนิยอม</span></p>
                <h1 class="mb-4">ชั้นเรียนสำหรับเด็ก</h1>
            </div>
            <div class="row">
                <?php
                require_once 'connection.php';
                $stmt = $conn->prepare("SELECT * FROM room");
                $stmt->execute();
                $results = $stmt->fetchAll();
                foreach ($results as $t4) {
                ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <img class="card-img-top mb-2" src="Add_Admin/production/upload/room/<?php echo $t4['img_file']; ?>">
                            <div class="card-body text-center">
                                <h4 class="card-title"><?= $t4['name_h']; ?></h4>
                                <p class="card-text"><?= $t4['name_d']; ?></p>
                            </div>
                            <div class="card-footer bg-transparent py-4 px-5">
                                <div class="row border-bottom">
                                    <div class="col-6 py-1 text-right border-right"><strong>Age</strong></div>
                                    <div class="col-6 py-1"><?= $t4['age']; ?></div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-6 py-1 text-right border-right"><strong>Number of Students</strong></div>
                                    <div class="col-6 py-1"><?= $t4['num_sum']; ?></div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-6 py-1 text-right border-right"><strong>Time</strong></div>
                                    <div class="col-6 py-1"><?= $t4['time']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-6 py-1 text-right border-right"><strong>Semester Fees</strong></div>
                                    <div class="col-6 py-1"><?= $t4['buy_sum']; ?></div>
                                </div>
                            </div>
                            <a href="class.php" class="btn btn-primary px-4 mx-auto mb-4">Join Class</a>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <!-- Class End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">สาระความรู้</span></p>
                <h1 class="mb-4">บทความ</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="img/blog-1-1.jpg" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">เคล็ดไม่ลับสร้างนักอ่านวัยจิ๋ว</h4>
                            <p>อ่านให้ลูกเห็นเป็นประจํา พ่อแม่ควรทําเป็นตัวอย่าง
                                เมื่อเด็กเห็นว่าพ่อแม่ทําอะไรเขาก็จะทําตามเวลาที่พ่อแม่อ่านให้ฟัง เปิดภาพให้ดู พูดคุยกับเด็ก เปิดโอกาสให้เด็กได้โต้ตอบแสดงความคิดเห็น ฯ </p>
                            <a href="" class="btn btn-primary px-4 mx-auto
                                    my-2">อ่านบทความ</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="img/blog-2-2.jpg" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">การส่งเสริมการอ่านในเด็กทารก</h4>
                            <p>การอ่านหนังสือให้ทารกในครรภ์ การอ่านหนังสือให้ลูกฟังตั้งแต่อยู่ในท้องเด็กจะมีความจํายิ่งถ้าพ่อแม่มีการต่อยอดหลังลูกคลอดออกมา เด็กก็จะยิ่งมีพัฒนาการทางภาษาที่ดีขึ้นและเรียนรู้ได้เร็วขึ้น ฯ </p>
                            <a href="" class="btn btn-primary px-4 mx-auto
                                    my-2">อ่านบทความ</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="img/blog.jpg" alt="">
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">การดูแลเด็กที่ป่วยโรคมือเท้าปาก</h4>
                            <p>ดูแลไม่ให้ลูกมีไข้สูง ไข้สูงทำให้เด็ฏรู้สึกไม่สบายตัวควรให้รับประทานยาแก้ปวดลดไข้ เช่น พาราเซตามอลหรือยาโอบูโพรเฟน โดยให้ยาตามปริมาณที่เหมาะสมกับน้ำหนักของเด็ก</p>
                            <a href="" class="btn btn-primary px-4 mx-auto
                                    my-2">อ่านบทความ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <?php require_once 'footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>