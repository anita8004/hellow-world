<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'register';

//  if (isset($_POST['name'])) {

//      $sql = "INSERT INTO `address_book`(
// `name`, `mobile`, `email`, `birthday`, `address`, `created_at`
// ) VALUES (
//   ?, ?, ?, ?, ?, NOW()
// )";

//      $stmt = $mysqli->prepare($sql);

//      $stmt->bind_param('sssss',
//          $_POST['name'],
//          $_POST['mobile'],
//          $_POST['email'],
//          $_POST['birthday'],
//          $_POST['address']
//      );

//      $stmt->execute();
//      $affected_rows =  $stmt->affected_rows;

//      $stmt->close();
//  }

// $name = isset($_POST['name']) ? $_POST['name'] : '';
// $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
// $email = isset($_POST['email']) ? $_POST['email'] : '';
// $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
// $address = isset($_POST['address']) ? $_POST['address'] : '';



 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">REGISTER</h2>

        <div class="row">
            <div class="col-6">
                <form id="register_form" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label for="nickname">Nick Name *</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="" value="">
                        <small class="form-text text-muted">至少輸入2個字元</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Account ( Email ) *</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                        <small class="form-text text-muted">請輸入正確的Email</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                        <small class="form-text text-muted">請輸入6個字元以上英數字</small>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-info register_btn">Submit</button>
                        <button type="reset" class="btn btn-info reset-btn">Reset</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
            <div class="alert alert-danger" role="alert" id="nickname_info"></div>
                <div class="alert alert-danger" role="alert" id="email_info"></div>
                <div class="alert alert-danger" role="alert" id="password_info"></div>
                <div class="alert alert-success" role="alert" id="register_success">
                </div>
            </div>
        </div>

    </div>

    <script>
        let regform = $('#register_form');
        let regbtn = $('.register_btn');
        let infos = {
            email: $('#email_info'),
            nickname: $('#nickname_info'),
            password: $('#password_info')
        };
        let regsuccess = $('#register_success');
        regsuccess.hide();

        let i, s;
        for ( s in infos) {
            infos[s].hide();
        }

        regbtn.on('click', function () {
            regsuccess.hide();
            for ( s in infos) {
                infos[s].hide();
            }
            $.post('register_api.php', regform.serialize(), function (data) {

                console.log(data);
                if (data.success) {
                    if (data.info) {
                        regsuccess.removeClass('alert-danger').addClass('alert-success').text(data.info).show();
                    }
                } else {
                    if (data.email_error) {
                        infos['email'].text(data.email_error).show();
                    }
                    if (data.nickname_error) {
                        infos['nickname'].text(data.nickname_error).show();
                    }
                    if (data.password_error) {
                        infos['password'].text(data.password_error).show();
                    }
                    regbtn.show();
                    regsuccess.removeClass('alert-success').addClass('alert-danger').text(data.info).show();
                }
             }, 'json');
         });

    </script>

<?php include __DIR__ . '/_foot.php' ?>