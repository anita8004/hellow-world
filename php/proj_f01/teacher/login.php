<?php
require __DIR__ . '/__db_connect.php';

$page_name = 'login';


if(isset($_POST['email'])){

    $doChecked = true;

    $sql = sprintf("SELECT `id`, `email`, `mobile`, `address`, `birthday`, `nickname` 
            FROM `members` WHERE `email`='%s' AND `password`='%s'",
        $mysqli->escape_string($_POST['email']),
        sha1($_POST['password'])

        );

    $rs = $mysqli->query($sql);


    if($rs->num_rows==1){
        $row = $rs->fetch_assoc();

        $_SESSION['user'] = $row;
    }
//    echo $doChecked ? 'ttt' : 'fff';
//exit;
}


?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>

    <?php if(isset($doChecked)):  ?>
        <?php if(isset($_SESSION['user'])):  ?>
            <div id="main_alert" class="alert alert-success" role="alert">
                登入完成
            </div>
        <?php else: ?>
            <div id="main_alert" class="alert alert-danger" role="alert">
                帳號或密碼錯誤
            </div>
        <?php endif;  ?>
    <?php endif;  ?>


    <div class="row" style="margin-top: 20px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    會員登入
                </div>
                <div class="card-body">

                    <form id="myform" method="post" onsubmit="return checkForm();">
                        <div class="form-group">
                            <label for="email">** 電子郵件</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""
                                   value="">
                            <small id="email_info" class="form-text text-muted">請輸入正確的email</small>
                        </div>


                        <div class="form-group">
                            <label for="password">** 密碼</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼"
                                   value="">
                            <small id="password_info" class="form-text text-muted">請輸入密碼</small>
                        </div>
                        

                        <button type="submit" class="btn btn-primary login_btn">登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<style>
    small.form-text.text-muted {
        color: red !important;
        display: none;
    }
</style>
<script>
    let myform = $('#myform');


    function checkForm(){
        let isPass = true;

        if(! myform[0].email.value){
            isPass = false;
            alert('請填寫 email');
        }

        if(! myform[0].password.value){
            isPass = false;
            alert('請填寫密碼');
        }



        return isPass;

    }

</script>

<?php include __DIR__. '/__html_foot.php' ?>
