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

}