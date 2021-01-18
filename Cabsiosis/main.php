<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $time = $_POST['time'];

    $link = mysqli_connect('localhost', 'root', '', 'userlog');
    if (!$link) { die('err_link: ' . mysqli_connect_error()); }

    $sql = "INSERT INTO loginfo (user, month, day, year, time) VALUES ('$user', '$month', '$day', '$year', '$time')";
    if (mysqli_query($link, $sql)) { echo 'save to db success'; }
    else { echo 'err_sql: ' . mysqli_error($link); }

    mysqli_close($link);
}