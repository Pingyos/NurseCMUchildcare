<?php

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

if (
    isset($_POST['name_parent'])
    && isset($_POST['tel_parent'])
    && isset($_POST['province'])
    && isset($_POST['district'])
    && isset($_POST['parish'])
    && isset($_POST['name_father'])
    && isset($_POST['work_father'])
    && isset($_POST['birth'])
    && isset($_POST['title'])
    && isset($_POST['name_child'])
    && isset($_POST['nickname'])
    && isset($_POST['birthday'])
    && isset($_POST['date'])

) {

    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connection.php';
    //sql insert
    $stmt = $conn->prepare("INSERT INTO childcare
      (name_parent, tel_parent, province, parish, name_father, work_father,birth, title, name_child, nickname, birthday, date)
      VALUES
      (:name_parent, :tel_parent, :province, :parish, :name_father, :work_father, :birth, :title, :name_child, :nickname, :birthday, :date)");
    //bindParam data type
    $stmt->bindParam(':name_parent', $_POST['name_parent'], PDO::PARAM_STR);
    $stmt->bindParam(':tel_parent', $_POST['tel_parent'], PDO::PARAM_STR);
    $stmt->bindParam(':province', $_POST['province'], PDO::PARAM_STR);
    $stmt->bindParam(':parish', $_POST['parish'], PDO::PARAM_STR);
    $stmt->bindParam(':name_father', $_POST['name_father'], PDO::PARAM_STR);
    $stmt->bindParam(':work_father', $_POST['work_father'], PDO::PARAM_STR);
    $stmt->bindParam(':rec_fullname', $_POST['rec_fullname'], PDO::PARAM_STR);
    $stmt->bindParam(':birth', $_POST['birth'], PDO::PARAM_STR);
    $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $stmt->bindParam(':name_child', $_POST['name_child'], PDO::PARAM_STR);
    $stmt->bindParam(':nickname', $_POST['nickname'], PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $_POST['birthday'], PDO::PARAM_STR);
    $stmt->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
    $result = $stmt->execute();
    $conn = null; //close connect db
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
    if ($result) {
        echo '<script>
      swal({
          title: "บันทึกข้อมูลบริจาคสำเร็จ", 
          text: "ระบบจะทำการ Generator cq code เพื่อให้ท่านได้ชำระเงิน กรุณารอสักครู่",
          type: "success", 
          timer: 3000, 
          showConfirmButton: false 
        }, function(){
          window.location.href = "index.php"; 
          });
    </script>';
    } else {
        echo '<script>
      swal({
        title: "เกิดข้อผิดพลาด",
        type: "error"
      }, function() {
        window.location = "index ate_no_receipt.php";
      });
    </script>';
    }
    //else ของ if result

} //isset
