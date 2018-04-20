<?php
require __DIR__ . '/__db_connect.php';

$page_name = 'register';
/*
if(isset($_POST['name'])) {

    // 檢查各欄位值是否符合要求

    $sql = "INSERT INTO `address_book`(
`name`, `mobile`, `email`, `birthday`, `address`, `created_at`
) VALUES (
  ?, ?, ?, ?, ?, NOW()
)";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('sssss',
        $_POST['name'],
        $_POST['mobile'],
        $_POST['email'],
        $_POST['birthday'],
        $_POST['address']
    );

    $stmt->execute();
    $affected_rows =  $stmt->affected_rows;

    $stmt->close();


}
*/
//$name = isset($_POST['name']) ? $_POST['name'] : '';
//$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
//$email = isset($_POST['email']) ? $_POST['email'] : '';
//$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
//$address = isset($_POST['address']) ? $_POST['address'] : '';


?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">

    <?php include __DIR__. '/__navbar.php' ?>


    <div id="main_alert" class="alert alert-danger" role="alert" style="display: none">

    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    註冊會員
                </div>
                <div class="card-body">

                    <form id="myform" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <label for="email">** 電子郵件</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder=""
                                   value="">
                            <small id="email_info" class="form-text text-muted">請輸入正確的email</small>
                        </div>

                        <div class="form-group">
                            <label for="nickname">** 匿稱</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="請輸入匿稱"
                                   value="">
                            <small id="nickname_info" class="form-text text-muted">請輸入正確的匿稱</small>
                        </div>

                        <div class="form-group">
                            <label for="password">** 密碼</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼"
                                   value="">
                            <small id="password_info" class="form-text text-muted">請輸入密碼</small>
                        </div>

                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder=""
                                   value="">
                            <small id="mobile_info" class="form-text text-muted">請輸入十位數的手機號碼</small>
                        </div>



                        <div class="form-group">
                            <label for="birthday">生日</label>
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder=""
                                   value="">
                        </div>

                        <div class="form-group">
                            <label for="address">地址</label>
                            <textarea name="address" id="address"  class="form-control" cols="30" rows="3"></textarea>
                        </div>

                        <button type="button" class="btn btn-primary register_btn">註冊</button>
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


    /*
    var f_name = $('#name');
    var f_mobile = $('#mobile');
    var f_email = $('#email');

    function formCheck(){

        var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        var isPass = true;

        $('#name_info').hide();
        $('#mobile_info').hide();
        $('#email_info').hide();

        if(f_name.val().length < 2){
            isPass = false;
            $('#name_info').show();
        }

        if(f_mobile.val().length < 10){
            isPass = false;
            $('#mobile_info').show();
        }

        if(! pattern.test(f_email.val())){
            isPass = false;
            $('#email_info').show();
        }


        return isPass;
    }
*/
</script>

<?php include __DIR__. '/__html_foot.php' ?>
