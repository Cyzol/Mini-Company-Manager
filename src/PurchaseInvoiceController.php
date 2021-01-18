<?php

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './PurchaseInvoiceRepository.php';

class PurchaseInvoiceController
{
    public static function add()
    {
        //widok dodawania faktury zakupu
        echo PurchaseInvoiceViewAdd::render();
        return;
    }

    public static function view()
    {
        $purchaseInvoiceRepository = new purchaseInvoiceRepository();
        $repository = $purchaseInvoiceRepository->getPurchaseInvoices();
        echo PurchaseInvoiceView::render($purchaseInvoiceRepository,$repository);
        return;
    }

    public static function search(){
        $netAmount = $_POST['searchBarNetAmount'];
        $invoiceNumber = $_POST['searchBarInvoiceNumber'];
        $contractor = $_POST['searchBarContractor'];
        $grossAmount = $_POST['searchBarGrossAmount'];

        $PurchaseInvoiceRepository = new PurchaseInvoiceRepository();
        $repository = $PurchaseInvoiceRepository->getPurchaseInvoices($netAmount, $invoiceNumber, $contractor, $grossAmount);
        echo PurchaseInvoiceView::render($PurchaseInvoiceRepository, $repository);

        return;
    }

}