<?php
include('includes/db.php');
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctype/doc.php'); ?>
    <title>List Articles</title>
</head>

<body>
    <?php include('includes/header2.php'); ?>

    <!-- details -->
    <div class="detail-wrapper">
        <h1>Show Details: </h1>
        <div class="detail-table">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Category</th>
                    <th>Added date</th>
                    <th>Added By</th>
                    <th>Actions</th>
                </tr>

                <?php
                $sql = "SELECT * FROM tbl_article INNER JOIN tbl_categories ON tbl_article.category_id = tbl_categories.id ORDER BY article_id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) {
                        $pos = strpos($rows['description'], ' ', 60);
                        $content = substr($rows['description'], 0, $pos) . '...';
                ?>
                        <tr>
                            <td><?php echo $rows['article_id']; ?></td>
                            <td><img src="<?php echo 'uploads/' . $rows['thumbnail']; ?>" width="90px" height="100px"></td>
                            <td><?php echo $rows['title']; ?></td>
                            <td><?php echo $content; ?></td>
                            <td><?php echo $rows['thumbnail']; ?></td>
                            <td><?php echo $rows['category_name']; ?></td>
                            <td><?php echo $rows['added_date']; ?></td>
                            <td><?php echo $rows['added_by']; ?></td>
                            <td><a href="updatearticle.php?id=<?php echo $rows['article_id']; ?>" style="background-color: #3d5af1; padding: 0.5rem 0.5rem; color: white; margin-right: 0.2rem;"> <i class="far fa-edit"></i> Update</a> <a id="delete-record" data-id="<?php echo $rows['article_id']; ?>" style="background-color: red; cursor:pointer; padding: 0.5rem 0.5rem; color: white; margin-right: 0.2rem;"><i class="far fa-trash-alt"></i> Delete</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>