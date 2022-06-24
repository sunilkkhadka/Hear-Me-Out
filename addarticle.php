<?php
include('includes/db.php');
ob_start();

if (isset($_POST["submit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $category = $_POST["category"];
    $currentDate = date('Y-m-d');

    $imgName = $_FILES['photo']['name'];
    if ($imgName == '') {
        $imgName = '';
    }
    $ext = pathinfo($imgName, PATHINFO_EXTENSION);
    $valid_ext = ['jpg', 'jpeg', 'png'];
    if (in_array($ext, $valid_ext)) {
        $random_img_name = uniqid() . '.' . $ext;
        $path = 'uploads/' . $random_img_name;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
            $sql = "INSERT INTO tbl_article(title, description, thumbnail, category_id, added_date, added_by) VALUES ('$title','$content','$random_img_name','$category', '$currentDate', 'admin')";
            if ($conn->query($sql) == TRUE) {
                header('location: listarticle.php');
            } else {
                echo "<script type= 'text/javascript'>alert('Data not inserted');</script>";
            }
        }
    } else {
        echo "<script>alert('Image format is not supported');</script>";
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
    <title>Document</title>
</head>

<body>
    <?php include('includes/header2.php'); ?>

    <!-- admin body -->
    <div class="admin-body">
        <h2>Add New Article</h2>
        <form name="editarticle" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <p>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" style="width: 100%" placeholder="Enter title">
            </p>
            <p>
                <label for="content">Content:</label>
                <textarea name="content" rows="10" cols="150" style="width: 100%" placeholder="Enter content"></textarea>
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
            <input type="submit" name="submit" value="submit">
        </form>
    </div>

</body>

</html>