<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'login';

 if (isset($_POST['email'])){

    $doCheck = true;
    $sql = sprintf("SELECT `id`, `email`, `mobile`, `address`, `birthday`, `nickname` FROM `member` WHERE `email`='%s' AND `password`='%s'", $mysqli->escape_string($_POST['email']), sha1($_POST['password']));
    $rs = $mysqli->query($sql);

    if($rs->num_rows==1){
        $row = $rs->fetch_assoc();
        $_SESSION['user'] = $row;
    } else {
        $doCheck = false;
    }

    // echo $doCheck ? 'ttt' : 'fff';
    // exit;
 } else {
     unset($_SESSION['come_from']);
     if (! empty($_SERVER['HTTP_REFERER'])){
        $_SESSION['come_from'] = $_SERVER['HTTP_REFERER'];
     }
 }


 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">LOGIN</h2>

        <div class="row">
            <div class="col-6">
                <form id="login_form" method="post" onsubmit="return checkform();">
                    <div class="form-group">
                        <label for="email">Account ( Email ) *</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                        <small class="form-text text-muted">請輸入Email</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info login_btn">Submit</button>
                        <button type="reset" class="btn btn-info reset-btn">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <?php if(isset($doCheck)):  ?>
                    <?php if(isset($_SESSION['user'])):  ?>
                        <div id="main_alert" class="alert alert-success" role="alert">
                            登入完成
                        </div>
                        <script>
                            setTimeout(function(){
                                <?php if (empty($_SESSION['come_from'])): ?>
                                    location.href = './';
                                <?php else: ?>
                                location.href = '<?= $_SESSION['come_from'] ?>';
                                <?php endif; unset($_SESSION['come_from']) ?>
                            }, 500);
                        </script>
                    <?php else: ?>
                        <div id="main_alert" class="alert alert-danger" role="alert">
                            帳號或密碼錯誤
                        </div>
                    <?php endif;  ?>
                <?php endif;  ?>
                <!-- <div class="alert alert-danger" role="alert" id="nickname_info"></div>
                <div class="alert alert-danger" role="alert" id="email_info"></div>
                <div class="alert alert-danger" role="alert" id="password_info"></div>
                <div class="alert alert-success" role="alert" id="register_success">
                </div> -->
            </div>
        </div>

    </div>

    <script>
        let logform = $('#login_form');
        let logbtn = $('.login_btn');
        let infos = {
            email: $('#email_info'),
            password: $('#password_info')
        };
        let logsuccess = $('#login_success');
        logsuccess.hide();

        function checkform() {
            let isPass = true;
            let i, s;
            for ( s in infos) {
                infos[s].hide();
            }

            if (!logform[0].email.value){
                isPass = false;
            }

            if (!logform[0].password.value){
                isPass = false;
            }

            return isPass;
        }


    </script>

<?php include __DIR__ . '/_foot.php' ?>