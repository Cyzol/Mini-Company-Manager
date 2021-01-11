<?php
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . './InvoiceRepository.php';

class InvoiceController
{
    public static function index()
    {
        // tutaj jakaś logika
        die("Tu jest invoice list");
    }

    public static function add()
    {
        echo InvoiceViewAdd::render();
        return;
    }

    public static function view()
    {
        $invoiceRepository = new InvoiceRepository();
        $repository = $invoiceRepository->getInvoices();
        echo InvoiceView::render($repository);



        //Tak pobierasz ilość faktur
//        echo sizeof($invoiceRepository->getInvoices());
        //Tak pobierasz wartość elementu
//        print_r($invoiceRepository->getInvoices()[0]->getId());
//        print_r($invoiceRepository->getInvoices()[0]->getInvoiceNumber());

        return;
    }

    public static function show()
    {



//        $invoiceId = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
//        if (! $invoiceId) {
//            throw new \Exception("Lipa nie ma idika");
//        }
//
//        // pobieranie faktury
//        $invoiceRepository = new InvoiceRepository();
//        $invoice = $invoiceRepository->getInvoice($invoiceId);
//
//        // tutaj jakaś logika
//        echo InvoiceViewShow::render([
//            'invoice' => $invoice,
//        ]);
//        return;

//        die("Tu jest invoice show dla $invoiceId " . print_r($invoice, true));
    }
}
