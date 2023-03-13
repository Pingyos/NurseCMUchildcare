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
  && isset($_POST['databirth'])
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
      (name_parent, tel_parent, province, district, parish, name_father, work_father,  databirth, title, name_child, nickname, birthday, date)
      VALUES
      (:name_parent, :tel_parent, :province, :district, :parish, :name_father, :work_father, :databirth, :title, :name_child, :nickname, :birthday, :date)");
  //bindParam data type
  $stmt->bindParam(':name_parent', $_POST['name_parent'], PDO::PARAM_STR);
  $stmt->bindParam(':tel_parent', $_POST['tel_parent'], PDO::PARAM_STR);
  $stmt->bindParam(':province', $_POST['province'], PDO::PARAM_STR);
  $stmt->bindParam(':district', $_POST['district'], PDO::PARAM_STR);
  $stmt->bindParam(':parish', $_POST['parish'], PDO::PARAM_STR);
  $stmt->bindParam(':name_father', $_POST['name_father'], PDO::PARAM_STR);
  $stmt->bindParam(':work_father', $_POST['work_father'], PDO::PARAM_STR);
  $stmt->bindParam(':databirth', $_POST['databirth'], PDO::PARAM_STR);
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
        setTimeout(function() {
            swal({
                title: "Add data Success",
                type: "success"
            }, function() {
                window.location = "index.php";
            });
        }, 200);
    </script>';
  } else {
    echo '<script>
         setTimeout(function() {
          swal({
              title: "Add date Error",
              type: "error"
          }, function() {
              window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
          });
        }, 200);
    </script>';
  }
  $conn = null; //close connect db

} //isset
