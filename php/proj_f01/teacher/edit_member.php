<?php
require __DIR__ . '/__db_connect.php';

$page_name = 'edit_member';


if(isset($_POST['password'])){

    $sql = sprintf("SELECT * FROM `members` WHERE id=%s AND `password`='%s'",
        $_SESSION['user']['id'],
        sha1($_POST['password'])
    );

    $rs = $mysqli->query($sql);
    if($rs->num_rows==0){
        // 密碼錯誤
        $wrong_pass = true;

    } else {
        $sql = "UPDATE `members` SET `mobile`=?,`address`=?,`birthday`=?,`nickname`=? WHERE `id`=?";

        $stmt = $mysqli->prepare($sql);

        if($mysqli->errno){
            echo $mysqli->error;
            exit;
        }

        $stmt->bind_param('ssssi',
            $_POST['mobile'],
            $_POST['address'],
            $_POST['birthday'],
            $_POST['nickname'],
            $_SESSION['user']['id']
        );

        $stmt->execute();

        $affected_rows = $stmt->affected_rows;

        if($affected_rows==1){
            $_SESSION['user']['mobile'] = $_POST['mobile'];
            $_SESSION['user']['address'] = $_POST['address'];
            $_SESSION['user']['birthday'] = $_POST['birthday'];
            $_SESSION['user']['nickname'] = $_POST['nickname'];
        }

        $stmt->close();
    }





}



?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>

    <?php if(isset($affected_rows)): ?>
        <?php if($affected_rows==1): ?>
            <div id="main_alert" class="alert alert-success" role="alert" style="">
                資料修改完成
            </div>
        <?php else: ?>
            <div id="main_alert" class="alert alert-warning" role="alert" style="">
                資料沒有修改
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(isset($wrong_pass)): ?>
        <div id="main_alert" class="alert alert-danger" role="alert" style="">
            密碼錯誤
        </div>
    <?php endif; ?>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    編輯會員資料
                </div>
                <div class="card-body">

                    <form id="myform" method="post">
                        <div class="form-group">
                            <label for="email">** 電子郵件</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?= $_SESSION['user']['email'] ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="nickname">** 匿稱</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="請輸入匿稱"
                                   value="<?= $_SESSION['user']['nickname'] ?>">
                            <small id="nickname_info" class="form-text text-muted">請輸入正確的匿稱</small>
                        </div>

                        <div class="form-group">
                            <label for="password">** 密碼 (請填原密碼)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="(請填原密碼)"
                                   value="">
                            <small id="password_info" class="form-text text-muted">請輸入密碼</small>
                        </div>

                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder=""
                                   value="<?= $_SESSION['user']['mobile'] ?>">
                            <small id="mobile_info" class="form-text text-muted">請輸入十位數的手機號碼</small>
                        </div>



                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder=""
                                   value="<?= $_SESSION['user']['birthday'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="address">地址</label>
                            <textarea name="address" id="address"  class="form-control" cols="30" rows="3"><?= $_SESSION['user']['address'] ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary register_btn">修改</button>
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
    /*
    let myform = $('#myform');
    let r_btn = $('.register_btn');
    let infos = {
      email: $('#email_info'),
      nickname: $('#nickname_info'),
      password: $('#password_info')
    };
    let main_alert = $('#main_alert');

    r_btn.click(function(){
        let i, s;

        r_btn.hide();

        main_alert.hide();
        for(s in infos){
            infos[s].hide();
        }

        $.post('register_api.php', myform.serialize(), function(data){
            if(data.success){
                main_alert.removeClass('alert-danger').addClass('alert-success');
                main_alert.text(data.info);
                main_alert.show();


            } else {
                if(data.email_error){
                    infos['email'].text( data.email_error );
                    infos['email'].show();
                }
                if(data.nickname_error){
                    infos['nickname'].text( data.nickname_error );
                    infos['nickname'].show();
                }
                if(data.password_error){
                    infos['password'].text( data.password_error );
                    infos['password'].show();
                }
                main_alert.removeClass('alert-success').addClass('alert-danger');
                if(data.info) {
                    main_alert.text(data.info);
                } else {
                    main_alert.text('資料有誤');
                }
                main_alert.show();

                r_btn.show();
            }


        }, 'json');


    });
*/
</script>

<?php include __DIR__. '/__html_foot.php' ?>
