<?php
session_start();
$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
    $text_message = "<div class='msgln'><span class='chat-time'>".$dt->format('g:i A')."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>