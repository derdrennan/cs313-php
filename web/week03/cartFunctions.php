<?php
session_start();

if (empty($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content, true);

if ($decoded['action'] == 'add') {
  $_SESSION['cart'][$decoded['ID']] = $_SESSION['cart'][$decoded['ID']] + 1;
}

if ($decoded['action'] == 'remove') {
  unset($_SESSION['cart'][$decoded['ID']]);
}

echo json_encode($_SESSION['cart']);
