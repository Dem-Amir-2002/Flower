<?php
$title = 'اخبار و مقالات';
include('includes/header.php');
//articles
$articles = $conn->query("SELECT * FROM `articles` ORDER BY `created_at` DESC");
?>
<main>
    <div class="container">
        <div class="row mt-5 pb-5">
            <?php while($rows = $articles->fetch()) { ?>
            <div class="col-md-4 py-2">
                <a href="show.php?id=<?=$rows['id']?>">
                    <div class="card text-right btn-outline-dark">
                        <img class="card-img-top" width="200" height="200" src="img/article/<?=$rows['pic']?>" alt="<?=$rows['title']?>">
                        <h6 class="font-weight-bold p-3"><?=$rows['title']?></h6>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php include("includes/footer.php"); ?>