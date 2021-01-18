<?php

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/login/currentUserObject.php';

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'invoice-list':
        InvoiceController::index();
        break;
    case 'invoice-add':
        InvoiceController::add($currentUser);
        break;
    case 'invoice-view':
        InvoiceController::view();
        break;
    case 'purchase-invoice-add':
        PurchaseInvoiceController::add();
        break;
    case 'purchase-invoice-view':
        PurchaseInvoiceController::view();
        break;
    case 'documents-add':
        DocumentsController::add();
        break;
    case 'documents-view':
        DocumentsController::view();
        break;
    case 'equipment-add':
        EquipmentController::add();
        break;
    case 'equipment-view':
        EquipmentController::view();
        break;
    case 'license-add':
        LicenseController::add();
        break;
    case 'license-view':
        LicenseController::view();
        break;
    case 'login-set':
        LoginController::set($currentUser);
        break;
    case 'login':
        LoginController::index();
        break;
    case 'register':
        RegisterController::index();
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
