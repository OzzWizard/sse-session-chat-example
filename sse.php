<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

session_start();

$chat = isset($_SESSION['chat']) ? $_SESSION['chat'] : array();

$chatJson = json_encode($chat, JSON_UNESCAPED_UNICODE);

// JSON verisini gönder
echo "data: $chatJson\n\n";


ob_flush();
flush();
?>
