<?php
require_once('includes/dbconfig.php');
//check user is login
if (isset($_SESSION["userid"])) {
    header("location: index.php");
    exit();
} else {
    if (isset($_POST['btn_register'])) {
        if (isset($_POST['name'], $_POST['family'], $_POST['username'], $_POST['password'], $_POST['re_password'])
            && !empty($_POST['name']) && !empty($_POST['family']) && !empty($_POST['username']) && !empty($_POST['password'])
            && !empty($_POST['re_password'])) {
            $name = $_POST['name'];
            $family = $_POST['family'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];
            //persian pattern
            $pattern = '/[\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{0660}-\x{0669}\x{06F0}-\x{06F9}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}\x{200C}]+/u';
            //english pattern
            $epattern = '/\b[a-zA-Z]+\b/';
            if (!preg_match_all($pattern, $name, $matches)) {
                header('location:register.php?op=name');
                exit();
            }
            if (!preg_match_all($pattern, $family, $matches)) {
                header('location:register.php?op=family');
                exit();
            }
            if (!preg_match_all($epattern, $username, $matches)) {
                header('location:register.php?op=username');
                exit();
            }
            //check username
                $result = $conn->prepare("SELECT `username` FROM users WHERE `username` = :username");
                $result->bindParam(':username', $username);
                $result->execute();
                if ($result->rowCount() > 0) {
                    $errors[] = '<div class="alert alert-danger text-center">این نام کاربری از قبل در سایت موجود می باشد</div>';
                }
                else {
                    if ($password != $re_password) {
                        $errors[] = '<div class="alert alert-danger text-center">رمز ها مشابه نمیباشد</div>';
                    } else {
                        $now = time();
                        $sql = "INSERT INTO `users`(`name`, `family`, `username` , `password`,`created_at`) 
                        VALUE (:name, :family, :username, MD5(:password),'$now')";
                        $query = $conn->prepare($sql);
                        $query->bindParam(':name', $name);
                        $query->bindParam(':family', $family);
                        $query->bindParam(':username', $username);
                        $query->bindParam(':password', $password);
                        $insert =$query->execute();
                        if ($insert) {
                            header('location:login.php?ok');
                            exit();
                        }
                    }
                }
        } else {
            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $errors[] = '<div class="alert alert-danger text-center">لطفا فیلد نام را پر کنید.</div>';
            }
            if (!isset($_POST['family']) || empty($_POST['family'])) {
                $errors[] = '<div class="alert alert-danger text-center">لطفا فیلد نام خانوادکی را پر کنید.</div>';
            }
            if (!isset($_POST['username']) || empty($_POST['username'])) {
                $errors[] = '<div class="alert alert-danger text-center">لطفا فیلد نام کاربری را پر کنید.</div>';
            }
            if (!isset($_POST['password']) || empty($_POST['password'])) {
                $errors[] = '<div class="alert alert-danger text-center">لطفا فیلد رمز عبور را پر کنید.</div>';
            }
            if (!isset($_POST['re_password']) || empty($_POST['re_password'])) {
                $errors[] = '<div class="alert alert-danger text-center">لطفا فیلد تکرار رمز عبور را پر کنید.</div>';
            }
        }
    }
}
if(isset($_GET['op'])){
    switch ($_GET['op']){
        case 'name':
            $errors[] = '<div class="alert alert-danger">لطفا نام خود را  فقط به صورت فارسی وارد نمایید</div>';
            break;
        case 'family':
            $errors[] = '<div class="alert alert-danger">لطفا فامیلی خود را فقط به صورت فارسی وارد نمایید</div>';
            break;
        case 'username':
            $errors[]= '<div class="alert alert-danger">لطفا نام کاربری را به صورت انگلیسی وارد نمایید</div>';
            break;
    }
}
$title = 'ثبت نام';
require_once('includes/header.php');
?>
<main>
    <div class="container my-5">
        <div class="card mx-auto col-md-6">
            <div class="card-header bg-white border-0">
                <h4 class="font-weight-bold">خوشحالیم که به ما می‌پیوندید</h4>
                <h6 class="text-muted pt-4">برای ثبت نام اطلاعات خود را به درستی وارد نمایید.
                </h6>
            </div>
            <div class="card-body text-right">
                <?php
                if (isset($errors) && count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
                ?>
                   <form action="" method="post" class="p-2">
                    <div class="form-group">
                        <label class="mb-1">نام <i class="text-danger">*</i></label>
                        <input type="text" name="name" placeholder="نام" class="mb-3 form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">نام خانوادگی <i class="text-danger">*</i></label>
                        <input type="text" name="family" placeholder="نام خانوادگی" class="mb-3 form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">نام کاربری <i class="text-danger">*</i></label>
                        <input type="text" name="username" placeholder="نام کاربری" class="mb-3 form-control" required>
                    </div>
                       <label class="mb-1">رمز عبور <i class="text-danger">*</i></label>
                       <div class="input-group mb-3">
                           <input class="password-input form-control" type="password" id="password" name="password">
                           <span class="input-group-text toggle-password">
                           <i class="fa fa-eye" style="cursor: pointer;"></i>
                           </span>
                       </div>
                       <label class="mb-1">تکرار رمز عبور <i class="text-danger">*</i></label>
                       <div class="input-group mb-3">
                           <input class="password-input form-control" type="password" id="password" name="re_password">
                           <span class="input-group-text toggle-password">
                           <i class="fa fa-eye" style="cursor: pointer;"></i>
                           </span>
                       </div>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-block btn-outline-success" name="btn_register">ثبت نام</button>
                    </div>
                </form>
                <div class="text-center pt-4">
                    <span class="font-weight-bold">قبلاً ثبت نام کرده اید؟</span>
                    <a href="login.php">ورود به حساب کاربری</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once('includes/footer.php'); ?>
