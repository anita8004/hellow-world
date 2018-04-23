<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'edit_member';

 if (isset($_POST['nickname'])) {
     $sql = "UPDATE `member` SET `mobile`=?,`address`=?,`birthday`=?,`nickname`=? WHERE `id`=?";
     $stmt =$mysqli->prepare($sql);
     if($mysqli->errno){
         echo $mysqli->error;
         exit;
     }
     $stmt->bind_param('ssssi',$_POST['mobile'],$_POST['address'],$_POST['birthday'],$_POST['nickname'],$_SESSION['user']['id']);

     $stmt->execute();
     $affected_rows = $stmt->affected_rows;
     $stmt->close();
 }

 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">EDIT MEMBER</h2>

        <?php include __DIR__ . '/member_nav.php' ?>

        <div class="row">
            <div class="col-6">
                <form id="register_form" method="post">
                    <div class="form-group">
                        <label for="nickname">Nick Name *</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="" value="<?= $_SESSION['user']['nickname'] ?>">
                        <small class="form-text text-muted">至少輸入2個字元</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Account ( Email ) *</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" disabled>
                        <small class="form-text text-muted">請輸入正確的Email</small>
                    </div>
                    <!-- <div class="form-group">
                        <label for="password">Old Password *</label>
                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" value="" placeholder="">
                        <small class="form-text text-muted">請輸入原來的密碼</small>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                        <small class="form-text text-muted">請輸入6個字元以上英數字</small>
                    </div> -->
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= $_SESSION['user']['mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $_SESSION['user']['birthday'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" value="<?= $_SESSION['user']['address'] ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info register_btn">Save</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
            <?php if(isset($affected_rows)): ?>
                <?php if($affected_rows==1): ?>
                    <div id="main_alert" class="alert alert-success" role="alert" style="display:block;">
                        資料修改完成
                    </div>
                <?php else: ?>
                    <div id="main_alert" class="alert alert-warning" role="alert" style="display:block;">
                        資料沒有修改
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            </div>
        </div>

    </div>

    
<?php include __DIR__ . '/_foot.php' ?>