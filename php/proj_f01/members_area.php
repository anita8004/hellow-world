<?php

 require __DIR__ . '/_db_connect.php';

 $page_name = 'members_area';

 ?>

<?php include __DIR__ . '/_head.php' ?>

<body>

    <div class="container">

        <?php include __DIR__ . '/_navbar.php' ?>

        <h2 class="page-title">MEMBER'S AREA</h2>

        <?php include __DIR__ . '/member_nav.php' ?>

        <div class="row">
            <div class="col-6">
                <form id="register_form" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label for="nickname">Nick Name *</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="" value="<?= $_SESSION['user']['nickname'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Account ( Email ) *</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" value="**********" disabled>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" value="<?= $_SESSION['user']['mobile'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $_SESSION['user']['birthday'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" value="<?= $_SESSION['user']['address'] ?>" disabled></textarea>
                    </div>
                    <div class="form-group">
                        <a href="edit_member.php" class="btn btn-info">Edit</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                
            </div>
        </div>

    </div>

    

<?php include __DIR__ . '/_foot.php' ?>