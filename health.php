<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctype/doc.php'); ?>
    <title>Health</title>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="news-container">
        <div class="news-wrapper">
            <div class="news-part">
                <div class="news-heading">
                    <h1>Health News: </h1>
                </div>
                <div class="news-cards-list">
                    <?php
                    $sql = "SELECT * FROM tbl_article INNER JOIN tbl_categories ON tbl_article.category_id = tbl_categories.id WHERE tbl_categories.id = '3'";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($rows = $result->fetch_assoc()) {
                            // $pos = strpos($rows['description'], ' ', 50);
                            // $content = substr($rows['description'], 0, $pos) . '...';
                    ?>


                            <div class="news-card">
                                <div class="news-thumbnail">
                                    <img src="<?php echo 'uploads/' . $rows['thumbnail']; ?>" alt="">
                                </div>
                                <div class="news-topic">
                                    <h4><i class="far fa-clock"></i> <?php echo $rows['added_date']; ?></h4>
                                    <h4>Posted By: <i class="fas fa-user"></i> <?php echo $rows['added_by']; ?></h4>
                                    <h1><?php echo $rows['title']; ?></h1>
                                    <a href="article.php?id=<?php echo $rows['article_id']; ?>">Read More <i class="fas fa-arrow-circle-right"></i> </a>
                                </div>
                            </div>
                    <?php

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include('includes/footer.php'); ?>

</body>

</html>