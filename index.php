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
        if ($currentUser->canUploadInvoice())
            InvoiceController::add();
        else
            HomePageController::index();
        break;
    case 'invoice-view':
        if ($currentUser->canViewInvoice())
            InvoiceController::view();
        else
            HomePageController::index();
        break;
    case 'invoice-search':
        InvoiceController::search();
        break;
    case 'purchase-invoice-add':
        PurchaseInvoiceController::add();
        break;
    case 'purchase-invoice-view':
        PurchaseInvoiceController::view();
        break;
    case 'purchase-invoice-search':
        PurchaseInvoiceController::search();
        break;
    case 'documents-add':
        DocumentsController::add();
        break;
    case 'documents-view':
        DocumentsController::view();
        break;
    case 'documents-search':
        DocumentsController::search();
        break;
    case 'equipment-add':
        EquipmentController::add();
        break;
    case 'equipment-view':
        EquipmentController::view();
        break;
    case 'equipment-search':
        EquipmentController::search();
        break;
    case 'license-add':
        LicenseController::add();
        break;
    case 'license-view':
        LicenseController::view();
        break;
    case 'license-search':
        LicenseController::search();
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
