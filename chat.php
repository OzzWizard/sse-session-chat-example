<?php
// Session başlatma
session_start();

// Chat dizisi oluşturma veya mevcut olanı alma
if (!isset($_SESSION['chat'])) {
    $_SESSION['chat'] = array();
}

// Kullanıcıdan gelen verileri güvenli bir şekilde alın
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';

// Geçerli bir mesaj ve ad varsa chat dizisine ekleyin
if (!empty($message) && !empty($name)) {
    // Chat verisi oluşturma
    $chatData = array(
        'name' => $name,
        'message' => $message,
        'time' => date('r')
    );

    // Chat verisini session içindeki chat dizisine ekleme
    array_push($_SESSION['chat'], $chatData);
}

// İşlem sonrasında başka bir şey yapmanız gerekiyorsa, burada ek işlemleri gerçekleştirebilir
