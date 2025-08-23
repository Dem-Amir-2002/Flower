<?php
require_once('includes/dbconfig.php');
//check user is login
if (isset($_SESSION["userid"])) {
    header("location: index.php");
    exit();
} else {
    if (isset($_POST['btn_login'])) {
        if (isset($_POST['username'], $_POST['password'])
            && !empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = MD5($_POST['password']);

                $sql = "SELECT * FROM `users` WHERE `username` = :username AND `password` = :password";
                $result = $conn->prepare($sql);
                $result->bindParam(':username', $username);
                $result->bindParam(':password', $password);
                $result->execute();
                if ($result->rowCount() > 0) {
                    $results = $result->fetch();
                    $_SESSION["userid"] = $results['ID'];
                    $_SESSION['fullname'] = $results['name'] . ' ' . $results['family'];
                    $_SESSION['permission'] = $results['permission'];
                    if ($results['permission'] == 0) {
                        header("location: index.php");
                        exit;
                    }
                    if ($results['permission'] == 2) {
                        header("location: admin/index.php");
                        exit;
                    }
                } else {
                    $errors[] = '<div class="alert alert-danger text-center">نام کاربری یا رمز عبور اشتباه است.</div>';
                }
        }
    }
}
//message
if(isset($_GET['ok'])){
    $errors[] = '<div class="alert alert-success">هم اکنون می توانید وارد سایت شوید.</div>';
}
if(isset($_GET['restrict'])){
    $errors[] = '<div class="alert alert-danger text-center">برای استفاده از این بخش لطفا ابتدا وارد سایت شوید.</div>';
}
$title = 'ورود به سایت';
require_once('includes/header.php');
?>
<main>
    <div class="container my-5">
        <div class="card col-md-6 mx-auto">
            <div class="card-header bg-white border-0">
                <h4 class="font-weight-bold">همراه گرامی خوش آمدید</h4>
                <h6 class="text-muted pt-4">برای ورود نام کاربری و رمز عبور خود را وارد کنید.</h6>
            </div>
            <div class="card-body text-right">
                <?php
                if (isset($errors) && count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo  $error;
                    }
                }
                ?>
                <form action="" method="post" class="p-2">
                    <div class="form-group">
                        <label class="mb-1">نام کاربری <i class="text-danger">*</i></label>
                        <input type="text" name="username" placeholder="نام کاربری را وارد نمایید" class="mb-3 form-control" required min="11" maxlength="11" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">رمز عبور <i class="text-danger">*</i></label>
                        <input type="password" name="password" placeholder="رمزعبور خود را وارد نمایید"
                               class="form-control" autocomplete="off" required>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-block btn-outline-success" name="btn_login">ورود</button>
                    </div>
                </form>
                <div class="text-center pt-4">
                    <span class="font-weight-bold">کاربر جدید هستید؟</span>
                    <a href="register.php">ثبت نام</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once('includes/footer.php'); ?>