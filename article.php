<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctype/doc.php'); ?>
    <title>Article</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <!-- article body -->
    <div class="article-body">
        <div class="left-section">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_article WHERE article_id = '$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) { ?>

                        <div class="article">
                            <div class="img-container">
                                <img src="<?php echo 'uploads/' . $rows['thumbnail']; ?>" alt="">
                            </div>
                            <div class="desc">
                                <div class="basic-details">
                                    <h4><i class="far fa-clock"></i> <?php echo $rows['added_date']; ?></h4>
                                    <h4>Posted By: <i class="fas fa-user"></i> <?php echo $rows['added_by']; ?></h4>
                                </div>
                                <div class="content">
                                    <h1><?php echo $rows['title']; ?></h1>
                                    <h3><?php echo $rows['description']; ?></h3>
                                </div>
                            </div>
                        </div>
            <?php

                    }
                }
            }

            ?>
        </div>
        <div class="right-section">
            <div class="right-wrapper">
                <h1>Recommended: </h1>
                <div class="image-cards">
                    <?php
                    $sql = "SELECT * FROM tbl_article";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($rows = $result->fetch_assoc()) {
                            $pos = strpos($rows['description'], ' ', 40);
                            $content = substr($rows['description'], 0, $pos) . '...';

                            $pos2 = strpos($rows['title'], ' ', 5);
                            $title = substr($rows['title'], 0, $pos) . '...';
                    ?>
                            <a href="article.php?id=<?php echo $rows['article_id']; ?>">
                                <div class="img-card">
                                    <div class="thumbnail">
                                        <img src="<?php echo 'uploads/' . $rows['thumbnail']; ?>" alt="">
                                    </div>
                                    <div class="desc">
                                        <h1><?php echo $title; ?></h1>
                                        <h3><?php echo $content; ?></h3>
                                    </div>
                                </div>
                            </a>
                    <?php
                        }
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>



    <?php include('includes/footer.php'); ?>
</body>

</html>