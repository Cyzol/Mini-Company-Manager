<?php

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/database/FakturySprzedazy.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'invoice-list':
        InvoiceController::index();
        break;
    case 'invoice-show':
        InvoiceController::show();
        break;
    case 'login-set':
        LoginController::set();
        break;
    case 'login':
        LoginController::index();
        break;
    case 'home-page':
        HomePageController::index();
        break;
    case 'logout':
        LoginController::logout();
        break;
    default:
        header('Location: index.php?action=home-page');
        break;
}
