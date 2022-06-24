<?php
include("includes/db.php");
session_start();

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
                </ul>
            </div>
            <div class="header-search-bar">
                <div class="bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search" name="search" placeholder="Search...">
                </div>
                <div id="search-result">

                </div>
            </div>
        </div>
    </div>
    <div class="main-container">