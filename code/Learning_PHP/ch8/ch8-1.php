<?php
// 連結資料庫
// 使用PDO連結資料庫

// 一個 restaurant 的 MySQL資料庫 運作在 db.example.com的電腦上
$db = new PDO('mysql:host=db.example.com;dbname=restaurant', 'penguin', 'top^hat');
