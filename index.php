<?php

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/database/FakturySprzedazy.php';

session_start();

$Faktura = new Invoice();
var_dump($Faktura->select(array('id'=>1)));
echo 'test';
var_dump($Faktura->insert(array('invoicenumber'=>'bbb','contactordata'=>'bbb','netamount'=>1,'grossamount'=>1,'vattax'=>1,'amountincurrency'=>1,'currency'=>'bbb','url'=>'bbb')));

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
    case 'logout':
        LoginController::logout();
        break;
    default:
        header('Location: index.php?action=login');
        break;
}
