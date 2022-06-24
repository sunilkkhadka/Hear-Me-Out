<?php

include('../includes/db.php');

$search_term = $_POST['search'];

$sql = "SELECT * FROM tbl_article WHERE title LIKE '%{$search_term}%' LIMIT 5";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) { ?>
        <a href="article.php?id=<?php echo $rows['article_id']; ?>">
            <div id="result-list">
                <h3><?php echo $rows['title']; ?></h3>
            </div>
        </a>

<?php
    }
}
?>