<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'data_edit';

 $sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

 if(empty($sid)){
     header("Location: data_list.php");
     exit;
};

 $rs = $mysqli->query("SELECT * FROM address_book WHERE sid=$sid");
 if($rs->num_rows < 1) {
     header("Location: data_list.php");
     exit;

 }

 $row = $rs->fetch_assoc();

 if (isset($_POST['name'])) {

     $sql = "UPDATE `address_book` SET `name`=?,`mobile`=?,`email`=?,`birthday`=?,`address`=?,`created_at`=? WHERE `sid`=?";

     $stmt = $mysqli->prepare($sql);

     $stmt->bind_param('ssssssi',
         $_POST['name'],
         $_POST['mobile'],
         $_POST['email'],
         $_POST['birthday'],
         $_POST['address'],
         $_POST['created_at'],
         $sid
     );

     $stmt->execute();
     $affected_rows =  $stmt->affected_rows;

     $stmt->close();
 }

$name = isset($_POST['name']) ? $_POST['name'] : $row['name'];
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : $row['mobile'];
$email = isset($_POST['email']) ? $_POST['email'] : $row['email'];
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : $row['birthday'];
$address = isset($_POST['address']) ? $_POST['address'] : $row['address'];



 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">DATA EDIT</h2>

        <div class="row">
            <div class="col-6">
                <form class="data_insert_form" method="post" onsubmit="return formCheck()">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Please enter name" value="<?= $name ?>">
                        <small id="name_info" class="form-text text-muted">請輸入正確的姓名</small>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= $mobile ?>">
                        <small id="mobile_info" class="form-text text-muted">請輸入十位數的手機</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                        <small id="email_info" class="form-text text-muted">請輸入正確的Email</small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $birthday ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" value="<?= $address ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-info reset-btn">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <?php if(isset($affected_rows)): ?>
                    <?php if($affected_rows==1): ?>
                        <div class="alert alert-success" role="alert">
                            資料修改完成
                        </div>
                    <?php elseif($affected_rows==-1): ?>
                        <div class="alert alert-danger" role="alert">
                            手機重複了
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning" role="alert">
                            資料沒有修改
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>

    </div>

    <script>
        let f_name = $('#name');
        let f_mobile = $('#mobile');
        let f_email = $('#email');
        let f_name_info = $('#name_info');
        let f_mobile_info = $('#mobile_info');
        let f_email_info = $('#email_info');

        function formCheck() {
            let email_regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            let isPass = true;
            f_name_info.hide();
            f_mobile_info.hide();
            f_email_info.hide();

            if(f_name.val().length<2) {
                isPass = false;
                f_name_info.show();
            }
            if(f_mobile.val().length!==10) {
                isPass = false;
                f_mobile_info.show();
            }
            if(!email_regex.test(f_email.val())) {
                isPass = false;
                f_email_info.show();
            }
            return isPass;
        }


        $('#mobile').on('keyup', function () {
            if(f_mobile.val().length!==10) {
                f_mobile_info.show();
            } else {
                f_mobile_info.hide();
            }
        });

        $('#email').on('keyup', function () {
            if(!email_regex.test(f_email.val())) {
                f_email_info.show();
            } else {
                f_email_info.hide();
            }
        });

        $('.reset-btn').on('click', function () {
            $('.form-control').val('');
            return false;
        })
    </script>

<?php include __DIR__ . '/_foot.php' ?>