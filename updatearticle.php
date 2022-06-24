<?php

include('includes/db.php');

if (isset($_POST['submit'])) {
    $article_id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $category = $_POST["category"];
    $currentDate = date('Y-m-d');

    $imgName = $_FILES['photo']['name'];
    if ($imgName == '') {
        echo "<script>alert('Please Select an image'); </script>";
    } else {
        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
        $valid_ext = ['jpg', 'jpeg', 'png'];
        if (in_array($ext, $valid_ext)) {
            $random_img_name = uniqid() . '.' . $ext;
            $path = 'uploads/' . $random_img_name;
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
                $sql = "UPDATE tbl_article SET title = '$title', description = '$content', thumbnail = '$random_img_name', category_id = '$category', added_date = '$currentDate', added_by = 'admin' WHERE article_id = '$article_id'";
                $result = $conn->query($sql);
                if ($result) {
                    header('location: listarticle.php');
                } else {
                    echo "<script>alert('Not updated'); </script>";
                }
            } else {
                echo "<script>alert('Format not supported'); </script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('doctype/doc.php'); ?>
    <title>Update</title>
</head>

<body>

    <?php include('includes/header2.php'); ?>

    <!-- admin body -->
    <div class="admin-body">
        <h2>Update Article</h2>
        <form name="editarticle" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_article WHERE article_id = '$id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) { ?>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <p>
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" style="width: 100%" placeholder="Enter title" value="<?php echo $rows['title']; ?>">
                        </p>
                        <p>
                            <label for="content">Content:</label>
                            <textarea name="content" rows="10" cols="150" style="width: 100%" placeholder="Enter content"><?php echo $rows['description']; ?></textarea>
                        </p>
                        <p>
                            <label for="category">Category:</label>
                            <select name="category">
                                <option value="#">Select a category</option>
                                <?php
                                $sql = "SELECT * FROM tbl_categories";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($rows = $result->fetch_assoc()) { ?>
                                        <option value="<?php echo $rows['id']; ?>"><?php echo $rows['category_name']; ?></option>
                                <?php
                                    }
                                }

                                ?>
                            </select>
                        </p>
                        <p>
                            <label for="photo">Photo:</label>
                            <input name="photo" type="file" id="photo">
                        </p>
                        <input type="submit" name="submit" value="Update">
                        <button><a href="listarticle.php" style="background-color: red; padding: 1rem 1.2rem; color: white; border:none;">Cancel</a></button>

            <?php
                    }
                }
            }
            ?>
        </form>
    </div>

</body>

</html>