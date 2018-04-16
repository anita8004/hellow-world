<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'data_insert';

 if (isset($_POST['name'])) {

     $sql = sprintf("INSERT INTO `address_book`(
`name`, `mobile`, `email`, `birthday`, `address`, `created_at`
) VALUES (
'%s', '%s', '%s', '%s', '%s', NOW()
)",
         $mysqli->escape_string($_POST['name']),
         $mysqli->escape_string($_POST['mobile']),
         $mysqli->escape_string($_POST['email']),
         $mysqli->escape_string($_POST['birthday']),
         $mysqli->escape_string($_POST['address'])
    );

     $t = $mysqli->query($sql);

//     echo $t ? 'true' : 'false';
//
//     echo $sql;

     header('Location: data_list.php');

     exit;
 }



 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">DATA INSERT</h2>

        <div class="row">
            <div class="col-6">
                <form class="data_insert_form" method="post" onsubmit="return formCheck()">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Please enter name">
                        <small id="name_info" class="form-text text-muted">請輸入正確的姓名</small>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile">
                        <small id="mobile_info" class="form-text text-muted">請輸入十位數的手機</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <small id="email_info" class="form-text text-muted">請輸入正確的Email</small>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
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
    </script>

<?php include __DIR__ . '/_foot.php' ?>