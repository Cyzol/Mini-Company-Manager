<?php

require_once __DIR__ . '/../autoload.php';

class PurchaseInvoiceController
{
    public static function add()
    {
        //widok dodawania faktury zakupu
        echo PurchaseInvoiceViewAdd::render();
        return;
    }

}