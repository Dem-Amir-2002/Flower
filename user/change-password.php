<?php
require_once ('../includes/dbconfig.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:../login.php?op=restrict');
    exit();
}
$id = $_SESSION['userid'];
$data = $conn->prepare("SELECT * FROM `users` WHERE `id`=:userid");
$data->bindParam(':userid',$id);
$data->execute();
$rows = $data->fetch();
$title = 'تغییر پسورد';
if(isset($_POST['btn_save'])) {
    $old = md5($_POST['old_password']);
    $pass = md5($_POST['password']);
    $repass = md5($_POST['re_password']);
    if($old==$rows['password']){
        if($pass==$repass){
            $q=$conn->prepare("UPDATE `users` SET `password`=:password WHERE `id`=:userid");
            $q->bindParam(':password',$pass);
            $q->bindParam(':userid',$id);
            $q->execute();
            $message = '<div class="alert alert-success">پسورد با موفقیت تغییر کرد.</div>';
        }
        else{
            $message = '<div class="alert alert-danger">مقدار پسورد جدید و تکرار پسورد صحیح نمی باشد.</div>';
        }
    }
    else{
        $message = '<div class="alert alert-danger">مقدار پسورد فعلی صحیح نمی باشد.</div>';
    }
}

$title = 'تغییر پسورد';
include ('header.php');
?>
<main>
    <div class="container">
        <div class="d-flex justify-content-start align-items-center px-3 py-5">
            <h5 class="fw-bold mb-0">حساب کاربری من</h5>
            <div class="d-flex align-items-center ms-3">
                <span class="mx-2">|</span>
                <h6 class="text-muted mb-0"> ویرایش پسورد </h6>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-md-4">
                <div class="card shadow text-right">
                    <div class="card-body">
                        <?php include ('menu.php')?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow text-right">
                    <div class="card-body">
                        <h5 class="font-weight-bold">ویرایش کلمه عبور</h5>
                        <hr>
                        <?=@$message?>
                        <form class="form-group" action="" method="POST">
                            <div class="form-group">
                                <label class="mb-2">کلمه عبور فعلی</label>
                                <input type="password" class="form-control mb-2" name="old_password"
                                       placeholder="کلمه عبور فعلی">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="mb-2">کلمه عبور جدید</label>
                                    <input type="password" class="form-control mb-2" name="password"
                                           placeholder="کلمه عبور جدید">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mb-2">تکرار کلمه عبور جدید</label>
                                    <input type="password" class="form-control mb-2" name="re_password"
                                           placeholder="تکرار کلمه عبور جدید">
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success" name="btn_save">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php')?>
