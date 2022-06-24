<?php

if (isset($_SESSION['email']) && $_SESSION['log'] == 'loggedIn') {
    $option = "<a href='logout.php'>Logout</a>";
}

?>

<div class="hearmeout">
    <div class="header">
        <div class="header-wrapper">
            <div class="logo">
                <h1>HearMeOut</h1>
            </div>
            <div class="nav-bar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="business.php">Business</a></li>
                    <li><a href="technology.php">Technology</a></li>
                    <li><a href="health.php">Health</a></li>
                    <li><a href="sports.php">Sports</a></li>
                    <li><a href="entertainment.php">Entertainment</a></li>
                    <li><a href="listarticle.php">[ <i class="fas fa-list"></i> Show Details ]</a></li>
                    <li><a href="addarticle.php">[ <i class="fas fa-plus"></i> Add article ]</a></li>
                    <?php
                    if ($_SESSION['log'] = 'loggedIn') { ?>
                        <li><a href="logout.php">[ <i class="fas fa-sign-out-alt"></i> Logout ]</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-container">